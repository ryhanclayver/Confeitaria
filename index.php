<?php
    require 'run.php';
    $pessoa = new Pessoa();
    $dados = $pessoa->getAll();
?>

<html>
    <div id="cordefundo">
    <?php require 'head.php'; ?>
        <main>
            <div class="container" id="formulario">
                <div class="row">
                    <!-- Formulário de Login -->
                    <div class="col-md-6">
                        <h3>Login</h3>
                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="Seu email">
                            </div>
                            <div class="mb-3">
                                <label for="loginSenha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="loginSenha" name="loginSenha" placeholder="Sua senha">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </form>
                    </div>

                    <!-- Formulário de Cadastro -->
                    <div class="col-md-6">
                        <h3>Cadastre-se</h3>
                        <form method="POST" action="PessoaAdicionar.php">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required placeholder="Seu nome">
                            </div>
                            <div class="row mb-3">
                            <div class="col">
                                    <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>

                                </div>
                                <div class="col">
                                    <label for="cpf" class="form-label">CPF:</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" required placeholder="Seu CPF">
                                </div>
                                <div class="col">
                                    <label for="sexo" class="form-label">Sexo:</label>
                                    <select class="form-select" name="sexo" id="sexo" required>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                        <option value="outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="Seu endereço">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name ="email" required placeholder="Seu email">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" required placeholder="Sua senha">
                            </div>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    <?php require 'footer.php'; ?>
    </div>
</html>