<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class IndexController extends Controller {
    public function index(){
        $this->display('Hospital:index');
    }
    public  function  verify(){
        $Verify = new \Think\Verify();
        $Verify->length=4;
        $Verify->entry();
    }
}