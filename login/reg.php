<?php
    require_once "../admin/connect.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $num = $_POST['num'];
        
        $query = $conn->query("SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($conn));
        if(mysqli_num_rows($query)==0){
            $conn->query("INSERT INTO `users` (username,password,nom, prenom, adresse, email, num) VALUES('$username','$password','$nom', '$prenom', '$adresse', '$email', '$num')") or die(mysqli_error());
            header("Location: ../login.php?succes=yes");
        }
        else{
            header("Location: ../register.php?error=exists");
        }
    }
?>