<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

// Função para calcular o preço total de um item
function calcularPrecoTotal($quantidade, $precoUnitario)
{
    return $quantidade * $precoUnitario;
}

// Função para remover um item do carrinho
function removerItemCarrinho($idProduto)
{
    if (!empty($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $index => $item) {
            if ($item['id'] == $idProduto) {
                // Reduz a quantidade em 1
                $_SESSION['carrinho'][$index]['quantidade']--;

                // Se a quantidade for 0, remove o item do carrinho
                if ($_SESSION['carrinho'][$index]['quantidade'] == 0) {
                    unset($_SESSION['carrinho'][$index]);
                }

                break;
            }
        }
    }
}

?>

<div id="cordefundo">
    <?php require 'head.php'; ?>
    <?php require 'nav.php'; ?>

    <main class="container mt-5">
        <h1 class="text-center">Carrinho de Compras</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Produto</th>
                        <th>Preço Unitário</th>
                        <th>Quantidade</th>
                        <th>Preço Total</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_SESSION['carrinho'])) {
                        foreach ($_SESSION['carrinho'] as $item) {
                            ?>
                            <tr>
                                <td><?php echo $item['nome']; ?></td>
                                <td><?php echo $item['preco']; ?></td>
                                <td><?php echo $item['quantidade']; ?></td>
                                <td><?php echo calcularPrecoTotal($item['quantidade'], $item['preco']); ?></td>
                                <td>
                                <button type="button" class="btn btn-danger" onclick="removerItem(<?php echo $item['id']; ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path d="M16 1.75V3h5.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75Zm-6.5 0V3h5V1.75a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25ZM4.997 6.178a.75.75 0 1 0-1.493.144L4.916 20.92a1.75 1.75 0 0 0 1.742 1.58h10.684a1.75 1.75 0 0 0 1.742-1.581l1.413-14.597a.75.75 0 0 0-1.494-.144l-1.412 14.596a.25.25 0 0 1-.249.226H6.658a.25.25 0 0 1-.249-.226L4.997 6.178Z"></path>
                                        <path d="M9.206 7.501a.75.75 0 0 1 .793.705l.5 8.5A.75.75 0 1 1 9 16.794l-.5-8.5a.75.75 0 0 1 .705-.793Zm6.293.793A.75.75 0 1 0 14 8.206l-.5 8.5a.75.75 0 0 0 1.498.088l.5-8.5Z"></path>
                                    </svg>
                                </button>
</td>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">Nenhum item no carrinho</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
    <?php require 'footer.php'; ?>

    <script>
        function removerItem(idProduto) {
            // Chama a página que remove o item do carrinho
            window.location.href = 'removerItemCarrinho.php?id_produto=' + idProduto;
        }
    </script>
</div>
