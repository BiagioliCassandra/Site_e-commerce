<?php
//On redémarre immédiatement la section pour avoir accès aux informations
session_start();
//Si aucun utilisateur est enregistré en session on renvoi à l'acceuil
if(!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit;
}
//On charge les fonctions pour accéder aux données
require "Model/bdd.php";
include "Template/header.php";

//On récupère notre produits via la fonction, plus tard celle-ci effectuera une requête en base de données
$id = htmlspecialchars($_GET["id"]);
$req = $bdd->prepare('SELECT * FROM product WHERE id = ?');
$req->execute(array($id));
$product = $req->fetch(PDO::FETCH_ASSOC);
?>

<!-- $product = getProduct($id);-->
  <div class="row mt-5">
    <section class="col-lg-9">
      <h2><?php echo $product["product_name"]; ?></h2>
      <div class="container-fluide">
        <?php echo $product["product_description"]; ?>
      </div>
      <div>
        <span class="badge badge-secondary">Prix : <?php echo $product["product_price"] ?>€</span>
        <?php
        if($product["product_stock"]) {
          echo "<span class='badge badge-success'>Disponible</span>";
        }
        else {
          echo "<span class='badge badge-danger'>Indisponible</span>";
        }
         ?>
        <span class="badge badge-secondary">Catégorie : <?php echo $product["product_category"] ?></span>
        <span class="badge badge-secondary">Lieu de production :<?php echo $product["product_madeIn"] ?></span>
      </div>
      <?php
        //Si le produit est disponible on met un boutton d'ajout au panier
        if($product["product_stock"]) {
          echo "<a href='baskettreatment.php?key=". $id . "&action=add' class='btn lightBg my-3'>Ajouter au panier</a>";
        }
       ?>
    </section>
    <!-- Aside avec les informations utilisateur -->
    <?php include "Template/aside.php"; ?>
  </div>

 <?php
 include "Template/footer.php"
  ?>
