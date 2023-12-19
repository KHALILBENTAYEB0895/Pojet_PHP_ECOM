<?php
session_start();
require_once'../include/pdo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../assets/js/produit/counter.js"></script>
    <link href="../assets/CSS/produit.css" rel="stylesheet" type="text/css">
   
</head>
<body class="mx-auto">
    <?php include'../include/navbar_front.php' ?>
    <h4 class="m-5">Mes achats</h4>
        <div class="container">
            <div class="row mt-5">
                <?php
                    $idUtilisateur = $_SESSION['utilisateur']['id'];
                    var_dump($_SESSION['panier'][$idUtilisateur]);
                ?>
            </div>
        </div>
    <!-- <script src="../assets/js/produit/counter.js"></script> -->
    </body>
</html>