<?php
session_start();

$id = $_GET['pid'];
// echo $id;
foreach($_SESSION['cart'] as $k => $valu){
    if($valu[0] == $id){
        array_splice($_SESSION['cart'], $k , 1);
        header('location:cart.php');
    }
}

?>
