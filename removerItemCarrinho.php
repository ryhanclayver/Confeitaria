<?php
session_start();

if (isset($_GET['id_produto'])) {
    $idProduto = $_GET['id_produto'];

    if (!empty($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $index => $item) {
            if ($item['id'] == $idProduto) {
                // Reduz a quantidade em 1
                $_SESSION['carrinho'][$index]['quantidade']--;

                // Se a quantidade for 0, remove o item do carrinho
                if ($_SESSION['carrinho'][$index]['quantidade'] == 0) {
                    unset($_SESSION['carrinho'][$index]);
                }

                // Redireciona de volta para a página do carrinho
                header("Location: carrinho.php");
                exit();
            }
        }
    }
}
// Se o ID do produto não for fornecido ou o produto não for encontrado no carrinho, redirecione para o carrinho
header("Location: carrinho.php");
exit();
?>
