<?php

include_once("InterfaceModel.php");

class Categoria implements InterfaceModel, JsonSerializable{
	private $id;
	private $nome;
	private $dao = "CategoriaDAO";
	
	public function Categoria(){		
	}
	
	public function jsonSerialize() {
		return [
				'id' => $this->id,
				'nome' => $this->nome	
		];
	}

	public function getId(){
		return $this->id;
	}
	public function setId( $id ){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	//Metodo da interface
	public function criaObjetoDaInterfaceWeb( $variaveisDaRequisicao ){
		$categoria = new Categoria();
		$categoria->setNome($variaveisDaRequisicao["nome"]);
		$instancias = array("objeto"=>$categoria, "dao"=> $this->dao );
		return $instancias;
	}

}

?>