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
    <h4>Ajouter utilisateur</h4>
    <?php
        if(isset($_POST['ajouter'])){
            $login = $_POST['login'];
            $password = $_POST['password'];

            if(!empty($login) && !empty($password)){
                require_once 'include\pdo.php';
                $date = date('Y-m-d');
                $sqlState = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
                $sqlState->execute([$login,$password,$date]);
                header('location:connexion.php');
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    <strong>login et password sont obligatoires</strong>
                </div>
                <?php
            }


        }
    ?>
   <form method="post">
        <div class="mb-3">
            <label class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <input type="submit" value="S'inscrire" class="btn btn-primary" name="ajouter">
   </form>
   </div>
</body>
</html>