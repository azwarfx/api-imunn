<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $qrResult = $_POST['qrresult'];
        require_once('koneksi.php');
        $insertQr = "INSERT INTO registerqr(qrresult) VALUES('$qrResult')";
        $result = array();
        if(mysqli_query($con,$insertQr)){
            array_push($result,array(
                "status"=>"succes",
                "result"=>$qrResult
            ));
            echo json_encode(array('result'=>$result));
        }
        // $result=array();
        // $row = mysqli_fetch_array($r);
        // array_push($result,array(
        //     "status"=>"succes",
        //     "result"=>$row['qrresult']
        // ));
        // $r=mysqli_query($con,$insertQr);
        // $result=array();
        // $row = mysqli_fetch_array($r);
        // array_push($result,array(
        //     "status"=>"succes",
        //     "result"=>$row['qrresult']
        // ));
        mysqli_close($con);
    }
?>