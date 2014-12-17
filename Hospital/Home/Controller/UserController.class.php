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
                $this-error("密码错误！");
            }

        }else{
            $this-error("账号不存在！");
        }

    }
    public function logout(){
        $urlRefer=session('urlRefer');
        session(null);
        session('[destroy]'); // 销毁session
        redirect($urlRefer);
    }
    public  function  checkemail($email){
        $User=M('User');
        $data = $User->where("email='$email'")->find();
        if($data!=null){
            return 1;
        }
        else return 0;
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
    function check_verify($code, $id = ""){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    public function register(){
        $this->success();

    }

}