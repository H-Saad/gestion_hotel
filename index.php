<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reservation hotel</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <?php session_start(); ?>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Accueil</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="chambres.php">Chambres</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                        <?php
                            if(!isset($_SESSION['id'])){
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Connectez-vous !</a></li>';
                            }
                            else{
                                $prenom = $_SESSION['prenom'];
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href = "login/user_info.php">'. $prenom. '</a></li>';
                                echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login/logout.php">Deconnexion</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue</div>
                <div class="masthead-heading text-uppercase">Reservation Hotel</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Commencer!</a>
            </div>
        </header>
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Nos services</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-hotel fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Accueil 24/24</h4>
                        <p class="text-muted">La reception de l’hôtel est ouverte 24h/24, tous les jours de la semaine. Dès votre arrivée, notre équipe sera à votre écoute afin de rendre votre séjour des plus agréables.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-swimming-pool fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Piscine intérieure</h4>
                        <p class="text-muted">Détendez vous autour de notre piscine intérieure équipée d'un jacuzzi et sauna.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-wifi fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Wifi</h4>
                        <p class="text-muted">Wifi haut débit disponible gratuitement dans tout l'hotel.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">À PROPOS</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                               
                                <h4 class="subheading">Notre Hotel</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Nous essayons de répondre dans notre hôtel à tous vos désirs. Notre personnel sera toujours prêt à vous rendre service et cherchera à rendre votre séjour à Prague le plus agréable possible. La direction et le personnel d'Hotels sont heureux de vous accueillir dans leur hôtel.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Restaurant</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Pour des déjeuners en toutes simplicité et convivialités, repas en famille ou pour affaires… le restaurant de l’Auberge est l’endroit parfait. C’est dans une ambiance décontractée « comme à l’auberge » que vous serez reçus. Denis se fera un plaisir de vous servir et vous conseiller sur les vins de la région, ainsi que les vins naturels. Et Valérie vous confectionne chaque jour de nouveaux plats de terroir, avec des produits frais et fait maison, de l’entrée au dessert. Venez savourer ces trésors locaux.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">

                                <h4 class="subheading">Séminaires</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">L’hôtel vous accueille dans sa salle de séminaire entièrement équipée pouvant accueillir jusqu’à 15 collaborateurs. Vidéo projecteur, Paperboard, connexion Wifi et bouteilles d’eau sont à votre disposition Et pour vous libérer de toute contrainte logistique, l’équipe du PATIO MORAND s’occupe de tout : petit déjeuner, réservation dans un restaurant à proximité, boissons et pauses.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Région</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Notre région, voisine des Cévennes et de la Méditerranée, est entourée de vestiges archéologiques. La garrigue qui entoure Uzès est très typique de la Provence. Les plantes qui y sont présentes sont souvent utilisées dans notre cuisine ainsi que pour les soins du corps et parfum pour la maison.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                        <a href="chambres.php">
                            <h4 style="color:white">
                                Reserver
                                <br />
                                <br />
                                Maintenant!
                            </h4>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contactez nous</h2>
                    <br />
                    <br />
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Votre Nom *" required="required" data-validation-required-message="Veuillez saisir votre nom." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Veuillez saisir votre adresse e-mail." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Votre téléphone *" required="required" data-validation-required-message="Veuillez saisir votre téléphone." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Votre Message *" required="required" data-validation-required-message="Veuillez saisir votre message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Envoyer le Message</button>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
