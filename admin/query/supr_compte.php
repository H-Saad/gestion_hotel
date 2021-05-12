<?php
    require_once "../connect.php";
    mysqli_query($conn,"DELETE FROM `users` WHERE `user_id` = '$_GET[user_id]'") or die(mysqli_error($conn));
    header("Location: ../users.php");
?>