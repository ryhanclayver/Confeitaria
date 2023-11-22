<?php
class Pessoa extends model{

	public function adicionar($nome,$idade,$sexo,$endereco){
		$sql = "INSERT INTO pessoa (nome, idade, sexo, endereco)
		        VALUES (:nome, :idade, :sexo, :endereco)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"    , $nome);
		$sql->bindValue(":idade"   , $idade);
		$sql->bindValue(":sexo"    , $sexo);
		$sql->bindValue(":endereco", $endereco);
		$sql->execute();

		return $this->db->lastInsertId();
	}

	public function editar($id_pessoa,$nome,$idade,$sexo,$endereco){
		$sql = "UPDATE pessoa 
		           SET nome     = :nome
		             , idade    = :idade
		             , sexo     = :sexo
		             , endereco = :endereco
		         WHERE id_pessoa = :id_pessoa";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"     , $nome);
		$sql->bindValue(":idade"    , $idade);
		$sql->bindValue(":sexo"     , $sexo);
		$sql->bindValue(":endereco" , $endereco);
		$sql->bindValue(":id_pessoa", $id_pessoa);
		$sql->execute();
	}

	public function imagem($id_pessoa,$url_foto){
		$sql = "UPDATE pessoa 
		           SET url_foto  = :url_foto
		         WHERE id_pessoa = :id_pessoa";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":url_foto" , $url_foto);
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