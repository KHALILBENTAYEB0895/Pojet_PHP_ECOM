<?php

require_once'../include/pdo.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare('SELECT * FROM categorie Where id=?');
$sqlState->execute([$id]);
$categorie=$sqlState->fetch(PDO::FETCH_ASSOC);


$sqlState = $pdo->prepare('SELECT * FROM produit Where id_categorie=?');
$sqlState->execute([$id]);
$produits=$sqlState->fetchAll(PDO::FETCH_OBJ);

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
    
   </div>
</body>
</html>