<form method="post" action="">
        <div class="input-group mb-3 z-3">
            <button onclick="return false" class="btn btn-primary decrement" type="button">-</button>
            <input type="number" class="form-control quantity" placeholder="la quantite" id="qty" readonly>
            <button onclick="return false" class="btn btn-primary increment" type="button">+</button>
        </div>
        <input type="hidden" name="id" value="<?php echo $idProduit ?>">
        <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter au panier">
</form>
<script src="../assets/js/produit/counter.js"></script>