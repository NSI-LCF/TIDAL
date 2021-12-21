<?php

// Front End Modules
include_once 'php/navbar.php';
include_once 'php/footer.php';
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
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
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
                                <tr>
                                    <th scope="row">#1</th>
                                    <td><b>M. Jany</b></td>
                                    <td>2021-12-20 | 11:05</td>
                                    <td>2021-12-20 | 12:05</td>
                                    <td>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                            <!-- <input type="submit" class="tm-status-circle cancelled"> TODO -->
                                            <div class="tm-status-circle cancelled"></div>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tm-block-title d-inline-block">Add Absence</h2>
                            </div>
                        </div>
                        <div class="row tm-edit-product-row">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <form action="" method="post" class="tm-edit-product-form">
                                    <div class="form-group mb-6">
                                        <label for="name">Nom
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control validate" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea class="form-control validate tm-small" rows="5" required>Lorem ipsum dolor amet gentrify glossier locavore messenger bag chillwave hashtag irony migas wolf kale chips small batch kogi direct trade shaman.</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="category">Category</label>
                                        <select class="custom-select tm-select-accounts" id="category">
                                            <option>Select category</option>
                                            <option value="1" selected>New Arrival</option>
                                            <option value="2">Most Popular</option>
                                            <option value="3">Trending</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                            <label for="expire_date">Jour début
                                            </label>
                                            <input id="expire_date" name="expire_date" type="text" value="22 Oct, 2020" class="form-control validate" data-large-mode="true" />
                                        </div>
                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                            <label for="expire_date">Jour fin
                                            </label>
                                            <input id="expire_date" name="expire_date" type="text" value="22 Oct, 2020" class="form-control validate" data-large-mode="true" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                            <label for="expire_date">Heure début
                                            </label>
                                            <input id="expire_date" name="expire_date" type="text" value="8h30" class="form-control validate" data-large-mode="true" />
                                        </div>
                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                            <label for="expire_date">Heure fin
                                            </label>
                                            <input id="expire_date" name="expire_date" type="text" value="18h30" class="form-control validate" data-large-mode="true" />
                                        </div>
                                    </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Now</button>
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
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
</body>

</html>