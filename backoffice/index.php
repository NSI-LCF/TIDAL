<?php

// Configuration
include_once 'php/conf.php';

// Middleware
include_once 'php/User.php';
include_once 'php/Middleware.php';

// Front End Modules
include_once 'php/Components.php';
$Components = new Components();

// Import Classes
include_once 'php/User.php';
$User = unserialize($_SESSION['user']);

include_once 'php/Annonces.php';
$Annonces = new Annonces();
$lastAnnonce = $Annonces->getLast();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Annonces->post($_POST["title"], $_POST["annonce"]);
    $lastAnnonce["title"] = $_POST["title"];
    $lastAnnonce["annonce"] = $_POST["annonce"];
    
    header("Location: ". $_SERVER['PHP_SELF']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <?php echo $Components->navbar('annonces'); ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b><?php echo htmlspecialchars($User->username) ?></b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Profs absents au cours de l'année</h2>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Total d'absences par prof</h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Old Annonces</h2>
                        <div class="tm-notification-items">
                            <?php
                            foreach ($Annonces->get() as $annonce) {
                                echo '<div class="media tm-notification-item">
                                <div class="media-body">
                                    <p class="mb-2"><b>'. htmlspecialchars($annonce["title"]) .'</b></p>
                                    <p class="mb-2">'. htmlspecialchars($annonce["annonce"]) .'</p>
                                    <span class="tm-small tm-text-color-secondary">'. htmlspecialchars($annonce["creation_time"]) .'</span>
                                </div>
                            </div>';
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tm-block-title d-inline-block">Add Annonce</h2>
                            </div>
                        </div>
                        <div class="row tm-edit-product-row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <form action="" method="post" class="tm-edit-product-form">
                                    <input type="hidden" name="method" value="POST" />
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="title">Titre
                                            </label>
                                            <input id="title" name="title" type="text" class="form-control validate" data-large-mode="true" placeholder="<?php echo ($lastAnnonce ? htmlspecialchars($lastAnnonce['title']) : 'Titre') ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group mb-12">
                                        <label for="annonce">Annonce
                                        </label>
                                        <textarea id="annonce" name="annonce" type="text" class="form-control validate" placeholder="<?php echo ($lastAnnonce ? htmlspecialchars($lastAnnonce['annonce']) : 'Annonce') ?>" required></textarea>
                                    </div>
                            </div>

                            <div class="col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $Components->footer(); ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart,
            barChart,
            pieChart;

        // DOM is ready
        $(function() {
            lineChartData = {
                    labels: [
                        "1",
                        "2",
                        "3",
                        "4",
                        "5",
                        "6",
                        "7"
                    ],
                    datasets: [{
                            label: "Absences totales",
                            data: [88, 68, 79, 57, 50, 55, 70],
                            fill: false,
                            borderColor: "rgb(75, 192, 192)",
                            cubicInterpolationMode: "monotone",
                            pointRadius: 0
                        },
                        {
                            label: "Cette semaine",
                            data: [33, 45, 37, 21, 55, 74, 69],
                            fill: false,
                            borderColor: "rgba(255,99,132,1)",
                            cubicInterpolationMode: "monotone",
                            pointRadius: 0
                        }
                    ]
                },

                barChartData = {
                    labels: ["M. Druesnes", "M. Alves"],
                    datasets: [{
                        label: "# of Hits",
                        data: [100, 2],
                        backgroundColor: [
                            "#F7604D",
                            "#4ED6B8",
                            "#A8D582",
                            "#D7D768",
                            "#9D66CC",
                            "#DB9C3F",
                            "#3889FC"
                        ],
                        borderWidth: 0
                    }]
                },

                drawLineChart(lineChartData); // Line Chart
            drawBarChart(barChartData); // Bar Chart

            $(window).resize(function() {
                updateLineChart();
                updateBarChart();
            });
        })
    </script>
</body>

</html>