<?php

require 'run.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produto'])) {
    $idProduto = $_POST['id_produto'];

    $produto = new Produto();
    $produto_info = $produto->get($idProduto);

    if ($produto_info) {
        $_SESSION['carrinho'][] = [
            'id' => $produto_info['id_produto'],
            'nome' => $produto_info['nomeP'],
            'preco' => $produto_info['precoP'],
            'quantidade' => 1
        ];
        header("Location: comprarProdutos.php");
        exit();
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto não fornecido.";
}
?>
