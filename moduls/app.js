
// ................login...............
//  $(".login-from").on("submit",function(event){
//     event.preventDefault()
//  })

    $(".login-from").submit(function (e) { 
        e.preventDefault();
        console.log('wel come');


        let user_name = $("#name").val();
        let password = $("#password").val();

        let sendData = {
         "action":"login",
         "name" : user_name,
         "password":password
        }
      

      $.ajax({
        type: "post",
        url: "../Api/login.php",
        data: sendData,
        dataType: "json",
        success: function (data) {

            let status = data.status;
            let  response = data.data;
      

            if(status){

                Swal.fire({
                    title: "suceess for loging!",
                    
                    icon: "success"
                  });

                   setTimeout (function(){
                    window.location.href = "../page/Dashbout.html";
                   },2000)

            }
            else if(status){
              Swal.fire({
                title: "suceess for loging!",
                
                icon: "error"
              });

            }
            
        }
           , error: function(response){
             console.log("error",response);
         
           }
      });
       
    });


