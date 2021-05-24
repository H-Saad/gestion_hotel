<?php
    if(isset($_POST['modifier_compte'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        
        $conn->query("INSERT INTO `users` (Nom,Prenom) VALUES('$nom','$prenom')") or die(mysqli_error($conn));
        $q = $conn->query("SELECT * FROM `users` WHERE nom = '$nom' AND prenom = '$prenom'") or die(mysqli_error($conn));
        $fetch = $q->fetch_array();
        $conn->query("INSERT INTO `admin` (user_id,login,pass) VALUES('$fetch[user_id]','$username','$password')") or die(mysqli_error($conn));

        header("Location: admins.php");
    }
?>