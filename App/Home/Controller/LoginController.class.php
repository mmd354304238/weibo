<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\4 0004
 * Time: 19:06
 */

namespace Home\Controller;



use Think\Verify;

class LoginController extends HomeController
{
    public function index(){

        if (!session('?user_auth')) {
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }


    public function verify (){
        $Verify = new Verify();
        $Verify->entry(1);
    }


}




















