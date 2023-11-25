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
   <?php 
        include'include\navbar.php';
        require_once'include\pdo.php';
    ?>
   <div class="container py-2">
    <h4>Ajouter Categorie</h4>
    <?php
        
    ?>
   <form method="post">
        <div class="my-3">
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle">
        </div>
        <div class="mb-3">
            <label class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" min="0">
        </div>
        <div class="mb-3">
            <label class="form-label">Reduction</label>
            <input type="number" class="form-control" name="prix" min="0" max="99">
        </div>
        <div class="mb-3">
            <label class="form-label">Categorie</label>
            <?php
                $categories = $pdo->query('SELECT * FROM categorie');
            ?>
            <select class="form-select" aria-label="Default select example" name="categorie">
                <option selected>Choisissez une categorie</option>
                <?php
                    foreach($categories as $categorie){
                        echo"<option value='".$categorie['id']."'>".$categorie['libelle']."</option>";
                    }
                ?>
                
            </select>
        </div>
        
        <input type="submit" value="Ajouter categorie" class="btn btn-primary" name="ajouter">
   </form>
   </div>
</body>
</html>