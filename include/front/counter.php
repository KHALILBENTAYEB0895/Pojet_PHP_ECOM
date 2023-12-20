<form method="post" action="ajouter_panier.php">
    <?php
    ob_start();
        $idUtilisatetur = $_SESSION['utilisateur']['id'];
        $quantity = $_SESSION['panier'][$idUtilisatetur][$idProduit] ?? 0 ;
        $button = $quantity == 0 ? 'Ajouter au panier' : 'Modifier';
    ob_end_flush();
    ?>
        <div class="input-group mb-3 z-3 w-75">
            <button  class="btn btn-primary decrement" type="button">-</button>
            <input type="number" class="form-control quantity" placeholder="la quantite" name="qty" id="qty" value="<?= $quantity ?>">
            <button  class="btn btn-primary increment" type="button">+</button>
        </div>
        <input type="hidden" name="id" value="<?php echo $idProduit ?>">
        <div class="input-group mb-3 z-3">
            <input type="submit" class="btn btn-success z-10" name="ajouter" value="<?= $button; ?>" >
        </div>
</form>
