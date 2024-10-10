<?php


header("Content-type: appliction/json");


include('../confi/conn.php');



 if(isset($_POST['update'])){

     extract($_POST);

    $update =  mysqli_query($conn , "UPDATE `users` SET `user_name`='$user_name'
    ,`password`='$password',`Type`='$Type',`status`='$status' WHERE  id = '$user_id'");
    if($update){

        echo json_encode(["status"=>"success","message"=>"success for update"]);
    }
    else{
        echo json_encode(["status"=>"error","message"=>mysqli_connect_error()]);
    }
 }else{


    echo json_encode(["status"=>"error","message"=>mysqli_connect_error()]);
 }



?>