<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    require_once('koneksi.php');
    $sql = "SELECT * FROM users WHERE (email='$username' AND password='$password') 
    OR (phonenumber='$username' AND password='$password')";
    $r =mysqli_query($con,$sql);
    $result = array();
    $row = mysqli_fetch_array($r);
    if($row['email']!=null || $row['phonenumber']!=null){
        array_push($result,array(
            "status"=>"succes",
            "fullname"=>$row['fullname'],
            "email"=>$row['email'],
            "phonenumber"=>$row['phonenumber'],
            "password"=>$row['password']
        ));
        echo json_encode(array('result'=>$result));

    }else{
        array_push($result,array(
            "status"=>"failed",
            "notes"=>"User tidak di temukan"
        ));
        echo json_encode(array('result'=>$result));
    }
}
?>