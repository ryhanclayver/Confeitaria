<?php
    session_start();
   // $_SESSION['logado'] = false;
   // $_SESSION['id_pessoa'] = NULL;

        echo "Antes de alterar: ".$_SESSION['logado']."<br>";
    $_SESSION['logado'] = false;
    echo "Depois de alterar: ".$_SESSION['logado']."<br>";

    
    //echo '<script>alert("Deslogado com sucesso"); window.location.href = "index.php";</script>';

?>