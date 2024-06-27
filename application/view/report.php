<?php
include '../include/header.php';
include '../include/sidebar.php';
include '../include/nav.php'
  ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text mt-4">
                    <h4>All the reports</h4>
                 
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
                </ol>
            </div> -->
        </div>
        <!-- row -->

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">All report</h3>
                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <form id="userForm">
                <div class="row m-2">
                  <div class="col-sm-4">
                    <select name="type" id="type" class="form-control">
                      <option value="" selected >select choice</option>
                      <option value="0" >ALL Tanks</option>
                      <option value="1" >Custom Tanks</option>
                      <option value="custom"> custom of Transactions</option>
                      <!-- <option value="1" >custom Tanks</option>
                      <option value="2" >Unpaid</option> -->

                    </select>
                  </div>
                  <div class="col-sm-4">
                    <input type="date" name="from" id="from" class="form-control">
                  </div>
                  <div class="col-sm-4">
                    <input type="date" name="to" id="to"  class="form-control">
                  </div>
                  <button class="btn btn-info mt-2" id="addNew" type="submit">make report</button>
                </div>
                </form>
                <div id="print_area" >
                <table class="table m-2" id="userTable">
                  <thead>
                    <!-- <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Fee</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>month</th>
                    </tr> -->
                  </thead>
                  <tbody>
          
                  </tbody>
                </table>
              </div>
              <button class="btn btn-success m-2" id="print"><i class="fa fa-print p-2"></i>Print</button>
                
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>
 <!-- Content Wrapper. Contains page content -->
 

<?php
include '../include/footer.php'
  ?>
<script>
$("#from").attr("disabled",true);
$("#to").attr("disabled",true);
$("#type").on("change",function(){
  if($("#type").val()==0){
  $("#userTable tr").html("");

    $("#from").attr("disabled",true);
    $("#to").attr("disabled",true); 
     
    let sendingData = {
      "table":"tank",
      "action":"readReport"
  } 
    $.ajax({
      method: "POST",
      url: "../api/admin.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
          //     // if(r=="fee"){
          //       // if(res[r]==1){
          //     //   tr+=`<td> unpaid </td>`;}
          //     //   tr+=`<td>paid</td>`;
          //     //  }
              th+=`<th> ${r} </th>`;
            }
            

            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})





      }
      else if($("#type").val()==1){
        $("#from").attr("disabled",false);
$("#to").attr("disabled",false);
//         $("#userTable tr").html("");

//   let sendingData = {
//        "fee":"2",
//       "readpaid":"readpaid"
//   } 
//     $.ajax({
//       method: "POST",
//       url: "../include/operations.php",
//       data: sendingData,
//       dataType: "JSON",
//       success:function(data){
//         let status=data.status;
//         let response=data.data
//         let html='';
//         let tr='';
//         let th='';
//         if(status){
//           response.forEach(res=>{
//            th="<tr>";
//             for(let r in res){
//           //     // if(r=="fee"){
//           //       // if(res[r]==1){
//           //     //   tr+=`<td> unpaid </td>`;}
//           //     //   tr+=`<td>paid</td>`;
//           //     //  }
//               th+=`<th> ${r} </th>`;
//             }
            

//             th+="</tr>";
//             tr+="<tr>";
//             for(let r in res){
//              if(r=="fee"){
//               if(res[r]==2){
//                 tr+="<td>paid</td>"
//               }
//               else
//               tr+="<td>unpaid</td>"
//              }
//              else
//               tr+=`<td> ${res[r]} </td>`;
//             }
            

//             tr+="</tr>";
//           })
//           $("#userTable thead").append(th);
//           $("#userTable tbody").append(tr);
          
//         }
//         else{

//           alert(response);
//         }
//       },
//       error: (response)=>{
// console.log(response)
//       }

// })
      }
      else if($("#type").val()==2){
        $("#from").attr("disabled",true);
    $("#to").attr("disabled",true); 
        $("#userTable tr").html("");
  let sendingData = {
       "fee":"1",
      "readpaid":"readpaid"
  } 
    $.ajax({
      method: "POST",
      url: "../include/operations.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
          //     // if(r=="fee"){
          //       // if(res[r]==1){
          //     //   tr+=`<td> unpaid </td>`;}
          //     //   tr+=`<td>paid</td>`;
          //     //  }
              th+=`<th> ${r} </th>`;
            }
            

            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})
      }
  else{
      $("#from").attr("disabled",false);
      $("#to").attr("disabled",false);
       }
})
$("#print").on("click",function(){
    print();
})
function print(){
  let printArea=document.querySelector("#print_area");
  let newWindow=window.open("");
  newWindow.document.write(`<html><head><title></title>`);
  newWindow.document.write(`<style media="print">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
  body{
    font-family: 'Poppins', sans-serif;
  }
  table{width:100%}
  th{background-color:#04AA6D !important;
     color:white !important;
     
    }
    th , td{
      padding:15px !important;
      text-align:left !important;
    }
    th , td {
      border-bottom:1px solid #ddd !important;
    }
  </style>`);
  
  newWindow.document.write(`</head><body>`);
  newWindow.document.write(`<img width="100%;" height="200px;" src=''>`)
  newWindow.document.write(printArea.innerHTML);
  newWindow.document.write(`</body></html>`);

  newWindow.print();
  newWindow.close();
}
$("#userForm").on("submit",function(event){
  event.preventDefault();
  if($("#type").val()==1){
    $("#userTable tr").html("");
  let from = $("#from").val();
  let to = $("#to").val();
  let sendingData = {
      "from":from,
      "to":to,
      "action":"readTank"
  } 
    $.ajax({
      method: "POST",
      url: "../api/admin.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
              th+=`<th> ${r} </th>`;
            }
            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})
  }else{
    $("#userTable tr").html("");
  let from = $("#from").val();
  let to = $("#to").val();
  let sendingData = {
      "from":from,
      "to":to,
      "action":"readpay"
  } 
    $.ajax({
      method: "POST",
      url: "../api/admin.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
              th+=`<th> ${r} </th>`;
            }
            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})
  }

 

})

// function fillForm(id){
//   $.ajax({
//           type: "POST",
//           dataType: 'JSON',
//           url: '../include/ajax.php',
//           data: {table:'teachers',id:id,action:'update'},
//           success: function(response)
//           {
//             console.log(response)
//               // var member = JSON.parse(response);
//               // console.log(employee)
//                 // document.querySelector('#employeeid').value=response.response.id
//                 document.querySelector('#name').value=response.response.name
//                 document.querySelector('#id').value=response.response.id
//                 document.querySelector('#dob').value=response.response.dob
//                 document.querySelector('#phone').value=response.response.mobile
//                 document.querySelector('#waqti').value=response.response.shift
//                 document.querySelector('#address').value=response.response.address
   

//          }
//      });
// }
</script>