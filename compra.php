<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit();
}

// Verifica se a chave 'carrinho' está definida na sessão
if (isset($_SESSION['carrinho'])) {
    // Conecta ao banco de dados (substitua com suas configurações)
    require 'database.php';

    try {
        // Inicia a transação
        $db->beginTransaction();

        // Itera sobre os itens do carrinho para atualizar o banco de dados
        foreach ($_SESSION['carrinho'] as $item) {
            $nomeP = $item['nome'];
            $quantidadeComprada = $item['quantidade'];
        
            // Verifica se há estoque suficiente
            $resultado = $db->prepare("SELECT quantP FROM cadastroproduto WHERE nomeP = :nomeP");
            $resultado->bindParam(':nomeP', $nomeP, PDO::PARAM_STR); // Use PARAM_STR para strings
            $resultado->execute();
        
            // Verifique se a consulta foi executada corretamente e se obteve resultados
            if ($resultado === false) {
                // Rollback da transação em caso de erro
                $db->rollBack();
                echo "Erro ao executar a consulta SQL.";
                exit();
            }
        
            $produto = $resultado->fetch(PDO::FETCH_ASSOC);
        
            // Verifica se o produto foi encontrado
            if (!$produto) {
                // Rollback da transação em caso de erro
                $db->rollBack();
                echo "Produto não encontrado: $nomeP";
                exit();
            }
        
            $quantidadeDisponivel = $produto['quantP'];
        
            if ($quantidadeComprada > $quantidadeDisponivel) {
                // Rollback da transação em caso de erro
                $db->rollBack();
                echo "Erro: Não há estoque suficiente para o produto com nome $nomeP.";
                exit();
            }
        
            // Atualiza a quantidade disponível no banco de dados
            $novaQuantidade = $quantidadeDisponivel - $quantidadeComprada;
            $atualizarEstoque = $db->prepare("UPDATE cadastroproduto SET quantP = :novaQuantidade WHERE nomeP = :nomeP");
            $atualizarEstoque->bindParam(':novaQuantidade', $novaQuantidade, PDO::PARAM_INT);
            $atualizarEstoque->bindParam(':nomeP', $nomeP, PDO::PARAM_STR); // Use PARAM_STR para strings
            $atualizarEstoque->execute();
        }

        // Commit da transação se tudo ocorrer bem
        $db->commit();

        // Limpa o carrinho após a compra
        unset($_SESSION['carrinho']);

        header("Location: carrinho.php");
        exit();
    } catch (Exception $e) {
        // Rollback da transação em caso de erro
        $db->rollBack();
        echo "Erro na transação: " . $e->getMessage();
        exit();
    }
}
?>
