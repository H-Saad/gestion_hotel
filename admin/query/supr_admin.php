<?php
    require_once "../connect.php";
    mysqli_query($conn,"DELETE FROM `admin` WHERE `admin_id` = '$_GET[admin_id]'") or die(mysqli_error($conn));
    header("Location: ../admins.php");
?>