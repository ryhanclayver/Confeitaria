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
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4">Nenhum item no carrinho</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
    <?php require 'footer.php'; ?>
</div>
