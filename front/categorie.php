<?php

require_once'../include/pdo.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare('SELECT * FROM categorie Where id=?');
$sqlState->execute([$id]);
$categorie=$sqlState->fetch(PDO::FETCH_ASSOC);


$sqlState = $pdo->prepare('SELECT * FROM produit Where id_categorie=?');
$sqlState->execute([$id]);
$produits=$sqlState->fetchAll(PDO::FETCH_ASSOC);

var_dump($produits);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $categorie['libelle'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php include'../include/navbar_front.php' ?>
   <div class="container py-2">
    <h4><?php echo $categorie['libelle'] ?></h4>
        <div class="container">
            <div class="row">
                <?php
                    foreach($produits as $produit){
                        ?>
                            <div class="card mb-3 col-md-4">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produit['libelle']?></h5>
                                    <p class="card-text"><?= $produit['prix']?> MAD</p>
                                    <p class="card-text"><small class="text-body-secondary">Ajouté le : <?= date_format(date_create($produit['date_creation']),'Y/m/d') ?></small></p>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
</body>
</html>