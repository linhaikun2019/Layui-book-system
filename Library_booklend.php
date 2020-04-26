<?php
session_start();
if(!isset($_SESSION['username1'])){
    echo "请登录后访问,5秒后返回登录页面！";
    header("refresh:5;url=Library_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图书借阅系统——图书借阅</title>
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
            <li class="layui-nav-item layui-this"><a href="Library_booklend.php">图书借阅</a></li>
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
        <div style="margin: 20px 50px 0 50px;">
            <table class="layui-hide" id="demo" lay-filter="test"></table>
            <script type="text/html" id="barDemo">
                <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
                <a class="layui-btn layui-btn layui-btn-xs" lay-event="lend">借书</a>
            </script>
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


        //初始表格渲染
        table.render({
            elem: '#demo'
            ,height: 750
            ,url: './php/bookjson2.php' //数据接口
            ,id: 'table_booklend'
            ,toolbar: '<div>' +
                '<div class="layui-inline" lay-event="search" title="搜索"><i class="layui-icon layui-icon-search"></i></div>'+
                '<div class="layui-inline" lay-event="lend" title="借书"><i class="layui-icon layui-icon-read"></i></div>' +
                '<div class="layui-inline" lay-event="refresh" title="刷新"><i class="layui-icon layui-icon-refresh"></i></div>' +
                '</div>' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
            ,page: {
                layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
                limit: 20,
                limits: [20,30,50,100]
            }//自定义分页布局
            ,text: {
                none: '哎呀，这里没有图书啊~~', //默认：无数据。
            }
            ,cols: [[ //表头
                {type: 'checkbox', fixed: 'left'}
                ,{field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                ,{field: 'bookid', title: '书号', width:100,sort: true}
                ,{field: 'bookname', title: '书名', width: 300,sort: true}
                ,{field: 'writer', title: '作者', width: 100,sort: true}
                ,{field: 'publishing', title: '出版社', width:150,sort: true}
                ,{field: 'publishdate', title: '出版日期', width: 150, sort: true}
                ,{field: 'price', title: '价格', width:150,sort: true}
                ,{field: 'surpluscount', title: '剩余数', width: 100,sort: true}
                ,{fixed: 'right',title: '操作', width: 165, align:'center', toolbar: '#barDemo'}
            ]]
        });
        //搜索框html代码
        var searchHtml = ' <div class="layui-form-item" style="margin-left: 10px;margin-top: 30px;">\n' +
            '<label class="layui-form-label" for="searchtext" style="font-size: 15px;color:#393D49; cursor: pointer;">搜索内容</label>\n' +
            '<div class="layui-input-block">\n' +
            '<input type="text" name="searchtext" id="searchtext" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>搜索内容不能为空！</a>" placeholder="请输入搜索内容" autocomplete="off" maxlength="100" class="layui-input" style="width: 300px;">\n' +
            '</div>\n' +
            '</div>'


        //监听头工具栏事件
        table.on('toolbar(test)', function(obj){
            var checkStatus = table.checkStatus(obj.config.id)
                ,data = checkStatus.data //获取选中的数据
                ,editList=[]
                ,arr = [];
            for(var i=0;i<data.length;i++){ //因为这块获取的是数组，所以当前行数据应该为数组中的第一条，所以要遍历数组
                $.each(data[i],function(name,value) {
                    editList.push(value);
                });
                arr.push(data[i].id);
            }
            switch(obj.event){
                //搜索的事件
                case 'search':
                    layer.open({
                        title: '搜索'
                        ,type:1
                        ,content: searchHtml
                        ,area:'500px'
                        ,btn:['搜索','取消']
                        ,resize:false
                        ,yes: function(index, layero){ //点击搜索按钮的回调
                            if($('#searchtext').val()==''){
                                layer.msg('搜索内容不能为空！', {icon: 2});
                                return false;
                            }else {
                                table.reload('table_booklend', {
                                    url: './php/usertable_search2.php'
                                    ,where: {
                                        field: $('#searchtext').val()
                                    } //设定异步数据接口的额外参数
                                    ,done: function(res, curr, count) {
                                        layer.msg('搜索出'+ count +'条结果！', {icon: 1});
                                    }
                                });
                                layer.close(index); //如果设定了yes回调，需进行手工关闭
                            }
                        }
                    });
                    break;
                case 'lend':
                    if(data.length === 0){
                        layer.msg('请选择一行');
                    } else {
                        if (data.length > 0) {
                            layer.confirm('确定借阅选中的书籍（默认借书期限30天）？', {icon: 3, title: '提示信息'}, function (index) {
                                //layui中找到CheckBox所在的行，并遍历找到行的顺序

                                layer.close(index);
                                if(Number(editList[7]) == 0) {
                                    layer.msg('此书剩余数量为空，无法借阅！', {icon: 2});
                                }else{
                                table.reload('table_booklend', {
                                    url: './php/usertable_lend.php'
                                    ,where: {
                                        table_id: arr,
                                        surpluscount: Number(editList[7])
                                    } //设定异步数据接口的额外参数
                                    ,done: function(res, curr, count){
                                        if(res == 1){
                                            layer.msg('你已经借阅过此书，请勿再次借阅！', {icon: 2});
                                            table.reload('table_booklend', {
                                                url: './php/bookjson2.php'
                                                ,done:function () {

                                                }
                                            });
                                        }else{
                                            layer.msg('借阅成功，请去我的图书里查看！', {icon: 1});
                                            table.reload('table_booklend', {
                                                url: './php/bookjson2.php'
                                                ,done:function () {

                                                }
                                            });
                                        }
                                    }

                                });
                                }
                            })
                        }
                    }
                    break;
                case 'refresh':
                    table.render({
                        elem: '#demo'
                        ,height: 750
                        ,url: './php/bookjson2.php' //数据接口
                        ,id: 'table_booklend'
                        ,toolbar: '<div>' +
                            '<div class="layui-inline" lay-event="search" title="搜索"><i class="layui-icon layui-icon-search"></i></div>'+
                            '<div class="layui-inline" lay-event="lend" title="借书"><i class="layui-icon layui-icon-read"></i></div>' +
                            '<div class="layui-inline" lay-event="refresh" title="刷新"><i class="layui-icon layui-icon-refresh"></i></div>' +
                            '</div>' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
                        ,page: {
                            layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
                            limit: 20,
                            limits: [20,30,50,100]
                        }//自定义分页布局
                        ,text: {
                            none: '哎呀，这里没有图书啊~~', //默认：无数据。
                        }
                        ,cols: [[ //表头
                            {type: 'checkbox', fixed: 'left'}
                            ,{field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                            ,{field: 'bookid', title: '书号', width:100,sort: true}
                            ,{field: 'bookname', title: '书名', width: 300,sort: true}
                            ,{field: 'writer', title: '作者', width: 100,sort: true}
                            ,{field: 'publishing', title: '出版社', width:150,sort: true}
                            ,{field: 'publishdate', title: '出版日期', width: 150, sort: true}
                            ,{field: 'price', title: '价格', width:150,sort: true}
                            ,{field: 'surpluscount', title: '剩余数', width: 100,sort: true}
                            ,{fixed: 'right',title: '操作', width: 165, align:'center', toolbar: '#barDemo'}
                        ]]
                    });
                    layer.msg('刷新成功！');

            }
        });

        //监听行工具事件
        table.on('tool(test)', function(obj){
            var data = obj.data //获得当前行数据
                ,layEvent = obj.event //获得 lay-event 对应的值
                ,editList=[] //存放获取到的那条json数据中的value值（不放key）
                ,arr = [];
            $.each(data,function(name,value) {//循环遍历json数据
                editList.push(value);//将json数据中的value放入数组中（下面的子窗口显示的时候要用到）
            });
            arr.push(data.id);
            if(layEvent === 'detail') {
                layer.tab({
                    area: ['600px', '500px'],
                    tab: [{
                        title: '图书信息',
                        content: '<p style="text-align: center;font-size:20px;padding-top:10px; ">ID：' + editList[0] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">书号：' + editList[1] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">书名：' + editList[2] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">作者：' + editList[3] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">出版社：' + editList[4] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">出版日期：' + editList[5] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">价格：' + editList[6] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">剩余数量：' + editList[7] + '</p>'
                    }, {
                        title: '图书封面',
                        content: '<img src="/images/bookplaceholder.jpg" alt="图书封面" id="bookpic" style="width: 250px;height:350px;margin: 20px 0 0 180px"/>'
                    }],
                    success: function(){
                        //console.log(editList[8])
                        bookpicsrc = editList[8];
                        if(bookpicsrc != null){
                            $('#bookpic').attr('src',bookpicsrc);
                        }
                    }
                });
            }else if(layEvent === 'lend'){
                layer.confirm('确定借阅此书籍（默认借书期限30天）？', {icon: 3, title: '提示信息'}, function(index){
                    obj.del(); //删除对应行（tr）的DOM结构
                    layer.close(index);
                    if(Number(editList[7]) == 0) {
                        layer.msg('此书剩余数量为空，无法借阅！', {icon: 2});
                    }else{
                        table.reload('table_booklend', {
                            url: './php/usertable_lend.php'
                            ,where: {
                                table_id: arr,
                                surpluscount: Number(editList[7])
                            } //设定异步数据接口的额外参数
                            ,done: function(res, curr, count){
                                if(res == 1){
                                    layer.msg('你已经借阅过此书，请勿再次借阅！', {icon: 2});
                                    table.reload('table_booklend', {
                                        url: './php/bookjson2.php'
                                        ,done:function () {

                                        }
                                    });
                                }else{
                                    layer.msg('借阅成功，请去我的图书里查看！', {icon: 1});
                                    table.reload('table_booklend', {
                                        url: './php/bookjson2.php'
                                        ,done:function () {

                                        }
                                    });
                                }
                            }

                        });
                    }
                });
            }
        });
    });

</script>
</body>
</html>