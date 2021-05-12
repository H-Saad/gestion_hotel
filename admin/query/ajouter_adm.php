<?php
    if(isset($_POST['modifier_compte'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nom = $_POST['nom'];
        
        $conn->query("INSERT INTO `admin` (nom,login,pass) VALUES('$nom','$username','$password')") or die(mysqli_error($conn));

        header("Location: admins.php");
    }
?>