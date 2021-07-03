<?php

include_once('..\DAO\formation.php');
include_once('..\DAO\reservation.php');

$id_formation=$_GET['id'];
$log=$_GET['log'];

$f=Formation::FindById($id_formation);
$reservatinConf=Reservation::findAllReservationConfirmé($id_formation);
if($reservatinConf != $f->nbPlace)
{
    $f->nbReservation=$f->nbReservation+1;
    echo 
    Reservation::updateReservation($id_formation,$log);
    
    $to_email = "phpmailer674@gmail.com";
    $subject = "Confirmation formation";
    $body =" Salut,
    votre demande pour la formation est accepté
    merci pour votre participation";
    $headers = "From: sender\'s email";
     
    if (mail($to_email, $subject, $body)) {
        echo "<script>alert ('Email successfully sent to $to_email...');</script>";
    } else {
       
        echo "<script>alert ('Email sending failed...');</script>";
    }
    header("location: acceuilAdmin.php");
}





?>
