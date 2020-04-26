<?php
session_start();
header('Content-type:text/html;charset=utf-8');
if(isset($_SESSION['username']) && $_SESSION['password']){
    unset($_SESSION['username']);
    session_destroy();//销毁一个会话中的全部数据
    setcookie('username',$username,time()-3600);//销毁用户
    header("refresh:5;url=LibraryCMS_login.php"); print('正在注销，请稍等...<br>5秒后自动跳转。');
}else{
    echo '注销失败！请稍后重试';
}
?>