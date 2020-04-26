<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>upload模块快速使用2</title>
    <link rel="stylesheet" href="/layui-v2.5.6/layui/css/layui.css" media="all">
</head>
<body>
<blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
    <div id="uploadQRcode" class="layui-upload">
        <button type="button" class="layui-btn" id="uploadQR">
            <i class="layui-icon">&#xe67c;</i>上传图书封面
        </button>
        <div class="layui-upload-list">
            <img id="qrshow" src="" alt="" class="layui-upload-img"
                 style="height: 350px;width:250px;border:1px solid black;">
        </div>
        <div id="startDiv">
            <button type="button" class="layui-btn" id="startUploadQR">开始上传</button>
        </div>
        <div style="color: #c2c2c2;margin:10px 0;">温馨提示: 单次仅允许上传一张封面, 仅支持jpg|png|gif|bmp|jpeg类型的图片</div>
    </div>
    <input type="text" name="cli_qrcode" id="qrInput" style="display: none;" lay-verify="required">
</blockquote>
<script src="/layui-v2.5.6/layui/layui.js"></script>
<script>
    layui.use(['form', 'element', 'upload'], function () {
        var form = layui.form;
        var element = layui.element;
        var $ = layui.jquery;
        var upload = layui.upload;

        //单文件示例  选完文件后不自动上传
        var uploadSingle = upload.render({
            elem: '#uploadQR'
            , url: '/php/upload.php'
            , accept: 'images'  // 允许上传的文件类型
            , acceptMime: 'image/*'
            , exts: 'jpg|png|gif|bmp|jpeg'
            , auto: false
            , bindAction: '#startUploadQR'
            , choose: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#qrshow').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res, index, upload) {
                if (res.code == 1) {
                    //上传成功
                    var startDiv = $('#startDiv');
                    startDiv.html('<span style="color: #5FB878;">上传成功</span>');
                    bookimgsrc = res.src.substring(2);
                    //console.log(bookimgsrc);
                    localStorage.setItem('bookimgsrc',bookimgsrc);
                } else {
                    this.error(index, upload);
                }
            }
            , error: function (index, upload) {
                //演示失败状态，并实现重传
                var startDiv = $('#startDiv');
                startDiv.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload" style="width:50px;height:30px;text-align:center;line-height:30px;">重试</a>');
                startDiv.find('.demo-reload').on('click', function () {
                    uploadSingle.upload();
                });
            }
        });
    });
</script>
</body>
</html>