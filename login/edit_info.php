<?php
    require_once "../admin/connect.php";
    session_start();
    if(isset($_POST['modifier'])){
        $passq = $conn->query("SELECT * FROM `users` WHERE `user_id` = $_SESSION[id]") or die(mysqli_error($conn));
        $fetchpass = $passq->fetch_array();
        $password_old = md5($_POST['password_old']);

        if($password_old == $fetchpass['password']){
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $email = $_POST['email'];
            $num = $_POST['num'];
            
            if($_POST['password_new']==''){
                $conn->query("UPDATE `users` SET `Nom` = '$nom',`Prenom` = '$prenom',`Adresse` = '$adresse',`Email` = '$email'
                ,`Num` = '$num' WHERE `user_id` = '$_SESSION[id]'") or die(mysqli_error($conn));
                echo "<script>location.href = 'user_info?success=1'</script>";
            }else{
                $password_new = md5($_POST['password_new']);
                $conn->query("UPDATE `users` SET `password` = '$password_new',`Nom` = '$nom',`Prenom` = '$prenom',`Adresse` = '$adresse',`Email` = '$email'
                ,`Num` = '$num' WHERE `user_id` = '$_SESSION[id]'") or die(mysqli_error($conn));
                echo "<script>location.href = 'user_info?success=1'</script>";
            }
        }else{
            echo("<script>location.href = 'user_info?error=1'</script>");
        }
    }
?>