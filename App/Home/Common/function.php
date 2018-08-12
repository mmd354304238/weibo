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

function test(){
    echo '12321321321';
}