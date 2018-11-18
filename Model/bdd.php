<?php
    //On se connecte à la base de données
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=Siteecommerce;charset=utf8', 'phpmyadmin', 'AdaLinkLoulouZelda', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }
?>