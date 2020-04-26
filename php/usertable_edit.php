<?php
header("Content-type:application/json");
$con = mysqli_connect("localhost","root","root","library");
mysqli_select_db($con,"library");
mysqli_query($con,"SET NAMES UTF8");
$page=$_GET['page'];
$table_id = $_GET['table_id'];
$book_id = $_GET['book_id'];
$book_name = $_GET['book_name'];
$writer = $_GET['writer'];
$publishing = $_GET['publishing'];
$publishdate = $_GET['publishdate'];
$price = $_GET['price'];
$totalcount = $_GET['totalcount'];
$surpluscount = $_GET['surpluscount'];
$bookimgsrc = $_GET['bookimgsrc'];
//插入数据
$add = "UPDATE librarycms_bookmanage SET bookid='$book_id',bookname='$book_name',writer='$writer',publishing='$publishing',publishdate='$publishdate',price='$price',totalcount='$totalcount',surpluscount='$surpluscount',bookimg ='$bookimgsrc' WHERE id='$table_id'";
$result_add = mysqli_query($con,$add);
$add1 = "UPDATE library_booklend SET bookid='$book_id',bookname='$book_name',writer='$writer',publishing='$publishing',publishdate='$publishdate',price='$price',surpluscount='$surpluscount',bookimg ='$bookimgsrc' WHERE id='$table_id'";
//插入到mylend表里
$result_add1 = mysqli_query($con,$add1);
//-------分页开始-------
$count = "select * from librarycms_bookmanage ORDER BY id ASC";
$result = mysqli_query($con,$count);
$num = mysqli_num_rows($result);
$limit=$_GET['limit'];
$offset=($page-1)*$limit; //偏移量

//--------分页结束-------
$result=mysqli_query($con,$count);
$sql="select * from librarycms_bookmanage ORDER BY id ASC limit ".$offset.','.$limit;
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