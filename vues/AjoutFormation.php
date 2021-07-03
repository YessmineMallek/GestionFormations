<?php
include_once('..\DAO\Formation.php');
$intu=$_GET['inti'];
$formateur=$_GET['forma'];
$des=$_GET['des'];
$date=$_GET['date'];
$prix=$_GET['prix'];
$nbre=$_GET['nbre'];
$f=new Formation(Null,$intu,$des,$formateur,$date,$nbre,0,$prix,0,0);

$rep=Formation::AjouterFormation($f);

if ($rep>0)
{
    echo "<script>
    window.location.href='acceuilAdmin.php';

    </script>";

}





?>