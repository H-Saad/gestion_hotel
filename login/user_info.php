<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-32" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Compte</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <?php 
            require_once "../admin/connect.php";
            session_start(); 
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Accueil</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.php#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../chambres.php">Chambres</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.php#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.php#contact">Contact</a></li>
                        <?php
                            if(!isset($_SESSION['id'])){
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Connectez-vous !</a></li>';
                            }
                            else{
                                $prenom = $_SESSION['prenom'];
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href= "user_info.php">'. $prenom. '</a></li>';
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Deconnexion</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Details du compte:</div>
        </header>
        <?php
            $query = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$_SESSION[id]'") or die(mysqli_error());
            $fetch = $query->fetch_array();
        ?>
        <section class="page-section" id="services">
        <div class="container">
            <?php
                if(isset($_GET['error'])){
                    echo "<p style='color:red;'>Mot de passe incorrect!</p>";
                    echo "<br>";
                }
                if(isset($_GET['success'])){
                    echo "<p style='color:green;'>Succes !</p>";
                    echo "<br>";
                }
            ?>
            <form method = "POST" enctype = "multipart/form-data" action="edit_info.php">
                <div class="form-group">
                <label for="Nom">Nom d'utilisateur:</label>
                <h2 style="" ><?php echo $fetch['username']; ?></h2>
                </div>
                <div class="form-group">
                <label for="Nom">Nom:</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $fetch['Nom']; ?>" >
                </div>
                <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="text" class="form-control" name="prenom" value="<?php echo $fetch['Prenom']; ?>" >
                </div>
                <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" name="adresse" value="<?php echo $fetch['Adresse']; ?>" >
                </div>
                <div class="form-group">
                <label for="adresse">Numero de tel:</label>
                <input type="text" class="form-control" name="num" value="<?php echo $fetch['Num']; ?>" >
                </div>
                <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $fetch['Email']; ?>" >
                </div>
                <div class="form-group">
                <label for="prenom">Mot de passe:</label>
                <input type="password" class="form-control" name="password_old" required>
                </div>
                <div class="form-group">
                <label for="prenom">Nouveau mot de passe:</label>
                <input type="password" class="form-control" name="password_new" placeholder="Laisser vide si pas besoin de changer">
                </div>
                <button type="submit" name="modifier" class="btn btn-success">Confirmer</button>
            </form>
</div>
</section>
 <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Ens Marrakech 2021</div>
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
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>