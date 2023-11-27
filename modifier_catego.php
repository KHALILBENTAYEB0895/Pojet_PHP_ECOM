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
    <h4>Modifier Categorie</h4>
    <?php
        $id = $_GET['id'];
        $sqlState = $pdo->prepare('SELECT * FROM categorie WHERE id=?');
        $sqlState->execute([$id]);
        $categorie = $sqlState->fetch(PDO::FETCH_ASSOC);
        if (isset($_POST['modifier'])){

            $libelle = $_POST['libelle'];
            $description = $_POST['description'];

            if(!empty($libelle) && !empty($description)){
                $sqlState = $pdo->prepare('UPDATE categorie SET libelle = ?, description = ? WHERE id=?' );
                $sqlState->execute([$libelle,$description,$id]);
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
        <!-- <div class="mb-3">
            <label class="form-label">Id</label>
            <input type="text" class="form-control" name="id" value="<?php echo $categorie['id'] ?>">
        </div> -->
        <div class="mb-3">
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle" value="<?php echo $categorie['libelle'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description"><?php echo $categorie['description'] ?></textarea>
        </div>
        <input type="submit" value="Modifer la categorie" class="btn btn-primary" name="modifier">
   </form>
   </div>
</body>
</html>