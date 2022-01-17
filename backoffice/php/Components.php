<?php
class Components {
    public function navbar($active = null) {
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
                        <a class="nav-link'. ($active == "annonces" ? ' active': '') .'" href="index.php">
                        <i class="fas fa-bullhorn"></i>
                            Annonces
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
    
                    <li class="nav-item">
                    <a class="nav-link'. ($active == "absences" ? ' active': '') .'" href="absences.php">
                        <i class="far fa-user"></i>
                        Absences
                    </a>
                </li>
    
                    <li class="nav-item">
                        <a class="nav-link'. ($active == "cantine" ? ' active': '') .'" href="cantine.php">
                        <i class="fas fa-utensils"></i>
                            Cantine
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link'. ($active == "semaines" ? ' active': '') .'" href="semaines.php">
                        <i class="far fa-calendar-alt"></i>
                            Semaines
                        </a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link '. ($active == "settings" ? 'active ': '') .'dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                            <span>
                                Settings <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Users</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
        </div>
    
    </nav>';
    }

    public function footer() {
        return '<footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2021</b> All rights reserved. 
            
            Design: TIDAL
        </p>
    </div>
</footer>';
    }
}