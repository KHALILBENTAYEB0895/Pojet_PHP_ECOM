<?php

require_once'../include/pdo.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare('SELECT * FROM categorie Where id=?');
$sqlState->execute([$id]);
$categorie=$sqlState->fetch(PDO::FETCH_ASSOC);


$sqlState = $pdo->prepare('SELECT * FROM produit Where id_categorie=?');
$sqlState->execute([$id]);
$produits=$sqlState->fetchAll(PDO::FETCH_ASSOC);

// var_dump($produits);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $categorie['libelle'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include'../include/navbar_front.php' ?>
   <div class="container">
    <h4 class="mt-5"><i class="<?php echo $categorie['icone'] ?>"></i><?php echo $categorie['libelle'] ?></h4>
        <div class="container">
            <div class="row justify-content-between mt-5">
                <?php
                    foreach($produits as $produit){
                        ?>
                            <div class="card mb-5 mx-2 col-md-4 w-25">
                                <img src="../upload/produit/<?=$produit['image']?>" class="card-img-top" height="200px">
                                <div class="card-body">
                                    <a class="btn stretched-link text-primary" href="produit.php?id=<?=$produit['id']?>">Afficher details</a>
                                    <h5 class="card-title"><?= $produit['libelle']?></h5>
                                    <p class="card-text">Prix : <?= $produit['prix']?> MAD</p>
                                    <?php
                                        if($produit['reduction']!=0){
                                        ?>
                                        <p class="card-text"><small class=" badge text-bg-danger text-body-secondary">Nouveau prix :<?php echo $produit['prix']*(1-$produit['reduction']/100)?> MAD</small></p>
                                        <?php
                                        }
                                    ?>
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