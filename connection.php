<?php
$server= "localhost";
$user="root";
$password="";
$db="fileuploaddata";

$con = mysqli_connect($server,$user,$password,$db);
if($con){
    echo "connection successful";
}
else{
    echo 'connection not linked';
}
?>