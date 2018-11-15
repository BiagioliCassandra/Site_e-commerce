<?php
//Fonction qui sur la base d'un id et de la fonction getProducts renvoie un seul produit
function getProduct($id) {
  $products = getProducts();
  return $products[$id];
}
 ?>
