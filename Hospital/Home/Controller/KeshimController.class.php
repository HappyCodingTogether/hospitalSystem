<?php
namespace Home\Controller;
use Org\Util\String;
use Think\Controller;

class KeshimController extends  Controller{
    public  function index(){
        $jinqiChuzhen=M('Jinqichuzhen');
        $mindate=$jinqiChuzhen->min('dates');
        if($mindate<date("Y-m-d h:i:s")){
            $this->updateChuZhenTable();
        }
        $this->getNummber();
       /* $datetime=getdate();
        $time=time();
        echo $datetime['wday']." ";
        $datetime2=date("Y-m-d",strtotime("+1 day",$time));
        echo $datetime2;
        $str="1234";
        $str2=$datetime2['wday']."";
        if(strstr($str,$str2)!=false){
            echo "ok";
        }
        $jinqichuzhen=M('Jinqichuzhen');
        $data=$jinqichuzhen->where("chuzhenID=1")->order("dateTimes")->limit(30)->group("dateTimes")->select();
        echo $data;*/

    }
    public function updateChuZhenTable(){
        $time=time();
        $KeshiID=I('post.keshiID');
        $Keshi=M('Doctor');
        $doctor=$Keshi->where("keshiID=$KeshiID")->select();
        $jinqiChuzhen=M('Jinqichuzhen');
        $jinqiChuzhen->where('1')->delete();
       foreach($doctor as $value){
            for($i=1;$i<=30;$i++){
                $data['dates']= $datetime2=date("Y-m-d",strtotime("+$i day",$time));
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
        $datenow=date($year."-".$month."-".$datetime['mday']);
        $mdays=date('t',$time);
        $dateendmonth=date("Y-m-".$mdays,$time);
        $jinqiChuzhen=M('Jinqichuzhen');
        if($month==$datetime['mon']){
            //$data=$jinqiChuzhen->where("keshiID=$KeshiID AND dates BETWEEN '$datenow' AND '$dateendmonth'")->group('keshiID')->sum('shengyuNumber');
            for($i=1;$i<=31;$i++){
                if($i<=$datetime['mday']){
                    $result[$i]=null;
                }else{
                    $date=date($year."-".$month."-".$i);
                    $result[$i]=$jinqiChuzhen->where("keshiID=$KeshiID AND dates='$date'")->sum('shengyuNumber');
                }
            }
        }
        elseif($month==($datetime['mon']+1)%12){
            for($i=1;$i<=31;$i++){
                    $date=date($year."-".$month."-".$i);
                    $result[$i]=$jinqiChuzhen->where("keshiID=$KeshiID AND dates='$date'")->sum('shengyuNumber');
            }
        }
        return $result;

    }

}