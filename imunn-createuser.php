<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

require_once('koneksi.php');

//check ke database apakah user telah digunakan
$checkUser = "SELECT * FROM users WHERE email='$email'";
$r = mysqli_query($con,$checkUser) ;
$result = array();
$row = mysqli_fetch_array($r);
 if($row['email']!=null){
     array_push($result,array(
         "status"=>"failed",
         "id"=>$row['id']
     ));
     echo json_encode(array('result'=>$result));
 }else{
   $insertUsers = "INSERT INTO users (fullname,email,phonenumber,password) VALUES ('$fullname','$email','$phonenumber','$password')";
   if(mysqli_query($con,$insertUsers)){
        array_push($result,array(
            "status"=>"succes",
            "fullname"=>$fullname,
            "email"=>$email,
            "phonenumber"=>$phonenumber
        ));
        echo json_encode(array('result'=>$result));
        echo 'Berhasil Menambahkan Users';
   }else{
    array_push($result,array(
        "status"=>"succes",
        "fullname"=>$fullname,
        "email"=>$email,
        "phonenumber"=>$phonenumber
    ));
    echo json_encode(array('result'=>$result));
       echo 'gagal insert users';
   }
   
 }
mysqli_close($con);
}
?>