<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\5 0005
 * Time: 9:13
 */

namespace Home\Model;


use Think\Model;

class UserModel extends Model
{
      protected $_auto = array(
          array('password','sha1',self::MODEL_BOTH,'function'),
          array('create','time',self::MODEL_INSERT,'function'),
      );

      public function register($username,$password,$email){
          $data = array(
              'username'=>$username,
              'password'=>$password,
              'email'=>$email,
          );
          if ($this->create($data)){
              $uid = $this->add();
              return $uid ? $uid : 0;
          }
      }
}