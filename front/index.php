<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Ecommerce</title>
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
    <?php
    include'../include/navbar_front.php'
    ?>
   <div class="container py-2">
    <h4><i class="fa-solid fa-list"></i>Liste des categories</h4>
    <?php
        require_once '../include/pdo.php';
        $categories=$pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="list-group">
    <?php
        foreach($categories as $categorie){
            ?>
            <a href="categorie.php?id=<?php echo $categorie['id']?>" class="list-group-item list-group-item-action w-25">
            <i class="<?php echo $categorie['icone']?>"></i><?php echo " " . $categorie['libelle']?>
            </a>
            <?php
        }
        ?>
    </div>
   </div>
</body>
</html>

