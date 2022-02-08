<?php
// Middleware
include_once 'php/User.php';
include_once 'php/Middleware.php';

// Configuration
include_once 'php/conf.php';

// Front End Modules
include_once 'php/Components.php';
$Components = new Components();

// Semaines Modules
include_once 'php/Semaines.php';
$Semaines = new Semaines();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == "1") {
        $Semaines->update($_POST["semaine"], 0);
    } else {
        $Semaines->update($_POST["semaine"], 1);
    }

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
        <?php echo $Components->navbar('semaines'); ?>
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
                        <h2 class="tm-block-title">Semaines Vacances</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SEMAINE</th>
                                    <th scope="col">JOUR DÉBUT</th>
                                    <th scope="col">JOUR FIN</th>
                                    <th scope="col">CHANGER LISTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Semaines->get('1') as $semaine) {
                                    $week_array = $Semaines->getStartAndEndDate($semaine["semaine"], date('Y'));
                                    echo '<tr>
                                        <th scope="row">' . htmlspecialchars($semaine["semaine"]) . '</th>
                                        <td>' . htmlspecialchars($week_array['week_start']) . '</td>
                                        <td>' . htmlspecialchars($week_array['week_end']) . '</td>                                          
                                        <td>
                                            <form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                                            <input type="hidden" name="semaine" value="' . htmlspecialchars($semaine["semaine"]) . '">    
                                            <input type="hidden" name="type" value="1">
                                            <button type="submit" class="btn btn-secondary text-uppercase"> <i class="fas fa-exchange-alt"></i> </button>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Semaines Cours</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SEMAINE</th>
                                    <th scope="col">JOUR DÉBUT</th>
                                    <th scope="col">JOUR FIN</th>
                                    <th scope="col">CHANGER LISTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Semaines->get('0') as $semaine) {
                                    $week_array = $Semaines->getStartAndEndDate($semaine["semaine"], date('Y'));
                                    echo '<tr>
                                        <th scope="row">' . htmlspecialchars($semaine["semaine"]) . '</th>
                                        <td>' . htmlspecialchars($week_array['week_start']) . '</td>
                                        <td>' . htmlspecialchars($week_array['week_end']) . '</td>                                        
                                        <td>
                                            <form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                                                <input type="hidden" name="semaine" value="' . htmlspecialchars($semaine["semaine"]) . '">    
                                                <input type="hidden" name="type" value="0">
                                                <button type="submit" class="btn btn-secondary text-uppercase"> <i class="fas fa-exchange-alt"></i> </button>
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