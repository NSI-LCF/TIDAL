<?php
function ShowNavbar() {
    return '<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">TIDAL</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                    <i class="fas fa-bullhorn"></i>
                        Annonces
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="cantine.php">
                    <i class="far fa-user"></i>
                    Absences
                </a>
            </li>

                <li class="nav-item">
                    <a class="nav-link" href="cantine.php">
                    <i class="fas fa-utensils"></i>
                        Cantine
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="semaines.php">
                    <i class="far fa-calendar-alt"></i>
                        Semaines
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span>
                            Settings <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Users</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
    </div>

</nav>';
}
?>