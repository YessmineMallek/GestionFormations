<?php

session_start();          
include_once('..\DAO\Reservation.php');
                include_once('..\DAO\formation.php');


                    $login=$_SESSION['login'];
                    $int=$_GET['intu'];
                  
                    $f=Formation::FindById($int);
                    $u=new Reservation(0,$login,$f->id);
                    $rep=Reservation::ajout($u);

                    
                    if ($rep>0)
                      {
                        echo("<script>alert('ajout du reservation est effectué avec succées');</script>");
                        $nbRes=$f->nbReservation+1;
                        formation::Update($nbRes,$f);
                        
                      }  
                      header('location: acceuilU.php'); 


?>