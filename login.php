<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-32" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connection</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <?php
        require_once "admin/connect.php";
    ?>
    <body id="page-top">
        <?php session_start(); ?>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php">Accueil</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="chambres.php">Chambres</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a></li>
                        <?php
                            if(!isset($_SESSION['id'])){
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Connectez-vous !</a></li>';
                            }
                            else{
                                $prenom = $_SESSION['prenom'];
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login/user_info.php">'. $prenom. '</a></li>';
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login/logout.php">Deconnexion</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Connection:</div>
        </header>
        <section class="page-section" id="services">
        <div class="container">
        <?php
            if(isset($_GET['succes'])){
                echo "<p style='color:green;'>Inscription reussite veuillez vous connecter!</p>";
                echo "<br>";
            }
            if(isset($_GET['conn'])){
                echo "<p style='color:red;'>Veuillez vous connecter!</p>";
                echo "<br>";
            }
            if(isset($_GET['error'])){
                if($_GET['error']=='1'){
                    echo "<p style = 'color:red;'>Robot verification failed, please try again.</p>";
                    echo "<br>";
                }
                if($_GET['error']=='2'){
                    echo "<p style = 'color:red;'>Please check on the reCAPTCHA box</p>";
                    echo "<br>";
                }
                if($_GET['error']=='invalid'){
                    echo "<p style = 'color:red;'>Username ou password incorrect!</p>";
                    echo "<br>";
                }
            }
        ?>
        <form method = "POST" enctype = "multipart/form-data" >
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
            <div class="form-group">
            <label for="Nom">Nom d'utilisateur:</label>
            <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
            <label for="prenom">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="g-recaptcha" data-sitekey="6LeyNuoaAAAAAGlb4U9ui5HKetehrNC9Nys8oEdE"></div>
            <br>
            <button type="submit" name="submit" class="btn btn-success">Connection</button>
        </form>
            <?php
                require_once "login/log.php";
            ?>
            <br>
            <p>Pas de compte? Inscrivez vous!</p>
            <button onclick="window.location = 'register.php'" class="btn btn-warning">Inscription</button>
</div>
</section>
 <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright ?? Ens Marrakech 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>