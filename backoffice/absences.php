<?php
// Middleware
include_once 'php/Middleware.php';

// Configuration
include_once 'php/conf.php';

// Front End Modules
include_once 'php/navbar.php';
include_once 'php/footer.php';

// Absences Modules
include_once 'php/Absences/getAbsences.php';
include_once 'php/Absences/postAbsences.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addAbsence($_POST["name"], $_POST["begin_date"], $_POST["end_date"]);
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
    <link rel="stylesheet" href="css/jquery.datetimepicker.min.css" type="text/css" />
    <!-- https://plugins.jquery.com/datetimepicker/ -->
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
        <?php echo ShowNavbar('absences'); ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Profs Absents</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID.</th>
                                    <th scope="col">NOM</th>
                                    <th scope="col">HEURE AJOUT</th>
                                    <th scope="col">HEURE FIN</th>
                                    <th scope="col">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (getAbsences() as $absence) {
                                    echo '<tr>
                                        <th scope="row">' . $absence["id"] . '</th>
                                        <td><b>' . $absence["name"] . '</b></td>
                                        <td>' . $absence["begin_date"] . '</td>
                                        <td>' . $absence["end_date"] . '</td>
                                        <td>
                                            <form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                                                <!-- <input type="submit" class="tm-status-circle cancelled"> TODO -->
                                                <div class="tm-status-circle cancelled"></div>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tm-block-title d-inline-block">Add Absence</h2>
                            </div>
                        </div>
                        <div class="row tm-edit-product-row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <form action="" method="post" class="tm-edit-product-form">
                                    <div class="form-group mb-6">
                                        <label for="name">Nom
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control validate" />
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="begin_date">Jour début
                                            </label>
                                            <input id="begin_date" name="begin_date" type="text" value="21-01-01 08:30" class="form-control validate" data-large-mode="true" />
                                        </div>
                                        <div class="form-group col">
                                            <label for="end_date">Jour fin
                                            </label>
                                            <input id="end_date" name="end_date" type="text" value="21-01-01 18:30" class="form-control validate" data-large-mode="true" />
                                        </div>
                                    </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add</button>
                            </div>
                            </form>
                        </div>
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
    <script src="js/jquery.datetimepicker.full.min.js"></script>
    <!-- https://plugins.jquery.com/datetimepicker/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        var d = new Date();

        $(function() {
            $("#begin_date").datetimepicker({
                format: 'y-m-d H:i',
                startDate: '+' + d.getFullYear() + '/' + (d.getMonth() + 1) + '/' + d.getDate()
            });

            $("#end_date").datetimepicker({
                format: 'y-m-d H:i',
                startDate: '+' + d.getFullYear() + '/' + (d.getMonth() + 1) + '/' + d.getDate()
            });
        });
    </script>
</body>

</html>