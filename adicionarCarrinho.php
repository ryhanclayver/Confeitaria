<?php
require 'run.php';
$produto = new Produto();

if (isset($_POST['comprar'])) {
    // Verifique se o ID do produto foi fornecido
    if (isset($_POST['id_produto'])) {
        $id_produto = $_POST['id_produto'];

        // Obtenha as informações do produto com base no ID usando o método get() existente
        $produto_info = $produto->get($id_produto);

        // Verifica se o carrinho já contém o produto
        $produto_existente = false;

        if (!empty($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as &$item) {
                if ($item['id'] == $id_produto) {
                    // Produto já existe no carrinho, incrementa a quantidade
                    $item['quantidade']++;
                    $produto_existente = true;
                    break;
                }
            }
        }

        if (!$produto_existente) {
            // Produto não existe no carrinho, adiciona ao carrinho
            $_SESSION['carrinho'][] = [
                'id' => $produto_info['id_produto'],
                'nome' => $produto_info['nomeP'],
                'preco' => $produto_info['precoP'],
                'quantidade' => 1
            ];
        }

        header("Location: comprarProdutos.php");
        exit();
    } else {
        echo "ID do produto não fornecido.";
    }
} else {
    echo "Parâmetro 'comprar' não enviado.";
}
?>
