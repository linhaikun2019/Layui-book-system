<?php
header("Content-type:application/json");
// 注册账号验证

$username = $_POST["uname"];//获取表单POST过来的教工号
$password = $_POST["pwd"];//获取表单POST过来的密码
$confirmpwd = $_POST["confirmpwd"];//获取表单POST过来的重复密码

//表单过滤

$user = trim($username);//过滤空格
$psw = trim($password);//过滤空格
$cpsw = trim($confirmpwd);//过滤空格



//开始判断
if ($psw !== $cpsw) {
    echo 3;
}else if (!preg_match('/^[0-9]*$/', $user)>0){
    echo 4;
}else if (!preg_match('/[A-Za-z0-9]+$/', $psw)>0){
    echo 5;
}else {


// 数据库连接
    $con = mysqli_connect("localhost", "root", "root", "library");
    mysqli_select_db($con, "library");
    mysqli_query($con, "SET NAMES UTF8");


    if(!$con )
    {
        die('连接失败: ' . mysqli_error($con));
    }

//查询数据库是否有存在该用户
    $exist = mysqli_query($con,"SELECT * FROM library_login WHERE uname = '$user'");
    $exist_result = mysqli_num_rows($exist);
    if($exist_result){
        //如果存在该用户
        echo 1;
    }else{
        mysqli_query($con,"ALTER TABLE library_login auto_increment=1");
        //插入数据库
        mysqli_query($con,"INSERT INTO library_login (uname, pwd) VALUES ('$user', '$psw')");
        echo 2;
    }

}
?>