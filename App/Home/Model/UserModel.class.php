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
          array('username','2,20',-1,self::EXISTS_VALIDATE,'length'),
          array('password','6,30',-2,self::EXISTS_VALIDATE,'length'),
          array('repassword','password',-3,self::EXISTS_VALIDATE,'confirm'),
          array('email','email',-4,self::EXISTS_VALIDATE),
          array('username','',-5,self::EXISTS_VALIDATE,'unique'),
          array('email','',-6,self::EXISTS_VALIDATE,'unique'),
          array('verify','check_verify',-7,self::EXISTS_VALIDATE,'function'),
      );


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