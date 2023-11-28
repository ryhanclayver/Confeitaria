<?php
    session_start();

    // Inclua o arquivo com a conexão com o banco de dados
    include("database.php");

    $email = $_POST['loginEmail'];
    $senha = $_POST['loginSenha'];

    // Evite SQL injection utilizando prepared statements
    $sql_code = "SELECT * FROM pessoa WHERE email = ? AND senha = ?";
    $stmt = $db->prepare($sql_code);
    $stmt->execute([$email, $senha]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o login foi bem-sucedido
    if($result) {
        $_SESSION['logado'] = true;
        $_SESSION['id_pessoa'] = $result['id_pessoa'];
        echo '<script>alert("Logado com sucesso"); window.location.href = "welcome.php";</script>';
        exit;
        exit;
    } else {
        echo '<script>alert("Dados de acesso inválidos"); window.location.href = "index.php";</script>';
        exit;
    }
?>

