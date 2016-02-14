<?php

include_once("InterfaceDAO.php");

class UsuarioDAO{

	private $dao;
	private $CLASS_NAME = "Usuario"; 
	
	public function UsuarioDAO(){

		$this->dao = new Conexao();		
	}
			
	public function cadastrar( $usuario ){

		$sql = "insert into usuario( login, senha, email, perfil ) values ( :login, MD5(:senha), :email, :perfil ) ";					

		$this->dao->beginTransaction();				

		$stmt = $this->dao->prepare( $sql );	
		$stmt->bindParam( ":login", $usuario->getLogin() );	
		$stmt->bindParam( ":senha", $usuario->getSenha() );	
		$stmt->bindParam( ":email", $usuario->getEmail() );	
		$stmt->bindParam( ":perfil", $usuario->getPerfil() );	
			
		$result = $stmt->execute();

		if ( $result ) {	
			$this->dao->commit();
		} else {
			$this->dao->rollback();
			return false;
		}	

		$usuario = $this->autenticar($usuario);

		return $usuario;
	}

	public function listar( $filtro ) {
		
		$where = "";	
		
		if ( $filtro ) {
			$where = " where id = $filtro ";	
		}
		
		$sql = "select * from usuario " . $where . " ";		
		
		$stmt = $this->dao->prepare($sql);
		$stmt->execute();
				
		$linha = $stmt->fetchAll(PDO::FETCH_OBJ);
		
		return $linha;		
	}	
	
	public function getPorId( $id ) {
		
		if ( !$this->dao->inTransaction() ) {
			$this->dao->beginTransaction();		
		};
		
		$sql = "select * from usuario where id = :id ";	
		
		$stmt = $this->dao->prepare($sql);
		$stmt->bindParam(":id", $id);		
		$stmt->execute();	
		
		$usuario = $stmt->fetchObject($this->CLASS_NAME);
		
		return $usuario;
	}	
	
	public function autenticar( $usuario ) {
	
		if ( !$this->dao->inTransaction() ) {
			$this->dao->beginTransaction();
		};
		
		$sql = "select * from usuario where login = :login and senha = MD5( :senha ) ";
		
		$stmt = $this->dao->prepare($sql);
		$stmt->bindParam(":login", $usuario->getLogin() );
		$stmt->bindParam(":senha", $usuario->getSenha() );				
		$stmt->execute();

		$usuario = $stmt->fetchObject($this->CLASS_NAME);	
		
		return $usuario;
	}	
	
}

?>