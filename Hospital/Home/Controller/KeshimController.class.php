<?php
namespace Home\Controller;
use Org\Util\String;
use Think\Controller;

class KeshimController extends  Controller{
    public  function index(){
        $jinqiChuzhen=M('Jinqichuzhen');
        $mindate=$jinqiChuzhen->min('dates');
        if($mindate<date("Y-m-d")){
            $this->updateChuZhenTable();
        }
        echo $this->getNummber();
    }
    public function updateChuZhenTable(){
        $time=time();
        $KeshiID=I('post.keshiID');
        $Doctor=M('Doctor');
        $doctors=$Doctor->where("keshiID=$KeshiID")->select();
        $jinqiChuzhen=M('Jinqichuzhen');
        $jinqiChuzhen->where('1')->delete();
       foreach($doctors as $value){
            for($i=1;$i<=30;$i++){
                $data['dates']=date("Y-m-d",strtotime("+$i day",$time));
                $data['keshiID']=$KeshiID;
                $data['doctorID']=$value['id'];
                $data['shengyuNumber']=$value['yuyueNum'];

                $jinqiChuzhen->field('dates,keshiID,doctorID,shengyuNumber')->data($data)->add();
            }
       }

    }
    public function getNummber(){
        $KeshiID=I('post.keshiID');
        $year=I('post.year');
        $month=I('post.month');
        $yuyueDay=I('post.day');
        $result=array();

        $datetime=getdate();
        $time=mktime(0,0,0,$month,1,$year);
        //$datenow=date($year."-".$month."-".$datetime['mday']);
        $mdays=date('t',$time);
        //$dateendmonth=date("Y-m-".$mdays,$time);
        $jinqiChuzhen=M('Jinqichuzhen');
        if($month==$datetime['mon']){
            //$data=$jinqiChuzhen->where("keshiID=$KeshiID AND dates BETWEEN '$datenow' AND '$dateendmonth'")->group('keshiID')->sum('shengyuNumber');
            for($i=0;$i<31;$i++){
                if($i<$datetime['mday']){
                    $result[$i]=null;
                }else{

                    $date=date($year."-".$month."-".$i);
                    $week=date('w',strtotime($date));

                    $num=$jinqiChuzhen->where("keshiID=$KeshiID AND dates='$date'")->sum('shengyuNumber');
                    if(strstr($yuyueDay,$week)!=false){
                        $result[$i]=0;
                    }else{
                        if($num==0){
                            $result[$i]=2;
                        }

                        elseif($num>=1){
                            $result[$i]=1;
                        }else {
                            $result=null;
                        }
                    }

                }

            }
        }
        elseif($month==($datetime['mon']+1)%12){
            for($i=0;$i<31;$i++){
                $date=date($year."-".$month."-".$i);
                $week=date('w',strtotime($date));
                $num=$jinqiChuzhen->where("keshiID=$KeshiID AND dates='$date'")->sum('shengyuNumber');
                if(strstr($yuyueDay,$week)!=false){
                    $result[$i]=0;
                }else{
                    if($num==0){
                        $result[$i]=2;
                    }

                    elseif($num>=1){
                        $result[$i]=1;
                    }else {
                        $result=null;
                    }
                }
            }
        }

        return $result;

    }
    public  function  getDoctorList(){
        $KeshiID=I('post.keshiID');
        $year=I('post.year');
        $month=I('post.month');
        $day=I('post.day');
        $date=date($year."-".$month."-".$day);
        $jinqiChuzhen=M('Jinqichuzhen');
        $doctors=$jinqiChuzhen->where("keshiID=$KeshiID AND dates='$date'")->select();
        $result=array();
        for($i=0;$i<count($doctors);$i++){
            $doctor=M('Doctor');
            $doctorID=$doctors[$i]['doctorID'];
            $shengyuHao=$doctors[$i]['shengyuNumber'];
            $data=$doctor->where("id=$doctorID")->find();
            $doctorName=$data['name'];
            $doc=array("doctorName"=>"$doctorName","expense"=>"$data[guahaoMoney]","keguaHao"=>"$data[yuyueNum]","shengyuHao"=>"$shengyuHao");
            $result[$i]=$doc;
        }
       echo $result;
    }

}