<?php
    require_once "../admin/connect.php";
    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){
        $uname = $_POST['username'];
        $pswd = md5($_POST['password']);

        if(empty($uname)){
            header("Location: index.php?error=Enter username");
            exit();
        }
        else if(empty($pswd)){
            header("Location: index.php?error=Enter password");
            exit();
        }
        else{
            $query = $conn->query("SELECT * FROM `users` WHERE `username` = '$uname' && `password` = '$pswd'") or die(mysqli_error($conn));
            if(mysqli_num_rows($query)==0){
                header("Location: ../login.php?error=invalid");
            }else{
                $res = $query->fetch_array();
                $_SESSION['id'] = $res['user_id'];
                $_SESSION['prenom'] = $res['Prenom'];
                $_SESSION['username'] = $res['username'];
                header("Location: ../chambres.php");
                exit();
            }
        }
    }
?>