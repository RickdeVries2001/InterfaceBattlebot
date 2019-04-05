<?php 
    if(empty($_GET['id'])){
        header('location: index.php');
    }
    include 'functions/db.php';
    include 'views/header.php';
    include 'views/scorebody.php';
    include 'views/footer.php';
?>