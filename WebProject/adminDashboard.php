<?php

global $con;
include 'config.php';

$select_messages=mysqli_query($con,"select * from `messages`") or die ('query failed');
$row_count_messages=mysqli_num_rows( $select_messages);

$select_orders=mysqli_query($con,"select * from `orders`") or die ('query failed');
$row_count_orders=mysqli_num_rows( $select_orders);

$select_users=mysqli_query($con,"select * from `users`") or die ('query failed');
$row_count_users=mysqli_num_rows( $select_users);

$select_products=mysqli_query($con,"select * from `products`") or die ('query failed');
$row_count_products=mysqli_num_rows( $select_products);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <!-- icons  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="cssFiles/style.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Sugar Rush</title>
</head>
<body class="body-fixed">
<!-- preLoader -->
<?php
@include 'preloader.php'
?>
<div class="headerbox"></div>
<?php
@include 'adminHeader.php'
?>
<!-- end of header  -->
<div id="viewport">
    <div id="js-scroll-content">
        <section class="container pt-5 mt-4" style="display: flex; justify-content: center;">
            <div class="col-lg-12">
                <div class="sec-title text-center ">
                    <h1 class="h1-title revealUp mt-5">Dashboard</h1>
                </div>
            </div>
        </section>
        <section class=" text-center p-5 ">
            <div class=" main-cards">
                <div class="admin_card text-center">
                    <div>
                        <div class="admin_card_inner">
                            <h3 style="font-size: 30px" class="h2-title">Customers</h3>
                            <img class="mt-4" style="width: 15%" src="adminImages/multiple-users-silhouette.png" alt="">
                        </div>
                        <h1 class="h2-title"><?php echo $row_count_users ?></h1>
                    </div>
                </div>
                <div class="admin_card text-center">
                    <div>
                        <div class="admin_card_inner">
                            <h3 style="font-size: 30px" class="h2-title">Categories</h3>
                            <img class=" mt-4" style="width: 15%" src="adminImages/category.png" alt="">
                        </div>
                        <h1 class="h2-title">3</h1>
                    </div>
                </div>
                <div class="admin_card  text-center">
                    <div>
                        <div class="admin_card_inner">
                            <h3 style="font-size: 30px" class="h2-title">Products</h3>
                            <img class=" mt-4" style="width: 25%" src="adminImages/sweets.png" alt="">
                        </div>
                        <h1 class="h2-title"><?php echo $row_count_products ?></h1>
                    </div>
                </div>
                <div class="admin_card  text-center">
                    <div>
                        <div class="admin_card_inner">
                            <h3 style="font-size: 30px" class="h2-title">Orders</h3>
                            <img class=" mt-4" style="width: 20%" src="adminImages/package-box.png" alt="">
                        </div>
                        <h1 class="h2-title"><?php echo $row_count_orders ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="container">
            <div class=" row charts-container" >
                <div class="container col-lg-12 col-md-12 col-sm-12" id="chart_div1" style="width: 550px; height: 380px;"></div>
                <div class="container col-lg-12 col-md-12 col-sm-12" id="chart_div2" style="width: 550px; height: 380px;"></div>
            </div>
        </section>
        <section class="container mb-5">
            <div class="row text-center">
                <div class="container mb-5 col-lg-12 col-md-12 col-sm-12 text-center" id="columnchart_values" style="width: 800px; height: 300px;"></div>
            </div>
        </section>

        <!-- footer -->
        <?php
        @include 'footer.php'
        ?>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        // Data for the first chart
        var data1 = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses'],
            ['2013', 660, 460],
            ['2016', 1170, 400],
            ['2019', 860, 1120],
            ['2022', 1030, 540],
            ['2023', 1730, 510]
        ]);

        // Options for the first chart
        var options1 = {
            title: 'Our Shop Performance',
            hAxis: { title: 'Year', titleTextStyle: { color: '#333' } },
            vAxis: { minValue: 0 },
            backgroundColor: 'none',
            isStacked: true
        };

        // Data for the second chart
        var data2 = google.visualization.arrayToDataTable([
            ['Month', 'Drinks', 'Desserts','IceCream'],
            ['January ', 860, 660,240],
            ['April ', 1100, 2400,1088],
            ['June ', 860, 1120,856],
            ['August', 1030, 840,2179],
            ['October', 1030, 1510,1867]
        ]);

        // Options for the second chart
        var options2 = {
            title: 'The sales',
            hAxis: { title: 'Month', titleTextStyle: { color: '#333' } },
            vAxis: { minValue: 0 },
            backgroundColor: 'none',
            isStacked: true
        };

        // Data for the third chart
        var data3 = google.visualization.arrayToDataTable([
            ["Product", "Density", { role: "style" } ],
            ["Hot Chocolate", 23.94, "color: #ec5b59"],
            ["Ice Coffee", 24.49, "color: #ec5b59"],
            ["Caramel IceCream", 23.30, "color: #ec5b59"],
            ["Oreo Cake", 22.30, "color: #ec5b59"],
            ["Dark Chocolate Cupcake", 22.89, "color: #ec5b59"]
        ]);

        var view3 = new google.visualization.DataView(data3);
        view3.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        // Options for the third chart
        var options3 = {
            title: "Top 5 products in terms of sales",
            width: 800,
            height: 400,
            bar: {groupWidth: "55%"},
            legend: { position: "none" },
            backgroundColor: 'none'
        };


        // Create instances of the charts and draw them in their respective containers
        var chart1 = new google.visualization.AreaChart(document.getElementById('chart_div1'));
        var chart2 = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        var chart3 = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));

        chart1.draw(data1, options1);
        chart2.draw(data2, options2);
        chart3.draw(view3, options3);

    }
</script>
<!-- jquery  -->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>

<!-- fontawesome  -->
<script src="assets/js/font-awesome.min.js"></script>

<!-- swiper slider  -->
<script src="assets/js/swiper-bundle.min.js"></script>

<!-- mixitup -- filter  -->
<script src="assets/js/jquery.mixitup.min.js"></script>

<!-- fancy box  -->
<script src="assets/js/jquery.fancybox.min.js"></script>

<!-- parallax  -->
<script src="assets/js/parallax.min.js"></script>

<!-- gsap  -->
<script src="assets/js/gsap.min.js"></script>

<!-- scroll trigger  -->
<script src="assets/js/ScrollTrigger.min.js"></script>
<!-- scroll to plugin  -->
<script src="assets/js/ScrollToPlugin.min.js"></script>
<!-- smooth scroll  -->
<script src="assets/js/smooth-scroll.js"></script>
<!--=============== MAIN JS ===============-->
<script src="jsFiles/main.js"></script>

</body>
</html>
