<?php
    if(isset($_POST['modifier_chambre'])){
        $type = $_POST['type'];
        $prix = $_POST['prix'];
        $desc = $_POST['description'];
        $nb_t = $_POST['nb_chambres_t'];
        $nb_d = $_POST['nb_chambres_d'];
        if(isset($_POST['photo'])){
            $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
            $photo_name = addslashes($_FILES['photo']['name']);
            $photo_size = getimagesize($_FILES['photo']['tmp_name']);
            move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/img/chambres/" . $_FILES['photo']['name']);
            $conn->query("UPDATE `chambre` SET `type` = '$type',`nb_chambres`= '$nb_d',`nb_chambres_total`= '$nb_t', `prix` = '$prix', `photo` = '$photo_name', `description` = '$desc' WHERE `id_chambre` = '$_GET[id_chambre]'") or die(mysqli_error($conn));
        }else{
            $conn->query("UPDATE `chambre` SET `type` = '$type',`nb_chambres`= '$nb_d',`nb_chambres_total`= '$nb_t', `prix` = '$prix', `description` = '$desc' WHERE `id_chambre` = '$_GET[id_chambre]'") or die(mysqli_error($conn));
        }
        header("Location: chambre.php");
    }
?>