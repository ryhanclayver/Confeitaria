<?php
    require 'run.php';
    if (!isset($_SESSION['logado'])) {
        header("Location: index.php");
    }
?>

<div id="cordefundo">
    <?php require 'head.php'; ?>
    <?php require 'nav.php'; ?>

    <main class="container mt-5">
        <h1 class="text-center">Carrinho de Compras</h1>

        <?php if (!empty($_SESSION['carrinho'])) : ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['carrinho'] as $item) : ?>
                            <tr>
                                <td><?php echo $item['nome']; ?></td>
                                <td><?php echo $item['preco']; ?></td>
                                <td><?php echo $item['quantidade']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="text-center">O carrinho está vazio.</p>
        <?php endif; ?>

    </main>
    <?php require 'footer.php'; ?>
</div>
