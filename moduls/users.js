    $(document).ready(function () {
  



    //   .............view modal ......

     $(document).on("click", "#btnveiw" , function(e){
     
     e.preventDefault();
     console.log("is waking now");

       $('.on-modal').css("opacity ", 1);
       $('.on-modal').css("visibility", 'visible');
       $('.on-modal').css("top",'0');

       let user_Id  = $(this).attr("user_id");
       console.log(user_Id);
       $.ajax({
        type: "post",
        url: "../Api/view.php",
        data: {"user_id":user_Id},
        dataType: "html",
        success: function (response) {
             console.log(response);
             $(".modal-box").html(response);
        },error:function(response){
            console.log(response);
        }
       });

     })

     $(document).on("click", ".modal-btn" , function(e){
     
        e.preventDefault();
        console.log("is waking now");
   
          $('.on-modal').css("opacity ", 0);
          $('.on-modal').css("visibility", 'hidden');
          $('.on-modal').css("top",100);
   
        })



        

// ..............seach ...

    // $('#search_query').on('input', function() {
    //     const query = $(this).val();

    //     // Make sure the input is not empty
    //     if (query.length > 0) {
    //         $.post('../Api/search.php', { 'search_query': true }, function(data) {
    //             $('#insert-from').html(data); // Display the results
    //         });
    //     } else {
    //         $('#insert-from').empty(); // Clear results if the input is empty
    //     }
    // });

    // $('#search_query').on("keyup", function(){
    //     var getName = $(this).val();
    //     $.ajax({
    //       method:'POST',
    //       url:'../Api/search.php',
    //       data:{'search_query': true },
    //       dataType: "html",
    //       success:function(response)
    //       {

    //            $("#insert-from").html(response);
    //       } 
    //     });
    //   });

        $('#search_query').keyup(function(){
            var input = $(this).val();
            ///alert(input); 

            if(input =! "" ){


                $.ajax({
                    method: "post",
                    url:'../Api/search.php',
                    data: {input:input},
                    // dataType: "dataType",
                    success: function (response) {
                        $("#insert-from").html(response);
                    }
                });

            }else{
                  
            }
        })



        $('#search_query').keyup(function(){
            var input=$(this).val();
            if(input.trim() === ""){

           
            //     $.ajax({
            //     method: 'POST',
            //     url: 'fetch_all.php', // You need to create this file to return all data
            //     success: function(response){
            //         $("#insert-from").html(response);
            //     }
            // });
        read();
        }
        else{
            $.ajax({
                method:'POST',
            
                url:'../Api/search.php',
                data:{user_name:input},
                success:function(response){
                    $("#tbody").html(response);

                }
            })
        }
        })



 
    
// ............insert ...........,
$("#insert-from").on("submit", function (e) { 
    e.preventDefault();

            // console.log("submi");
    
                let sendData = new FormData(this);
                  sendData.append("insert",true);
        $.ajax({
            type: "POST",
            url: "../Api/insert.php",
            data: sendData,
            dataType: "json",
            processData: false,
            contentType:false,
            success: function (response) {
               console.log(response);
            //    console.log(data);
            if(response.status == "success"){
                Swal.fire({
                    title: "sucess!",
                    text: response.message,
                    icon: "success"
                  
                  });
                  read() ;

            }  
           if (response.status == "error"){
                Swal.fire({
                    title: "error!",
                    text: response.message,
                    icon: "error"
                  
                  });


            }
                
            }, error: function(response,data){
                console.log(response);
               


            }
        });
    });

    





    // ................user-list............
    read() ;
               
           function  read() {

              
    $.ajax({
        type: "post",
        url: "../Api/read.php",
        data: {'read':true},
        dataType: "html",
        success: function (response) {
         
             
             
            // console.log(response);
             $('#tbody').html(response);

        },error :function(response){
             console.log(response)
          
        }
    });
                 
}  

// ..........request update ,,,,,,,,


     $(document).on("submit","#update-from",function(e){
        e.preventDefault();
         console.log("is woking");

         let sendData = new FormData(this);
          sendData.append("update",true);


         $.ajax({
            type: "post",
            url: "../Api/update.php",
            data: sendData,
            dataType: "json",
            contentType : false,
            processData: false,
            success: function (response) {
                if(response.status = "success"){

                    Swal.fire({
                        title: "sucess!",
                        text: response.message,
                        icon: "success"
                      
                      });
                      read();

                }
                else if(response.status == "error"){

                    Swal.fire({
                        title: "error!",
                        text: response.message,
                        icon: "error"
                      
                      });

                }
                
            },error: function(response){
                console.log(response);
            }
         });
     })

// ...................update read ..............

  $(document).on("click","#btnupdate",function(){
    let user_Id = $(this).attr("user_id");
    // console.log(user_Id);
    
    $.ajax({
        type: "post",
        url: "../Api/read_update.php",
        data: {"user_id":user_Id},
        dataType: "html",
        success: function (response) {
            $("#updatemodal1").html(response)

            
            
        }
    });
  })

// ...........delete-..........


     
          
     $(document).on("click","#btndelete",function(){

 

 
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            let id = $(this).attr("user_id");
                 console.log(id);

            $.ajax({
                type: "post",
                url: "../Api/delete.php",
                data: {"user_id":id},
                dataType: "text",
                success: function (response) {
                    
           
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                      
                      });
                      read() ;
                }
            });


        }
      });
    })   
      
})

