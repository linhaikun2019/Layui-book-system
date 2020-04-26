<?php
header("Content-type:application/json");
$con = mysqli_connect("localhost","root","root","library");
mysqli_select_db($con,"library");
mysqli_query($con,"SET NAMES UTF8");
$page=$_GET['page'];
$table_id = $_GET['table_id'];
$student_id = $_GET['student_id'];
$student_name = $_GET['student_name'];
$student_sex = $_GET['student_sex'];
$student_age = $_GET['student_age'];
$student_phone = $_GET['student_phone'];
$student_mail = $_GET['student_mail'];
$lendcount = $_GET['lendcount'];
//更新数据
$add = "UPDATE librarycms_studentmanage SET studentid='$student_id',studentname='$student_name',studentsex='$student_sex',studentage='$student_age',studentphone='$student_phone',studentmail='$student_mail',lendcount='$lendcount' WHERE id='$table_id'";
$result_add = mysqli_query($con,$add);
//-------分页开始-------
$count = "select * from librarycms_studentmanage ORDER BY id ASC";
$result = mysqli_query($con,$count);
$num = mysqli_num_rows($result);
$limit=$_GET['limit'];
$offset=($page-1)*$limit; //偏移量

//--------分页结束-------
$result=mysqli_query($con,$count);
$sql="select * from librarycms_studentmanage ORDER BY id ASC limit ".$offset.','.$limit;
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