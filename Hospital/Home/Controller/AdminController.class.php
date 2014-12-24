<?php
namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller{
    public function index()
    {
        $this->redirect('Hospital/Index', null, 0);
    }
    public function bianjikeshi(){
        if(session('identify')>0){
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function bianjiyisheng(){
        if(session('identify')>0){
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function bianjiyiyuan(){
        if(session('identify')>0){
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function lishiyuyue(){
        if(session('identify')>0){
            $Yuyuedan=M('Yuyuedan');
            $hospitalID=session('identify');
            $data=$Yuyuedan->where("hospitalID=$hospitalID AND isChuli <>0")->select();
            $this->assign('data',$data);
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function renzheng(){
        //var_dump("aa");
        if(session('identify')==-1){
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function shanchuyiyuan(){
        if(session('identify')==-1){
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function tianjiayiyuan(){
        if(session('identify')==-1){
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function xiegonggao(){
        if(session('identify')==-1){
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }
    }
    public function yuyuechuli(){
        if(session('identify')>0){
            $Yuyuedan=M('Yuyuedan');
            $zhi=0;
            $hospitalID=session('identify');
            $data=$Yuyuedan->where("isChuli='$zhi' AND hospitalID=$hospitalID")->select();
            $this->assign('data',$data);
            $this->display();
        }else{
            $this->redirect('Hospital/Index', null, 0);
        }

    }

    public function CreateAnnouncement(){
        $data['dateTimes']=date('Y-m-d H:i:s',time());
        $data['title']=I('post.gonggao_title');
        $data['contents']=I('post.gonggao_contents');
        $data['hospitalID']=I('post.user_Identify');
        $Gonggao=M('Gonggao');
        $result=$Gonggao->field('dateTimes,title,contents,hospitalID')->data($data)->add();
        if($result) {
            $this->success();
        }else{
            $this->error();
        }
    }
    public  function  DeleteHospital(){
        $id=I('post.id');
        $Hospital=M('Hospital');
        $result=$Hospital->where("id='$id'")->delete();

        if($result)$this->success();
        else $this->error();
    }
    public function HospitalInfo(){
         $Hospital=M('Hospital');
        $result=$Hospital->select();
        for($i=0;$i<count($result);$i++){
            $id=$result[$i]['id'];
            $User=M('User');
            $result1=$User->where("identify='$id'")->find();

            $array[$i]=array("id"=>$result[$i]['id'],"name"=>$result[$i]['name'],"IDcard"=>$result1['IDcard']);
        }
        echo json_encode($array);
    }
    public function EditHospitalInfo(){
        $id=I("post.hospital_id");
        $data['dengji']=I("post.hospital_dengji");
        $data['name']=I("post.hospital_name");
        $data['imgURL']=I('post.hospital_imgURL');
        $data['provinceID']=I('post.hospital_provinceID');
        $data['cityID']=I('post.hospital_cityID');
        $data['quID']=I('post.hospital_quID');
        $data['phone']=I('post.hospital_phone');
        $data['email']=I('post.hospital_email');
        $data['introduce']=I('post.hospital_introduce');
        $data['xiangxiAddress']=I('post.hospital_xiangxiAddress');
        $Hospital=M('Hospital');
        $Hospital->where("id='$id'")->save($data);
    }
    public function DeleteUser(){
        $id=I('post.id');
        $User=M('User');
        $result=$User->where("id='$id'")->delete();
        if($result)$this->success();
        else $this->error();
    }
    public function UserInfo(){

        $User=M('User');
        $result=$User->select();
       for($i=0;$i<count($result);$i++){
           $array[$i]=array("id"=>$result[$i]['id'],"IDcard"=>$result[$i]['IDcard'],"name"=>$result[$i]['name'],"email"=>$result[$i]['email'],"pingfen"=>$result[$i]['pingfen']);
       }
        echo json_encode($array);
    }
    public function EditUserInfo(){
        $id=I('post.user_id');
        $data['xinyongjifen']=I('post.user_xinyongjifen');
        $User=M('User');
        $User->where("id='$id'")->save($data);
    }
    public function CreateHospital(){
        $hospitalname=I('post.hospital_name');
        $hos['name']=$hospitalname;
        $Hospital=M('Hospital');
        $Hospital->field('name')->data($hos)->add();
        if($Hospital){
            $result1=$Hospital->where("name='$hospitalname'")->find();
            $data['identify']=$result1['id'];
            $data['name']=$hospitalname;
            $data['IDcard']=I('post.user_IDcard');
            $pwd1=I('post.user_pwd');
            $data['password']=md5($pwd1);
            $User=M('User');
            $User->field('IDcard,password,name,identify')->data($data)->add();
            if($User)
            {
                echo "true";
            }
            else $this->error();
        }else{
            $this->error();
        }
    }
    public function ShowXuyaoYanzheng(){
        $User=M('User');
        $is=2;
        $result=$User->where("isRenzheng='$is'")->select();
        for($i=0;$i<count($result);$i++){
            $array[$i]=array("id"=>$result[$i]['id'],"name"=>$result[$i]['name'],"IDcard"=>$result[$i]['IDcard'],"imgURL"=>$result[$i]['imgURL']);
        }
        echo json_encode($array);
    }
    public function WriteGonggao(){
        $data['title']=I('post.title');
        $data['contents']=I('post.contents');
        $data['dateTimes']=date('Y-m-d H:i:s');
        if(session('identify')==-1){
            $data['hospitalID']=0;
        }else{
            $data['hospitalID']=session('identify');
        }
        $Gonggao=M('Gonggao');
        $result=$Gonggao->field("dateTimes,title,contents,hospitalID")->data($data)->add();
        if($result){
            echo "true";
        }
        else $this->error();
    }
    public function pass(){
        $id=I('post.id');
        $data['isRenzheng']=1;
        $User=M('User');
        $result=$User->where("id='$id'")->save($data);
        echo "true";
    }
    public function UserNotVerify()
    {
        $User=M('User');
        $renzheng=2;
        $result=$User->where("isRenzheng='$renzheng'")->select();
        return $result;
    }
    public function EditUserPingfen(){
        $id=I('post.id');
        $data['pingfen']=I('post.pingfen');
        $User=M('User');
        $result=$User->where("id='$id'")->save($data);
        if($result)$this->success();
    }
    public function UserToVerify(){
        $id=I('post.user_id');
        $data['isRenzheng']=1;
        $User=M('User');
        $User->where("id='$id'")->save($data);
    }

    public function showyiyuan(){
        $id=session('identify');
       // $id=1;
        $Hospital=M('Hospital');
        $result=$Hospital->where("id='$id'")->find();
        $quid=$result['quID'];
        $Qu=M('Qu');
        $result1=$Qu->where("id='$quid'")->find();
        $array=array("id"=>$result['id'],"name"=>$result['name'],"dengji"=>$result['dengji'],"fenlei"=>$result['fenlei'],"qu"=>$result1['name'],"xiangxidizhi"=>$result['xiangxiAddress'],"youxiang"=>$result['email'],"dianhua"=>$result['phone']);
       echo json_encode($array);
    }
    public function edityiyuan()
    {
        $qu_name=I('post.qu_name');
        $Qu=M('Qu');
        $result=$Qu->where("name='$qu_name'")->find();
        $data['quID']=$result['id'];
        $id=I('post.id');
        $data['name']=I('post.name');
        $data['dengji']=I('post.dengji');
        $data['fenlei']=I('post.fenlei');
        $data['xiangxiAddress']=I('post.xiangxiAddress');
        $data['email']=I('post.youxiang');
        $data['phone']=I('post.dianhua');
        $Hospital=M('Hospital');
        $Hospital->where("id='$id'")->save($data);
        echo "true";

    }
    public function showkeshi(){
        $id=session('identify');
       // $id=1;
        $Keshi=M('Keshi');
        $result=$Keshi->where("hospitalID='$id'")->select();
        for($i=0;$i<count($result);$i++){
            $array[$i]=array("id"=>$result[$i]['id'],"name"=>$result[$i]['name'],"fenlei"=>$result[$i]['fenlei'],"weekdays"=>$result[$i]['weekdays']);
        }
        echo json_encode($array);
    }
    public function editkeshi()
    {
        $id = I('post.id');
        $data['name'] = I('post.name');
        $data['fenlei'] = I('post.fenlei');
        $data['weekdays'] = I('post.weekdays');
        $Keshi = M('Keshi');
        $Keshi->where("id='$id'")->save($data);
        echo "true";
    }
    public function Addkeshi(){
        $data['hospitalID']=session('identify');
      //  $data['hospitalID']=1;
        $data['name']=I('post.name');
        $data['fenlei']=I('post.fenlei');
        $data['weekdays']=I('post.weekdays');
        $data['phone']=1234567890;
        $Keshi=M('Keshi');
        $result=$Keshi->field("hospitalID,name,fenlei,weekdays,phone")->data($data)->add();
        if($result){
            echo "true";
        }
    }
    public function Deletekeshi(){
        $id=I('post.id');
        $Keshi=M('Keshi');
       $result=$Keshi->where("id='$id'")->delete();
        if($result)$this->success();
        else $this->error();
    }
    public function showyisheng(){
         $id=session('identify');
        //$id=1;
        $Yisheng=M('Doctor');
        $result=$Yisheng->where("hospitalID='$id'")->select();
        for($i=0;$i<count($result);$i++){
            $keshiid=$result[$i]['keshiID'];
            $Keshi=M('Keshi');
            $result1=$Keshi->where("id='$keshiid'")->find();

            $array[$i]=array("id"=>$result[$i]['id'],"keshi"=>$result1['name'],"name"=>$result[$i]['name'],"guahaoMoney"=>$result[$i]['guahaoMoney'],"yuyueNum"=>$result[$i]['yuyueNum'],"jianjie"=>$result[$i]['jianjie']);

        }
        echo json_encode($array);
    }
    public function edityisheng(){
        $id=I('post.id');

        $hospitalid=session('identify');
       // $hospitalid=1;

        $keshiname=I('post.keshi');
        $Keshi=M('Keshi');
        $result1=$Keshi->where("name='$keshiname'AND hospitalID='$hospitalid'")->find();
        $data['keshiID']=$result1['id'];
        $data['name']=I('post.name');
        $data['yuyueNum']=I('post.yuyueNum');
        $data['guahaoMoney']=I('post.guahaoMoney');
        $data['jianjie']=I('post.jianjie');
        $Doctor=M('Doctor');
        $Doctor->where("id='$id'")->save($data);
        echo "true";
    }
    public function Deleteyisheng(){
        $id=I('post.id');
        $Doctor=M('Doctor');
        $result=$Doctor->where("id='$id'")->delete();
        if($result)$this->success();
        else $this->error();
    }
    public function Addyisheng(){
        $keshiname=I('post.keshiname');
         $hospitalid=session('identify');
     //   $hospitalid=1;
        $Keshi=M('Keshi');
        $result1=$Keshi->where("name='$keshiname' AND hospitalID='$hospitalid'")->find();
        $data['hospitalID']=$hospitalid;
        $data['keshiID']=$result1['id'];
        $data['name']=I('post.name');
        $data['guahaoMoney']=I('post.guahaoMoney');
        $data['yuyueNum']=I('post.yuyueNum');
        $data['jianjie']=I('post.jianjie');
        $Doctor=M('Doctor');
        $result=$Doctor->field("hospitalID,keshiID,name,yuyueNum,guahaoMoney,jianjie")->data($data)->add();
        if($result){
            $jinqiChuzhen=M('Jinqichuzhen');
                $time=time();
                $data2['doctorID']=$result;
                $data2['shengyuNumber']= $data['yuyueNum'];
                $data2['keshiID']=$result1['id'];
                for($i=1;$i<=30;$i++){
                    $data2['dates']=date("Y-m-d",strtotime("+$i day",$time));
                    $jinqiChuzhen->field('dates,keshiID,doctorID,shengyuNumber')->data($data2)->add();
                }
            echo "true";
        }

    }

    public function fuyuele(){
        $id=I('post.id');
        $Yuyuedan=M('Yuyuedan');
        $data['isChuli']=1;
        $result=$Yuyuedan->where("id='$id'")->save($data);
        echo "true";
    }
    public function weiyuele(){
        $id=I('post.id');
        $Yuyuedan=M('Yuyuedan');
        $userID=$Yuyuedan->where("id=$id")->getField("userID");
        $User=M('User');
        $User->where("id=$userID")->setDec('pingfen');
        $data['isChuli']=2;
        $result=$Yuyuedan->where("id='$id'")->save($data);
        echo "true";
    }

}