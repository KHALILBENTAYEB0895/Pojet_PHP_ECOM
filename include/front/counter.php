<form method="post" action="ajouter_panier.php">
        <div class="input-group mb-3 z-3">
            <button  class="btn btn-primary decrement" type="button">-</button>
            <input type="number" class="form-control quantity" placeholder="la quantite" name="qty" id="qty" readonly>
            <button  class="btn btn-primary increment" type="button">+</button>
        </div>
        <input type="hidden" name="id" value="<?php echo $idProduit ?>">
        <div class="input-group mb-3 z-3">
            <input type="submit" class="btn btn-success z-10" name="ajouter" value="Ajouter au panier">
        </div>
</form>
<script src="../assets/js/produit/counter.js"></script>