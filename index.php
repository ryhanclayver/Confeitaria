<?php
require 'run.php';

try {
    // Criar uma nova instância da classe Pessoa
    $pessoa = new Pessoa();
    
    // Recuperar todos os dados da tabela
    $dados = $pessoa->getAll();

    // Imprimir os resultados
    foreach ($dados as $row) {
        echo "ID: " . $row['id_pessoa'] . "<br>";
        echo "Nome: " . $row['nome'] . "<br>";
        echo "Data de Nascimento: " . $row['data_nascimento'] . "<br>";
        echo "CPF: " . $row['cpf'] . "<br>";
        echo "Endereço: " . $row['endereco'] . "<br>";
        echo "Sexo: " . $row['sexo'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Senha: " . $row['senha'] . "<br>";
        echo "<hr>";
    }
} catch (PDOException $e) {
    echo "Erro ao recuperar os dados: " . $e->getMessage();
}
?>


<html>
<h1> OLÁ </h1>
</html>