<?php 
include 'connection.php';
if(isset($_POST['submit'])){
    $model =$_POST['model'];
    $number =$_POST['number'];
    $file =$_FILES['file'];
    //print_r($file);
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    if($fileerror ==  0){
        $destfile ='update/'.$filename;
        move_uploaded_file($filepath,$destfile);
    
       $insertquery= "INSERT INTO fileuploadtable (`model`, `number`, `file`, `date`) VALUES ('$model', '$number', '$destfile', current_timestamp())";

        $query = mysqli_query($con,$insertquery);
        if($query){
            $msg = '<h5>Device Firmware Updated</h5>';
            header('location:index.php?msg='.$msg);
        }
        else{
            die("unable to insert data");
        }
    }
}


?>