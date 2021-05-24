<?php
	require_once 'admin/connect.php';
	if(ISSET($_POST['submit'])){
		$id_chambre = $_REQUEST['id_chambre'];
		$usr_id = $_SESSION['id'];
		$checkin = $_POST['checkin'];
		$checkout = $_POST['checkout'];
        $paiement = $_POST['paiement'];
		$date_rdv = $_POST['rdv'];
		$date1 = new DateTime($_POST['checkin']);
		$date2 = new DateTime($_POST['checkout']);
		$days = $date2->diff($date1)->format("%a");
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `id_chambre` = '$id_chambre' && `status` = 'En attente'") or die(mysqli_error());
		$query3 = $conn->query("SELECT `prix` FROM `chambre` WHERE `id_chambre` = '$id_chambre'") or die(mysqli_error($conn));
		$row = $query2->num_rows;
		$res = $query3->fetch_array();
		$price = $res['prix'];
		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Date invalide')</script>";
			}else{
				$query = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$usr_id'") or die(mysqli_error());
				$fetch = $query->fetch_array();
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Date invalide</label><br />";
							$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'En attente'") or die(mysqli_error());
							while($f_date = $q_date->fetch_array()){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
										</li>
									</ul>";
							}
						"</div>";
				}else{	
                        if($usr_id = $fetch['user_id']){
						$bill = $price * $days;
						if($_POST['rdv']==''){
							$conn->query("INSERT INTO `transaction`(user_id, id_chambre, status, jours, paiement, checkin, checkout, addition) VALUES('$usr_id', '$id_chambre', 'En attente', '$days', '$paiement', '$checkin', '$checkout', '$bill')") or die(mysqli_error($conn));
							$conn->query("UPDATE `chambre` SET nb_chambres = nb_chambres - 1 WHERE id_chambre = '$id_chambre'");
						}else{
							$conn->query("INSERT INTO `transaction`(user_id, id_chambre, status, jours, paiement, checkin, checkout, date_rdv, addition) VALUES('$usr_id', '$id_chambre', 'En attente', '$days', '$paiement', '$checkin', '$checkout', '$date_rdv', '$bill')") or die(mysqli_error($conn));
						}
						$q = $conn->query("SELECT * FROM `transaction` WHERE `user_id` = '$usr_id' && `id_chambre` = '$id_chambre' && `status` = 'En attente' && `jours` = '$days' && `paiement` = '$paiement' && `checkin` = '$checkin' && `checkout` = '$checkout' && `addition` = '$bill'");
						$q = $q->fetch_array();
						$trans_id = $q['transaction_id'];
						echo("<script>location.href = 'recu/recu.php?transaction_id=$trans_id';</script>");
                        }else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}
	}
?>