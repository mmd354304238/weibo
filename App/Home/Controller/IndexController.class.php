<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $user =  M('user');
       var_dump($user->select());

    }
}