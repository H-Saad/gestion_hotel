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
                <li><a href="users.php">Users</a></li>
                <li class="active"><a href="admins.php">Admins</a></li>
                <li><a href="reservation.php">Reservations</a></li>
                </ul>
            </div>
        </nav>
        <section class="page-section" style="background:black;">
        </section>
        <section class="page-section">
        <div class = "container-fluid">
		<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Comptes</div>
                <a class = "btn btn-success" href = "ajouter_admin.php">Ajouter un compte</a>
                <br>
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
                            <th>Nom d'utilisateur</th>
							<th>Nom</th>
							<th>Mot de passe</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$query = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
                                $q = $conn->query("SELECT * FROM `users` WHERE user_id = '$fetch[user_id]'");
                                $fetch2 = $q->fetch_array();
						?>
						<tr>
							<td><?php echo $fetch['login']?></td>
							<td><?php echo "$fetch2[Nom] " . "$fetch2[Prenom]"?></td>
                            <td><?php echo $fetch['pass']?></td>
                            <?php
                                if($_SESSION['admin']==$fetch['admin_id']){
                            ?>
							<td><center><a class = "btn btn-warning" href = "modifier_admin.php">Modifier</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "query/supr_admin.php?admin_id=<?php echo $fetch['admin_id']?>">Supprimer</a></center></td>
                            <?php
                                }else{
                            ?>
                            <td><center><a class = "btn btn-warning disabled" href = "modifier_admin.php">Modifier</a> <a class = "btn btn-danger disabled" onclick = "confirmationDelete(this); return false;" href = "query/supr_admin.php?admin_id=<?php echo $fetch['admin_id']?>">Supprimer</a></center></td>
                            <?php
                                }
                            ?>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	    </div>
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
