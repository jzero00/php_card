<?php
$db_host="localhost";
$db_user="root";
$db_password="root";
$db_name="safejsp";

$conn = new mysqli($db_host,$db_user,$db_password,$db_name);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//if($db){
//echo "connect: success<br>";
//}else{
//echo "connect: failure<br>";
//}
//$result = mysqli_query($db,'SELECT VERSION() as VERSION');
//$data = mysqli_fetch_assoc($result);
//echo $data['VERSION'];
?>