<?php
namespace Home\Controller;

use Think\Controller;

class HospitalController extends Controller {
    public function index() {
        $gonggao=M('Gonggao');
        //var_dump($gonggao->field('id,title,dateTimes')->limit(10)->order('dateTimes DESC')->select());
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->order('dateTimes DESC')->limit(10)->select());
        $this->display();
    }
    public function personCenter() {
        $this->display();
    }
    public function hospitals() {
        $this->display();
    }
    public function keshi() {
        $this->display();
    }
    public function gonggao() {
        $gonggao=M('Gonggao');
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->order('dateTimes DESC')->select());
        $this->display();
    }
    public function gonggaoc() {
        $gonggaoid=$_GET['gonggaoid'];
        $gonggao=M('Gonggao');
        $map['id']=$gonggaoid;
        $this->assign('gonggao',$gonggao->field('title,contents,dateTimes')->where($map)->select());
        $this->display();
    }
}