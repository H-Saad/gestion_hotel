<?php

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
            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

                $secretAPIkey = '6LeyNuoaAAAAAExf8NY0mCU-XvB272qNj2GAGmXn';
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);
    
                $response = json_decode($verifyResponse);
                    if($response->success){
                        $query = $conn->query("SELECT * FROM `users` WHERE `username` = '$uname' && `password` = '$pswd'") or die(mysqli_error($conn));
                        $query2 = $conn->query("SELECT * FROM `admin` WHERE `login` = '$uname' && `pass` = '$pswd'") or die(mysqli_error($conn));
                        if(mysqli_num_rows($query)==0){
                            header("Location: login.php?error=invalid");
                        }else{
                            $res = $query->fetch_array();
                            $_SESSION['id'] = $res['user_id'];
                            $_SESSION['prenom'] = $res['Prenom'];
                            $_SESSION['username'] = $res['username'];
                            header("Location: chambres.php?log=1");
                            exit();
                        }
                        if(mysqli_num_rows($query2)!=0){
                            $res2 = $query2->fetch_array();
                            $_SESSION['admin'] = $res2['admin_id'];
                            header("Location: admin/chambre.php");
                        }
                        } else {
                        echo "<SCRIPT>
                                window.location.replace('login.php?error=1');
                            </SCRIPT>";
                        }   
    }else{
        echo "<SCRIPT>
                window.location.replace('login.php?error=2');
            </SCRIPT>";
    }
    }
    }
?>