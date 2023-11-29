<?php
    session_start();
    if(!isset($_SESSION['logado'])){
            header("Location: index.php");      
    }
?>

<div id="cordefundo">
    <?php require 'head.php'; ?>
    <?php require 'nav.php'; ?>
    

    <?php require 'footer.php'; ?>
</div>



