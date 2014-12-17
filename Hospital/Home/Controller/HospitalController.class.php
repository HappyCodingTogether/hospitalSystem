<?php
namespace Home\Controller;

use Think\Controller;

class HospitalController extends Controller {
    public function index() {
        session('urlRefer',__ACTION__);
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
}