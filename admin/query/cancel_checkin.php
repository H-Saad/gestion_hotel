<?php
    require_once "../connect.php";
    $conn->query("UPDATE `transaction` SET `status`='En attente' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error($conn));
    echo "<SCRIPT>
        alert('Succes')
        window.location.replace('../checkin.php');
    </SCRIPT>";
?>