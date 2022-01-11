<?php
// Middleware
include_once 'php/Middleware.php';

// Front End Modules
include_once 'php/navbar.php';
include_once 'php/footer.php';
include_once 'php/Users/User.php';
$User = unserialize($_SESSION['user']);

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
        <?php echo ShowNavbar('cantine'); ?>
        <div class="container">
            <div class="row">
                <div class="col">
                     <p class="text-white mt-5 mb-5">Welcome back, <b><?php echo $User->username ?></b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Passages Cantine</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID.</th>
                                    <th scope="col">JOUR</th>
                                    <th scope="col">CLASSES</th>
                                    <th scope="col">HEURE DÉBUT</th>
                                    <th scope="col">HEURE FIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#1</th>
                                    <td><b>Vendredi</b></td>
                                    <td><b>TD</b></td>
                                    <td>2021-12-20 | 11:05</td>
                                    <td>2021-12-20 | 12:05</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php echo ShowFooter(); ?>
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
</body>

</html>