<?php

include_once("InterfaceDAO.php");

class CategoriaDAO{

	private $dao;
	private $CLASS_NAME = "Categoria"; 
	
	public function CategoriaDAO(){
               $this->dao = new Conexao();				
	}
	
	public function cadastrar( $categoria ){
	
		$sql = "insert into categoria( nome ) values ( :nome ) ";					
		
                $this->dao->beginTransaction();

		$stmt = $this->dao->prepare( $sql );	
                $stmt->bindParam(":nome", $categoria->getNome());											
		$result = $stmt->execute();

		if ( $result ) {
			$this->dao->commit();
		} else {
			$this->dao->rollback();
			return false;
		}	

		$categoria= $this->getPorNome($categoria->getNome());

		return $categoria;
		
	}

	public function listar( $filtro ) {
		
		$where = "";		
		
		if ( $filtro ) {
			$where = " where id = $filtro ";	
		}
		
		$sql = "select * from categoria " . $where . " ";		
		$stmt = $this->dao->query($sql);	
				
        $listaCategoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $listaCategoria;		
	}	
	
	public function getPorId( $id ) {
		
		if ( !$this->dao->inTransaction() ) {
			$this->dao->beginTransaction();		
		};
		
		$sql = "select * from categoria where id = :id ";	
		
		$stmt = $this->dao->prepare($sql);
		$stmt->bindParam(":id", $id);		
		$stmt->execute();	
		
		$categoria= $stmt->fetchObject($this->CLASS_NAME);
		
		return $categoria;
	}

	public function getPorNome( $nome ) {

		if ( !$this->dao->inTransaction() ) {
			$this->dao->beginTransaction();		
		};
		
		$sql = "select * from categoria where nome = :nome ";	

		$stmt = $this->dao->prepare($sql);
		$stmt->bindParam(":nome", $nome);		
		$stmt->execute();	
		
		$categoria= $stmt->fetchObject($this->CLASS_NAME);
		
		return $categoria;
	}	
	
}

?>