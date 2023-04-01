<?php session_start();
    if(isset($_POST['submit'])){
        unset($_SESSION['filters']);
        unset($_SESSION['get']);
        header('Location: /portfolio/allosimplon/build/content/catalogue.php?page=1');
    }
?>