<?php
namespace Home\Controller;

use Think\Controller;

class HospitalController extends Controller {
    public function index() {
	session('urlRefer',__ACTION__);
        //显示系统公告
        $gonggao=M('Gonggao');
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->order('dateTimes DESC')->limit(10)->select());

        //查询热门医院
        $hospital=M('Hospital');
        $this->assign('rehospital',$hospital->field('hospital_rehospital.yuyueCount,hospital_hospital.name,hospital_hospital.xiangxiAddress,hospital_hospital.phone,hospital_hospital.imgURL,hospital_hospital.id')->join('__REHOSPITAL__ ON __HOSPITAL__.id=__REHOSPITAL__.hospitalID','RIGHT')->order('hospital_rehospital.yuyueCount DESC')->select());

        //查询热门科室
        $keshi=M('Keshi');
        $this->assign('rekeshi',$keshi->field('hospital_hospital.name AS hospitalname,hospital_hospital.xiangxiAddress,hospital_keshi.id,hospital_keshi.name,hospital_keshi.phone,hospital_hospital.imgURL,hospital_rekeshi.yuyueCount')->join('__REKESHI__ ON __KESHI__.id=__REKESHI__.keshiID','RIGHT')->join('__HOSPITAL__ ON __KESHI__.hospitalID=__HOSPITAL__.id')->order('hospital_rekeshi.yuyueCount')->select());

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