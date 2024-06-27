<?php
include '../include/header.php';
include '../include/sidebar.php';
include '../include/nav.php'
    ?>


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text mt-4">
                    <h4>List Of Warning</h4>
                 
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">

                        <!-- <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right add">Add New Tank</button> -->
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>warning</th>
                                        <th>date</th>
                                        
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<!-- <div class="modal fade adminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->

<div class="modal fade tankModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Tank </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <!-- <label for="recipient-name" class="col-form-label">name:</label> -->
                        <input type="hidden" class="form-control id" placeholder="@username" 
                            required>
                    </div>
                <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">note:</label>
                        <input type="text" class="form-control note" placeholder="@username" 
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">quantity</label>
                        <input type="text" class="form-control quantity" placeholder="quantity" 
                            required>
                    </div>
                

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">save</button>
            </div>
        </div>
    </div>
</div>
<?php
include '../include/footer.php';
?>
<script src='../../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(() => {

        $(document).on("click", ".deletetank", function() {
        
            var id = $(this).attr('delID')
            alert(id);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            data: {
                                "id": id,
                                "action": "deleteTank"
                            },
                            url: "../api/tank.php",
                            success: (res) => {
                                swal("Data Has Been removed!", {
                                    icon: "success",
                                });
                                readTank();
                            },
                            error: (res) => {
                                console.log(res)
                            }

                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });

        })
        $(".save").click(() => {
            // alert("click")
                if ($(".note").val() == "") {
                    displayToast("all fields are required", "error", 2000);
                } else if ($(".quantity").val() == "") {
                    displayToast("all fields are required", "error", 2000);
                }else {
                    // alert("Click");

                    if ($(".save").text() == "save") {
                        data={
                            note: $(".note").val(),
                            quantity: $(".quantity").val(),
                            action:"createTank"
                        }
                        $.ajax({
                                    method: "POST",
                                    dataType: "JSON",
                                    data: data,
                                    url: "../api/tank.php",
                                    success: (res) => {
                                        readTank();
                                        $(".tankModal").modal("hide");
                                        displayToast("tank Was updated Successfully 🔥", "success", 2000);
                                        console.log(res);
                                    },
                                    error: (error) => {
                                        displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                                        console.log(error);
                                    }
                                })


                    } else {
                        data={
                            id:$('.id').val(),
                            note: $(".note").val(),
                            quantity: $(".quantity").val(),
                            action:"updateTank"
                        };
                                $.ajax({
                                    method: "POST",
                                    dataType: "JSON",
                                    data: data,
                                    url: "../api/tank.php",
                                    success: (res) => {
                                        readTank();
                                        $(".tankModal").modal("hide");
                                        displayToast("user Was updated Successfully 🔥", "success", 2000);
                                        console.log(res);
                                    },
                                    error: (error) => {
                                        displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                                        console.log(error);
                                    }
                                })


                        }
                    }



                

            });
          

        $(".add").click(() => {
            $(".tankModal").modal("show")
            clearInputData(
                $(".note"),
                $(".quantity"),
            );
            $(".save").text("save");

        });



   $(document).on('click','.editank',function(){
     var id = $(this).attr('editID');
     alert(id);
            fetchUserData(id)

   })

   $(".showPass").on("change", function(e) {
            showAndHidePass(e.target.checked, $(".password"));
        })

   const fetchUserData = (id) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "fetchingOne",
                    "id": id,
                },
                url: "../api/tank.php",
                success: (res) => {
                  
                    console.log(res)
                    $('.note').val(res.data[0].note)
                    $('.quantity').val(res.data[0].quantity)
                    $('.id').val(res.data[0].id)
                    $('.save').text("Edit")
                    $(".tankModal").modal("show")
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }

        const readTank = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "readLevel"

                },
                url: "../api/tank.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    data.forEach(value => {
                        tr += `<td>${value.NO}</td>`
                        tr += `<td>${value.Warning}</td>`
                         tr += `<td>${value.DateTime}</td>`
                        

                    // tr += `<td>
                    //     <a class='btn btn-danger text-light deletetank' delID=${value.id}><i class="fa-solid fa-xmark"></i></a>
                    //     <a class='btn btn-success text-light editank' editID=${value.id}><i class="fa-solid fa-pen-to-square"></i></a>
                        
                    //     </td>`
                        tr += '</tr>'
                    })
                    $(".table tbody").html(tr);
                    $(".table").DataTable();

                    console.log("data is ", data)
                },
                error: (res) => {
                    console.log("There is an error")
                    console.log(res)
                },
            })
        }
        readTank();

        function showAndHidePass(checkBox, htmlInput) {
  if (checkBox) htmlInput.attr("type", "text");
  else htmlInput.attr("type", "password");
}
    })

    function displayToast(message, type, timeout) {
            if (type == "error") {
                iziToast.error({
                    title: 'Error Encountered! ',
                    message: message,
                    backgroundColor: "#D83A56",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "success") {
                iziToast.success({

                    message: message,
                    backgroundColor: "#54B435",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "ask") {
                iziToast.question({
                    timeout: timeout,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: "Condirm!",
                    message: message,
                    position: 'topRight',
                    titleColor: "#86E5FF",
                    messageColor: "white",
                    backgroundColor: "#0081C9",
                    iconColor: "white",
                    buttons: [
                        ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function(instance, toast) {
                            alert("Ok Deleted...");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }, true],
                        ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function(instance, toast) {
                            alert("Retuned");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }],
                    ],
                    onClosing: function(instance, toast, closedBy) {
                        //  console.info('Closing | closedBy: ' + closedBy);
                    },
                    onClosed: function(instance, toast, closedBy) {
                        // console.info('Closed | closedBy: ' + closedBy);
                    }
                });
            }
        }
      
        function containsOnlyAlphanumeric(username) {
  const pattern = /^[a-zA-Z][a-zA-Z0-9]*$/;

  return pattern.test(username);
}

function clearInputData(...inputs) {
            inputs.forEach(input => {
                input.val("");
            })
        }
        function emailVerify(email) {
  // Regular expression for validating an Email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;

  // Test the email against the regular expression
  return emailRegex.test(email);
}
function adminCheck(email,table, callback) {
  console.log("the data is ", email,  table);
  data = {
    email: email,
    
    table: table,

    action: "validateUser",
  };
  $.ajax({
    method: "POST",
    dataType: "json",
    data: data,
    url: "../api/admin.php",
    success: (res) => {
      callback(res.isFound);
    },
    error: (err) => {
      console.log("the data is ", email,table);
      console.log(err);
      callback(false); // Assuming you want to handle errors by passing false
    },
  });
}
</script>

