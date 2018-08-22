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

        if (!is_null(cookie('auto'))&&!session('?user_auth')){

            $value =explode('|',encryption(cookie('auto'),1)) ;
            list($username,$ip)=$value;
            echo $username;
            echo $ip;
            if ($ip==get_client_ip()){

                $map['username']=$username;
                $User=D('User');
                $userObj=$User->field('id','username')->where($map)->find();

                $update = array(
                    'id'=>$userObj['id'],
                    'last_login'=>NOW_TIME,
                    // 'last_ip'=>get_client_ip(1),
                );

                $User->save($update);

                $auth = array(
                    'id'=>$userObj['id'],
                    'username'=>$userObj['username'],
                    'last_login'=>NOW_TIME,
                );

                session('user_auth',$auth);
            }
        }
        if (session('?user_auth')) {
            return 1;
        } else {
            $this->redirect('Login/index');
        }




    }



















}