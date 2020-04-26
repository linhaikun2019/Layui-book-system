<?php
session_start();
if(!isset($_SESSION['username1'])){
    echo "请登录后访问,5秒后返回登录页面！";
    header("refresh:5;url=LibraryCMS_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图书借阅系统——修改密码</title>
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
        <div class="layui-logo"><a href="Library_index.php" style="color: #009688"><img src="images/logo64.ico" style="width: 50px;margin-left: -20px;" alt="logo" />图书借阅系统</a></div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="Library_index.php">首页</a></li>
            <li class="layui-nav-item"><a href="Library_booklend.php">图书借阅</a></li>
            <li class="layui-nav-item"><a href="Library_mylend.php">我的图书</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="LibraryCMS_login.php">图书管理系统</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <?php echo $_SESSION["username1"]; ?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="Library_editpassword.php">修改密码</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="Library_logout.php">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->

        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <form class="layui-form" id="login_form" method="post" action="./php/Library_editpwd.php">
                <div class="layui-form-item" style="margin-left: 10px;">
                    <label class="layui-form-label" for="pwd" style="font-size: 15px;color:#393D49; cursor: pointer;">密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="pwd" id="pwd" required  lay-verify="required" lay-reqText="<a style='color:#000000'>密码不能为空！</a>" placeholder="请输入密码" autocomplete="off" maxlength="20" class="layui-input" style="width: 220px;margin: 30px 0 0">
                    </div>
                </div>
                <div class="layui-form-item" style="margin-left: 10px;">
                    <label class="layui-form-label" for="confirmpwd" style="font-size: 15px;color:#393D49; cursor: pointer;">确认密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="confirmpwd" id="confirmpwd" required  lay-verify="required" lay-reqText="<a style='color:#000000'>请确认密码！</a>" placeholder="请确认密码" autocomplete="off" maxlength="20" class="layui-input" style="width: 220px;margin: 30px 0 0">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" id="embed-submit" lay-submit lay-filter="login" style="margin: 40px 0 0 15px">修改</button>
                        <a href="Library_index.php" class="layui-btn" id="embed-back" style="margin: 40px 0 0 20px">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        <em>Powered By <a id="author" onclick="layer.open({title: '联系作者',content: '<p style=\'color: #000000;\'>作者QQ：2735982878<br>邮箱：2735982878@qq.com</p>',skin: 'layui-layer-molv',btn: '我知道了',resize: false})">@lhk</a> &nbsp;&nbsp;&nbsp;图书借阅系统</em>
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
        form.on('submit(login)', function(data) {
            $.ajax({
                type: "POST",//方法
                url: "./php/Library_editpwd.php",//表单接收url
                data: $('#login_form').serialize(),
                datatype: 'json',
                success: function (data) {
                    //提交成功
                    if (data == 1) {
                        layer.msg("<a style='color: #000000;'>" + "两次输入密码不一致！" + "</a>", {icon: 2});
                    } else if (data == 2) {
                        layer.msg("<a style='color: #000000;'>" + "密码只能包含数字和字母！" + "</a>", {icon: 2});
                    } else if (data == 4) {
                        layer.msg("<a style='color: #000000;'>" + "修改密码失败！请重试！" + "</a>", {icon: 2});
                    } else if (data == 3) {
                        $('#embed-submit').attr({'class':'layui-btn layui-btn-disabled','disabled':'true'});
                        $('#embed-back').attr({'class':'layui-btn layui-btn-disabled','disabled':'true'});
                        layer.msg("<a style='color: #000000;'>" + "修改密码成功！即将注销，请重新登录！" + "</a>", {icon: 1});
                        setTimeout(function (){location.href="Library_logout.php"},3000);
                    }
                },
                error: function (data) {
                    //提交失败的提示词或者其他反馈代码
                    layer.msg("<a style='color: #000000;'>" +"连接服务器失败！" + "</a>",{icon: 2});
                }
            });
            return false;
        });

    });

</script>
</body>
</html>