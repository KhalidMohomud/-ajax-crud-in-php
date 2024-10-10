<?php

include('../confi/conn.php');




$user_name=$_POST['user_name'];
// extract($_POST);
$sql="select *from users where user_name  Like '$user_name%'";
//$sql = mysqli_query($conn , "SELECT * FROM users WHERE user_name   LIKE '$user_name%'");
$query=mysqli_query($conn,$sql);
$data='';
while($row=mysqli_fetch_assoc($query)){

    $data .= "<tr> 
    <td>" . $row['id'] . "</td>
    <td>" . $row['user_name'] . "</td>
    <td>" . $row['Type'] . "</td>
    <td>" . $row['status'] . "</td>
    <td>" . $row['date'] . "</td>

         <td>
        <button id='btnveiw' user_id='" . $row['id'] . "'  class = btn btn-info text-light'>View</button>
    </td>


    <td>
        <button id='btnupdate' data-bs-toggle='modal' data-bs-target='#updatemodal' user_id='" . $row['id'] . "' class='btn btn-primary text-light'>Update</button>
    </td>
    <td>
        <button id='btndelete' user_id='" . $row['id'] . "' class='btn btn-danger text-light'>Delete</button>
    </td>

        <td>
        <button id='btndelete' user_id='" . $row['id'] . "' class='btn btn-success text-light'>Print</button>
    </td>
</tr>";

 
}

echo $data;
















?>
