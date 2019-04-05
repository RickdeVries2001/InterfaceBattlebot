<?php 
    if(empty($_GET['id'])){
        header('location: index.php');
    }
    setcookie("id", $_GET['id'], time() + (86400 * 30));
    include 'functions/db.php';
    include 'views/header.php';
    include 'views/scorebody.php';
    include 'views/footer.php';
?>