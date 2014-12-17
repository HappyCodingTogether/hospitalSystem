<?php
namespace Home\Controller;

use Think\Controller;

class HospitalController extends Controller {
    public function index() {
	session('urlRefer',__ACTION__);
        $gonggao=M('Gonggao');
        //var_dump($gonggao->field('id,title,dateTimes')->limit(10)->order('dateTimes DESC')->select());
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->order('dateTimes DESC')->limit(10)->select());
        $this->display();
    }
    public function personCenter() {
	session('urlRefer',__ACTION__);
        $this->display();
    }
    public function hospitals() {
	session('urlRefer',__ACTION__);
        $this->display();
    }
    public function keshi() {
	session('urlRefer',__ACTION__);
        $this->display();
    }
    public function register() {
        session('urlRefer',__ACTION__);
        $this->display();
    }
    public function gonggao() {
	session('urlRefer',__ACTION__);
        $gonggao=M('Gonggao');
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->order('dateTimes DESC')->select());
        $this->display();
    }
    public function gonggaoc() {
		session('urlRefer',__ACTION__);
        $gonggaoid=$_GET['gonggaoid'];
        $gonggao=M('Gonggao');
        $map['id']=$gonggaoid;
        $this->assign('gonggao',$gonggao->field('title,contents,dateTimes')->where($map)->select());
        $this->display();
    }
}