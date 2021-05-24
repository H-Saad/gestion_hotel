<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chambres</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/admin.css" />
    </head>
    <body id="page-top">
        <?php 
            require_once "valider.php";
            require_once "connect.php";
            require "check.php";
        ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand">Admin</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="chambre.php">Chambres</a></li>
                <li><a href="users.php">Users</a></li>
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
				<div class = "alert alert-info">Chambres</div>
				<a class = "btn btn-success" href = "ajouter_chambre.php"> Ajouter une chambre</a>
				<br />
				<br />  
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Type de chambre</th>
							<th>Prix</th>
							<th>Photo</th>
							<th>Description</th>
                            <th>Nb total des chambres</th>
                            <th>Nb de chambres restants</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `chambre`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['type']?></td>
							<td><?php echo $fetch['prix']?></td>
							<td><center><img src = "../assets/img/chambres/<?php echo $fetch['photo']?>" height = "50" width = "50"/></center></td>
                            <td style="width: 33%;"><?php echo $fetch['description'];?></td>
                            <td><?php echo $fetch['nb_chambres_total'];?></td>
                            <td><?php echo $fetch['nb_chambres'];?></td>
							<td><center><a class = "btn btn-warning" href = "modifier_chambre.php?id_chambre=<?php echo $fetch['id_chambre']?>">Modifier</a> 
                            <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "query/supprimer_chambre.php?id_chambre=<?php echo $fetch['id_chambre']?>">Supprimer</a></center>
                        </td>
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
            var conf = confirm("Etes vous sur de vouloir supprimer cette chambre?");
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
