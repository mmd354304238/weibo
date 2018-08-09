<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\5 0005
 * Time: 9:28
 */

namespace Home\Controller;


use Home\Model\UserModel;
use Think\Controller;
use Think\Db;

class UserController extends Controller
{

    public function register(){
       sleep(3);
        if (IS_AJAX){
            $User = new UserModel();
            $uid = $User->register(I('post.username'),I('post.password'),I('post.email'),I('post.repassword'));
            echo $uid;

        }else{
            $this->error('非法访问');
        }
    }


    public function checkUserName (){
        if (IS_AJAX) {

            $User = D('User');
            $uid = $User->checkField(I('post.username'), 'username');
            echo $uid > 0 ? 'true' : 'false';
        }
    }

    public function checkEmail(){
        if (IS_AJAX){

            $user = D('User');
            $uid = $user->checkField(I('post.email'),'email');
            echo $uid > 0 ? 'true' : 'false';
        }
    }











}