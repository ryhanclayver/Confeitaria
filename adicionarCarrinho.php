<?php
    require 'run.php';
    $produto = new Produto();
    $produtos = $produto->getAll();
 
    if ($produto_info) {
        // Adiciona o produto ao carrinho
        $_SESSION['carrinho'][] = [
            'id' => $produto_info['id_produto'],
            'nome' => $produto_info['nomeP'],
            'preco' => $produto_info['precoP'],
            'quantidade' => 1
            ];
            header("Location: carrinho.php");
            exit();
        } else {
            echo "Produto não encontrado.";
        }
?>