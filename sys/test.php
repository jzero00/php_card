<?php
    $phone = "010-0000-0003";
    $res = "";
    $res = substr($phone, -4);
    $hash_res = hash("sha256", substr($res, -4));
    $str = "admin";
    $hash_str = hash("sha256", $str);
    echo "자른 값 : " . $res . "<br>sha256암호화값 : " . $hash_res . "<br>" . $str . "<br>hash값 : ". $hash_str;
?>