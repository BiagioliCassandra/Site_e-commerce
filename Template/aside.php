<?php
require("Model/bdd.php");
?>
<aside class="col-lg-3">
  <i class="fas fa-user-ninja fa-4x mb-3"></i>
  <ul class="list-group">
    <li>Nom d'utilisateur : <?php echo $_SESSION['user']['userName']; ?></li>
    <li>Status : <?php echo $_SESSION['user']['user_status']; ?></li>
  </ul>
  <a href="basket.php" class="my-3">Votre panier</a>
  <ul class="list-group">
    <?php
      //On boucle sur le panier stocké en session pour afficher tous ses produits
      foreach ($_SESSION["basket"] as $key => $product) {
        echo "<li class='list-group-item w-100'>". $product['product_name'] . "</li>";
      }
     ?>
     <li class='list-group-item'>Total : <?php echo $_SESSION["basketAmount"]; ?></li>
  </ul>
  <a href="logout.php" class="btn lightBg  my-3">Deconnexion</a>
</aside>
