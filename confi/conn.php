<?php
// $conn = new  mysqli("localhost","root","","school_manage");

// if($conn->connect_error){
//     echo $conn->error;
// }else{
//     // echo "Success";
// }



$conn = mysqli_connect("localhost","root","","school_manage");
if($conn){

}else{
    echo mysqi_connect_error();
}


?>

