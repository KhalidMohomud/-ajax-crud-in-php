$(document).ready(function() {
btn = "insert";
    



 $("#receiptForm").submit(function (e) { 
    e.preventDefault();
    console.log("is waking");

    let name = $("#name").val();
    let classs = $("#class").val();
    let id_number = $("#id_number").val();
    let amount_paid = $("#amount_paid").val();
    let discount = $("#discount").val();
    let balance = $("#balance").val();
    let remark = $("#remark").val();
    let receipt_number = $("#receipt_number").val();
    let date = $("#date").val();

        // let sendData = {
          
            // "name" : name,
            //     "class": classs,
            //     "id_number":id_number,
            //     "amount_paid": amount_paid,
            //     "discount":discount,
            //     "balance":balance,
            //      "remark":remark,
            //       "receipt_number":receipt_number,
            //       "date":date,
            //       "action" : "insertpayment",

                   

        // }
        // if(btn  == "insert"){

        //  sendData = {
        //         "name" : name,
        //         "class": classs,
        //         "id_number":id_number,
        //         "amount_paid": amount_paid,
        //         "discount":discount,
        //         "balance":balance,
        //          "remark":remark,
        //           "receipt_number":receipt_number,
        //           "date":date,
        //             action : "insertpayment",
      
        //     }

        // }else{

        // }
        let form_data= new FormData($("#receiptForm")[0]);

        if(btn =="insert"){
            form_data.append("action","insertpayment");
    
    
        }else{
            
    
        }
     
         $.ajax({
            type: "post",
            url: "../Api/payment.php",
            data:  form_data,
            contentType : false,
            processData: false,
            dataType: "json",
            success: function (message) {
                
                 let status = message.status;
                 let response = message.message;
                 alert(message);
                 console.log(response);
                 console.log(message);
                 if(status.message == "success"){
                      alert(message);
                 }
                 else if(status.message  == "error"){
                    alert(message);
                 }

                 
               

                 console.log(response);
            } , error: function(message){
                 console.log(message);
                 alert(message);
            }
         });
        
    
 });




    read_table();

  function read_table(){
            // $("#tble_payment tbody").html("");

      let sendData = {
         "action": "showDate",
      };
    $.ajax({
        type: "post",
        url: "../Api/payment.php",
        data: sendData,
        dataType: "json",
        success: function (message) {
            // console.log(date);
           let status = message.status;
           let response = message.message;
           console.log(response);


            console.log(response);
           let tr = "";
           let  html = "";

           if(status){
           
            response.forEach (itm =>{
             
             tr+= "<tr>";
               for(let i in itm){
               
                tr += `<td>${itm[i]}</td>`;
                 
               
                // console.log(itm);
                // console.log(i);
               }
               
               tr += `
               <td> 
                   <a href="#" class="btn btn-info update_info" update_id=${itm['id']}>update</a>
                   <a href="#" class="btn btn-danger delete_info"delete_id=${itm['id']}>Delete</a> 
                   <a href="#" class="btn btn-success print_info"print_id=${itm['id']}>print</a>
                 
               </td>`;

               tr+= "</tr>";
            
           });
                $("#tble_payment tbody").append(tr);


           }else{
             console.log("is not working status");
           }            
        },error: function(response){
            console.log(response);
        }
    });

  }






//   delete 
function delet(id){
    let Formdate = {
        "action": "Delete",
        "id":id
    };

    $.ajax({
        type: "post",
        
        url: "../Api/payment.php",
        data:Formdate,
        dataType: "dataType",
        success: function (message) {
            let response = message.message;
            let status = message.status;
            if(status == "success"){
                alert(response);
            }else{
                alert("error",response);
            }
            
        }, error: function(message){
            console.log(message);

        }
    });




}

$("#tble_payment").on("click","a.delete_info",function(){

    let py_id = $(this).attr('delete_id');
    console.log(py_id);
    //  delet(py_id);
    delet(py_id);
  

})
});
