<?php
    require_once "../connect.php";
    $q1=$conn->query("SELECT * FROM `transaction` WHERE `transaction_id`='$_REQUEST[transaction_id]'") or die(mysqli_error($conn));
    $arr = $q1->fetch_array();
    $id_chambre = $arr['id_chambre'];
    $conn->query("UPDATE `transaction` SET `paiement`='oui' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error($conn));
    $conn->query("UPDATE `chambre` SET nb_chambres = nb_chambres - 1 WHERE id_chambre = '$id_chambre'") or die(mysqli_error($conn));
    echo "<SCRIPT>
        alert('Succes')
        window.location.replace('../reservation.php');
    </SCRIPT>";
?>