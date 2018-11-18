<?php
require "Model/bdd.php";

//Fonction qui sur la base d'un id et de la fonction getProducts renvoie un seul produit
function getProduct($bdd) {
  $req = $bdd->prepare('SELECT * FROM product WHERE id = ?');
  $req->execute(array($id));
  $product = $req->fetch(PDO::FETCH_ASSOC);
  return $product[$id];
}
 ?>
