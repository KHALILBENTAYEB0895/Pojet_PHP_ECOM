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
    <h4>Modifier Produit</h4>
    <?php
        $id = $_GET['id'];
        $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id=?');
        $sqlState->execute([$id]);
        $produit = $sqlState->fetch(PDO::FETCH_ASSOC);
        if (isset($_POST['modifier'])){

            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $reduction = $_POST['reduction'];
            $id_categorie = $_POST['categorie'];
            $description = $_POST['description'];
            
            $fileName = 'default_image.png';
            if(!empty($_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                $fileName = uniqid().$image;
               move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/'.$fileName);
            }

            if(!empty($libelle) && !empty($prix) && !empty($id_categorie) ){
                $sqlState = $pdo->prepare('UPDATE produit SET libelle=?, prix=?, reduction=?, id_categorie=?, description=?, image=? WHERE id=?' );
                $sqlState->execute([$libelle,$prix,$reduction,$id_categorie,$description,$fileName,$id]);
                ?>
                    <div class="alert alert-success" role="alert">
                        <strong> La produit <?php echo $libelle?> bien est ajoutee</strong>
                    </div>
                <?php
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Veuillez remplir tous les champs !</strong>
                    </div>
                <?php
            }
        }
    ?>
   <form method="post" enctype="multipart/form-data">
   <div class="my-3">
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle" value="<?php echo $produit['libelle'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" step="0.1" min="0" value="<?php echo $produit['prix'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Reduction</label>
            <input type="number" class="form-control" name="reduction"  min="0" max="99" value="<?php echo $produit['reduction'] ?>">
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

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description"><?= $produit['description']?></textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">image</label>
            <input type="file" class="form-control" name="image">
        </div>
        
        <input type="submit" value="Modifer la produit" class="btn btn-primary" name="modifier">
   </form>
   </div>
</body>
</html>