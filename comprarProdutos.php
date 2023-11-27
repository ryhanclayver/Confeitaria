<?php
// Conectando ao banco de dados e recebendo os dados dos produtos
require 'run.php';
$produto = new Produto();
$produtos = $produto->getAll();
?>

<div id="cordefundo">
    <?php require 'head.php'; ?>
    <?php require 'nav.php'; ?>

    <main class="container mt-5" id="formulario">
        <h1 class="text-center">Produtos Disponíveis</h1>

        <div class="row">
            <?php foreach ($produtos as $produto) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php
                        // Exibindo a imagem se existir
                        if (!empty($produto['imgP'])) {
                            echo '<img src="' . $produto['imgP'] . '" class="card-img-top img-fluid" alt="Imagem do Produto">';
                        } else {
                            // Se não houver imagem, exibe essa imagem
                            echo '<img src="assets/images/iconsweet.png" class="card-img-top img-fluid" alt="Imagem Padrão">';
                        }
                        ?>
                        <div class="card-body">
                            <!-- Nome do Produto -->
                            <h5 class="card-title"><?php echo $produto['nomeP']; ?></h5>
                            <!-- Preço, Quantidade, Ingredientes -->
                            <p class="card-text">
                                Preço: <?php echo $produto['precoP']; ?><br>
                                Quantidade: <?php echo $produto['quantP']; ?><br>
                                Ingredientes: <?php echo $produto['ingP']; ?>
                            </p>                                <!-- botão Comprar -->
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</div>
