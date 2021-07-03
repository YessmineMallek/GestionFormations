<?php
try
{
    $conn = new PDO('mysql:host=localhost;dbname=bdformation', 'root', '');
}
catch (PDOException $e)
{
    die('Erreur : ' . $e->getMessage());
}




?>