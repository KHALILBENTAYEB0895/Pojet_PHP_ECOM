<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container py-2">
    <h4>Liste des categories</h4>
    <?php
        require_once '../include/pdo.php';
        $categories=$pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_OBJ);
    ?>
    <div class="list-group">
    <?php
        foreach($categories as $categorie){
            ?>
            <a href="#" class="list-group-item list-group-item-action w-25"><?php echo $categorie->libelle ?></a>
            <?php
        }
        ?>
    </div>
   </div>
</body>
</html>

<ul class="list-group list-group-flush">
        
        
        
    </ul>