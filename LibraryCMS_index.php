<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "请登录后访问,5秒后返回登录页面！";
    header("refresh:5;url=LibraryCMS_login.php");
    exit();
}
$con = mysqli_connect("localhost","root","root","library");
mysqli_select_db($con,"library");
mysqli_query($con,"SET NAMES UTF8");
$count = "select * from librarycms_bookmanage";
$result = mysqli_query($con,$count);
$num = mysqli_num_rows($result);
$count1 = "select * from librarycms_studentmanage";
$result1 = mysqli_query($con,$count1);
$num1 = mysqli_num_rows($result1);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>图书管理系统主界面</title>
  <link rel="icon" href="images/logo96.ico" type="image/x-icon">
  <link rel="shortcut icon" href="images/logo96.ico" type="image/x-icon">
  <link rel="stylesheet" href="layui-v2.5.6/layui/css/layui.css">
  <style>
    em{
      cursor: default;
    }
    em a{
      color: #000000;
    }
    em a:hover{
      color: #393D49;
      cursor: pointer;
    }
  </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo"><a href="LibraryCMS_index.php" style="color: #009688"><img src="images/logo64.ico" style="width: 50px;margin-left: -20px;" alt="logo" />图书管理系统</a></div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
          <li class="layui-nav-item layui-this"><a href="LibraryCMS_index.php">首页</a></li>
          <li class="layui-nav-item"><a href="LibraryCMS_bookmanage.php">图书管理</a></li>
          <li class="layui-nav-item"><a href="LibraryCMS_studentmanage.php">学生信息管理</a></li>
          <li class="layui-nav-item">
              <a href="javascript:;">其它系统</a>
              <dl class="layui-nav-child">
                  <dd><a href="Library_login.php">图书借阅系统</a></dd>
              </dl>
          </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
            <?php echo $_SESSION["username"]; ?>
        </a>
        <dl class="layui-nav-child">
           <dd><a href="LibraryCMS_editpassword.php">修改密码</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="LibraryCMS_logout.php">退出</a></li>
    </ul>
  </div>

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->

    </div>
  </div>

  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;"><h1 style="text-align: center;"><?php echo $_SESSION["username"]; ?>,欢迎您！</h1><br><p style="text-align: center;font-size: 20px;">现存图书数量：<?php echo $num; ?><br>现存学生数量：<?php echo $num1; ?></p></div>
  </div>

  <div class="layui-footer">
    <!-- 底部固定区域 -->
    <em>Powered By <a id="author" onclick="layer.open({title: '联系作者',content: '<p style=\'color: #000000;\'>作者QQ：2735982878<br>邮箱：2735982878@qq.com</p>',skin: 'layui-layer-molv',btn: '我知道了',resize: false})">@lhk</a> &nbsp;&nbsp;&nbsp;图书管理系统</em>
  </div>
</div>
<script src="layui-v2.5.6/layui/layui.js"></script>
<script>
//JavaScript代码区域
layui.use(['element','form','jquery','layer','table','laypage'], function(){
    var element = layui.element
        ,form = layui.form
        ,$ = layui.jquery
        ,layer = layui.layer
        ,table = layui.table
        ,laypage = layui.laypage;


});

</script>
</body>
</html>