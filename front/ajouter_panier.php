<?php
    session_start();
    if(!isset($_SESSION['utilisateur'])){
        header('location:../connexion.php');
    }
    // var_dump($_POST);
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $idUtilisateur = $_SESSION['utilisateur']['id'];
    var_dump($idUtilisateur);
    if(!empty($id) && !empty($qty)){
        if(!isset($_SESSION['panier'][$idUtilisateur])){
            $_SESSION['panier'][$idUtilisateur] = [];
        }
        $_SESSION['panier'][$idUtilisateur][] = [
            'id' => $id ,
            'qty' => $qty
        ];

        var_dump( $_SESSION['panier'][$idUtilisateur]);
    }else{
        header("location:produit.php?id=$id");
    }
?>