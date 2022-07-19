<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

// Config
include_once 'php/conf.php';

include_once 'php/User.php';
$User = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserData = $User->get($_POST["username"], $_POST["password"]);

    if (!isset($UserData->error)) {
        $_SESSION["user"] = serialize($UserData);
        header("Location: index.php");
    } else {
      print ($UserData->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>TIDAL</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Open+Sans -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body>
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-12 mx-auto tm-login-col">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12 text-center">
              <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="tm-login-form">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input name="username" type="text" class="form-control validate" id="username" value="" required />
                </div>
                <div class="form-group mt-3">
                  <label for="password">Password</label>
                  <input name="password" type="password" class="form-control validate" id="password" value="" required />
                </div>
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-primary btn-block text-uppercase">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
</body>

</html>