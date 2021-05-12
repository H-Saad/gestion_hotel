<?php
    if(isset($_POST['modifier_compte'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $num = $_POST['num'];
        
        $conn->query("UPDATE `users` SET `username` = '$username',`password` = '$password',`Nom` = '$nom',`Prenom` = '$prenom',`Adresse` = '$adresse',`Email` = '$email'
        ,`Num` = '$num' WHERE `user_id` = '$_REQUEST[user_id]'") or die(mysqli_error($conn));

        header("Location: users.php");
    }
?>