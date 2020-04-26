<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>upload模块快速使用</title>
    <link rel="stylesheet" href="/layui-v2.5.6/layui/css/layui.css" media="all">
</head>
<body>

<div class="layui-upload">
    <button type="button" class="layui-btn" id="test2">浏览</button>
    <button type="button" class="layui-btn" id="test3" style="margin-left: 10px;">上传</button>
    <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
        预览图：
        <div class="layui-upload-list" id="demo2" style="height: 120px;"><ul id="photo_list"></ul></div>
    </blockquote>
</div>

<script src="/layui-v2.5.6/layui/layui.js"></script>
<script>
    layui.use('upload', function(){
        var upload = layui.upload
            ,$ = layui.jquery;
        //多图片上传
        upload.render({
            elem: '#test2'
            ,url: '/php/upload.php' //改成您自己的上传接口
            ,multiple: true
            ,accept: 'images'
            ,acceptMime: 'image/*'
            ,auto: false
            ,bindAction: '#test3'
            ,choose: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#demo2 ul').append('<li style="display: inline-block;float: left;"><img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" style="width: 150px;margin-left:10px;"><i class="layui-icon layui-icon-close-fill" id="layicon" style="display:block;margin-left: 75px;color: #000000"></i></li>')
                });
                //监听删除封面图
                $("#photo_list").on("click", "#layicon", function(){
                    var index = $(this).parents('li').index();
                    //删除预览图片
                    $(this).parents('li').remove();
                });
                $("#photo_list").on("mouseover", "#layicon", function(){
                    $(this).css({'color':'#f06600','cursor':'pointer'});
                });
                $("#photo_list").on("mouseleave", "#layicon", function(){
                    $(this).css({'color':'#000000'});
                });
            }
            ,done: function(res){
                if(res['code']==1){
                    layer.msg('图片上传成功');
                }else{
                    layer.msg('图片上传失败');
                }
            }
        });

    });
</script>
</body>
</html>