<?php
error_reporting(0);
header("Content-Type:text/html;charset=utf-8");
//获取需要上传的文件目录
$temdir = $_GET["upfile"];
$uploaddir = "../upload/".$temdir;//设置文件保存目录 注意包含/
$type=array("jpg","gif","bmp","jpeg","png","rar","zip","doc","docx","xls","xlsx");//设置允许上传文件的类型
$patch="/";//程序所在路径

//获取文件后缀名函数
function fileext($filename)
{
    return substr(strrchr($filename, '.'), 1);
}
//生成随机文件名函数
function random($length)
{
    $hash = 'KJ-';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    mt_srand((double)microtime() * 1000000);
    for($i = 0; $i < $length; $i++)
    {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}
$a=strtolower(fileext($_FILES['file']['name']));
//判断文件类型
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type))
{
    $text=implode(",",$type);
    //echo "您只能上传以下类型文件: ",$text,"<br>";
    //echo $_FILES['file']['name'];
    exit("ERROR");
}
//生成目标文件的文件名
else{
    $filename=explode(".",$_FILES['file']['name']);
    do
    {
        $filename[0]=random(10); //设置随机数长度
        $name=implode(".",$filename);
        //$name1=$name.".Mcncc";
        $uploadfile=$uploaddir.$name;
    }
    while(file_exists($uploadfile));
    if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)){
        //$uploadfile=str_replace("../","/",$uploadfile);
        $arr=array("code"=>1,"msg"=>"上传成功","src"=>$uploadfile);
        $myfile = fopen("file.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $uploadfile);
        fclose($myfile);
    }
    else
    {

        $arr=array("code"=>0,"msg"=>"上传失败");

    }
    echo json_encode($arr);
}

?>