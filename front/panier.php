<?php
session_start();
require_once'../include/pdo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../assets/js/produit/counter.js"></script>
    <link href="../assets/CSS/produit.css" rel="stylesheet" type="text/css">
</head>
<body class="mx-auto">
    <?php 
    include'../include/navbar_front.php';
    $idUtilisateur = $_SESSION['utilisateur']['id'];
    $panier = $_SESSION['panier'][$idUtilisateur];

    if(!empty($panier)){
        $idProduitsAchetes = array_keys($panier);
        $idProduitsAchetes = implode(',',$idProduitsAchetes);
        $produits = $pdo->query("SELECT * FROM produit WHERE id IN ($idProduitsAchetes)")->fetchAll(PDO::FETCH_ASSOC);
    }
// supprimer produit
    if(isset($_POST['supprimer'])){
        $idProduitASupprimer = $_POST['idProduit'];
        unset($_SESSION['panier'][$idUtilisateur][$idProduitASupprimer]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
    if(isset($_POST['valider'])){
        $sql = 'INSERT INTO ligne_commande(id_produit,id_commande,prix,quantité,total) VALUES';
        $total = 0;
        $ligneCommandes = [];
        foreach($produits as $produit){
            $idProduit = $produit['id'];
            $qty = $panier[$idProduit];
            $prix = $produit['prix'];
            $total += $qty*$prix;
            $ligneCommandes[$idProduit] = [
                'id' => $idProduit,
                'prix' => $prix,
                'qty' => $qty,
                'total' => $qty*$prix
            ];
        }
        $sqlStateCommande = $pdo->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)') ;
        $sqlStateCommande->execute([$idUtilisateur, $total]);  
        $idCommande =$pdo->lastInsertId();
        
        foreach($ligneCommandes as $produit){
            $id = $produit['id'];
            $sql .= "(:id$id,'$idCommande', :prix$id, :qty$id, :total$id),";
        }
        $sql = substr($sql, 0, -1);
        $sqlLigneCommande = $pdo->prepare($sql);
        foreach($ligneCommandes as $produit){
            $id = $produit['id'];
            $sqlLigneCommande->bindParam(':id'.$id, $produit['id'] );
            $sqlLigneCommande->bindParam(':prix'.$id, $produit['prix'] );
            $sqlLigneCommande->bindParam(':qty'.$id, $produit['qty'] );
            $sqlLigneCommande->bindParam(':total'.$id, $produit['total'] );
        }
        $inserted = $sqlLigneCommande->execute();
        foreach($produits as $produit){
            $idProduit = $produit['id'];
            unset($_SESSION['panier'][$idUtilisateur][$idProduit]);
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
        exit(); 
    }
    ?>
    <h4 class="m-5">Mes achats</h4>
        <div class="container">
            <div class="row mt-5">
                <?php
                    if(empty($panier)){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Votre panier est vide !</strong>
                        </div>
                        <?php
                    }else{
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Nom du produit</th>
                                <th scope="col">Option</th>
                                <th scope="col">La quantité</th>
                                <th scope="col">Prix unitaire</th>
                                <th scope="col">Total</th>
                                <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <?php
                            $Somme = 0;
                            foreach($produits as $produit){
                                $idProduit = $produit['id'];
                                $quantity = $panier[$produit['id']];
                                $Somme += $produit['prix'] * $quantity;
                                ?>
                                <tr>
                                    <td><img width="60px" src="../upload/produit/<?= $produit['image'] ?>"></td>
                                    <td><?= $produit['libelle'] ?></td>
                                    <td class="w-25"><?php include"../include/front/counter.php" ?></td>
                                    <td> x <?= $quantity ?></td>
                                    <td><?= $produit['prix'];?> MAD</td>
                                    <td><?= $produit['prix'] * $quantity;?> MAD</td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="idProduit" value="<?= $idProduit ?>">
                                            <input onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')" type="submit" class="btn btn-danger" value="Supprimer" name="supprimer">
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tfoot>
                                <tr>
                                    <td colspan="5" align="right"><strong>Total a payer</strong></td>
                                    <td ><?= $Somme ?> MAD</td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="right">
                                        <?php
                                        if(isset($_POST['vider'])){
                                            foreach($produits as $produit){
                                                $idProduit = $produit['id'];
                                                unset($_SESSION['panier'][$idUtilisateur][$idProduit]);
                                                echo '<script type="text/javascript">location.reload();</script>';
                                            }
                                        }
                                        ?>
                                        <form method="post">
                                            <input onclick="return confirm('Voulez-vous vraiment vider le panier ?')" type="submit" class="btn btn-danger" name="vider" value="Vider le panier">
                                            <input type="submit" class="btn btn-primary" name="valider" value="Valider la commande">  
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                            </table>
                        <?php
                    }
                ?>
            </div>
        </div>
    </body>
</html>

