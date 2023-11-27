<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
   <?php include'include\navbar.php'?>
   
   <div class="container py-2">
    <h2>Liste des categogies</h2>
    <?php
        require_once'include\pdo.php';
        $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Libelle</th>
                <th scope="col">Description</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Opérations</th>
            </tr>
        </thead>
        <tbody>
        
            <?php 
                foreach($categories as $categorie){
                    ?>
                    <tr>
                        <td><?php echo $categorie['id'] ?></td>
                        <td><?php echo $categorie['libelle'] ?></td>
                        <td><?php echo $categorie['description'] ?></td>
                        <td><?php echo $categorie['date_creation'] ?></td>
                        <td>
                            <a href="modifier_catego.php?id=<?php echo $categorie['id']?>" class="btn btn-success" >Modifier</a>
                            <a href="supprimer_catego.php?id=<?php echo $categorie['id']?>" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer la categorie <?php echo $categorie['libelle'] ?>')">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
            
        </tbody>
    </table>
    <a href="ajouter_categorie.php" class="btn btn-primary">Ajouter une categorie</a>
   
   </div>
</body>
</html>