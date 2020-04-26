<?php
session_start();
header("Content-type:application/json");
// 注册账号验证

$username = $_POST["uname"];//获取表单POST过来的学号
$password = $_POST["pwd"];//获取表单POST过来的密码
$_SESSION["username1"]=$username;
$_SESSION["password"]=$password;
setcookie('username1',$username,time()+60*60*24*30);
//表单过滤

$user = trim($username);//过滤空格
$psw = trim($password);//过滤空格


// 数据库连接
$con = mysqli_connect("localhost","root","root","library");
mysqli_select_db($con,"library");
mysqli_query($con,"SET NAMES UTF8");

if(!$con )
{
    die('连接失败: ' . mysqli_error($con));
}

//查询数据库账号密码是否一致
$exist = mysqli_query($con,"SELECT * FROM library_login WHERE uname = '$user' AND pwd = '$psw'");
$exist_result = mysqli_num_rows($exist);
if($exist_result){
    echo 1;
}else{
    echo 2;
}

?>