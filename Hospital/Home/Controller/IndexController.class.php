<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class IndexController extends Controller {
    public function index(){
        session('urlRefer',__ACTION__);
        $this->redirect('./Home/Hospital');
    }

}