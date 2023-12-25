<?php
require_once'include/pdo.php';
$idCommande = $_GET['id'];
$sqlState = $pdo->prepare('SELECT commande.*,utilisateur.login as "login" FROM commande 
                INNER JOIN utilisateur ON commande.id_client = utilisateur.id 
                WHERE commande.id = ?
                ORDER BY commande.date_creation DESC');
$sqlState->execute([$idCommande]);
$commande = $sqlState->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Nr : <?= $commande['id'] ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <?php include'include\navbar.php'?>
   <div class="container py-2">
    <h2>La commande</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Client</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                <th scope="col">Opérations</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                require_once'include/pdo.php';
                $commandes = $pdo->query('SELECT commande.*,utilisateur.login as "login" FROM commande INNER JOIN utilisateur ON commande.id_client = utilisateur.id')->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <tr>
                        <td><?php echo $commande['id'] ?></td>
                        <td><?= $commande['login'] ?></td>
                        <td><?php echo $commande['total'] ?> MAD</td>
                        <td><?php echo $commande['date_creation'] ?></td>
                        <td><a href="commandes.php" class="btn btn-primary btn-sm">revenir au liste des commandes</a></td>
                    </tr>
        </tbody>
    </table>
   </div>
   <div class="container py-2">
    <h2>Details de la commande</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Produit</th>
                <th scope="col">Prix unitaire</th>
                <th scope="col">Quantité</th>
                <th scope="col">Total</th>
                
            </tr>
        </thead>
        <?php
            $sqlLigneCommande = $pdo->prepare('SELECT ligne_commande.*, produit.libelle, produit.image from ligne_commande
                                             INNER JOIN produit ON ligne_commande.id_produit = produit.id
                                             WHERE id_commande = ?');
            $sqlLigneCommande->execute([$idCommande]);
            $lignesCommandes = $sqlLigneCommande->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <tbody>
            <?php foreach($lignesCommandes as $ligneCommande) : ?>
                <tr>
                <td><?php echo $ligneCommande['id'] ?></td>
                <td><?php echo $ligneCommande['libelle'] ?></td>
                <td><?php echo $ligneCommande['prix'] ?> MAD</td>
                <td>x<?php echo $ligneCommande['quantité']?></td>
                <td><?php echo $ligneCommande['total']?> MAD</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   </div>
</body>
</html>