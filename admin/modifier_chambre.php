<!DOCTYPE html>
<?php
	require_once 'valider.php';
    require_once 'connect.php';
?>
<html lang = "en">
	<head>
		<title>Modifier une chambre</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
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
		<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Modifier chambre</div>
				<br />
				<div class = "col-md-4">
					<?php
						$query = $conn->query("SELECT * FROM `chambre` WHERE `id_chambre` = '$_REQUEST[id_chambre]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Type de chambre </label>
							<input type="text" name="type" class="form-control" value=<?php echo $fetch['type']; ?>>
						</div>
						<div class = "form-group">
							<label>Prix </label>
							<input type = "number" value = "<?php echo $fetch['prix']?>" class = "form-control" name = "prix" />
						</div>
						<div class = "form-group">
							<label>Nb de chambres totals:</label>
							<input type = "number" value = "<?php echo $fetch['nb_chambres_total']?>" class = "form-control" name = "nb_chambres_t" />
						</div>
						<div class = "form-group">
							<label>Nb de chambres dispo:</label>
							<input type = "number" value = "<?php echo $fetch['nb_chambres']?>" class = "form-control" name = "nb_chambres_d" />
						</div>
                        <div class="form-group">
                            <label>Description: </label>
                            <textarea class = "form-control" name="description" id="description" cols="30" rows="10"><?php echo $fetch['description']; ?></textarea>
                        </div>
						<div class = "form-group">
							<label>Photo </label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<img src = "../assets/img/chambres/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%"/>
							</div>
                            <br>
							<input type = "file" id = "photo" name = "photo" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "modifier_chambre" class = "btn btn-warning form-control">Enregistrer</button>
						</div>
					</form>
					<?php require_once 'query/modifier_ch.php'?>
				</div>
			</div>
		</div>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>