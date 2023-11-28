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
   <?php include'include\navbar.php'?>
   <div class="container py-2">
    <h4>Ajouter Categorie</h4>
    <?php
        if(isset($_POST['ajouter'])){
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];
            if(!empty($libelle) && !empty($description)){
                require_once 'include\pdo.php';
                $sqlState = $pdo->prepare('INSERT INTO categorie(libelle,description,icone) values(?,?,?)');
                $sqlState->execute([$libelle,$description,$icone]);
                ?>
                    <div class="alert alert-success" role="alert">
                        <strong> La categorie <?php echo $libelle?> bien est ajoutee</strong>
                    </div>
                <?php
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Libelle , description sont obligatoires</strong>
                    </div>
                <?php
            }
        }
    ?>
   <form method="post">
        <div class="mb-3">
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Icone</label>
            <input type="text" class="form-control" name="icone">
        </div>
        <input type="submit" value="Ajouter la categorie" class="btn btn-primary" name="ajouter">
   </form>
   </div>
</body>
</html>