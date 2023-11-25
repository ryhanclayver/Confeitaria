<div id="cordefundo">
    <?php require 'head.php'; ?>
    <?php require 'nav.php'; ?>

    <div class="container" id="formulario">
        <div class="row">
            <div class="col-md-6" >
                <h3>Cadastro de Produtos</h3>
                <form method="POST" action="produtoadicionar.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nomeP" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomeP" name="nomeP" placeholder="Nome do Produto">
                    </div>
                    <div class="mb-3">
                        <label for="precoP" class="form-label">Preço:</label>
                        <input type="text" class="form-control" id="precoP" name="precoP" placeholder="Preço do Produto">
                    </div>
                    <div class="mb-3">
                        <label for="quantP" class="form-label">Quantidade:</label>
                        <input type="number" class="form-control" id="quantP" name="quantP" placeholder="Quantidade do Produto">
                    </div>
                    <div class="mb-3">
                        <label for="ingP" class="form-label">Ingredientes:</label>
                        <input type="text" class="form-control" id="ingP" name="ingP" placeholder="Lista de Ingredientes">
                    </div>
                    <div class="mb-3">
                        <label for="imgP" class="form-label">Imagem:</label>
                        <input type="file" class="form-control" id="imgP" name="imgP" accept="image/*" placeholder="Imagem do Produto">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</div>