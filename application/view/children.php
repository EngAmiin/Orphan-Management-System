<?php
include '../include/header.php';
include '../include/sidebar.php';
include '../include/nav.php';
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text mt-4">
                    <h4>List Of Tanks</h4>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">

                        <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right add">Add New Admin</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>cildren name</th>
                                        <th>Birth</th>
                                        <th>year of enrollement</th>
                                        <th>class</th>
                                        <th>sponsered</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
<div class="modal fade levelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User (Only Admin Based)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">name:</label>
                        <input type="text" class="form-control name" placeholder="@name" required>
                    </div>
                    <div class="mb-3">
                        <!-- <label for="recipient-name" class="col-form-label">name:</label> -->
                        <input type="hidden" class="form-control id" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">DOB:</label>
                        <input type="date" class="form-control dob" placeholder="@username" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">ENROLLMENT</label>
                        <input type="text" class="form-control enroll" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">class</label>
                        <input type="number" class="form-control class" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Story</label>
                        <input type="text" class="form-control story" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">image</label>
                        <input type="file" class="form-control image" placeholder="user@gmail.com" required>
                    </div>



                    <!-- <div class="mb-3">
                        <label for="message-text" class="col-form-label">User Type</label> -->
                    <!-- <input type="text" class="form-control status" value="active" placeholder="status" disabled> -->
                    <!-- <select name="" id="" class="form-select type">
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div> -->

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
<!-- Include necessary scripts -->
<script src='../../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!-- Custom CSS for alert -->
<style>
    .fixed-top-alert {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1050;
        display: none;
    }
</style>

<!-- Alert container and audio element -->
<div id="alert-container" class="fixed-top-alert"></div>
<audio id="alert-sound" src="../uploads/reminder.mpeg" preload="auto"></audio>

