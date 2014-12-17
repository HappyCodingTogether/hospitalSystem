<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class IndexController extends Controller {
    public function index(){
        $this->display('Hospital:index');
    }

}