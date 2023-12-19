<form method="post" action="ajouter_panier.php">
    <?php
        $idUtilisatetur = $_SESSION['utilisateur']['id'];
        $quantity = $_SESSION['panier'][$idUtilisatetur][$idProduit] ?? 0 ;
        $button = $quantity == 0 ? 'Ajouter au panier' : 'Modifier';
        // var_dump($quantity);
    ?>
        <div class="input-group mb-3 z-3">
            <button  class="btn btn-primary decrement" type="button">-</button>
            <input type="number" class="form-control quantity" placeholder="la quantite" name="qty" id="qty" value="<?= $quantity ?>" readonly>
            <button  class="btn btn-primary increment" type="button">+</button>
        </div>
        <input type="hidden" name="id" value="<?php echo $idProduit ?>">
        <div class="input-group mb-3 z-3">
            <input type="submit" class="btn btn-success z-10" name="ajouter" value="<?= $button; ?>" >
        </div>
</form>
<script src="../assets/js/produit/counter.js"></script>