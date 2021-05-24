<?php
    $q1 = $conn->query("SELECT * FROM `transaction` WHERE `status`='Check In'") or die(mysqli_error($conn));
    $q2 = $conn->query("SELECT * FROM `transaction` WHERE `status`='En attente' AND paiement = 'oui'") or die(mysqli_error($conn));

    if($q2){
        while($row = mysqli_fetch_assoc($q2)){
            if(strtotime($row['checkin'])<=strtotime(date('Y-m-d'))){
                $conn->query("UPDATE `transaction` SET `status` = 'Check In' WHERE transaction_id = '$row[transaction_id]'") or die(mysqli_error($conn));
                $q2 = $conn->query("SELECT * FROM `chambre` WHERE id_chambre = '$row[id_chambre]'") or die(mysqli_error($conn));
            }
        }
    }

    if($q1){
        while($row = mysqli_fetch_assoc($q1)){
            if(strtotime($row['checkout'])<=strtotime(date('Y-m-d'))){
                $q = $conn->query("SELECT * FROM `chambre` WHERE id_chambre = '$row[id_chambre]'") or die(mysqli_error($conn));
                $arr = $q->fetch_array();
    
                $conn->query("UPDATE `transaction` SET `status` = 'Check Out' WHERE transaction_id = '$row[transaction_id]'") or die(mysqli_error($conn));
                $conn->query("UPDATE `chambre` SET nb_chambres = nb_chambres + 1 WHERE id_chambre = '$arr[id_chambre]'") or die(mysqli_error($conn));
            }
        }

    }
?>