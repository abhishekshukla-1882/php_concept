<?php
session_start();
$quantity = $_POST['quan'];
$id = $_POST['id'];
// echo $id , $quantity;

foreach($_SESSION['cart'] as $k => $v){
    if($v[0] == $id){
        $_SESSION['cart'][$k][3] = $quantity;
        header('location:cart.php');

        // echo "<br>",$v[3];
        // echo "<pre>";
        // print_r($_SESSION['cart']);
        // echo "</pre>";

    }
}

?>