<?php
    if(isset($_POST['modifier_compte'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $q = $conn->query("SELECT * FROM `admin` WHERE admin_id = '$_SESSION[admin]'") or die(mysqli_error($conn));
        $usr = $q->fetch_array();
        
        $conn->query("UPDATE `admin` SET `login` = '$username',`pass` = '$password' WHERE `admin_id` = '$_SESSION[admin]'") or die(mysqli_error($conn));
        $conn->query("UPDATE `users` SET `Nom` = '$nom', `Prenom` = '$prenom' WHERE `user_id` = '$usr[user_id]'") or die(mysqli_error($conn));
        header("Location: admins.php");
    }
?>