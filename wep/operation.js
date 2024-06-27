$(document).ready(() => {
  // $(".opt2").on("change", function () {
  //   if ($(this).is(":checked")) {
  //     $("#input2").removeAttr("hidden").show();
  //   } else {
  //     $("#input2").hide();
  //   }
  // });

  // $(".opt1").on("change", function () {
  //   if ($(this).is(":checked")) {
  //     $("#input1").removeAttr("hidden").show();
  //   } else {
  //     $("#input1").hide();
  //   }
  // });
  // $("#wasteTypeSelect").on("change", function () {
  //   var selectedOption = $(this).val();
  //   if (selectedOption !== "") {
  //     $("#input1").show();
  //   } else {
  //     $("#input1").hide();
  //   }
  // });
  // $(".opt1").on("change", function () {
  //   alert("Please select");
  // if($(this).is(':checked')) {
  //   $('#hidden-inputs-option2').show();
  // } else {
  //   $('#hidden-inputs-option2').hide();
  // }
  // });
  //log in operqation
  getIndustries();
  getWastes();
  getReports();
  displaypoints();
  getRequest();

  // $(document).on("click", "#pointsButton", () => {
  //   alert("Click");
  //   points();
  // });
  $(document).on("click", ".points", () => {
    points();
  });

  $(document).on("click", ".logout", () => {
    localStorage.clear();
    $.ajax({
      url: "./logout.php", // Path to your PHP script that destroys the session
      type: "POST",
      success: function (data) {
        // Optionally, handle success response from the server

        window.location.href = "./index.php";
        // alert("Session destroyed");
        // Redirect to another page or perform any other actions as needed
      },
      error: function (xhr, status, error) {
        // Optionally, handle error response from the server
        console.error(error);
      },
    });
  });
  $(document).on("click", ".delete", (event) => {
    id = $(event.target).attr("delId");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method: "POST",
          dataType: "JSON",
          url: "./application/api/admin.php",
          data: { id: id, action: "deleteWaste", table: "waste_request" },
          success: (res) => {
            var { data } = res;
            console.log(res);
            Swal.fire({
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success",
            });
            getRequest();
          },
          error: (error) => {
            console.log(error);
          },
        });
      }
    });
  });
  $(document).on("click", ".deleteReport", (event) => {
    id = $(event.target).attr("delId");
    alert(id);
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method: "POST",
          dataType: "JSON",
          url: "./application/api/admin.php",
          data: { id: id, action: "deleteReport" },
          success: (res) => {
            var { data } = res;
            console.log(res);
            Swal.fire({
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success",
            });
            getReports();
          },
          error: (error) => {
            console.log(error);
          },
        });
      }
    });
  });
  //reporting operation
  $(document).on("click", ".report", () => {
    if ($(".image").val() == "" || $(".description").val() == "") {
      showAlert("Please fill all required fields", "info");
    } else {
      Swal.fire({
        title: "Ma hubta?",
        text: "Ma ogoshahay in aad gudbiso!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Haa, Gudbi!",
      }).then((result) => {
        if (result.isConfirmed) {
          var formData = new FormData();

          // Append the file and other data to the FormData object
          formData.append("profile_image", $(".image")[0].files[0]);
          formData.append("description", $(".description").val());
          formData.append("cit_id", localStorage.getItem("cit_id"));
          formData.append("action", "report");
          $.ajax({
            method: "POST",
            dataType: "JSON",
            processData: false,
            // cache: false,
            contentType: false,
            action: "report",
            data: formData,
            url: "./application/api/admin.php",
            success: (res) => {
              Swal.fire({
                title: "report",
                text: "Dacwadada waa la gudbiyy.",
                icon: "success",
              });
              // showAlert(res.message, "success");
              clearInputData($(".description"), $(".image"));
            },
            error: (err) => {
              console.log(err);
            },
          });
        }
      });
    }
  });
  $(document).on("click", ".request", () => {
    // alert("clicked");

    var currentDatetime = new Date();
    var selectedDatetime = new Date($(".date").val());
    if (
      $(".in_id").val() == "" ||
      $(".w_id").val() == "" ||
      $(".date").val() == "" ||
      $(".qty").val() == ""
    ) {
      showAlert("Please fill all required fields", "info");
    } else if (selectedDatetime < currentDatetime) {
      showAlert("past date can not be scheduled", "info");
    } else if ($(".qty").val() <= 0) {
      showAlert("fadlan dooro 1 iyo ka bdn", "info");
    } else if ($(".w_id").val() == 1) {
      // alert("id waa 1");
      Swal.fire({
        title: "ma hubta in aad dalbato adegan?",
        text: "ma rabta in aad codsi dirsato si qashinka lagaga qaado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Haa!",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            method: "POST",
            dataType: "JSON",
            data: {
              ind_id: $(".in_id").val(),
              waste_id: $(".w_id").val(),
              date: $(".date").val(),
              qty: $(".qty").val(),
              cit_id: localStorage.getItem("cit_id"),
              action: "requesting",
            },
            url: "./application/api/admin.php",
            success: (res) => {
              id = $(".w_id").val();
              console.log(id);
              if (id != 1) {
                Swal.fire({
                  title: "Dalbo!",
                  text:
                    "Codsigaada waa la diray. Waxana pending kgu jira " +
                    $(".qty").val() * (0.05).toFixed(2),
                  icon: "success",
                });
              } else {
                Swal.fire({
                  title: "Dalbo!",
                  text: "Codsigaada waa la diray.",
                  icon: "success",
                });
              }
              // alert("successfully requestedbilciye");
              // showAlert("successfully requestedbilciye", "success");
              clearInputData($(".in_id"), $(".w_id"));
            },
            error: (err) => {
              console.log(err);
            },
          });
        }
      });
    } else {
      Swal.fire({
        title: "ma hubta in aad dalbato adegan?",
        text: "ma rabta in aad codsi dirsato si qashinka lagaga qaado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Haa!",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            method: "POST",
            dataType: "JSON",
            data: {
              ind_id: $(".in_id").val(),
              waste_id: $(".w_id").val(),
              date: $(".date").val(),
              qty: $(".qty").val(),
              cit_id: localStorage.getItem("cit_id"),
              action: "recycling",
            },
            url: "./application/api/admin.php",
            success: (res) => {
              id = $(".w_id").val();
              console.log(id);
              if (id != 1) {
                Swal.fire({
                  title: "Dalbo!",
                  text:
                    "Codsigaada waa la diray. Waxana pending kugu jira : " +
                    $(".qty").val() * (0.05).toFixed(2) +
                    " points",
                  icon: "success",
                });
              } else {
                Swal.fire({
                  title: "Dalbo!",
                  text: "Codsigaada waa la diray.",
                  icon: "success",
                });
              }
              // alert("successfully requestedbilciye");
              // showAlert("successfully requestedbilciye", "success");
              clearInputData($(".in_id"), $(".w_id"));
            },
            error: (err) => {
              console.log(err);
            },
          });
        }
      });
    }
  });

  function getIndustries() {
    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "./application/api/admin.php",
      data: { action: "readIndustries" },
      success: (res) => {
        var { data } = res;
        console.log(data);
        // alert(res);
        let option = '<option value="" selected>Select Industries</option>';
        data.forEach((values) => {
          option += `<option value="${values.ind_id}">${values.ind_name}</option>`;
        });

        $(".ind_id select").html(option);
      },
      error: (error) => {
        console.log(error);
      },
    });
  }
  function getWastes() {
    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "./application/api/admin.php",
      data: { action: "readWastes" },
      success: (res) => {
        var { data } = res;
        console.log(data);
        // alert(res);
        let option = '<option value="" selected>Select waste Type</option>';
        data.forEach((values) => {
          option += `<option value="${values.waste_id}">${values.waste_type}</option>`;
        });

        $(".waste-id select").html(option);
      },
      error: (error) => {
        console.log(error);
      },
    });
  }
  function getReports() {
    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "./application/api/admin.php",
      data: { cit_id: localStorage.getItem("cit_id"), action: "readReports" },
      success: (res) => {
        var { data } = res;
        console.log(data);
        // alert(res);
        let option = "";
        data.forEach((values) => {
          option += `<div class="col-md-4 mb-4">
          <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between">
                  <div>
                      <img src="./application/uploads/${localStorage.getItem(
                        "image"
                      )}" alt="User Image" class="rounded-circle"
                          style="width: 40px; height: 40px;">
                      <span class="ms-2">${values.name}</span>
                  </div>
                  <div>
                      <small>${values.date}</small>
                  </div>
              </div>
              <div class="card-body">
                  <!-- Status Indicator -->
                  <div class="mb-3">
                      <span class="badge ${
                        values.status === "Pending"
                          ? "bg-warning"
                          : values.status === "progress"
                          ? "bg-info"
                          : "bg-success"
                      }">${values.status}</span>
                  </div>
                  <p>${values.description}.</p>
                  <img src="./application/uploads/${
                    values.criminal_photo
                  }" alt="Post Image" class="img-fluid mb-3">
                  <!-- Edit and Delete Buttons -->
                 
              </div>
          </div>
      </div>`;
        });

        $(".posts div").html(option);
      },
      error: (error) => {
        console.log(error);
      },
    });
  }
  function showAlert(message, icon) {
    // Show a SweetAlert alert with custom parameters
    Swal.fire({
      position: "top-end",
      icon: icon,
      title: message,
      showConfirmButton: false,
      timer: 1500,
    });
  }
  function clearInputData(...inputs) {
    inputs.forEach((input) => {
      input.val("");
    });
  }
  function points() {
    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "./application/api/admin.php",
      data: { cit_id: localStorage.getItem("cit_id"), action: "readPoints" },
      success: (res) => {
        var { data } = res;
        console.log(data[0].Points);
        Swal.fire({
          title: "Dhibco:  " + (data[0].Points == null ? "0 " : data[0].Points),

          text: "waad ku mhsnthy isticmalka adeegena",
          // imageUrl: "https://unsplash.it/400/200",
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: "Custom image",
        });
      },
      error: (error) => {
        console.log(error);
      },
    });
  }
  function displaypoints() {
    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "./application/api/admin.php",
      data: { cit_id: localStorage.getItem("cit_id"), action: "readPoints" },
      success: (res) => {
        var { data } = res;
        console.log(data[0].Points);
        $(".points").text(data[0].Points == null ? "0" : data[0].Points);
      },
      error: (error) => {
        console.log(error);
      },
    });
  }
  // function getRequest() {
  //   $.ajax({
  //     method: "POST",
  //     dataType: "JSON",
  //     url: "./application/api/admin.php",
  //     data: { cit_id: localStorage.getItem("cit_id"), action: "readRequests" },
  //     success: (res) => {
  //       var { data } = res;
  //       console.log(data);

  //       // alert(res);
  //       let option = "";
  //       data.forEach((values) => {
  //         option += `<div class="col-md-4 mb-4">
  //         <div class="card">
  //             <div class="card-header d-flex align-items-center justify-content-between">
  //                 <div>
  //                     <img src="./application/uploads/${localStorage.getItem(
  //                       "image"
  //                     )}" alt="User Image" class="rounded-circle"
  //                         style="width: 40px; height: 40px;">
  //                     <span class="ms-2">${values.name}</span>
  //                 </div>
  //                 <div>
  //                     <small>${values.request_date}</small>
  //                 </div>
  //             </div>
  //             <div class="card-body">
  //                 <!-- Status Indicator -->
  //                 <div class="mb-3">Status:
  //                     <span class="badge ${
  //                       values.status === "Pending"
  //                         ? "bg-warning"
  //                         : values.status === "progress"
  //                         ? "bg-info"
  //                         : "bg-success"
  //                     }">${values.status}</span>
  //                 </div>
  //                 <div>
  //                <p> industry:<b>${values.ind_name}</b></p>
  //                <p>schedule:<b>${values.schedule}</b></p>
  //                 </div>

  //                 <!-- Edit and Delete Buttons -->

  //             </div>
  //         </div>
  //     </div>`;
  //       });

  //       $(".requests div").html(option);
  //     },
  //     error: (error) => {
  //       console.log(error);
  //     },
  //   });
  // }

  // function getRequest() {
  //   let option = "";
  //   $.ajax({
  //     method: "POST",
  //     dataType: "JSON",
  //     url: "./application/api/admin.php",
  //     data: {
  //       cit_id: localStorage.getItem("cit_id"),
  //       action: "readRequests",
  //     }, // Different action for waste requests
  //     success: (res) => {
  //       var { data } = res;
  //       console.log(data);
  //       data.forEach((values) => {
  //         option += `<div class="col-md-4 mb-4">
  //                   <div class="card">
  //                       <div class="card-header d-flex align-items-center justify-content-between">
  //                           <div>
  //                               <img src="./application/uploads/${localStorage.getItem(
  //                                 "image"
  //                               )}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
  //                               <span class="ms-2">${values.name}</span>
  //                           </div>
  //                           <div>
  //                               <small>${values.schedule}</small>
  //                           </div>
  //                       </div>
  //                       <div class="card-body">
  //                           <div class="mb-3">Status:
  //                               <span class="badge ${
  //                                 values.status === "Pending"
  //                                   ? "bg-warning"
  //                                   : values.status === "progress"
  //                                   ? "bg-info"
  //                                   : "bg-success"
  //                               }">${values.status}</span>
  //                           </div>
  //                           <div>
  //                               <p> industry:<b>${values.ind_name}</b></p>
  //                               <p>schedule:<b>${values.schedule}</b></p>
  //                           </div>
  //                       </div>
  //                   </div>
  //               </div>`;
  //       });

  //       // Append new data to the existing content
  //       // $(".requests div").append(option);
  //     },
  //     error: (error) => {
  //       console.log(error);
  //     },
  //   });

  //   // Now, fetch data from another table (let's call it recycling_requests)
  //   $.ajax({
  //     method: "POST",
  //     dataType: "JSON",
  //     url: "./application/api/admin.php",
  //     data: {
  //       cit_id: localStorage.getItem("cit_id"),
  //       action: "readRecycling",
  //     }, // Different action for recycling requests
  //     success: (res) => {
  //       var { data } = res;
  //       console.log(data);

  //       // let optionRecycling = "";
  //       data.forEach((values) => {
  //         option += `<div class="col-md-4 mb-4">
  //                   <div class="card">
  //                       <div class="card-header d-flex align-items-center justify-content-between">
  //                           <div>
  //                               <img src="./application/uploads/${localStorage.getItem(
  //                                 "image"
  //                               )}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
  //                               <span class="ms-2">${values.name}</span>
  //                           </div>
  //                           <div>
  //                               <small>${values.request_date}</small>
  //                           </div>
  //                       </div>
  //                       <div class="card-body">
  //                           <div class="mb-3">Status:
  //                               <span class="badge ${
  //                                 values.status === "Pending"
  //                                   ? "bg-warning"
  //                                   : values.status === "progress"
  //                                   ? "bg-info"
  //                                   : "bg-success"
  //                               }">${values.status}</span>
  //                           </div>
  //                           <div>
  //                               <p> industry:<b>${values.ind_name}</b></p>
  //                               <p>schedule:<b>${values.schedule}</b></p>
  //                           </div>
  //                       </div>
  //                   </div>
  //               </div>`;
  //       });

  //       // Append new data from recycling_requests to the existing content

  //     },
  //     error: (error) => {
  //       console.log(error);
  //     },
  //   });
  // }
  // function getRequest() {
  //   let option = "";

  //   // First AJAX request
  //   $.ajax({
  //     method: "POST",
  //     dataType: "JSON",
  //     url: "./application/api/admin.php",
  //     data: {
  //       cit_id: localStorage.getItem("cit_id"),
  //       action: "readRequests",
  //     },
  //     success: (res) => {
  //       var { data } = res;
  //       console.log(data);
  //       data.forEach((values) => {
  //         option += `<div class="col-md-4 mb-4">
  //                 <div class="card">
  //                      <div class="card-header d-flex align-items-center justify-content-between">
  //                          <div>
  //                              <img src="./application/uploads/${localStorage.getItem(
  //                                "image"
  //                              )}" alt="User Image" class="rounded-circle"
  //                                 style="width: 40px; height: 40px;">
  //                             <span class="ms-2">${values.name}</span>
  //                         </div>
  //                         <div>
  //                             <small>${values.request_date}</small>
  //                         </div>
  //                     </div>
  //                     <div class="card-body">
  //                         <!-- Status Indicator -->
  //                         <div class="mb-3">Status:
  //                             <span class="badge ${
  //                               values.status === "Pending"
  //                                 ? "bg-warning"
  //                                 : values.status === "progress"
  //                                 ? "bg-info"
  //                                 : "bg-success"
  //                             }">${values.status}</span>
  //                         </div>
  //                         <div>
  //                        <p> industry:<b>${values.ind_name}</b></p>
  //                        <p>schedule:<b>${values.schedule}</b></p>
  //                         </div>

  //                         <!-- Edit and Delete Buttons -->

  //                     </div>
  //                 </div>
  //             </div>`;
  //       });

  //       // Second AJAX request nested inside the success function of the first AJAX request
  //       $.ajax({
  //         method: "POST",
  //         dataType: "JSON",
  //         url: "./application/api/admin.php",
  //         data: {
  //           cit_id: localStorage.getItem("cit_id"),
  //           action: "readRecycling",
  //         },
  //         success: (res) => {
  //           var { data } = res;
  //           console.log(data);
  //           data.forEach((values) => {
  //             option += `<div class="col-md-4 mb-4">
  //                                   <div class="card">
  //                                       <div class="card-header d-flex align-items-center justify-content-between">
  //                                           <div>
  //                                               <img src="./application/uploads/${localStorage.getItem(
  //                                                 "image"
  //                                               )}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
  //                                               <span class="ms-2">${
  //                                                 values.name
  //                                               }</span>
  //                                           </div>
  //                                           <div>
  //                                               <small>${
  //                                                 values.request_date
  //                                               }</small>
  //                                           </div>
  //                                       </div>
  //                                       <div class="card-body">
  //                                           <div class="mb-3">Status:
  //                                               <span class="badge ${
  //                                                 values.status === "Pending"
  //                                                   ? "bg-warning"
  //                                                   : values.status ===
  //                                                     "progress"
  //                                                   ? "bg-info"
  //                                                   : "bg-success"
  //                                               }">${values.status}</span>
  //                                           </div>
  //                                           <div>
  //                                               <p> industry:<b>${
  //                                                 values.ind_name
  //                                               }</b></p>
  //                                               <p>schedule:<b>${
  //                                                 values.schedule
  //                                               }</b></p>
  //                                           </div>
  //                                       </div>
  //                                   </div>
  //                               </div>`;
  //           });

  //           // After both AJAX requests are complete, append the generated content
  //           $(".requests div").html(option);
  //         },
  //         error: (error) => {
  //           console.log(error);
  //         },
  //       });
  //     },
  //     error: (error) => {
  //       console.log(error);
  //     },
  //   });
  // }
  function getRequest() {
    let option = "";

    // First AJAX request
    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "./application/api/admin.php",
      data: {
        cit_id: localStorage.getItem("cit_id"),
        action: "readRequests",
      },
      success: (res) => {
        var { data } = res;
        console.log(data);
        data.forEach((values) => {
          option += `<div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div>
                                        <img src="./application/uploads/${localStorage.getItem(
                                          "image"
                                        )}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
                                        <span class="ms-2">${values.name}</span>
                                    </div>
                                    <div>
                                        <small>${values.schedule}</small>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">Status:
                                        <span class="badge ${
                                          values.status === "Pending"
                                            ? "bg-warning"
                                            : values.status === "progress"
                                            ? "bg-info"
                                            : "bg-success"
                                        }">${values.status}</span>
                                    </div>
                                    <div>
                                    <p> type:<b>waste Request</b></p>
                                        <p> industry:<b>${
                                          values.ind_name
                                        }</b></p>
                                        <p>schedule:<b>${
                                          values.schedule
                                        }</b></p>
                                        ${
                                          values.status === "done"
                                            ? `<button class="btn btn-danger delete"  delId="${values.id}">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </button>`
                                            : ""
                                        }

                                    </div>
                                </div>
                            </div>
                        </div>`;
        });

        // Second AJAX request nested inside the success function of the first AJAX request
        $.ajax({
          method: "POST",
          dataType: "JSON",
          url: "./application/api/admin.php",
          data: {
            cit_id: localStorage.getItem("cit_id"),
            action: "readRecycling",
          },
          success: (res) => {
            var { data } = res;
            console.log(data);
            data.forEach((values) => {
              option += `<div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <div>
                                                <img src="./application/uploads/${localStorage.getItem(
                                                  "image"
                                                )}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
                                                <span class="ms-2">${
                                                  values.name
                                                }</span>
                                            </div>
                                            <div>
                                                <small>${values.current}</small>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">Status:
                                                <span class="badge ${
                                                  values.status === "Pending"
                                                    ? "bg-warning"
                                                    : values.status ===
                                                      "progress"
                                                    ? "bg-info"
                                                    : "bg-success"
                                                }">${values.status}</span>
                                            </div>
                                            <div>
                                            <p> type:<b>Recycling</b></p>
                                                <p> industry:<b>${
                                                  values.ind_name
                                                }</b></p>
                                                <p>schedule:<b>${
                                                  values.schedule
                                                }</b></p>
                                              
                                            </div>
                                           

                                        </div>
                                    </div>
                                </div>`;
            });

            // After both AJAX requests are complete, append the generated content
            $(".requests div").html(option);
          },
          error: (error) => {
            console.log(error);
          },
        });
      },
      error: (error) => {
        console.log(error);
      },
    });
  }
});
