<?php
    if(isset($_POST['ajouter_chambre'])){
        $type = $_POST['type'];
        $prix = $_POST['prix'];
        $desc = $_POST['description'];
        $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $photo_name = addslashes($_FILES['photo']['name']);
        $photo_size = getimagesize($_FILES['photo']['tmp_name']);
        move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/img/chambres/" . $_FILES['photo']['name']);
        $conn->query("INSERT INTO `chambre` (type,prix,photo,description) VALUES('$type', '$prix','$photo_name','$desc')") or die(mysqli_error($conn));
        header("Location: chambre.php");
    }
?>