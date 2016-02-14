<?php

include_once("InterfaceModel.php");

class Usuario implements InterfaceModel, JsonSerializable{
	private $id;
	private $login;	
	private $email;
	private $senha;
	private $perfil;
	private $dao = "UsuarioDAO";
	
	public function Usuario(){
	}	
	
	public function jsonSerialize() {
		return [
				'id' => $this->id,
				'login' => $this->login,
				'senha' => $this->senha,
				'email' => $this->email,
				'perfil' => $this->perfil
	
		];
	}	

	public function getId(){
		return $this->id;
	}
	public function setId( $id ){
		$this->id = $id;
	}
	public function getLogin(){
		return $this->login;
	}
	public function setlogin($login){
		$this->login = $login;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getSenha(){
		return $this->senha;
	}	
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getPerfil(){
		return $this->perfil;
	}	
	public function setPerfil($perfil){
		$this->perfil = $perfil;
	}

	//Metodo da interface
	public function criaObjetoDaInterfaceWeb( $variaveisDaRequisicao ){
		$usuario = new Usuario();
		$usuario->setLogin($variaveisDaRequisicao["login"]);
		$usuario->setSenha($variaveisDaRequisicao["senha"]);
        $usuario->setEmail($variaveisDaRequisicao["email"]);
        $usuario->setPerfil($variaveisDaRequisicao["perfil"]);
		$instancias = array("objeto"=>$usuario, "dao"=> $this->dao );
		return $instancias;
	}	
	
}

?>