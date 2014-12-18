<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends  Controller{
    public function index(){

    }
    public  function login(){
        $username=I('post.userName');
        $pwd=I('post.pwd');
        $User=M('User');
        $data = $User->where("email='$username' OR IDcard='$username'")->find();
        if($data!=null){
            if(md5($pwd)==$data['password']){
                session("userName",$data['name']);
                session("loginName",$username);
                redirect(session('urlRefer'));
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
        if(1){
            $User = M("User"); // 实例化User对象
            // 根据表单提交的POST数据创建数据对象

                $result = $User->field('IDcard,email,,password,name,token')->data($data)->add(); // 写入数据到数据库
               if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                   session("userName",$data['name']);
                   $url=__APP__;
                   $emailtext = "亲爱的".$data['name']."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/>
    <a href='$url/Home/User/emailactive?token=".$data['token']."' target=
'_blank'>http:$url/Home/User/emailactive?token=".$data['token']."</a><br/>
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";

                   sendMail($data['email'],"邮箱激活验证",$emailtext);
                   $this->redirect('Hospital/Index',null, 0);
               }
        }
        else{
           $this->error();
        }

    }
    public function findpwd(){
        $username=I('post.username');
        $newpwd=rand(100000,999999);
        $data['password']=md5($newpwd);
        $User=M('User');
        $result = $User->where("email='$username' OR IDcard='$username'")->find();
        $email=$result['email'];
        $emailtext="你的密码已经初始化为: ".$newpwd.",请及时登录并修改密码！";
        $User->where("email='$username' OR IDcard='$username'")->save($data);
        sendMail($email,"密码找回结果",$emailtext);
    }
    public function changepwd(){
        $newpwd=I('post.newpwd');
        $username=session('loginName');
        $data['password']=$newpwd;
        $User=M('User');
        $User->where("email='$username' OR IDcard='$username'")->save($data);
    }
    public function emailactive(){
        $token=I('get.token');
        $data['isRenzheng']=1;
        $User=M('User');
        $User->where("token='$token'")->save($data);
    }
}