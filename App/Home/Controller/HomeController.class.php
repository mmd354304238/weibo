<?php
/**
 * Created by PhpStorm.
 * User: pisen
 * Date: 2018-08-15
 * Time: 15:16:36
 */

namespace Home\Controller;


use Think\Controller;

class HomeController extends Controller
{
    protected function login(){
        if (session('?user_auth')){
            return 1;
        }else{
            $this->redirect('Login/index');
        }
    }

}