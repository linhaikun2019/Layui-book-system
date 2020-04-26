<?php
header("Content-type:application/json");
$con = mysqli_connect("localhost","root","root","library");
mysqli_select_db($con,"library");
mysqli_query($con,"SET NAMES UTF8");
$page=$_GET['page'];
$book_id = $_GET['book_id'];
$str = implode("','",$book_id);//拼接字符
mysqli_query($con,"ALTER TABLE library_booklend auto_increment=1");
//更新booklend表
mysqli_query($con, "UPDATE library_booklend SET surpluscount=surpluscount+1 WHERE bookid in ('$str')");
//更新bookmanage表
mysqli_query($con, "UPDATE librarycms_bookmanage SET surpluscount=surpluscount+1 WHERE bookid in ('$str')");
//删除数据
mysqli_query($con,"DELETE FROM library_mylend WHERE bookid in ('{$str}')");
//-------分页开始-------
$count = "select * from library_mylend ORDER BY id ASC";
$result = mysqli_query($con,$count);
$num = mysqli_num_rows($result);
$limit=$_GET['limit'];
$offset=($page-1)*$limit; //偏移量

//--------分页结束-------
$result=mysqli_query($con,$count);
$sql="select * from library_mylend ORDER BY id ASC limit ".$offset.','.$limit;
$check_quary = mysqli_query($con,$sql);
$jarr = array();

while($rows=mysqli_fetch_assoc($check_quary)){
    $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小
    for($i=0;$i<$count;$i++){
        unset($rows[$i]);//删除冗余数据
    }
    array_push($jarr,$rows);
}

/*$jobj = new stdclass();
foreach($jarr as $key => $value) {
    $jobj->$key = $value;
}

//print_r($jobj);

$json = json_encode($jobj);*/

$temp=array();

$temp['code']=0;
$temp['msg']='';
$temp['count']= $num;
$temp['data']=$jarr;

$fina = json_encode($temp);
echo $fina;

return $fina;
?>