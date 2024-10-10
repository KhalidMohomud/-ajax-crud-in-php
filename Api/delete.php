<?php

header("Content-type: appliction/json");

include '../confi/conn.php';


if(isset($_POST['user_id'])){

    extract($_POST);
    $query = mysqli_query($conn,"DELETE FROM `users` WHERE id = $user_id");

    if($query){
    
        echo json_encode(["status"=>true,"message"=>"success delete"]);
    }else{
        echo json_encode(["status"=>false,"message"=> mysqli_connect_error()]);
    }

}




?>