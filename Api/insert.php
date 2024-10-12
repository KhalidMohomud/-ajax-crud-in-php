<?php
header("Content-type: appliction/json");


include('../confi/conn.php');


if(isset($_POST['insert'])){
  extract($_POST);
  // echo json_encode(["status"=>"success", "message"=>"is working"]);
     

      $oll_read  = mysqli_query($conn , "SELECT * FROM `users` WHERE user_name ='$user_name'");
      if($oll_read = mysqli_num_rows($oll_read)>0){
           echo json_encode(["status"=>"error", "message"=>"User_name oll read has taken"]);
         
      }
      else{


      



   $insert = mysqli_query($conn,"INSERT INTO users( user_name, password, Type, status) VALUES(
    '$user_name','$password','$Type','$status')");
    if($insert){
      echo json_encode(["status"=>"success", "message"=>"Insert is success"]);
      
    }else{
      echo json_encode(["status"=>"error", "message"=>mysqli_connect_error()]);
    }
  }

  // if($user_name == NULL || $password == NULL || $status == NULL ||  $Type == NULL){

  //     echo json_encode(["status"=>"error","message"=>"all falis are requers"]);
  // }
  
  // else{
  //         echo json_encode(["status"=>"success", "message"=>"is working"]);



  // }
    

     
}else{

    echo json_encode(['status'=>"error","message"=>mysqli_connect_error()]);
}









// function generedID($conn){

//    $NewId = '';
//    $date = array();
//   //  $array_date = array();
//    extract($_POST);

//     $query = "select *FROM  users ORDER by users.id  Desc limit 1";

//      $result = $conn->query($query);
//      if($result){

//      $num_rows = $result->num_rows;

//       if($num_rows > 0){
//         $row =  $result->fetch_assoc();
//         $NewId = ++ $row['id'];

//       }
//       else{
//         $NewId  = " MM00001";
//       }

//        $date = array("status"=>"success","date"=>$NewId);
//      }
//      else{
//       $date = array("status"=>"error","date"=>"error");
//      }
//      echo json_encode($date);
// }
// function generate($conn){
  
//   $NewId = "";
//   $sql = "select*from users order by"

// }





if(isset($_POST['action'])){
$action = $_POST['action'];
  $action($conn);


   
}else
{
  echo json_encode(array("status" => false, "data" => "Actionka ayaa loo bahan yahay"));
}
// if(isset($_POST['action'])){ 
//   $action = $_POST['action']; 
//     $action($conn);
// }else{

//   // hadii kalana waa inla dhahaa actionka walaga rabaa
//   echo json_encode(array("status" => false, "data" => "Actionka ayaa loo bahan yahay"));
// }


?>