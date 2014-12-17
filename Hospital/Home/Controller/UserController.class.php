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
        $data = $User->where("email='$username'")->find();
        if($data!=null){
            if($pwd==$data['password']){
                session("userName",$username);
                redirect(session('urlRefer'));
            }
        }else{
            redirect(session('urlRefer'));
        }

    }
    public function logout(){
        $urlRefer=session('urlRefer');
        session(null);
        session('[destroy]'); // 销毁session
        redirect($urlRefer);
    }
    public  function  checkUserName($username){
        $User=M('User');
        $data = $User->where("email='$username'")->find();
        if($data!=null){
            return 1;
        }
        else return 0;
    }
    public function register(){


    }

}