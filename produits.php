<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
   <?php include'include\navbar.php'?>
   
   <div class="container py-2">
    <h2>Liste des produits</h2>
    <?php
        require_once'include\pdo.php';
        $produits = $pdo->query("SELECT produit.*,categorie.libelle as'categorie'FROM produit INNER JOIN categorie ON produit.id_categorie=categorie.id")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Libelle</th>
                <th scope="col">Prix</th>
                <th scope="col">Reduction</th>
                <th scope="col">Nouveau prix</th>
                <th scope="col">Categorie</th>
                <th scope="col">Image</th>
                <th scope="col">Descriprion</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Opérations</th>
            </tr>
        </thead>
        <tbody>
        
            <?php 
                foreach($produits as $produit){
                    $prixFinal = ($produit['prix'])*(1-$produit['reduction']/100)
                    ?>
                    <tr>
                        <td><?php echo $produit['id'] ?></td>
                        <td><?php echo $produit['libelle'] ?></td>
                        <td><?php echo $produit['prix']." MAD" ?></td>
                        <td><?php echo $produit['reduction']." %"?></td>
                        <td><?php echo $prixFinal ?></td>
                        <td><?php echo $produit['categorie'] ?></td>
                        <td><img class="img-fluid" width="50px" height="50px" src="upload/produit/<?= $produit['image'] ?>"></td>
                        <td><?php echo $produit['description'] ?></td>
                        <td><?php echo $produit['date_creation'] ?></td>
                        <td>
                            <a href="modifier_prod.php?id=<?php echo $produit['id']?>" class="btn btn-success">Modifier</a>
                            <a href="supprimer_prod.php?id=<?php echo $produit['id']?>" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer le produit <?php echo $produit['libelle'] ?>')">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
            
        </tbody>
    </table>
    <a href="ajouter_produit.php" class="btn btn-primary">Ajouter un produit</a>
   
   </div>
</body>
</html>