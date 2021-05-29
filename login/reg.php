<?php

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $num = $_POST['num'];
        
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

            $secretAPIkey = '6LeyNuoaAAAAAExf8NY0mCU-XvB272qNj2GAGmXn';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);

            $response = json_decode($verifyResponse);
                if($response->success){
                    $query = $conn->query("SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($conn));
                    $query2 = $conn->query("SELECT * FROM `admin` WHERE `login` = '$username'") or die(mysqli_error($conn));
                    if(mysqli_num_rows($query)==0 && mysqli_num_rows($query2)==0){
                        $conn->query("INSERT INTO `users` (username,password,nom, prenom, adresse, email, num) VALUES('$username','$password','$nom', '$prenom', '$adresse', '$email', '$num')") or die(mysqli_error());
                        echo "<SCRIPT>
                            window.location.replace('login.php?succes=yes');
                        </SCRIPT>";
                    }
                    else{
                        echo "<SCRIPT>
                            window.location.replace('register.php?error=1');
                        </SCRIPT>";
                    }
                } else {
                    echo "<SCRIPT>
                            window.location.replace('register.php?error=2');
                        </SCRIPT>";
                }       
        } else{
            echo "<SCRIPT>
                    window.location.replace('register.php?error=3');
                </SCRIPT>";
        } 
    }
?>
