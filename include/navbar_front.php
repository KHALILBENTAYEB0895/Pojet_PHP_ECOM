<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse row justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav col-md-4">
        <a class="nav-link " aria-current="page" href="index.php">Liste des Catégories</a>
      </div>
      
      <?php
        $idUtilisateur = $_SESSION['utilisateur']['id'];
        // var_dump($_SESSION['panier'][$idUtilisateur]);
      ?>
      
      <a class="btn col-md-2" href="panier.php"><i class="fa-solid fa-cart-shopping"></i>
        Panier(
          <?php
            // Vérifie si le panier existe et n'est pas vide
            if(isset($_SESSION['panier'][$idUtilisateur]) && !empty($_SESSION['panier'][$idUtilisateur])) {
                echo count($_SESSION['panier'][$idUtilisateur]);
            } else {
                echo '0';
            }
            ?>
        )
      </a>
    </div>
  </div>
</nav>
<?php
// if(isset())
?>