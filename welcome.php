<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        header("Location: index.php");      
}
?>
<html>
        
    <div id="cordefundo">
        <?php require 'head.php'; ?>
        <?php require 'nav.php'; ?>

        <main>
            <div id="mural">
                <h1>Boas-vindas à Sweet Home</h1>
                <h1>Confeitaria</h1>
            </div>
            <div id="botoes" class="text-center">
                <button type="button" class="btn btn-primary mt-7 mb-6" onclick="redirecionarCadastroProdutos()" >Cadastrar Produtos</button>
                <button type="button" class="btn btn-success mt-7 mb-6" onclick="redirecionarComprarProdutos()">Comprar Produtos</button>
            </div>
            <?php require 'footer.php'; ?>
        </main>
    </div>
    <script>
        function redirecionarCadastroProdutos() {
            // Redireciona para cadastroprodutos.php
            window.location.href = 'cadastroProdutos.php';
        }
        function redirecionarComprarProdutos() {
            // Redireciona para comprarprodutos.php
            window.location.href = 'comprarProdutos.php';
        }
    </script>
</html>