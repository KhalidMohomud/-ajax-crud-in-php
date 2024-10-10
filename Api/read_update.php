<?php





include('../confi/conn.php');


if(isset($_POST['user_id'])){

  
     extract($_POST);

    $update = mysqli_query($conn , "SELECT  * FROM `users` WHERE id = '$user_id'");
    if($update && mysqli_num_rows($update)> 0){

   
      foreach($update  as $row){

      ?>

           <form id="update-from" class="form-group" >
           <input type="hidden"     VALUE = '<?php echo $row['id'] ;?>'    placeholder="Enter User_name" class="form-control my-1"  id="user_id" name="user_id">
            <label >User_ame</label>
            <input type="text" VALUE = '<?php echo $row['user_name'] ;?>' placeholder="Enter User_name" class="form-control my-1"  id="user_name" name="user_name">
            <label >password</label>
            <input type="password" VALUE = '<?php echo $row['password'];  ?>' placeholder="Enter password" class="form-control my-1"  id="password" name="password">
            
            <label >Type</label>
            <select  class="form-control my-1"  name="Type" id="Type" VALUE = '<?php echo $row['Type'] ;  ?>'>
           
              <option value="Adim">Adim</option>
              <option value="customer">customer</option>
            </select>

            <label >Status</label>
            <input type="text" VALUE = '<?php echo $row['status'];  ?>' placeholder="Enter Status" class="form-control my-1"  id="status" name="status">
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>
    </form>

     
       


  <?php


      }
    }
    else{
        echo "errror";
    }

}else{

}

?>