<script>
    $(document).ready(() => {

        $(document).on("click", ".deleteUser", function () {

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
                                "action": "deletechildren"
                            },
                            url: "../api/children.php",
                            success: (res) => {
                                swal("Data Has Been removed!", {
                                    icon: "success",
                                });
                                readAdmin();
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
        $(document).on('click', '.save', () => {
            //  alert("click")
            if ($(".gender").val() == "") {
                displayToast("all fields are required email", "error", 2000);
            } else if ($(".name").val() == "") {
                displayToast("all fields are required name", "error", 2000);
            }
            else if ($(".password").val() == "") {
                displayToast("all fields are required pass", "error", 2000);
            } else if ($(".city").val() == "") {
                displayToast("all fields are required status", "error", 2000);

            }
            else if ($(".usernames").val() == "") {
                displayToast("all fields are required username", "error", 2000);
            }
            else if ($(".image").val() == "") {
                displayToast("all fields are required type", "error", 2000);
            }
            else {
                // alert("Click");

                if ($(".save").text() == "save") {
                    var data = new FormData();
                    data.append("name", $(".name").val())
                    data.append("dob", $(".dob").val())
                    data.append("enroll", $(".enroll").val())
                    data.append("class", $(".class").val())
                    data.append("story", $(".story").val())
                    data.append("id", $(".id").val())
                    data.append("hasProfile", true)
                    // data.append("id", $(".id").val())
                    data.append("hasProfile", true)
                    data.append("action", "createChildren")
                    data.append("profile_image", $(".image")[0].files[0])
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        processData: false,
                        cache: false,
                        contentType: false,
                        data: data,
                        url: "../api/children.php",
                        success: (res) => {
                            console.log(res);
                            readAdmin();
                            $(".levelModal").modal('hide');
                            displayToast("user Was Added Successfully 🔥", "success", 2000);
                        },
                        error: (error) => {
                            console.log(error);
                            displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                        }
                    })
                }





                else {

                    if ($(".image")[0].files.length > 0) {
                        var data = new FormData();
                        data.append("name", $(".name").val())
                        data.append("dob", $(".dob").val())
                        data.append("enroll", $(".enroll").val())
                        data.append("class", $(".class").val())
                        data.append("story", $(".story").val())
                        data.append("id", $(".id").val())
                        data.append("hasProfile", true)

                        // data.append("action", "createUsers")
                        data.append("profile_image", $(".image")[0].files[0])
                        data.append("action", "updatechildren")
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            processData: false,
                            cache: false,
                            contentType: false,
                            data: data,
                            url: "../api/children.php",
                            success: (res) => {
                                readAdmin();
                                $(".levelModal").modal("hide");
                                displayToast("user Was updated Successfully 🔥", "success", 2000);
                                console.log(res);
                            },
                            error: (error) => {
                                displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                                console.log(error);
                            }
                        })


                    } else {
                        data = {
                            name: $(".name").val(),
                            cdob: $(".dob").val(),
                            enroll: $(".enroll").val(),
                            class: $(".class").val(),
                            story: $(".story").val(),
                            id: $(".id").val(),
                            action: "updatechildren",
                            hasProfile: false
                        }
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            data: data,
                            url: "../api/children.php",
                            success: (res) => {
                                readAdmin();
                                $(".levelModal").modal("hide");
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

            }

        });




        $(".add").click(() => {
            $(".levelModal").modal("show")
            $(".status").val("active")
            $(".status").prop("disabled", true);
            clearInputData(
                $(".name"),
                $(".class"),
                $(".enroll"),
                $(".dob"),
                $(".story")



            );
            $(".save").text("save");

        });



        $(document).on('click', '.editUser', function () {
            var id = $(this).attr('editID');
            alert(id);
            fetchUserData(id)

        })

        $(".showPass").on("change", function (e) {
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
                url: "../api/children.php",
                success: (res) => {
                    // $(".status").prop("disabled", false);
                    console.log(res)
                    $('.name').val(res.data[0].cname)
                    $('.dob').val(res.data[0].cdob)
                    $('.class').val(res.data[0].cclass)
                    $('.enroll').val(res.data[0].cyoe)
                    $('.story').val(res.data[0].cstory)

                    // $('.image').val(res.data[0].picture)

                    $('.id').val(res.data[0].cid)
                    $('.save').text("Edit")
                    $(".levelModal").modal("show")
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }

        const readAdmin = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "Readchildren"
                },
                url: "../api/children.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    data.forEach(value => {
                        tr += `<tr>`;
                        tr += `<td>${value.cid}</td>`;
                        tr += `<td>${value.cname}</td>`;
                        tr += `<td>${value.cdob}</td>`;
                        tr += `<td>${value.cyoe}</td>`;
                        tr += `<td>${value.cclass}</td>`;
                        if (value.sponsored == 1) {
                            tr += `<td>YES</td>`;
                        }
                        else {
                            tr += `<td>NO</td>`;
                        }
                        // tr += `<td>${value.type}</td>`

                        // tr += `<td>${value.status}</td>`
                        //     tr += `<td><a class='btn btn-success editButton text-light fw-bold' editID=${value.admin_id}>Edit</a>
                        //  <a class='btn btn-danger deleteAdmin text-light fw-bold'  delID=${value.admin_id}>Delete</a></td>`
                        tr += `<td>
                        <a class='btn btn-danger text-light deleteUser' delID=${value.cid}><i class="fa-solid fa-xmark"></i></a>
                        <a class='btn btn-success text-light editUser' editID=${value.cid}><i class="fa-solid fa-pen-to-square"></i></a>
                        
                        </td>`
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
        readAdmin();

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
                    ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function (instance, toast) {
                        alert("Ok Deleted...");
                        instance.hide({
                            transitionOut: 'fadeOut'
                        }, toast, 'button');

                    }, true],
                    ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function (instance, toast) {
                        alert("Retuned");
                        instance.hide({
                            transitionOut: 'fadeOut'
                        }, toast, 'button');

                    }],
                ],
                onClosing: function (instance, toast, closedBy) {
                    //  console.info('Closing | closedBy: ' + closedBy);
                },
                onClosed: function (instance, toast, closedBy) {
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
    function adminCheck(email, table, callback) {
        console.log("the data is ", email, table);
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
                console.log("the data is ", email, table);
                console.log(err);
                callback(false); // Assuming you want to handle errors by passing false
            },
        });
    }
</script>

