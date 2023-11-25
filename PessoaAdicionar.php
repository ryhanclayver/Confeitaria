<?php
	
    $nome = $_POST['nome'];
    $data_nascimento = date('Y-m-d', strtotime($_POST['data_nascimento']));
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
	if(isset($_POST['nome'])){
		require 'run.php';
		$pessoa = new Pessoa();
		$id_pessoa = $pessoa->adicionar($nome,$data_nascimento,$cpf,$endereco,$sexo,$email,$senha);
	}
    exit;