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

if(!isset($_SESSION['panier'][$idUtilisateur])){
    $_SESSION['panier'][$idUtilisateur]=[];
}
if($qty == 0){
    unset($_SESSION['panier'][$idUtilisateur][$id]);
}else{
    $_SESSION['panier'][$idUtilisateur][$id]=$qty;
}
echo "<pre>";
    var_dump($_SESSION['panier']);
echo "<pre>";

header("location: produit.php?id=$id");

// session_destroy();

?>