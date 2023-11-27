<?php
require_once'include\pdo.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare('DELETE FROM categorie WHERE id=?');
$supprime = $sqlState->execute([$id]);

if($supprime){
    header('location: categories.php');
}else{
    echo "Error : Il y'a un probleme";
}
?>