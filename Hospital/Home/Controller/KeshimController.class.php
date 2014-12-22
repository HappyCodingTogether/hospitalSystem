<?php
namespace Home\Controller;
use Org\Util\String;
use Think\Controller;

class KeshimController extends  Controller{
    public  function index(){
        $jinqiChuzhen=M('Jinqichuzhen');
        $KeshiID=I('post.keshiID');
        $mindate=$jinqiChuzhen->where("keshiID=$KeshiID")->min('dates');
        //var_dump($mindate);
        if($mindate<date("Y-m-d")){
            $this->updateChuZhenTable();
        }
        //var_dump(json_encode($this->getNummber()));
        echo json_encode($this->getNummber());
    }
    public function updateChuZhenTable(){
        $time=time();
        $KeshiID=I('post.keshiID');
        $Doctor=M('Doctor');
        $doctors=$Doctor->where("keshiID=$KeshiID")->select();
        $jinqiChuzhen=M('Jinqichuzhen');
        $jinqiChuzhen->where("keshiID=$KeshiID")->delete();
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
        $yuyueDay=I('post.yuyueDay');
        $result=array();
        $datetime=getdate();
        $time=mktime(0,0,0,$month,1,$year);
        //$datenow=date($year."-".$month."-".$datetime['mday']);
        $mdays=date('t',$time);
        //$dateendmonth=date("Y-m-".$mdays,$time);
        $jinqiChuzhen=M('Jinqichuzhen');
        if($month==$datetime['mon']){
            //$data=$jinqiChuzhen->where("keshiID=$KeshiID AND dates BETWEEN '$datenow' AND '$dateendmonth'")->group('keshiID')->sum('shengyuNumber');
            for($i=1;$i<=31;$i++){
                if($i<=$datetime['mday']){
                    $result[$i]=null;
                }else{

                    $date=date($year."-".$month."-".$i);
                    $week=date('w',strtotime($date));

                    $num=$jinqiChuzhen->where("keshiID=$KeshiID AND dates='$date'")->sum('shengyuNumber');
                    if(strstr($yuyueDay,$week)==false){
                        $result[$i]=null;
                    }else{
                        if($num!=null){
                            if($num>=1){
                                $result[$i]=1;
                            }else{
                                $result[$i]=2;
                            }
                        }
                        else {
                            $result[$i]=null;
                        }
                    }
                }

            }
        }
        elseif($month==($datetime['mon']+1)%12){
            for($i=1;$i<=31;$i++){
                $date=date($year."-".$month."-".$i);
                $week=date('w',strtotime($date));
                $num=$jinqiChuzhen->where("keshiID=$KeshiID AND dates='$date'")->sum('shengyuNumber');
                if(strstr($yuyueDay,$week)==false){
                    $result[$i]=null;
                }else{
                    if($num!=null){
                        if($num>=1){
                            $result[$i]=1;
                        }else{
                            $result[$i]=2;
                        }
                    }
                    else {
                        $result[$i]=null;
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
            $result[$i]=array("doctorName"=>"$doctorName","doctorID"=>"$doctorID","expense"=>"$data[guahaoMoney]","keguaHao"=>"$data[yuyueNum]","shengyuHao"=>"$shengyuHao");
        }

       echo json_encode($result);
    }
    public function  confirmOrder(){
        $data['doctorID']=I('post.doctorID');
        $data['userID']=session("userID");
        $data['yuyueDate']=I('post.date');//date($year."-".$month."-".$day);
        $data['dateTimes']=date("Y-m-d");
        $data['hospitalName']="北京医院";//I('post.hospitalName');
        $data['keshiName']="内科";//I('post.keshiName');
        $data['doctorName']="王鹏程";//I('post.keshiName');
        $User=M('User');
        $result=$User->where("id=$data[userID]")->find();
        $data['yuyueName']=$result['name'];
        $data['phone']=$result['phone'];
        $jinqichuzhen=M('Jinqichuzhen');
        $shengyuNum=$jinqichuzhen->where("doctorID=$data[doctorID] AND dates='$data[yuyueDate]'")->getField('shengyuNumber');
        if($shengyuNum>=1){
            $jinqichuzhen->where("doctorID=$data[doctorID] AND dates='$data[yuyueDate]'")->setDec('shengyuNumber');
            $YuYueDan=M('Yuyuedan');
            $res=$YuYueDan->field(`doctorID`,`userID`,`yuyueDate`,`dateTimes`,`hospitalName`,`keshiName`,'doctorName',`yuyueName`,`phone`)->data($data)->add();
            //var_dump($res);
            if($res){
               echo "true";
            }else{
                $jinqichuzhen->where("doctorID=$data[doctorID] AND dates='$data[yuyueDate]'")->setInc('shengyuNumber');
                echo "false";
            }
        }else{
            echo "null";
        }
    }

}