<?php

require_once'../include/pdo.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare('SELECT * FROM produit Where id=?');
$sqlState->execute([$id]);
$produit=$sqlState->fetch(PDO::FETCH_ASSOC);
// var_dump($produit);die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produit['libelle'] ?></title>
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
    <h4 class="m-5 ps-2"></i><?php echo $produit['libelle'] ?></h4>
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0 ">
                <div class="col-md-4">
                <img src="../upload/produit/<?php echo $produit['image']?>" class="img-fluid rounded-start h-100">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit['libelle']?></h5>
                    <p class="card-text"><?php echo $produit['description']?></p>
                    <p class="card-text"><small class="text-body-secondary"> prix :<?php echo $produit['prix']?> MAD</small></p>
                    <?php
                        if($produit['reduction']!=0){
                            ?>
                            <p class="card-text"><small class=" badge text-bg-danger text-body-secondary">Nouveau prix :<?php echo $produit['prix']*(1-$produit['reduction']/100)?> MAD</small></p>
                            <?php
                        }
                    ?>
                    <a class=" btn btn-primary" href="#"> Ajouter au panier</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>