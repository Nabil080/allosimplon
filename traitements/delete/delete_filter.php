<?php session_start();
    if(isset($_POST['submit'])){
        unset($_SESSION['filters']);
        unset($_SESSION['get']);
        header('Location: /portfolio/allosimplon/content/catalogue.php?page=1');
    }
?>