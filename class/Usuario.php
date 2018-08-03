<?php

class Usuario{
	
	private $id_usuario;
	private $login;
	private $senha;
	private $dt_cadastro;
	
	public function getIdUsuario(){
		return $this->id_usuario;
	}
	
	public function setIdUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}
	
	public function getLogin(){
		return $this->login;
	}
	
	public function setLogin($login){
		$this->login = $login;
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getDtCadastro(){
		return $this->dt_cadastro;
	}
	
	public function setDtCadastro($dt_cadastro){
		$this->dt_cadastro = $dt_cadastro;
	}
	
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(":ID"=>$id));
		
		if(Count($results) > 0)
		{
			$row = $results[0];
			$this->setIdUsuario($row['id_usuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtCadastro(new DateTime($row['dt_cadastro']));
		}
	}
	
	public function __toString(){
		
		return json_encode(array(
			"id_usuario"=> $this->getIdUsuario(),
			"login"=> $this->getLogin(),
			"senha"=> $this->getSenha(),
			"dt_cadastro"=> $this->getDtCadastro()->format("d/m/Y H:i:s")
		));
		
	}
}

?>