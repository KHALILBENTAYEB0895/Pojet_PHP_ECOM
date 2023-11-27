<?php
require_once'include\pdo.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare('DELETE FROM produit WHERE id=?');
$supprime = $sqlState->execute([$id]);

if($supprime){
    header('location: produits.php');
}else{
    echo "Error : Il y'a un probleme";
}
?>