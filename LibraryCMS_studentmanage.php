<?php
session_start();
if(!isset($_SESSION['username'])){
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
    <title>图书管理系统——学生信息管理</title>
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
            <li class="layui-nav-item"><a href="LibraryCMS_index.php">首页</a></li>
            <li class="layui-nav-item"><a href="LibraryCMS_bookmanage.php">图书管理</a></li>
            <li class="layui-nav-item layui-this"><a href="LibraryCMS_studentmanage.php">学生信息管理</a></li>
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
            <li class="layui-nav-item"><a href="">退出</a></li>
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
                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
            </script>
        </div>
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

        table.render({
            elem: '#demo'
            ,height: 750
            ,url: './php/bookjson1.php' //数据接口
            ,id: 'table_studentmanage'
            ,toolbar: '<div>' +
                '<div class="layui-inline" lay-event="search" title="搜索"><i class="layui-icon layui-icon-search"></i></div>'+
                '<div class="layui-inline" lay-event="add" title="添加"><i class="layui-icon layui-icon-add-1"></i></div>' +
                '<div class="layui-inline" lay-event="update" title="编辑"><i class="layui-icon layui-icon-edit"></i></div>' +
                '<div class="layui-inline" lay-event="delete" title="删除"><i class="layui-icon layui-icon-delete"></i></div>' +
                '<div class="layui-inline" lay-event="refresh" title="刷新"><i class="layui-icon layui-icon-refresh"></i></div>' +
                '</div>' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
            ,page: {
                layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
                limit: 20,
                limits: [20,30,50,100]
            }//自定义分页布局
            ,text: {
                none: '哎呀，这里没有学生信息啊~~请添加学生信息吧！', //默认：无数据。
            }
            ,done: function(res, curr, count){
                countnum = count;
            }
            ,cols: [[ //表头
                {type: 'checkbox', fixed: 'left'}
                ,{field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                ,{field: 'studentid', title: '学号', width:100,sort: true}
                ,{field: 'studentname', title: '姓名', width: 300,sort: true}
                ,{field: 'studentsex', title: '性别', width: 100,sort: true}
                ,{field: 'studentage', title: '年龄', width:150,sort: true}
                ,{field: 'studentphone', title: '电话号码', width: 150, sort: true}
                ,{field: 'studentmail', title: '邮箱', width:150,sort: true}
                ,{field: 'lendcount', title: '借阅数量', width: 200,sort: true}
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
        //添加框html代码
        var addHtml ='<form class="layui-form" id="login_form" method="post" action="">\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '            <label class="layui-form-label" for="table_id" style="font-size: 15px;color:#393D49; cursor: pointer;">ID</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="number" name="table_id" id="table_id" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>ID不能为空！</a>" placeholder="请输入ID" autocomplete="off" maxlength="100" class="layui-input" style="width: 220px;margin: 30px 0 0">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '             <label class="layui-form-label" for="student_id" style="font-size: 15px;color:#393D49; cursor: pointer;">学号</label>\n' +
            '             <div class="layui-input-block">\n' +
            '                 <input type="number" name="student_id" id="student_id" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>学号不能为空！</a>" placeholder="请输入学号" autocomplete="off" maxlength="100" class="layui-input" style="width: 220px;margin: 30px 0 0">\n' +
            '             </div>\n' +
            '        </div>\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '            <label class="layui-form-label" for="student_name" style="font-size: 15px;color:#393D49; cursor: pointer;">姓名</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="text" name="student_name" id="student_name" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>姓名不能为空！</a>" placeholder="请输入姓名" autocomplete="off" maxlength="100" class="layui-input" style="width: 220px;margin: 30px 0 0">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '            <label class="layui-form-label"  style="font-size: 15px;color:#393D49; cursor: pointer;">性别</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="radio" name="sex" value="男" title="男">\n' +
            '                <input type="radio" name="sex" value="女" title="女">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '            <label class="layui-form-label" for="student_age" style="font-size: 15px;color:#393D49; cursor: pointer;">年龄</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="number" name="student_age" id="student_age" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>年龄不能为空！</a>" placeholder="请输入年龄" autocomplete="off" maxlength="100" class="layui-input" style="width: 220px;margin: 30px 0 0">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '            <label class="layui-form-label" for="student_phone" style="font-size: 15px;color:#393D49; cursor: pointer;">联系方式</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="text" name="student_phone" id="student_phone" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>电话号码不能为空！</a>" placeholder="请输入电话号码" autocomplete="off" maxlength="100" class="layui-input" style="width: 220px;margin: 30px 0 0">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '            <label class="layui-form-label" for="student_mail" style="font-size: 15px;color:#393D49; cursor: pointer;">邮箱</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="text" name="student_mail" id="student_mail" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>邮箱不能为空！</a>" placeholder="请输入邮箱" autocomplete="off" maxlength="100" class="layui-input" style="width: 220px;margin: 30px 0 0">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="layui-form-item" style="margin-left: 10px;">\n' +
            '            <label class="layui-form-label" for="lendcount" style="font-size: 15px;color:#393D49; cursor: pointer;">借阅数量</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="number" name="lendcount" id="lendcount" required  lay-verify="required" lay-reqText="<a style=\'color:#000000\'>借阅数量不能为空！</a>" placeholder="请输入借阅数量" autocomplete="off" maxlength="100" class="layui-input" style="width: 220px;margin: 30px 0 0">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </form>'
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
                                table.reload('table_studentmanage', {
                                    url: './php/usertable_search1.php'
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
                case 'add':
                    layer.open({
                        title: '添加'
                        , type: 1
                        , content: addHtml
                        , area: '450px'
                        , btn: ['添加', '取消']
                        , resize: false
                        , success: function () {
                            form.render('radio'); //刷新radio单选框渲染
                            $('#table_id').val(countnum + 1).attr({'class':'layui-input layui-disabled','disabled':'true'});
                        }
                        , yes: function (index, layero) { //点击搜索按钮的回调
                            if ($('#table_id').val() == '') {
                                layer.msg('ID不能为空', {icon: 2});
                                return false;
                            } else if ($('#student_id').val() == '') {
                                layer.msg('学号不能为空', {icon: 2});
                                return false;
                            } else if ($('#student_name').val() == '') {
                                layer.msg('姓名不能为空', {icon: 2});
                                return false;
                            }else if ($('#student_age').val() == '') {
                                layer.msg('年龄不能为空', {icon: 2});
                                return false;
                            } else if ($('#student_phone').val() == '') {
                                layer.msg('电话号码不能为空', {icon: 2});
                                return false;
                            } else if ($('#student_mail').val() == '') {
                                layer.msg('邮箱不能为空', {icon: 2});
                                return false;
                            } else if ($('#lendcount').val() == '') {
                                layer.msg('借阅数量不能为空', {icon: 2});
                                return false;
                            }else {
                                table.reload('table_studentmanage', {
                                    url: './php/usertable_add1.php'
                                    ,where: {
                                        table_id: $('#table_id').val(),
                                        student_id: $('#student_id').val(),
                                        student_name: $('#student_name').val(),
                                        student_sex: $("input[name='sex']:checked").val(),
                                        student_age: $('#student_age').val(),
                                        student_phone: $('#student_phone').val(),
                                        student_mail: $('#student_mail').val(),
                                        lendcount: $('#lendcount').val()
                                    } //设定异步数据接口的额外参数
                                    ,done: function(res, curr, count){
                                        layer.msg('添加成功！', {icon: 1});
                                        table.reload('table_studentmanage', {
                                            url: './php/bookjson1.php'
                                            ,done:function (res, curr, count) {
                                                countnum = count;
                                            }
                                        });
                                    }
                                });
                                layer.close(index); //如果设定了yes回调，需进行手工关闭
                            }
                        }
                    });
                    break;
                case 'update':
                    if(data.length === 0){
                        layer.msg('请选择一行');
                    } else if(data.length > 1){
                        layer.msg('只能同时编辑一个');
                    } else {
                        layer.open({
                            title: '编辑'
                            , type: 1
                            , content: addHtml
                            , area: '450px'
                            , btn: ['编辑', '取消']
                            , resize: false
                            , success: function () {
                                $('#table_id').val(editList[0]).attr({'class':'layui-input layui-disabled','disabled':'true'});
                                $('#student_id').val(editList[1]);
                                $('#student_name').val(editList[2]);
                                $("input[name='sex'][value='男']").attr("checked", editList[3] == '男' ? true : false);
                                $("input[name='sex'][value='女']").attr("checked", editList[3] == '女' ? true : false);
                                form.render(); //刷新表单渲染
                                $('#student_age').val(editList[4]);
                                $('#student_phone').val(editList[5]);
                                $('#student_mail').val(editList[6]);
                                $('#lendcount').val(editList[7]);
                            }
                            , yes: function (index, layero) { //点击搜索按钮的回调
                                if ($('#table_id').val() == '') {
                                    layer.msg('ID不能为空', {icon: 2});
                                    return false;
                                } else if ($('#student_id').val() == '') {
                                    layer.msg('学号不能为空', {icon: 2});
                                    return false;
                                } else if ($('#student_name').val() == '') {
                                    layer.msg('姓名不能为空', {icon: 2});
                                    return false;
                                }else if ($('#student_age').val() == '') {
                                    layer.msg('年龄不能为空', {icon: 2});
                                    return false;
                                } else if ($('#student_phone').val() == '') {
                                    layer.msg('电话号码不能为空', {icon: 2});
                                    return false;
                                } else if ($('#student_mail').val() == '') {
                                    layer.msg('邮箱不能为空', {icon: 2});
                                    return false;
                                } else if ($('#lendcount').val() == '') {
                                    layer.msg('借阅数量不能为空', {icon: 2});
                                    return false;
                                }else {
                                    table.reload('table_studentmanage', {
                                        url: './php/usertable_edit1.php'
                                        ,where: {
                                            table_id: $('#table_id').val(),
                                            student_id: $('#student_id').val(),
                                            student_name: $('#student_name').val(),
                                            student_sex: $("input[name='sex']:checked").val(),
                                            student_age: $('#student_age').val(),
                                            student_phone: $('#student_phone').val(),
                                            student_mail: $('#student_mail').val(),
                                            lendcount: $('#lendcount').val()
                                        } //设定异步数据接口的额外参数
                                        ,done: function(res, curr, count){
                                            layer.msg('编辑成功！', {icon: 1});
                                            table.reload('table_studentmanage', {
                                                url: './php/bookjson1.php'
                                                ,done:function () {

                                                }
                                            });
                                        }
                                    });
                                    layer.close(index); //如果设定了yes回调，需进行手工关闭
                                }
                            }
                        });
                    }
                    break;
                case 'delete':
                    if(data.length === 0){
                        layer.msg('请选择一行');
                    } else {
                        if (data.length > 0) {
                            layer.confirm('确定删除选中的条目（此操作将不可撤销）？', {icon: 3, title: '提示信息'}, function (index) {
                                //layui中找到CheckBox所在的行，并遍历找到行的顺序
                                $("div.layui-table-body table tbody input[name='layTableCheckbox']:checked").each(function () { // 遍历选中的checkbox
                                    n = $(this).parents("tbody tr").index();  // 获取checkbox所在行的顺序
                                    //移除行
                                    $("div.layui-table-body table tbody ").find("tr:eq(" + n + ")").remove();
                                    //如果是全选移除，就将全选CheckBox还原为未选中状态
                                    $("div.layui-table-header table thead div.layui-unselect.layui-form-checkbox").removeClass("layui-form-checked");
                                });
                                layer.close(index);
                                table.reload('table_studentmanage', {
                                    url: './php/usertable_del1.php'
                                    ,where: {
                                        table_id: arr
                                    } //设定异步数据接口的额外参数
                                    ,done: function(res, curr, count){
                                        layer.msg('删除成功！', {icon: 1});
                                        table.reload('table_studentmanage', {
                                            url: './php/bookjson1.php'
                                            ,done:function (res, curr, count) {
                                                countnum = count;
                                            }
                                        });
                                    }
                                });
                            })
                        }
                    }
                    break;
                case 'refresh':
                    table.render({
                        elem: '#demo'
                        ,height: 750
                        ,url: './php/bookjson1.php' //数据接口
                        ,id: 'table_studentmanage'
                        ,toolbar: '<div>' +
                            '<div class="layui-inline" lay-event="search" title="搜索"><i class="layui-icon layui-icon-search"></i></div>'+
                            '<div class="layui-inline" lay-event="add" title="添加"><i class="layui-icon layui-icon-add-1"></i></div>' +
                            '<div class="layui-inline" lay-event="update" title="编辑"><i class="layui-icon layui-icon-edit"></i></div>' +
                            '<div class="layui-inline" lay-event="delete" title="删除"><i class="layui-icon layui-icon-delete"></i></div>' +
                            '<div class="layui-inline" lay-event="refresh" title="刷新"><i class="layui-icon layui-icon-refresh"></i></div>' +
                            '</div>' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
                        ,page: {
                            layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
                            limit: 20,
                            limits: [20,30,50,100]
                        }//自定义分页布局
                        ,text: {
                            none: '哎呀，这里没有学生信息啊~~请添加学生信息吧！', //默认：无数据。
                        }
                        ,done: function(res, curr, count){
                            countnum = count;
                        }
                        ,cols: [[ //表头
                            {type: 'checkbox', fixed: 'left'}
                            ,{field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                            ,{field: 'studentid', title: '学号', width:100,sort: true}
                            ,{field: 'studentname', title: '姓名', width: 300,sort: true}
                            ,{field: 'studentsex', title: '性别', width: 100,sort: true}
                            ,{field: 'studentage', title: '年龄', width:150,sort: true}
                            ,{field: 'studentphone', title: '电话号码', width: 150, sort: true}
                            ,{field: 'studentmail', title: '邮箱', width:150,sort: true}
                            ,{field: 'lendcount', title: '借阅数量', width: 200,sort: true}
                            ,{fixed: 'right',title: '操作', width: 165, align:'center', toolbar: '#barDemo'}
                        ]]
                    });
                    layer.msg('刷新成功！')
            };
        });

        //监听行工具事件
        table.on('tool(test)', function(obj){ //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
            var data = obj.data //获得当前行数据
                ,layEvent = obj.event //获得 lay-event 对应的值
                ,editList=[] //存放获取到的那条json数据中的value值（不放key）
                ,arr = [];
            $.each(data,function(name,value) {//循环遍历json数据
                editList.push(value);//将json数据中的value放入数组中（下面的子窗口显示的时候要用到）
            });
            arr.push(data.id);
            if(layEvent === 'detail'){
                layer.tab({
                    area: ['600px', '500px'],
                    tab: [{
                        title: '学生信息',
                        content: '<p style="text-align: center;font-size:20px;padding-top:10px; ">ID：' + editList[0] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">学号：' + editList[1] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">姓名：' + editList[2] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">性别：' + editList[3] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">年龄：' + editList[4] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">电话号码：' + editList[5] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">邮箱：' + editList[6] + '</p>' +
                            '<p style="text-align: center;font-size:20px;padding-top:10px;">借阅数量：' + editList[7] + '</p>'
                    }]
                });
            } else if(layEvent === 'del'){
                layer.confirm('确定删除此条目（此操作将不可撤销）？', {icon: 3, title: '提示信息'}, function(index){
                    obj.del(); //删除对应行（tr）的DOM结构
                    layer.close(index);
                    table.reload('table_studentmanage', {
                        url: './php/usertable_del1.php'
                        ,where: {
                            table_id: arr
                        } //设定异步数据接口的额外参数
                        ,done: function(res, curr, count){
                            layer.msg('删除成功！', {icon: 1});
                            table.reload('table_studentmanage', {
                                url: './php/bookjson1.php'
                                ,done:function (res, curr, count) {
                                    countnum = count;
                                }
                            });
                        }
                    });
                });
            } else if(layEvent === 'edit'){
                layer.open({
                    title: '编辑'
                    , type: 1
                    , content: addHtml
                    , area: '450px'
                    , btn: ['编辑', '取消']
                    , resize: false
                    , success: function () {
                        $('#table_id').val(editList[0]).attr({'class':'layui-input layui-disabled','disabled':'true'});
                        $('#student_id').val(editList[1]);
                        $('#student_name').val(editList[2]);
                        $("input[name='sex'][value='男']").attr("checked", editList[3] == '男' ? true : false);
                        $("input[name='sex'][value='女']").attr("checked", editList[3] == '女' ? true : false);
                        form.render(); //刷新表单渲染
                        $('#student_age').val(editList[4]);
                        $('#student_phone').val(editList[5]);
                        $('#student_mail').val(editList[6]);
                        $('#lendcount').val(editList[7]);
                    }
                    , yes: function (index, layero) { //点击搜索按钮的回调
                        if ($('#table_id').val() == '') {
                            layer.msg('ID不能为空', {icon: 2});
                            return false;
                        } else if ($('#student_id').val() == '') {
                            layer.msg('学号不能为空', {icon: 2});
                            return false;
                        } else if ($('#student_name').val() == '') {
                            layer.msg('姓名不能为空', {icon: 2});
                            return false;
                        }else if ($('#student_age').val() == '') {
                            layer.msg('年龄不能为空', {icon: 2});
                            return false;
                        } else if ($('#student_phone').val() == '') {
                            layer.msg('电话号码不能为空', {icon: 2});
                            return false;
                        } else if ($('#student_mail').val() == '') {
                            layer.msg('邮箱不能为空', {icon: 2});
                            return false;
                        } else if ($('#lendcount').val() == '') {
                            layer.msg('借阅数量不能为空', {icon: 2});
                            return false;
                        }else {
                            table.reload('table_studentmanage', {
                                url: './php/usertable_edit1.php'
                                ,where: {
                                    table_id: $('#table_id').val(),
                                    student_id: $('#student_id').val(),
                                    student_name: $('#student_name').val(),
                                    student_sex: $("input[name='sex']:checked").val(),
                                    student_age: $('#student_age').val(),
                                    student_phone: $('#student_phone').val(),
                                    student_mail: $('#student_mail').val(),
                                    lendcount: $('#lendcount').val()
                                } //设定异步数据接口的额外参数
                                ,done: function(res, curr, count){
                                    layer.msg('编辑成功！', {icon: 1});
                                    table.reload('table_studentmanage', {
                                        url: './php/bookjson1.php'
                                        ,done:function () {

                                        }
                                    });
                                }
                            });
                            layer.close(index); //如果设定了yes回调，需进行手工关闭
                        }
                    }
                });
            }
        });
    });

</script>
</body>
</html>