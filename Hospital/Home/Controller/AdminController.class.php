<?php
namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller{
    public function index()
    {
        $this->redirect('Hospital/Index', null, 0);
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
    public function HospitalInfo(){
        $name=I("post.hospitalname");
        $Hospital=M('Hospital');
        $result=$Hospital->where("'name' like '%$name%'")->select();
        return $result;
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
    public function UserInfo(){
        $info=I('post.user_info');
        $User=M('User');
        $result=$User->where("IDcard='$info' OR email='$info'").find();
        return $result;
    }
    public function EditUserInfo(){
        $id=I('post.user_id');
        $data['xinyongjifen']=I('post.user_xinyongjifen');
        $User=M('User');
        $User->where("id='$id'")->save($data);
    }
    public function CreateHospital(){
        $hospitalname=I('post.hospital_name');
        $Hospital=M('Hospital');
        $Hospital->field('name')->data($hospitalname)->add();
        if($Hospital){
            $data['identify']=$Hospital->where("name='$hospitalname'")->getfield('id');
            $data['name']=$hospitalname;
            $data['IDcard']=I('post.user_IDcard');
            $data['password']=md5($data['IDcard']);
            $User=M('User');
            $User->field('IDcard,password,name,identify')->data($data)->add();
            if($User)$this->success();
            else $this->error();
        }else{
            $this->error();
        }
    }
    public function UserNotVerify()
    {
        $User=M('User');
        $renzheng=1;
        $result=$User->where("isRenzheng='$renzheng'")->select();
        return $result;
    }
    public function UserToVerify(){
        $id=I('post.user_id');
        $data['isRenzheng']=2;
        $User=M('User');
        $User->where("id='$id'")->save($data);
    }
}