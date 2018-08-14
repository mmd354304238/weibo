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


      protected $_validate = array(
          array('username','/^[^@]{2,20}$/i',-1,self::EXISTS_VALIDATE),
          array('password','6,30',-2,self::EXISTS_VALIDATE,'length'),
          array('repassword','password',-3,self::EXISTS_VALIDATE,'confirm'),
          array('email','email',-4,self::EXISTS_VALIDATE),
          array('username','',-5,self::EXISTS_VALIDATE,'unique'),
          array('email','',-6,self::EXISTS_VALIDATE,'unique'),
          array('verify','check_verify',-7,self::EXISTS_VALIDATE,'function'),
          array('login_username','2,50',-8,self::EXISTS_VALIDATE,'length'),
          array('login_username','email','noemail',self::EXISTS_VALIDATE),
      );

      public function login($username,$password){
          $data = array(
              'login_username'=>$username,
              'password'=>$password,
          );

          $map = array();
          if ($this->create($data)){
              $map['email']=$username;
          }else{
              if ($this->getError()=='noemail'){
                  $map['username']=$username;
              }
          }

          $user = $this->field('id,password')->where($map)->find();
          if ($user['password']==sha1($password)){
              $update = array(
                  'id'=>$user['id'],
                  'last_login'=>NOW_TIME,
                  'last_ip'=>get_client_ip(1),
              );
              $this->save($update);
              return $user['id'];
          }else{
              return -9;
          }
      }


      public function register($username,$password,$email,$repassword){
          $data = array(
              'username'=>$username,
              'password'=>$password,
              'email'=>$email,
              'repassword'=>$repassword,
          );
          if ($this->create($data)){
              $uid = $this->add();
              return $uid ? $uid : 0;
          }else {
              return $this->getError();
          }
      }

    public function checkField($field, $type) {
        $data = array();
        switch ($type) {
            case 'username' :
                $data['username'] = $field;
                break;
            case 'email' :
                $data['email'] = $field;
                break;
            case 'verify' :
                $data['verify'] = $field;
                break;
            default:
                return 0;
        }
        return $this->create($data) ? 1 : $this->getError();
    }
}