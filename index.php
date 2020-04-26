<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图书借阅管理系统入口</title>
    <link rel="icon" href="images/logo96.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo96.ico" type="image/x-icon">
    <link rel="stylesheet" href="layui-v2.5.6/layui/css/layui.css">
    <style>
        html,body{
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "微软雅黑";
        }
        body {
            display: flex;
            align-items: center; /*定义body的元素垂直居中*/
            justify-content: center; /*定义body的里的元素水平居中*/
        }
        #bg{
            width: 400px;
            height: 350px;
            box-shadow:0 0 40px #eeeeee inset;
            border-radius: 15px;
            background:#e2e2e2;
        }
        em{
            cursor: default;
        }
        em a{
            color: #ffffff;
        }
        em a:hover{
            color: #393D49;
            cursor: pointer;
        }
    </style>
</head>
<body class="layui-bg-green">
<div id="bg" >
    <div id="form_bg" style="position: relative;">
        <h1 style="text-align: center;color:#393D49;font-weight: bold;margin-top: 20px;cursor: default">图书借阅管理系统入口</h1>
        <button type="button" class="layui-btn layui-btn-lg" style="margin: 60px 0 20px 100px;width: 200px;" onclick="window.open('Library_login.php','_blank')">图书借阅系统</button>
        <button type="button" class="layui-btn layui-btn-lg" style="margin: 40px 0 20px 100px;width: 200px;" onclick="window.open('LibraryCMS_login.php','_blank')">图书管理系统</button>
        <div style="position: fixed;bottom: 5px;margin-left: 90px;"><em>Powered By <a id="author" onclick="layer.open({title: '联系作者',content: '<p style=\'color: #000000;\'>作者QQ：2735982878<br>邮箱：2735982878@qq.com</p>',skin: 'layui-layer-molv',btn: '我知道了',resize: false})">@lhk</a> &nbsp;&nbsp;&nbsp;图书借阅管理系统</em></div>
    </div>
</div>
<script src="layui-v2.5.6/layui/layui.js"></script>
<script src="js/jquery-3.4.1.js"></script>
<script src="sliderValidate/src/sliderVerify/sliderVerify.js"></script>
<script>
    //JavaScript代码区域
    layui.use(['element','form','jquery','layer','table','laypage','laydate'], function(){
        var element = layui.element
            ,form = layui.form
            ,$ = layui.jquery
            ,layer = layui.layer
            ,table = layui.table
            ,laypage = layui.laypage
            ,laydate = layui.laydate;






    });

</script>
</body>
</html>