<?php
include '../include/header.php';
include '../include/sidebar.php';
include '../include/nav.php';
?>

<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Smart-Milk</strong> Dashboard</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="#" class="btn btn-light bg-white me-2">Invite a Friend</a>
                <a href="#" class="btn btn-primary">New Project</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Admin</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3 users"></h1>
                        <div class="mb-0">
                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 3.65%
                            </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">children</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3 child"></h1>
                        <div class="mb-0">
                            <span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i> -5.25%
                            </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">donators</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="activity"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3 donator"></h1>
                        <div class="mb-0">
                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 4.65%
                            </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">sponsers</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3 sponser"></h1>
                        <div class="mb-0">
                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 2.35%
                            </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Chart 1</h5>
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Chart 2</h5>
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div>
        <div id="piechart" style="width: 900px; height: 500px;"></div>

            <!-- <div id="columnchart_values" style="width: 900px; height: 300px;"></div> -->
            <!-- <div id="top_x_div" style="width: 900px; height: 500px;"></div>  -->
        </div>

    </div>
</main>

<?php
include '../include/footer.php'
    ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        const countRowNumbers = (tableName, label) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../api/admin.php",
                data: {
                    action: "count",
                    table: tableName,
                },
                success: (res) => {
                    console.log(res)
                    label.html(res.rowNumber);
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        countRowNumbers("member", $(".users"))
        countRowNumbers("children", $(".child"))
        countRowNumbers("sponsorer", $(".sponser"))
        countRowNumbers("donation", $(".donator"))
        const countTransactions = (label1,label2) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../api/transactions.php",
                data: {
                    action: "getDailyTransactionSum",
                    table: "transactions",
                },
                success: (res) => {
                    console.log(res)
                    label1.html(res.data.total_sum);
                    label2.html(res.data.quantity_sum);
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        countTransactions($(".revenue"), $(".quantity"))
        const readLevel = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "readLevel"

                },
                url: "../api/level_tracking.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    $('.level').html(res.data[0].level_quantity);

                    console.log("data is ", data)
                },
                error: (res) => {
                    console.log("There is an error")
                    console.log(res)
                },
            })
        }
        readLevel();
       
     
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(readChart);

        function readChart() {
            $.ajax({
                url: '../api/transactions.php', // Replace with the correct path to your PHP file
                method: 'POST',
                dataType: "json",
                data: { "action": 'getMonthlyTransactionData' }, // Adjust as necessary
                success: function(response) {
                    console.log(response); // Debugging line to ensure response is correct
                    if (response.status) {
                        var data = [['Month', 'Total Quantity']];
                        var totalQuantity = 0;

                        response.data.forEach(function(transaction) {
                            data.push([transaction.month, parseInt(transaction.total_quantity)]);
                            totalQuantity += parseInt(transaction.total_quantity);
                        });

                        var googleData = google.visualization.arrayToDataTable(data);

                        var options = {
                            title: 'Monthly Transaction Quantities',
                            sliceVisibilityThreshold: 0 // Show all slices
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(googleData, options);
                    } else {
                        alert('Failed to fetch data');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error making AJAX request:', error);
                    alert('Error making AJAX request');
                }
            });
        }
        readChart();
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Dataset 1',
                    data: [10, 20, 30, 40, 50],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart 2
        var ctx2 = document.getElementById('chart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['June', 'July', 'August', 'September', 'October'],
                datasets: [{
                    label: 'Dataset 2',
                    data: [15, 25, 35, 45, 55],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

  
        // $(".login").click((e) => {

    });
</script>