<?php
    if(!isset($_SESSION['logado'])){
        session_start();      
    }

    session_destroy();  

    echo '<script>alert("Deslogado com sucesso"); window.location.href = "index.php";</script>';
?>