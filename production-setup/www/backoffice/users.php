<?php
// Middleware
$AdminRequired = true;

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
include_once 'php/UserManagement.php';

$User = unserialize($_SESSION['user']);
$UserManagement = new UserManagement();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["method"])) {
        if ($_POST["method"] == "POST") {
            $UserManagement->post($_POST["name"], $_POST["password"], $_POST["type"]);
        } elseif ($_POST["method"] == "DELETE") {
            if ($User->id != $_POST["id"]) {
                $UserManagement->delete($_POST["id"]);
            }
        }
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
    <title>TIDAL UTILISATEURS</title>
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
        <?php echo $Components->navbar('settings'); ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b><?php echo htmlspecialchars($User->username) ?></b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Liste utilisateurs</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID.</th>
                                    <th scope="col">NOM</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($UserManagement->get() as $user) {
                                    echo '<tr>
                                        <th scope="row">' . $user["id"] . '</th>
                                        <td><b>' . htmlspecialchars($user["username"]) . '</b></td>
                                        <td>' . $user["type"] . '</td>
                                        
                                        <td>
                                            <form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                                                <input type="hidden" name="method" value="DELETE"/>
                                                <input type="hidden" name="id" value="' . $user["id"] . '"/>
                                                <button type="submit" class="btn btn-secondary text-uppercase"> <i class="far fa-trash-alt"></i> </button>
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
                                <h2 class="tm-block-title d-inline-block">Add User</h2>
                            </div>
                        </div>
                        <div class="row tm-edit-product-row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <form action="" method="post" class="tm-edit-product-form">
                                    <input type="hidden" name="method" value="POST" />
                                    <div class="form-group mb-6">
                                        <label for="name">Nom d'utilisateur
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control validate" required />

                                        <label for="password">Password
                                        </label>
                                        <input id="password" name="password" type="password" class="form-control validate" required />

                                        <label for="type">Category</label>
                                        <select class="custom-select tm-select-accounts" id="type" name="type">
                                            <option value="0" selected>Normal user</option>
                                            <option value="1">Administrator</option>
                                        </select>
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
        <?php echo $Components->footer(); ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/jquery.datetimepicker.full.min.js"></script>
    <!-- https://plugins.jquery.com/datetimepicker/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->

</body>

</html>