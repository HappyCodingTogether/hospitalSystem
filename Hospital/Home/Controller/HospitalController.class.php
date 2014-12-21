<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class HospitalController extends Controller {


    public function index() {
	session('urlRefer',__ACTION__);
        //显示系统公告
        $gonggao=M('Gonggao');
        $map['hospitalID']=0;
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->where($map)->order('dateTimes DESC')->limit(10)->select());

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

        $leixing=array('不限','卫生部直属医院','北京市卫生局直属医院','中国医科院所属医院','中国中医科学院','北京中医药大学','北京大学附属医院','驻京部队医院','驻京武警医院','部属厂矿高校医院','北京区县属医院','其它');
        $diqu=array('不限','海淀区','朝阳区','西城区','东城区','丰台区','石景山区','通州区','顺义区','房山区','大兴区','昌平区','怀柔区','平谷区','门头沟区','密云县','延庆县');
        $type=I('get.t','0-0-0');
        list($t1,$t2,$t3)=split('-',$type);
        $this->assign('t1',$t1);
        $this->assign('t2',$t2);
        $this->assign('t3',$t3);
        $hospital=M('Hospital');
        $map=array();
        if($t1>0&&$t1<11){
            $map['fenlei']=$leixing[$t1];
        }
        if($t1==11){
            $map['fenlei']=array('not between',array('卫生部直属医院','北京市卫生局直属医院','中国医科院所属医院','中国中医科学院','北京中医药大学','北京大学附属医院','驻京部队医院','驻京武警医院','部属厂矿高校医院','北京区县属医院'));
        }
        if($t2>0&&$t2<4){
            $map['dengji']=4-$t2;
        }
        if($t3>0&&$t3<17){
            $map1['name']=$diqu[$t3];
            $qu=M('Qu');
            $data=$qu->field('id')->where($map1)->find();
            $map['quID']=$data['id'];
        }
        $count=$hospital->field('hospital_hospital.id,hospital_hospital.name,hospital_hospital.xiangxiAddress,hospital_hospital.imgURL,hospital_hospital.phone,hospital_Qu.name AS quName')
            ->where($map)->join('__QU__ ON __HOSPITAL__.quID=__QU__.id','LEFT')->count();
        $page=new Page($count,10);
        $page->setConfig('first' , ' 首页' );
        $page->setConfig('prev' , ' 上一页' );
        $page->setConfig('next' , ' 下一页' );
        $page->setConfig('last' , ' 末页' );
        $page->setConfig('theme' , ' 共%TOTAL_ROW%条记录   共%TOTAL_PAGE%页  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
        $show=$page->show();
        $list=$hospital->field('hospital_hospital.id,hospital_hospital.name,hospital_hospital.xiangxiAddress,hospital_hospital.imgURL,hospital_hospital.phone,hospital_Qu.name AS quName')
            ->where($map)->join('__QU__ ON __HOSPITAL__.quID=__QU__.id','LEFT')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);

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
    //进入医院页面
    public function hospitalm(){
        session('urlRefer',__ACTION__);

        //显示医院基本信息
        $hospital=M('Hospital');
        $map['hospital_hospital.id']=$_GET['hospitalID'];
        $this->assign('hospital',$hospital->field('hospital_hospital.name,hospital_hospital.phone,hospital_hospital.xiangxiAddress,hospital_hospital.dengji,hospital_hospital.fenlei,hospital_qu.name AS quName')
            ->where($map)->join('__QU__ ON __HOSPITAL__.quID=__QU__.id','LEFT')->select());


        //显示医院公告
        $gonggao=M('Gonggao');
        $map=array();
        $map['hospitalID']=$_GET['hospitalID'];
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->where($map)->order('datetimes DESC')->limit(10)->select());

        //显示科室列表
        $keshi=M('Keshi');
        $map=array();
        $map['hospitalID']=$_GET['hospitalID'];
        $data=$keshi->field('id,name,fenlei')->where($map)->select();
        $keshim=array();
        $keshim[0]['name']=$data[0]['fenlei'];
        $keshim[0]['num']=0;
        $i=$temp=0;
        $count=count($data);
        while($temp<$count){
            $countf=count($keshim);
            $a=0;
            $check=0;
            while($a<$countf){
                if($keshim[$a]['name']==$data[$temp]['fenlei']){
                    $keshim[$a]['keshi'][$keshim[$a]['num']]=$data[$temp];
                    $keshim[$a]['num']++;
                    $check=1;
                    break;
                }
                $a++;
            }
            if($check==0){
                $i++;
                $keshim[$i]['name']=$data[$temp]['fenlei'];
                $keshim[$i]['keshi'][0]=$data[$temp];
                $keshim[$i]['num']=1;
            }
            $temp++;
        }
        $this->assign('keshim',$keshim);

        $this->display();

    }
}