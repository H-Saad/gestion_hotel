<?php
    require_once "../connect.php";
    mysqli_query($conn,"DELETE FROM `chambre` WHERE `id_chambre` = '$_GET[id_chambre]'") or die(mysqli_error($conn));
    header("Location: ../chambre.php");
?>