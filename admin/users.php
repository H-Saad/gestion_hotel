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
		<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Comptes</div>
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
                            <th>Nom d'utilisateur</th>
							<th>Nom</th>
							<th>Prenom</th>
                            <th>Email</th>
                            <th>Num</th>
                            <th>Adresse</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$query = $conn->query("SELECT * FROM `users` WHERE username IS NOT NULL") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['username']?></td>
							<td><?php echo $fetch['Nom']?></td>
                            <td><?php echo $fetch['Prenom']?></td>
                            <td><?php echo $fetch['Email']?></td>
                            <td><?php echo $fetch['Num']?></td>
                            <td><?php echo $fetch['Adresse']?></td>
							<td><center><a class = "btn btn-warning" href = "modifier_compte.php?user_id=<?php echo $fetch['user_id']?>">Modifier</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "query/supr_compte.php?user_id=<?php echo $fetch['user_id']?>">Supprimer</a></center></td>
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
