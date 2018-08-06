<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\4 0004
 * Time: 19:06
 */

namespace Home\Controller;


use Think\Controller;

class LoginController extends Controller
{
    public function index(){
        $this->display();
    }
    public function test(){
        $m = M('user');
        var_dump($m->select());
    }

}