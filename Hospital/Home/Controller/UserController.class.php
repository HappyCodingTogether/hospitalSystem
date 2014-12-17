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
        $Verify->entry();
    }
    /**
     * 验证码检查
     */
    public function check_verify(){
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

        if($this->checkemail()&&$this->checkIDcard()&&$this->check_verify()){
            $User = M("User"); // 实例化User对象
            // 根据表单提交的POST数据创建数据对象
                $result = $User->field('IDcard,email,,password,name')->data($data)->add(); // 写入数据到数据库
               if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                   session("userName",$data['name']);
                   //sendMail("kingpengcheng@163.com","test","test");
                   $this->redirect('Hospital/Index',null, 0);
               }
        }
        else{
           $this->error();
        }

    }

}