<?php
    require 'run.php';
    $pessoa = new Pessoa();
    $dados = $pessoa->getAll();
?>

<?php require 'head.php'; ?>

<html>
    <div class="container mt-5 id" >
        <div class="row">
            <!-- Formulário de Login -->
            <div class="col-md-6">
                <h3>Login</h3>
                <form>
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="loginEmail" placeholder="Seu email">
                    </div>
                    <div class="mb-3">
                        <label for="loginSenha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="loginSenha" placeholder="Sua senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>

            <!-- Formulário de Cadastro -->
            <div class="col-md-6">
                <h3>Cadastre-se</h3>
                <form>
                    <div class="mb-3">
                        <label for="cadastroNome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="cadastroNome" placeholder="Seu nome">
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                            <label for="cadastroDataNascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="cadastroDataNascimento">
                        </div>
                        <div class="col">
                            <label for="cadastroCpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" id="cadastroCpf" placeholder="Seu CPF">
                        </div>
                        <div class="col">
                            <label for="cadastroSexo" class="form-label">Sexo:</label>
                            <select class="form-select" id="cadastroSexo">
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cadastroEndereco" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="cadastroEndereco" placeholder="Seu endereço">
                    </div>
                    <div class="mb-3">
                        <label for="cadastroEmail" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="cadastroEmail" placeholder="Seu email">
                    </div>
                    <div class="mb-3">
                        <label for="cadastroSenha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="cadastroSenha" placeholder="Sua senha">
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</html>