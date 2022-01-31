<?php
// Middleware
include_once 'php/User.php';
include_once 'php/Middleware.php';

include_once 'php/conf.php';

// Front End Modules
include_once 'php/Components.php';
$Components = new Components();

include_once 'php/Cantine.php';
$Cantine = new Cantine();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cantine->update($_POST["id"], $_POST["classes"]);
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
        <?php echo $Components->navbar('cantine'); ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5"></p>
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
                                    <th scope="col">JOUR</th>
                                    <th scope="col">HEURE DÉBUT</th>
                                    <th scope="col">HEURE FIN</th>
                                    <th scope="col">CLASSE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Cantine->processedGet() as $cantine) {
                                    echo '<tr>
                                        <td><b>' . htmlspecialchars($cantine["jour"]) . '</b></td>
                                        <td>' . htmlspecialchars($cantine["begin_hour"]) . '</td>
                                        <td>' . htmlspecialchars($cantine["end_hour"]) . '</td>
                                        <td>
                                            <form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                                                <!-- <input type="submit" class="tm-status-circle cancelled"> TODO -->
                                                <input type="hidden" name="id" value="' . $cantine["id"] . '"/>
                                                <input type="text" name="classes" value="' . htmlspecialchars($cantine["classes"]) . '"/>
                                                <button type="submit" class="btn btn-secondary text-uppercase" ><i class="fas fa-check"></i></button>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
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
</body>

</html>