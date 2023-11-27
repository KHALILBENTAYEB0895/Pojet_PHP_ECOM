<?php
  session_start();
  $isConnected = false;
  if(isset($_SESSION['utilisateur'])){
    $isConnected = true;
  }
  var_dump($isConnected);
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " aria-current="page" href="index.php">S'inscrire</a>
        <?php
            if($isConnected){
              ?>
                  <a class="nav-link " aria-current="page" href="categories.php">Lise des categories</a>
                  <a class="nav-link " aria-current="page" href="ajouter_categorie.php">Ajouter une categorie</a>
                  <a class="nav-link " aria-current="page" href="ajouter_produit.php">Ajouter un produit</a>
                  <a class="nav-link " aria-current="page" href="deconnexion.php">Deconnexion</a>

              <?php
            }
            else{
              ?>
                  <a class="nav-link " href="connexion.php">Connexion</a>
              <?php
            }
        ?>
      </div>
    </div>
  </div>
</nav>