<!-- <script>
    $(document).on('click','.filltank',function(){
        var id =$(this).attr('editId');
      $('.id').val(""),
    $('.quantity').val(""),
      $(".note").val(""),
                    
        $('id').val(id);
        $(".levelModal").modal('show');
    });
    $(document).on('click','.save',function(){
           $.ajax({
                    method: "POST",
                    data: {
                    "id": $('.id').val(),
                    "level":$('.quantity').val(),
                    "note":$(".note").val(),
                    "action": "addLevel"
                     },
                    url: "../api/level_tracking.php",
                    success: (res) => {
                    alert(res);
                    readTableData();
                    $('.levelModal').modal('hide');
                    },
                     error: (res) => {
                            console.log(res)
                         }
                    })
    });
    // Function to read and display table data
    const readTableData = () => {
        $.ajax({
            method: "POST",
            dataType: "JSON",
            data: { "action": "readLevel" },
            url: "../api/level_tracking.php",
            success: (res) => {
                let tr = "";
                const { data } = res;
                data.forEach(value => {
                    tr += `<tr>`;
                    tr += `<td>${value.cid}</td>`;
                    tr += `<td>${value.cname}</td>`;
                    tr += `<td>${value.cdob}</td>`;
                    tr += `<td>${value.cyoe}</td>`;
                    if(value.sponsored==1){
                        tr += `<td>YES</td>`;
                    }
                    else{
                        tr += `<td>NO</td>`;
                    }
                    tr += `<td>
                        <a class='btn btn-success text-light filltank' editID=${value.cid}><i class="fa-solid fa-fill"></i></a>                
                        </td>`
                        tr += `<td>
                        <a class='btn btn-success text-light delete' delID=${value.cid}><i class="fa-solid fa-fill"></i></a>                
                        </td>`
                    tr += `</tr>`;
                });
                $(".table tbody").html(tr);
                $(".table").DataTable();
                console.log("Table data updated at", new Date());
            },
            error: (res) => {
                console.log("There is an error", res);
            },
        });
    };

    // Variable to track if the critical alert is currently displayed
    let criticalAlertVisible = false;

    // Function to check tank level and display alerts
    const checkTankLevel = () => {
        $.ajax({
            method: "POST",
            dataType: "JSON",
            data: { "action": "readLevel" },
            url: "../api/level_tracking.php",
            success: (res) => {
                const { data } = res;
                let showCriticalAlert = false;
                data.forEach(value => {
                    if (value.level_quantity <= 1000) {
                        showCriticalAlert = true;
                        if (!criticalAlertVisible) {
                            Swal.fire({
  icon: "info",
  title: "Oops...",
  text: `please re fill the tank the tank is  ${value.level_quantity}`,
//   footer: '<a href="#">Why do I have this issue?</a>'
});
                            $('#alert-sound')[0].play();
                            $('#alert-container').html(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Critical Warning!</strong> The tank level is critically low (${value.level_quantity}). Please refill the tank.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            `).show();
                            criticalAlertVisible = true;
                            $('#alert-container .close').on('click', () => {
                                criticalAlertVisible = false;
                            });
                        }
                    } else if (value.level_quantity <= 2000) {
                    
                        Swal.fire({
  icon: "info",
  title: "Oops...",
  text: `The tank level is getting low  ${value.level_quantity} Consider refilling soon.`,
//   footer: '<a href="#">Why do I have this issue?</a>'
});
$('#alert-sound')[0].play();

                        toastr(`The tank level is getting low (${value.level_quantity}). Consider refilling soon.`);

                    }
                });
                if (!showCriticalAlert && criticalAlertVisible) {
                    $('#alert-container').hide();
                    criticalAlertVisible = false;
                }
                console.log("Tank level checked at", new Date());
            },
            error: (res) => {
                console.log("There is an error", res);
            },
        });
    };

    // Initial call to readTableData and checkTankLevel
    readTableData();
    checkTankLevel();

    // Set intervals to periodically update table data and check tank levels
    // setInterval(readTableData, 60000); // Update table every 1 minute
    setInterval(checkTankLevel, 12000);
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
        } // Check tank levels every 15 seconds
</script> -->
</body>

</html>