<?php
 include_once("..\DAO\Formation.php");

$score=$_GET['score'];
$nb=$_GET['nbscore'];
$id=$_GET['id'];

  
$rep=Formation::UpdateScore($score,$nb,$id);
if($rep>0)
{
   
        echo "<script>window.location.href='acceuilU.php';

        </script>";

    
 
    
    
}
?>