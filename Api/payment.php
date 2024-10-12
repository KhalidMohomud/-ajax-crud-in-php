<?php
header("Content-type: /apliction/json");


include("../confi/conn.php");

if(isset($_POST['action'])){
    $action = $_POST['action'];
   
    switch ($action) {
        case 'insertpayment':
            insertPayment($conn); 
            break;
         case "showDate":
            showDate($conn);   

        }
}else{
    echo json_encode(["status"=>"error","message"=> "action is requered"]);
}


function insertpayment($conn){

    extract($_POST);
    $insert = " INSERT INTO `receipts`( `name`, `class`, `id_number`, `amount_paid`, `discount`, `balance`, `remark`, `receipt_number`, `date`)
    VALUES('$name','$class','$id_number','$amount_paid','$discount','$balance','$remark','$receipt_number','$date')";
    $reselt = $conn->query($insert);
    if($reselt){
        echo json_encode(["status","success","message"=>"Sucess of Insert"]);
    }
     else{
        echo json_encode(["status","error","message"=>$conn->error()]);
     }

}


function showDate($conn){
    extract($_POST);
    $date = array();
    $display = array();
    $read = "SELECT*FROM receipts";
    // $result=$conn->query($query);
    $rest=$conn->query($read);
    if($rest){
     
       while(  $rows = $rest->fetch_assoc()){
           $date  [] =  $rows;
       }
       $display = array("status"=>true,"message"=>$date);
    }else{
        $display = array("status"=>false,"message"=>$conn->error());
    }

    echo json_encode($display);
}

function Delete($conn){
    extract($_POST);
    $delete = " SELECT * FROM `receipts`  where id = '$id";
    $reselt = $conn->query($conn);
    if($reselt){

        echo json_encode(["status"=>"success","message"=>"success of update"]);
    }else{
        echo json_encode(["status"=>"error","message"->$conn->error()]);
    }
}

?>