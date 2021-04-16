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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php#page-top">Accueil</a>
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
                    </ul>
                </div>
            </div>
        </nav>
         <!-- Masthead-->
         <header class="masthead">
            <div class="container">
                <div class="masthead-subheading"></div>
                <div class="masthead-heading text-uppercase"></div>
            </div>
        </header>
                <!-- Portfolio Grid-->
                <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Chambres</h2>
                    <h3 class="section-subheading text-muted">Nos variantes de chambres disponibles.</h3>
                </div>
                <div class="row">
                    <?php
                        require_once "admin/connect.php";
                        $query = $conn->query("SELECT * FROM `chambre` ORDER BY `prix` ASC") or die(mysql_error());
                        while($fetch = $query->fetch_array()){
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href = "<?php echo "#modal".$fetch['id_chambre'] ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img  src="assets/img/chambres/<?php echo $fetch['photo']?>" height = "200" width = "355" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $fetch['type'] ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $fetch['prix'] . " dh" ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
               <!-- Footer-->
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
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
        <?php
           require_once "admin/connect.php";
           $query = $conn->query("SELECT * FROM `chambre` ORDER BY `prix` ASC") or die(mysql_error());
           while($fetch = $query->fetch_array()){ 
        ?>
        <div class="portfolio-modal modal fade" id="<?php echo "modal".$fetch['id_chambre']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase"><?php echo $fetch['type'] ?></h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/chambres/<?php echo $fetch['photo']?>" alt="" />
                                    <p><?php echo $fetch['description'] ?></p>
                                    <ul class="list-inline">                                       
                                        <li>Nombre de personnes: 2</li>
                                        <li>Balcon: Oui</li>
                                    </ul>
                                    <button class="btn btn-success"  type="button" onClick="document.location.href='reservation.php?id_chambre=<?php echo $fetch['id_chambre'] ?>'">
                                        <i class="fas fa-times mr-1"></i>
                                        Reserver
                                    </button>
                                    <button class="btn btn-danger" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Fermer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
           }
        ?>
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