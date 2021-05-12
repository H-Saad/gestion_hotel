<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-32" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hotel</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
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
                <div class="masthead-subheading">Formulaire de reservation:</div>
                <div class="masthead-heading text-uppercase">
                    <?php 
                        require_once "admin/connect.php";
                        $id = $_REQUEST['id_chambre'];
                        $v = $conn->query("SELECT `type` FROM `chambre` WHERE `id_chambre` = '$id'");
                        $res = $v->fetch_array();
                        echo $res['type'];
                    ?>
                 </div>
            </div>
        </header>
        <?php 
			require_once 'admin/connect.php';
			$query = $conn->query("SELECT * FROM `chambre` WHERE `id_chambre` = '$_REQUEST[id_chambre]'") or die(mysql_error());
			$fetch = $query->fetch_array();
		?>
        <section class="page-section" id="services">
        <div class="container">
        <form method = "POST" enctype = "multipart/form-data">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
            <div class = "form-group">
			<label>Check in</label>
			<input type = "date" class = "form-control" name = "checkin" required = "required" />
		    </div>
		    <div class = "form-group">
			<label>Check out</label>
			<input type = "date" class = "form-control" name = "checkout" required = "required" />
		    </div>
            <div class = "form-group">
                <label>Methode de paiement:</label> <br>
                <label class="radio-inline"><input type="radio" name="paiement" value = "oui" checked>Paiement en ligne</label>
                <label class="radio-inline"><input type="radio" name="paiement" value = "non">Paiement a l'hotel</label>
		    </div>
            <div class = "form-group" id="optional">
                <label>Date de rendez-vous</label>
                <input type = "date" class = "form-control" name = "rdv" />
		    </div>
            <script>
                $('input[name="paiement"]').click(function(e) {
                if(e.target.value === 'non') {
                    $('#optional').show();
                } else {
                    $('#optional').hide();
                }
                })

                $('#optional').hide();
            </script>
            <button type="submit" name="submit" class="btn btn-success">Envoyer</button>
            <button type="reset" class="btn btn-danger">Effacer</button>
            <div class = "col-md-4"></div>
				<?php require_once 'query.php';?>
			</div>
        </form>
</div>
</section>
 <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Ens Marrakech 2020</div>
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
        <script src="js/scripts.js"></script>
    </body>
</html>