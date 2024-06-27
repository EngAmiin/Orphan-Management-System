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
                    <h4>List Of admins</h4>

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

                        <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right add">Add New Admin</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>password</th>
                                        <th>username</th>
                                        <th>gender</th>
                                        <th>city</th>
                                        <th>Action</th>
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

<div class="modal fade userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control username" placeholder="@username" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">city</label>
                        <input type="text" class="form-control city" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">state</label>
                        <input type="text" class="form-control state" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">birth date</label>
                        <input type="date" class="form-control bod" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">image</label>
                        <input type="file" class="form-control image" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">password</label>
                        <input type="password" class="form-control password" placeholder="@password" required>
                        <!-- <input type="text" hidden class="form-control id" > -->
                    </div>
                    <div class="mb-3" style="display: flex; align-items: center;">
                        <input type='checkbox' class='showPass mr-2' id="show" />
                        <label for="show" class="col-form-label">
                            Show Password
                        </label>

                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Gender</label>
                        <!-- <input type="text" class="form-control status" value="active" placeholder="status" disabled> -->
                        <select name="" id="" class="form-select gender">
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
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
<script src='../../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>


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
                                "action": "deleteUsers"
                            },
                            url: "../api/admin.php",
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
                    data.append("gender", $(".gender").val())
                    data.append("password", $(".password").val())
                    data.append("username", $(".username").val())
                    data.append("city", $(".city").val())
                    data.append("bod", $(".bod").val())
                    data.append("state", $(".state").val())
                    // data.append("id", $(".id").val())
                    data.append("hasProfile", true)
                    data.append("action", "createUsers")
                    data.append("profile_image", $(".image")[0].files[0])
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        processData: false,
                        cache: false,
                        contentType: false,
                        data: data,
                        url: "../api/admin.php",
                        success: (res) => {
                            console.log(res);
                            readAdmin();
                            $(".userModal").modal('hide');
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
                        data.append("gender", $(".gender").val())
                        data.append("password", $(".password").val())
                        data.append("username", $(".username").val())
                        data.append("city", $(".city").val())
                        data.append("bod", $(".bod").val())
                        data.append("state", $(".state").val())
                        data.append("id", $(".id").val())
                        data.append("hasProfile", true)

                        // data.append("action", "createUsers")
                        data.append("profile_image", $(".image")[0].files[0])
                        data.append("action", "updateUsers")
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            processData: false,
                            cache: false,
                            contentType: false,
                            data: data,
                            url: "../api/admin.php",
                            success: (res) => {
                                readAdmin();
                                $(".userModal").modal("hide");
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
                            gender: $(".gender").val(),
                            password: $(".password").val(),
                            username: $(".username").val(),
                            state: $(".state").val(),
                            city: $(".city").val(),
                            id: $(".id").val(),
                            action: "updateUsers",
                            hasProfile: false
                        }
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            data: data,
                            url: "../api/admin.php",
                            success: (res) => {
                                readAdmin();
                                $(".userModal").modal("hide");
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
            $(".userModal").modal("show")
            $(".status").val("active")
            $(".status").prop("disabled", true);
            clearInputData(
                $(".username"),
                $(".email"),
                $(".password"),
                $(".name"),
                $(".type")



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
                url: "../api/admin.php",
                success: (res) => {
                    // $(".status").prop("disabled", false);
                    console.log(res)
                    $('.name').val(res.data[0].first_name)
                    $('.username').val(res.data[0].username)
                    $('.state').val(res.data[0].state)
                    $('.password').val(res.data[0].password)
                    $('.gender').val(res.data[0].gender)
                    $('.city').val(res.data[0].city)
                    // $('.image').val(res.data[0].picture)
                    $('.bod').val(res.data[0].birthdate)
                    $('.id').val(res.data[0].user_id)
                    $('.save').text("Edit")
                    $(".userModal").modal("show")
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
                    "action": "readAdmins"
                },
                url: "../api/admin.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    data.forEach(value => {
                        tr += `<td>${value.user_id}</td>`
                        tr += `<td>${value.first_name}</td>`
                        tr += `<td>${value.password}</td>`
                        tr += `<td>${value.username}</td>`
                        tr += `<td>${value.gender}</td>`
                        tr += `<td>${value.city}</td>`
                        // tr += `<td>${value.type}</td>`

                        // tr += `<td>${value.status}</td>`
                        //     tr += `<td><a class='btn btn-success editButton text-light fw-bold' editID=${value.admin_id}>Edit</a>
                        //  <a class='btn btn-danger deleteAdmin text-light fw-bold'  delID=${value.admin_id}>Delete</a></td>`
                        tr += `<td>
                        <a class='btn btn-danger text-light deleteUser' delID=${value.user_id}><i class="fa-solid fa-xmark"></i></a>
                        <a class='btn btn-success text-light editUser' editID=${value.user_id}><i class="fa-solid fa-pen-to-square"></i></a>
                        
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