<?php 
    session_start(); 
    
    if (isset($_SESSION['name'])){
        unset($_SESSION['name']);
    }
?>
<a href="./trangchu.php"><b>Trở về trang chủ</b></a>