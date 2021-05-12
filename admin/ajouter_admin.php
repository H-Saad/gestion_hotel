<!DOCTYPE html>
<?php
	require_once 'valider.php';
?>
<html lang = "en">
	<head>
		<title>Ajouter une chambre</title>
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
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Ajouter une chambre</div>
				<br />
				<div class = "col-md-4">	
                <form method = "POST" enctype = "multipart/form-data">
                    <div class="form-group">
                    <label for="Nom">Nom d'utilisateur:</label>
                    <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                    <label for="prenom">Mot de passe:</label>
                    <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                    <label for="Nom">Nom:</label>
                    <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="form-group">
                    <button type="ajouter_admin" name="modifier_compte" class="btn btn-success">Confirmer</button>
                    </form>
					<?php require_once 'query/ajouter_adm.php'?>
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