<?php



include('../confi/conn.php');


if(isset($_POST['user_id'])){
  

    extract($_POST);
    $view =  mysqli_query($conn, "SELECT * FROM users where id = '$user_id'");
    // $res = mysqli_query($conn ,$view);
     if($view &&  mysqli_num_rows($view)>0){

        foreach($view  as $row){


         ?>



          <div class="modal-header">
                            <h3> <?php  echo $row['user_name'] ;   ?> </h3>

                            <div class="modal-btn">
                              <!-- <button> Close</button> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                           </div>
                         
                               <div class="modal-body">
                             <ul>
                              <div>
                                <li><strong> User: ID </strong></li>
                                <li><strong> User: Name </strong></li>
                                <li><strong> User: Type </strong></li>
                                <li><strong> User: Number </strong></li>
                                <li><strong> User: status </strong></li>
                               
                              </div>

                                   <div class="date">
                                   <li><span><?php  echo $row['id'] ;   ?> </span></li>
                                    <li><span>  <?php  echo $row['user_name'] ;   ?> </span></li>
                                    <li><span>  <?php  echo $row['Type'] ;   ?> </span></li>
                                    <li><span><?php  echo $row['number'] ;   ?></span></li>
                                    <li><span> <?php  echo $row['date'] ;   ?> </span></li>
                                   </div>
                             </ul>
                               </div>


                                     
                                   


<?php

        }

     }




}




?>