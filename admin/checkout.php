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
        ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand">Admin</a>
                </div>
                <ul class="nav navbar-nav">
                <li><a href="chambre.php">Chambres</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="admins.php">Admins</a></li>
                <li class="active"><a href="reservation.php">Reservations</a></li>
                </ul>
            </div>
        </nav>
        <section class="page-section" style="background:black;">
        </section>
        <section class="page-section">
        <div class = "container-fluid">
		<div class = "panel panel-default">
            <?php
				$query_att = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'En attente'") or die(mysqli_error($conn));
				$att = $query_att->fetch_array();
				$query_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error($conn));
				$ci = $query_ci->fetch_array();
                $query_co = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check Out'") or die(mysqli_error($conn));
				$co = $query_co->fetch_array();
			?>
			<div class = "panel-body">
				<div class = "alert alert-info">Reservations</div>
                <a class = "btn btn-success" href = "reservation.php"><span class = "badge"><?php echo $att['total']?></span> En Attente</a>
				<a class = "btn btn-info" href = "checkin.php"><span class = "badge"><?php echo $ci['total']?></span> Check In</a>
				<a class = "btn btn-warning disabled" href = "checkout.php"><span class = "badge"><?php echo $co['total']?></span> Check Out</a>
				<br />
				<br />  
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Id transaction</th>
							<th>Nom et prenom</th>
							<th>Num</th>
							<th>Type de chambre</th>
							<th>Paiement en ligne</th>
                            <th>Date de debut</th>
                            <th>Date de fin</th>
                            <th>Status</th>
                            <th>Addition</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `chambre` WHERE `status` = 'Check Out'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
                            <td><?php echo $fetch['transaction_id']?></td>
							<td><?php echo $fetch['Nom']." ".$fetch['Prenom']?></td>
							<td><?php echo $fetch['Num']?></td>
							<td><?php echo $fetch['type']?></td>
							<td><?php echo $fetch['paiement']?></td>
                            <td><?php echo $fetch['checkin']?></td>
                            <td><?php echo $fetch['checkout']?></td>
							<td><?php echo $fetch['status']?></td>
                            <td><?php echo $fetch['addition']?></td>
							<td><center><a class = "btn btn-warning" href = "query/cancel_checkout.php?transaction_id=<?php echo $fetch['transaction_id']?>">Annuler Checkout</a> <a class = "btn btn-danger" onclick = "confirmationDelete(); return false;" href = "query/supr_reserve.php?transaction_id=<?php echo $fetch['transaction_id']?>">Supprimer</a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
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
            var conf = confirm("Etes vous sur de vouloir supprimer cette transaction?");
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
