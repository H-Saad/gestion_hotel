<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Comptes</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/admin.css" />
    </head>
    <body id="page-top">
        <?php 
            require_once "valider.php";
            require_once "connect.php";
        ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand">Admin</a>
                </div>
                <ul class="nav navbar-nav">
                <li><a href="chambre.php">Chambres</a></li>
                <li class="active"><a href="users.php">Users</a></li>
                <li><a href="admins.php">Admins</a></li>
                <li><a href="reservation.php">Reservations</a></li>
                </ul>
            </div>
        </nav>
        <section class="page-section" style="background:black;">
        </section>
        <section class="page-section">
        <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Modifier compte</div>
				<?php
					$query = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$_REQUEST[user_id]'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<div class = "col-md-4">	
                    <form method = "POST" enctype = "multipart/form-data">
                        <div class="form-group">
                        <label for="Nom">Nom d'utilisateur:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $fetch['username']; ?>" >
                        </div>
                        <div class="form-group">
                        <label for="prenom">Mot de passe:</label>
                        <input type="password" class="form-control" name="password" required>
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
                        <button type="submit" name="modifier_compte" class="btn btn-success">Confirmer</button>
                        <button type="reset" class="btn btn-danger">Effacer</button>
                    </form>
                <?php require_once "query/modifier_cpt.php" ?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
        </section>
        <script src = "../js/jquery.js"></script>
        <script src = "../js/bootstrap.js"></script>
        <script src = "../js/jquery.dataTables.js"></script>
        <script src = "../js/dataTables.bootstrap.js"></script>	
        <script type = "text/javascript">
	        function confirmationDelete(anchor){
            var conf = confirm("Etes vous sur de vouloir supprimer cet utilisateur?");
            if(conf){
                window.location = anchor.attr("href");
                }
            } 
        </script>
        <script type = "text/javascript">
            $(document).ready(function(){
                $("#table").DataTable();
            });
        </script>
    </body>
</html>
