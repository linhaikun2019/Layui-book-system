<?php
session_start();
header("Content-type:application/json");
// 注册账号验证

$password = $_POST["pwd"];//获取表单POST过来的密码
$confirmpwd = $_POST["confirmpwd"];//获取表单POST过来的重复密码


//表单过滤

$psw = trim($password);//过滤空格
$cpsw = trim($confirmpwd);//过滤空格


//开始判断
if ($psw !== $cpsw) {
    echo 1;
}else if (!preg_match('/[A-Za-z0-9]+$/', $psw)>0){
    echo 2;
}else {
// 数据库连接
    $con = mysqli_connect("localhost", "root", "root", "library");
    mysqli_select_db($con, "library");
    mysqli_query($con, "SET NAMES UTF8");

    if (!$con) {
        die('连接失败: ' . mysqli_error($con));
    }

//依据用户名更新数据库密码字段

    //查询数据库账号密码是否一致
    $exist = mysqli_query($con,"SELECT * FROM librarycms_login WHERE uname = '".$_SESSION['username']."'");
    $exist_result = mysqli_num_rows($exist);
    if($exist_result){
        mysqli_query($con,"update librarycms_login set pwd='$psw' where uname='".$_SESSION['username']."'");
        echo 3;
    }else{
        echo 4;
    }
}
?>