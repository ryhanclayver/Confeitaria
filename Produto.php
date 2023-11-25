<?php
class Produto extends model{

	public function adicionarP($nomeP,$precoP, $quantP,$ingP){
		$sql = "INSERT INTO cadastroproduto (nomeP, precoP, quantP, ingP)
		        VALUES (:nomeP, :precoP, :quantP, :ingP)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nomeP"    , $nomeP);
		$sql->bindValue(":precoP"   , $precoP);
        $sql->bindValue(":quantP"   , $quantP);
        $sql->bindValue(":ingP"     , $ingP);
		$sql->execute();

		return $this->db->lastInsertId();
	}

        public function imagem($id_produto, $caminhoImagem) {
        $sql = "UPDATE cadastroproduto 
                SET imgP = :caminhoImagem 
                WHERE id_produto = :id_produto";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":caminhoImagem", $caminhoImagem);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
    }

	public function editar($id_produto,$nomeP,$precoP,$quantP,$ingP){
		$sql = "UPDATE pessoa 
		           SET nomeP     = :nomeP
		             , precoP    = :precoP
                     , quantP    = :quantP
                     , ingP      = :ingP
		         WHERE id_produto = :id_produto";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nomeP"     , $nomeP);
		$sql->bindValue(":precoP"    , $precoP);
        $sql->bindValue(":quantP"    , $quantP);
        $sql->bindValue(":ingP"      , $ingP);
		$sql->bindValue(":id_produto", $id_produto);
		$sql->execute();
	}

	public function excluir($id_produto){
		$sql = "DELETE FROM cadastroproduto WHERE id_produto = :id_produto";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_produto", $id_produto);
		$sql->execute();
	}

	public function get($id_produto){
		$array = array();

		$sql = "SELECT * 
		          FROM cadastroproduto
		         WHERE id_produto = :id_produto";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_produto', $id_produto);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM cadastroproduto ORDER BY nomeP";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}
}