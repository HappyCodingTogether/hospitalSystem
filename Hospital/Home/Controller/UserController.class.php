<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends  Controller{
    public function index(){
        $this->redirect('Hospital/Index',null, 0);
    }
    public function test(){
        echo session('pingfen');
    }
    public  function login(){
        $username=I('post.userName');
        $pwd=I('post.pwd');
        $User=M('User');
        $data = $User->where("email='$username' OR IDcard='$username'")->find();
        if($data!=null){
            if(md5($pwd)==$data['password']){
                if($data['identify']>0){
                    session("identify",$data['identify']);
                    $url=U('Admin/bianjiyiyuan');
                    redirect($url);
                }elseif($data['identify']==-1){
                    session("identify",$data['identify']);
                    $url=U('Admin/tianjiayiyuan');
                    redirect($url);
                }else{
                    session("userName",$data['name']);
                    session("loginName",$username);
                    session("userID",$data['id']);
                    session("identify",$data['identify']);
                    session("pingfen",$data['pingfen']);
                    redirect(session('urlRefer'));
                }

            }else{
                $this->error("密码错误！");
            }

        }else{
            $this->error("账号不存在！");
        }

    }
    public function logout(){
        $urlRefer=session('urlRefer');
        session(null);
        session('[destroy]'); // 销毁session
        redirect($urlRefer);
    }
    public function checkregister(){
        $type=I('post.type');
        if($type=="y_userID"){
            echo $this->checkIDcard();
        }elseif($type=="y_userEmail"){
            echo $this->checkemail();
        }elseif($type=="y_vercode"){
            if($this->checkverify()){
                echo "true";
            }else{
                echo "false";
            }
        }
    }
    public  function  checkemail(){
        $email=I('post.user_email');
        $User=M('User');
        $data = $User->where("email='$email'")->find();
        if($data!=null){
            return false;
        }
        else {
            return true;
        }
    }
    public function checkIDcard(){
        $idcard=I('post.user_idcard');
        $User=M('User');
        $data = $User->where("IDcard='$idcard'")->find();
        if($data!=null){
            return false;
        }
        else {
            return true;
        }
    }

    /***
     * 生成验证码
     */
    public  function  verify(){

        $Verify = new \Think\Verify();
        $Verify->length=4;
        $Verify->fontsize=30;
        $Verify->entry();
    }
    /**
     * 验证码检查
     */
    public function checkverify(){
        $id = "";
        $code=I('post.vercode');
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    public function register(){
        $data['IDcard'] = I('post.user_idcard');
        $data['email'] = I('post.user_email');
        $data['password'] = md5(I('post.pwd'));
        $data['name'] = I('post.user_name');
        $data['token']=md5($data['email'].$data['name']);
        $User = M("User"); // 实例化User对象
            // 根据表单提交的POST数据创建数据对象

        $result = $User->field('IDcard,email,,password,name,token')->data($data)->add(); // 写入数据到数据库
        //var_dump($result);
        if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                   session("userName",$data['name']);
                   session("loginName",$data['email']);
                   session("userID",$result);
                   session("identify",0);
                   session("pingfen",12);
                   $url=__APP__;
                   $emailtext = "亲爱的".$data['name']."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/>
    <a href='$url/Home/User/emailactive?token=".$data['token']."' target=
'_blank'>http:$url/Home/User/emailactive?token=".$data['token']."</a><br/>
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";

                   sendMail($data['email'],"邮箱激活验证",$emailtext);
                   $this->redirect('Hospital/Index',null, 0);
        }
    }
    public function findpwd(){
        $username=I('post.user_account');
        $newpwd=rand(100000,999999);
        $data['password']=md5($newpwd);
        $User=M('User');
        $result = $User->where("email='$username' OR IDcard='$username'")->find();
        $email=$result['email'];
        $emailtext="你的密码已经初始化为: ".$newpwd.",请及时登录并修改密码！";
        $User->where("email='$username' OR IDcard='$username'")->save($data);
        sendMail($email,"密码找回结果",$emailtext);
        $this->success("密码找回成功，请查看注册邮箱的邮件");
    }
    public function changepwd(){
        $oldpwd=md5(I('post.oldpwd'));
        $newpwd=md5(I('post.newpwd'));
        $User=M('User');
        $username=session('loginName');
        $data['password']=$newpwd;
        $pwd=$User->where("email='$username' OR IDcard='$username'")->getField('password');
        if($oldpwd==$newpwd){
            $User->where("email='$username' OR IDcard='$username'")->save($data);
            $this->success("密码修改成功");
        }else{
            $this->error("密码不正确");
        }

    }
    public function emailactive(){
        $token=I('get.token');
        $data['isRenzheng']=1;
        $User=M('User');
        $User->where("token='$token'")->save($data);
    }
    public function  quxiaoyuxyue(){
        $yuyueID=I('get.yuyueID');
        $jinqichuzhen=M('Jinqichuzhen');
        $Yuyuedan=M('Yuyuedan');
        $data=$Yuyuedan->where("'id'=$yuyueID")->find();
        if($Yuyuedan->where("id=$yuyueID")->delete())
        {
            $jinqichuzhen->where("doctorID=$data[doctorID] AND dates='$data[yuyueDate]'")->setInc('shengyuNumber');
            echo "true";
        }else{
            echo "false";
        }

    }
}