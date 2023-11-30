<?php
	
	$nomeP     = $_POST['nomeP'];
	$precoP    = floatval($_POST['precoP']); // Transforma em float
	$quantP    = intval($_POST['quantP']); // Transforma em int
	$ingP      = $_POST['ingP'];

	if(isset($_POST['nomeP'])){
		require 'run.php';
		$produto = new Produto();
		$id_produto = $produto->adicionarP($nomeP, $precoP, $quantP, $ingP);
	}	

	if(isset($_FILES['imgP']['name']) && !empty($_FILES['imgP']['name'])){
		// Pasta onde a imagem será salva
		$pasta = 'assets/images/';
		// Gera um nome único para o arquivo
		$arquivo = md5(date('Ymdhis').rand(111,999)).'.'.pathinfo($_FILES['imgP']['name'], PATHINFO_EXTENSION);
		// Move a imagem para a pasta
		move_uploaded_file($_FILES['imgP']['tmp_name'], $pasta.$arquivo);
		// Atualiza o caminho da imagem no banco de dados
		$produto->imagem($id_produto, $pasta.$arquivo);
	}
	header('Location: welcome.php');
    exit;
?>
