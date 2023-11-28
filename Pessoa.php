<?php
class Pessoa extends model{

	public function adicionar($nome,$data_nascimento, $cpf,$endereco, $sexo, $email, $senha){
		$sql = "INSERT INTO pessoa (nome, data_nascimento, cpf, endereco, sexo, email, senha)
		        VALUES (:nome, :data_nascimento, :cpf, :endereco, :sexo, :email, :senha)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"    , $nome);
		$sql->bindValue(":data_nascimento"   , $data_nascimento);
        $sql->bindValue(":cpf"    , $cpf);
        $sql->bindValue(":endereco", $endereco);
        $sql->bindValue(":sexo"    , $sexo);
        $sql->bindValue(":email"    , $email);
        $sql->bindValue(":senha"    , $senha);
		$sql->execute();

		return $this->db->lastInsertId();
	}

	public function editar($id_pessoa,$nome,$data_nascimento, $cpf,$endereco, $sexo, $email, $senha){
		$sql = "UPDATE pessoa 
		           SET nome     = :nome
		             , data_nascimento    = :data_nascimento
                     , cpf      = :cpf
                     , endereco = :endereco
		             , sexo     = :sexo
                     , email    = :email
                     , senha    = :senha
		         WHERE id_pessoa = :id_pessoa";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"     , $nome);
		$sql->bindValue(":data_nascimento"    , $data_nascimento);
        $sql->bindValue(":cpf" , $cpf);
        $sql->bindValue(":endereco" , $endereco);
		$sql->bindValue(":sexo"     , $sexo);
        $sql->bindValue(":email" , $email);
        $sql->bindValue(":senha" , $senha);
		$sql->bindValue(":id_pessoa", $id_pessoa);
		$sql->execute();
	}

	public function excluir($id_pessoa){
		$sql = "DELETE FROM pessoa WHERE id_pessoa = :id_pessoa";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_pessoa", $id_pessoa);
		$sql->execute();
	}

	public function get($id_pessoa){
		$array = array();

		$sql = "SELECT * 
		          FROM pessoa
		         WHERE id_pessoa = :id_pessoa";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_pessoa', $id_pessoa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM PESSOA ORDER BY NOME";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}
}
