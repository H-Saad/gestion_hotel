<?php
    if(isset($_POST['modifier_compte'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nom = $_POST['nom'];
        
        $conn->query("UPDATE `admin` SET `login` = '$username',`pass` = '$password',`nom` = '$nom' WHERE `admin_id` = '$_SESSION[admin]'") or die(mysqli_error($conn));

        header("Location: admins.php");
    }
?>