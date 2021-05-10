<?php

require_once('tcpdf.php');
require_once '../admin/connect.php';
$trans_id = $_REQUEST['transaction_id'];
$query = $conn->query("SELECT * FROM `transaction` WHERE `transaction_id` = '$trans_id'");
$query = $query->fetch_assoc();
$user_id = $query['user_id'];
$id_chambre = $query['id_chambre'];
$query2 = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$user_id'");
$query2 = $query2->fetch_assoc();
$query3 = $conn->query("SELECT * FROM `chambre` WHERE `id_chambre` = '$id_chambre'");
$query3 = $query3->fetch_assoc();
$transaction_id=$query['transaction_id'];$status=$query['status'];$jours=$query['jours'];$paiement=$query['paiement'];$checkin=$query['checkin'];$checkout=$query['checkout'];
$date_rdv=$query['date_rdv'];$addition=$query['addition'];$nom=$query2['Nom'];$prenom=$query2['Prenom'];$tel=$query2['Num'];$type=$query3['type'];


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
$pdf->setFooterData(array(0,64,0), array(0,64,128));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/fr.php')) {
	require_once(dirname(__FILE__).'/lang/fr.php');
	$pdf->setLanguageArray($l);
}

$pdf->setFontSubsetting(true);

$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->AddPage();

$html = <<<EOD
<center><h1>Recu de transaction de reservation:</h1></center>
<p> </p>
<table cellspacing="1" cellpadding="5" border="1" style="border-color:gray;">
    <tr style="background-color:gray;color:white;">
        <td>Numero de transaction:</td>
        <td>Nom:</td>
        <td>Prenom:</td>
        <td>Tel:</td>
        <td>Numero de chambre:</td>
    </tr>
    <tr>
        <td>$transaction_id</td>
        <td>$nom</td>
		<td>$prenom</td>
        <td>$tel</td>
		<td>$id_chambre</td>
    </tr>
</table>
<p> </p>
<table cellspacing="1" cellpadding="5" border="1" style="border-color:gray;">
    <tr style="background-color:gray;color:white;">
        <td>Type de chambre:</td>
        <td>Jours:</td>
        <td>Debut:</td>
        <td>Fin:</td>
        <td>Paiement en ligne:</td>
    </tr>
    <tr>
        <td>$type</td>
        <td>$jours</td>
		<td>$checkin</td>
        <td>$checkout</td>
		<td>$paiement</td>
    </tr>
</table>
<br>
<p>Date de confirmation (paiement a l'hotel): $date_rdv</p>
<p>Total: $addition DH</p>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('recu_transaction', 'I');