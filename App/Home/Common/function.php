<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\12 0012
 * Time: 9:19
 */
function  check_verify($code,$id=1){
    $Verify = new \Think\Verify();
    $Verify->reset = false;
    return $Verify->check($code,$id);
}

function encryption($username,$type=0){
    $key=sha1(C('COOKIE_KEY'));

    if (!$type){
        return base64_encode($username ^ $key);
    }
    $username = base64_decode($username);
    return $username^$key;
}