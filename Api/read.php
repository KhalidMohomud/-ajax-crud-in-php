<?php

header("Content-type: appliction/json");


 include('../confi/conn.php');




if(isset($_POST['read'])){

    $real_all = mysqli_query($conn, "SELECT * FROM users");

    if($real_all && mysqli_num_rows($real_all)>0){
        // echo "we get data";
        foreach($real_all as $row){

            ?>

              
              <tr>
                <td> <?php echo $row['id'];  ?></td>
                <td> <?php echo $row['user_name']; ?></td>
                <td> <?php echo $row['Type']; ?></td>
                <td> <?php echo $row['status']; ?></td>
                <td> <?php echo $row['date']; ?></td>
                <td> <button id = "btnveiw" user_id = " <?php  echo $row['id'] ?>"  class = "btn btn-info text-light">View</button></td>
                <td> <button id="btnupdate"  data-bs-toggle="modal" data-bs-target="#updatemodal"  user_id =  " <?php  echo $row['id'] ?>"      class = "btn btn-primary text-light">update</button></td>
                <td> <button id = "btndelete" user_id = " <?php  echo $row['id'] ?>"  class = "btn btn-danger text-light">delete</button></td>
                <td> <button id = "btndelete" user_id = " <?php  echo $row['id'] ?>"  class = "btn btn-success text-light">PRINT</button></td>
                
              </tr>

             <?php



             
        }
    }
    else{
        echo "Invelide You Date";

    }

    echo json_encode(["status"=>false,"message"=>$conn->error]);

}

?>