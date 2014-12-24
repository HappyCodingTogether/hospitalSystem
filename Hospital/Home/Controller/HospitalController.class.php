<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class HospitalController extends Controller {


    public function index() {
	session('urlRefer',__SELF__);
        //检查是否更新热门科室和医院
        $this->updateRemenTable();
        //显示系统公告
        $gonggao=M('Gonggao');
        $map['hospitalID']=0;
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->where($map)->order('dateTimes DESC')->limit(10)->select());

        //查询热门医院
        $hospital=M('Hospital');
        $this->assign('rehospital',$hospital->field('hospital_rehospital.yuyueCount,hospital_hospital.name,hospital_hospital.xiangxiAddress,hospital_hospital.phone,hospital_hospital.imgURL,hospital_hospital.id')->join('__REHOSPITAL__ ON __HOSPITAL__.id=__REHOSPITAL__.hospitalID','RIGHT')->order('hospital_rehospital.yuyueCount DESC')->select());

        //查询热门科室
        $keshi=M('Keshi');
        $this->assign('rekeshi',$keshi->field('hospital_hospital.name AS hospitalname,hospital_hospital.xiangxiAddress,hospital_keshi.id,hospital_keshi.name,hospital_keshi.phone,hospital_hospital.imgURL,hospital_rekeshi.yuyueCount')->join('__REKESHI__ ON __KESHI__.id=__REKESHI__.keshiID','RIGHT')->join('__HOSPITAL__ ON __KESHI__.hospitalID=__HOSPITAL__.id')->order('hospital_rekeshi.yuyueCount DESC')->select());

        $this->display();
    }
    //显示所有医院列表
    public function hospitals() {
	session('urlRefer',__SELF__);

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
    //注销
    public function register() {
        session('urlRefer',__SELF__);
        $this->display();
    }
    //显示全部公告列表
    public function gonggao() {
	session('urlRefer',__SELF__);
        $gonggao=M('Gonggao');
        $this->assign('gonggao',$gonggao->field('id,title,dateTimes')->order('dateTimes DESC')->select());
        $this->display();
    }
    //显示公告详细内容
    public function gonggaoc() {
		session('urlRefer',__SELF__);
        $gonggaoid=$_GET['gonggaoid'];
        $gonggao=M('Gonggao');
        $map['id']=$gonggaoid;
        $this->assign('gonggao',$gonggao->field('title,contents,dateTimes')->where($map)->select());
        $this->display();
    }
    //进入医院页面
    public function hospitalm(){
        session('urlRefer',__SELF__);

        //显示医院基本信息
        $hospital=M('Hospital');
        $map['hospital_hospital.id']=$_GET['hospitalID'];
        $this->assign('hospital',$hospital->field('hospital_hospital.imgURL,hospital_hospital.name,hospital_hospital.phone,hospital_hospital.xiangxiAddress,hospital_hospital.dengji,hospital_hospital.fenlei,hospital_qu.name AS quName')
            ->where($map)->join('__QU__ ON __HOSPITAL__.quID=__QU__.id','LEFT')->select());


        //显示医院预约须知
        $gonggao1=M('Gonggao');
        $map=null;
        $map['hospitalID']=$_GET['hospitalID'];
        $map['title']='预约须知';
        $this->assign('yuyuexuzhi',$gonggao1->field('id,title,contents')->where($map)->find());
        //显示医院重要须知
        $gonggao2=M('Gonggao');
        $map=null;
        $map['hospitalID']=$_GET['hospitalID'];
        $map['title']='重要须知';
        $this->assign('zhongyaoxuzhi',$gonggao2->field('id,title,contents')->where($map)->find());
        //显示医院公告
        $gonggao3=M('Gonggao');
        $map=array();
        $map['hospitalID']=$_GET['hospitalID'];
        $this->assign('gonggao',$gonggao3->field('id,title,dateTimes')->where($map)->order('datetimes DESC')->limit(10)->select());

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
    //显示搜索结果页面
    public function sousuo(){
        session('urlRefer',__SELF__);

        $type=$_GET['type'];
        $neirong=$_GET['neirong'];

        if($type=='医院'){
            $this->assign('type',1);
            $hospital=M('Hospital');
            $map['hospital_hospital.name']=array('like','%'.$neirong.'%');
            $count=$hospital->field('id')->where($map)->count();
            $page=new Page($count,10);
            $page->setConfig('first' , ' 首页' );
            $page->setConfig('prev' , ' 上一页' );
            $page->setConfig('next' , ' 下一页' );
            $page->setConfig('last' , ' 末页' );
            $page->setConfig('theme' , ' 共%TOTAL_ROW%条记录   共%TOTAL_PAGE%页  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
            $show=$page->show();
            $list=$hospital->field('hospital_hospital.id,hospital_hospital.name,hospital_hospital.phone,hospital_hospital.xiangxiAddress,hospital_hospital.imgURL,hospital_qu.name AS quName')
                ->where($map)->join('__QU__ ON __HOSPITAL__.quID=__QU__.id','LEFT')->limit($page->firstRow.','.$page->listRows)->select();
            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($type=='科室'){
            $this->assign('type',2);
            $keshi=M('Keshi');
            $map['hospital_keshi.name']=array('like','%'.$neirong.'%');
            $count=$keshi->field('id')->where($map)->count();
            $page=new Page($count,10);
            $page->setConfig('first' , ' 首页' );
            $page->setConfig('prev' , ' 上一页' );
            $page->setConfig('next' , ' 下一页' );
            $page->setConfig('last' , ' 末页' );
            $page->setConfig('theme' , ' 共%TOTAL_ROW%条记录   共%TOTAL_PAGE%页  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
            $show=$page->show();
            $list=$keshi->field('hospital_keshi.id,hospital_keshi.name,hospital_keshi.phone,hospital_hospital.xiangxiAddress,hospital_hospital.imgURL,hospital_hospital.name AS hospitalName')
                ->where($map)->join('__HOSPITAL__ ON __KESHI__.hospitalID=__HOSPITAL__.id','LEFT')->limit($page->firstRow.','.$page->listRows)
                ->select();
            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        $this->display();
    }
    //进入所有科室列表
    public function keshi() {
        session('urlRefer',__SELF__);
        //echo $this->unicode_encode('内科');

        $k=I('get.k','0-0-u5185u79D1');
        list($i1,$i2,$i3)=split('-',$k);
        $leixing=str_replace('u','\u',$i3);
        $keshi=M('Keshi');
        $fenlei=$this->unicode_decode($leixing);
        $map['hospital_keshi.fenlei']=$fenlei;
        $count=$keshi->field('id')->where($map)->count();
        $page=new Page($count,10);
        $page->setConfig('first' , ' 首页' );
        $page->setConfig('prev' , ' 上一页' );
        $page->setConfig('next' , ' 下一页' );
        $page->setConfig('last' , ' 末页' );
        $page->setConfig('theme' , ' 共%TOTAL_ROW%条记录   共%TOTAL_PAGE%页  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
        $show=$page->show();
        $list=$keshi->field('hospital_keshi.id,hospital_keshi.name,hospital_keshi.phone,hospital_hospital.name AS hospitalName,hospital_hospital.xiangxiAddress,hospital_hospital.imgURL')
            ->where($map)->join('__HOSPITAL__ ON __KESHI__.hospitalID=__HOSPITAL__.id','LEFT')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('i1',$i1);
        $this->assign('i2',$i2);


        $this->display();
    }
    //进入科室界面
    public function keshim(){
        $keshiID=$_GET['keshiID'];
        $keshi=M('Keshi');
        $map['hospital_keshi.id']=$keshiID;
        $data=$keshi->field('hospital_keshi.name,hospital_keshi.weekdays,hospital_hospital.name AS hospitalName,hospital_keshi.hospitalID')
            ->where($map)->join('__HOSPITAL__ ON __KESHI__.hospitalID=__HOSPITAL__.id','LEFT')->find();
        $hospitalID=$data['hospitalID'];
        $gonggao=M('Gonggao');
        $map=null;
        $map['hospitalID']=$hospitalID;
        $map['title']='重要须知';
        $xuzhi=$gonggao->field('id,contents')->where($map)->find();
        $this->assign('keshiID',$keshiID);
        $this->assign('data',$data);
        $this->assign('xuzhi',$xuzhi);
        $this->display();
    }
    //个人中心的首页
    public function personCenter() {
        session('urlRefer',__SELF__);
        $userID=session('userID');
        if($userID==null){
            $this->error('您尚未登录');
        }else{
            $user=M('User');
            $map['id']=$userID;
            $data=$user->field('name,IDcard,phone,email,isRenzheng')->where($map)->find();
            $this->assign('user',$data);
            $this->display();
        }
    }
    //显示用户当前的预约
    public function nowOrder(){
        $userID=session('userID');
        $yuyuedan=M('Yuyuedan');
        $map['userID']=$userID;
        $map['isChuli']=0;
        $data=$yuyuedan->field('id,yuyueDate,dateTimes,hospitalName,keshiName,doctorName')
            ->where($map)->select();
        $this->assign('dangqian',$data);
        $this->display();
    }
    //显示用户历史预约
    public function prevOrder(){
        $userID=session('userID');
        $yuyuedan=M('Yuyuedan');
        $map['userID']=$userID;
        $map['isChuli']=array('in','1,2');
        $count=$yuyuedan->field('id')->where($map)->count();
        $page=new Page($count,10);
        $page->setConfig('first' , ' 首页' );
        $page->setConfig('prev' , ' 上一页' );
        $page->setConfig('next' , ' 下一页' );
        $page->setConfig('last' , ' 末页' );
        $page->setConfig('theme' , ' 共%TOTAL_ROW%条记录   共%TOTAL_PAGE%页  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );
        $show=$page->show();
        $list=$yuyuedan->field('id,yuyueDate,dateTimes,hospitalName,keshiName,doctorName,isChuli')
            ->where($map)->order('dateTimes DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('lishiyuyue',$list);
        $this->assign('page',$show);
        $this->display();
    }
    //上传用户的图片
    public function uploadpho(){
        session('urlRefer',__SELF__);

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10485760 ;// 设置附件上传大小
        $upload->saveName = 'time';
        $upload->autoSub=false;
        $upload->exts      = array('img','jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath='./Public/images/Renzheng/';// 设置附件上传根目录
        // 上传单个文件
        $info   =   $upload->uploadOne($_FILES['photo']);
        if(!$info){
            $this->error($upload->getError());
        }else{

            $img=$info['savename'];
            $userID=session('userID');
            $user=M('User');
            $map['id']=$userID;
            $data['imgURL']=$img;
            $data['isRenzheng']=2;
            $user->where($map)->save($data);
            echo '文件上传成功';
            $this->redirect('personCenter');
        }
    }
    //用户认证界面
    public function identifyCenter(){
        $userID=session('userID');
        $user=M('User');
        $map['id']=$userID;
        $data=$user->field('isRenzheng')->where($map)->find();
        $this->assign('renzheng',$data);
        $this->display();
    }


    private function unicode_encode($name){
        $name = iconv('UTF-8', 'UCS-2', $name);
        $len = strlen($name);
        $str = '';
        for ($i = 0; $i < $len - 1; $i = $i + 2)
        {
            $c = $name[$i];
            $c2 = $name[$i + 1];
            if (ord($c) > 0)
            {    // 两个字节的文字
                $str .= '\u'.base_convert(ord($c), 10, 16).base_convert(ord($c2), 10, 16);
            }
            else
            {
                $str .= $c2;
            }
        }
        return $str;
    }
    private function unicode_decode($name)
    {
        // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
        $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
        preg_match_all($pattern, $name, $matches);
        if (!empty($matches))
        {
            $name = '';
            for ($j = 0; $j < count($matches[0]); $j++)
            {
                $str = $matches[0][$j];
                if (strpos($str, '\\u') === 0)
                {
                    $code = base_convert(substr($str, 2, 2), 16, 10);
                    $code2 = base_convert(substr($str, 4), 16, 10);
                    $c = chr($code).chr($code2);
                    $c = iconv('UCS-2', 'UTF-8', $c);
                    $name .= $c;
                }
                else
                {
                    $name .= $str;
                }
            }
        }
        return $name;
    }
    public function updateRemenTable(){
        $datenow=date("Y-m-d");
        $rehospital=M('Rehospital');
        $rekeshi=M('Rekeshi');
        $maxdate1=$rehospital->where('1')->max('dates');
        $maxdate2=$rekeshi->where('1')->max('dates');
        $d1=strtotime($datenow);
        $d2=strtotime($maxdate1);
        $d3=strtotime($maxdate2);
        $Days1=round(($d1-$d2)/3600/24);
        $Days2=round(($d1-$d3)/3600/24);
        if($Days1>7){
            $yuyuedan=M('Yuyuedan');
            $map=null;
            $map['yuyueDate']=array('egt',$datenow-7);
            $remen=$yuyuedan->field('hospitalID,count(hospitalID) AS counts')->group('hospitalID')
                ->where($map)->order('counts DESC')->limit(6)->select();
            for($i=0;$i<6;$i++){
                $map=null;
                $map['id']=$i+1;
                $data['hospitalID']=$remen[$i]['hospitalID'];
                $data['yuyueCount']=$remen[$i]['counts'];
                $data['dates']=$datenow;
                $rehospital->where($map)->save($data);
            }
        }
        if($Days2>7) {
            $yuyuedan=M('Yuyuedan');
            $map['yuyueDate']=array('egt',$datenow-7);
            $renmen=$yuyuedan->field('keshiID,count(keshiID) AS counts')->group('keshiID')
                ->where($map)->order('counts DESC')->limit(6)->select();
            for($i=0;$i<6;$i++){
                $keshi=M('keshi');
                $map=null;
                $map['id']=$renmen[$i]['keshiID'];
                $keshir=$keshi->field('hospitalID')->where($map)->find();
                $hospitalID=$keshir['hospitalID'];
                $map=null;
                $map['id']=$i+1;
                $data['keshiID']=$renmen[$i]['keshiID'];
                $data['hospitalID']=$hospitalID;
                $data['yuyueCount']=$renmen[$i]['counts'];
                $data['dates']=$datenow;
                $rekeshi->where($map)->save($data);
            }
        }

    }

}