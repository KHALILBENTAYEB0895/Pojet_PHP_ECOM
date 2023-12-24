<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <?php include'include\navbar.php'?>
   <div class="container py-2">
    <h2>Liste des Commandes</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Client</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                <th scope="col">Opérations</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                require_once'include/pdo.php';
                $commandes = $pdo->query('SELECT commande.*,utilisateur.login as "login" FROM commande INNER JOIN utilisateur ON commande.id_client = utilisateur.id ORDER BY commande.date_creation DESC')->fetchAll(PDO::FETCH_ASSOC); 
                foreach($commandes as $commande){
                    ?>
                    <tr>
                        <td><?php echo $commande['id'] ?></td>
                        <td><?= $commande['login'] ?></td>
                        <td><?php echo $commande['total'] ?> MAD</td>
                        <td><?php echo $commande['date_creation'] ?></td>
                        <td><a href="commande.php?id=<?= $commande['id'] ?>" class="btn btn-primary btn-sm">Afficher details</a></td>
                    </tr>
                    <?php
                }
            ?>
            
        </tbody>
    </table>
   </div>
</body>
</html>