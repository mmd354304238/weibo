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

class UserController extends Controller
{

    public function register(){

        if (IS_AJAX){
            $User = new UserModel();
            $uid = $User->register(I('post.username'),I('post.password'),I('post.email'),I('post.repassword'));
            echo $uid;

        }else{
            $this->error('非法访问');
        }
    }
}