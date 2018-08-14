<?php

class Usuario{
	
	private $id_usuario;
	private $login;
	private $senha;
	private $dt_cadastro;
	
	/*	Métodos GETTER e SETTERS
		@author: RubensM
		@date: 08/18
	*/
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
	
	/*	Método DELETE
		@author: RubensM
		@date: 08/18
	*/
	public function delete(){
		
		$sql = new Sql();
		$sql->query("DELETE FROM tb_usuarios WHERE id_usuario = :ID", array(
		":ID"=>$this->getIdUsuario()
		));
		
		$this->setIdUsuario(0);
		$this->setLogin("");
		$this->setSenha("");
		$this->setDtCadastro(new DateTime());
	}
	
	/*  Método que retorna todos o usuarios cadastrados
		@author: RubensM
		@date: 08/18
	*/
	public static function getList(){
		
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY login;");
	}
	
	/*  Método para inserir dados no BD
		@author: RubensM
		@date: 08/18
	*/
	public function insert(){
		
		$sql = new Sql();
		// Procedure (sp_ stored procedures)
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)",array(
			':LOGIN'=>$this->getLogin(),
			':SENHA'=>$this->getSenha()
		));
		if(count($results) > 0)
		{
			$this->setData($results[0]);
		}
	}
	
	/*	Método que retorna dados do usuário passando o ID
		@param: id
		@author: RubensM
		@date: 08/18
	*/
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(":ID"=>$id));
		
		if(Count($results) > 0)
		{
			$this->setData($results[0]);
		}
	}
	/*	Método que loga o usuario no sistema (valida login e senha)
		@author: RubensM
		@date: 08/18
	*/
	public function login($login, $senha){
		
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :SENHA", array(
			":LOGIN"=>$login,
			":SENHA"=>$senha));
		
		if(Count($results) > 0)
		{
			$this->setData($results[0]);
		}
		else
		{
			throw new Exception("Login e/ou senha inválidos!");
		}
	}
	
	/*	Método de busca pelo login (inteiro ou trecho)
		@author: RubensM
		@date: 08/18
	*/
	public static function search($login){
		
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login;", array(
			':SEARCH'=>"%".$login."%"
		));
	}
	
	/*	Método auxiliar para alimentar os atributos da classe
		@author: RubensM
		@date: 08/18
	*/
	public function setData($data){
		$this->setIdUsuario($data['id_usuario']);
		$this->setLogin($data['login']);
		$this->setSenha($data['senha']);
		$this->setDtCadastro(new DateTime($data['dt_cadastro']));
	}
	
	/*	Método UPDATE
		@author: RubensM
		@date: 08/18
	*/
	public function update($login, $senha){
		// Define login e senha
		$this->setLogin($login);
		$this->setSenha($senha);
		// Executa função para atualizar
		$sql = new Sql();
		$sql->query("UPDATE tb_usuarios SET login = :LOGIN, senha = :SENHA WHERE id_usuario = :ID", array(
		":LOGIN"=>$this->getLogin(),
		":SENHA"=>$this->getSenha(),
		":ID"=>$this->getIdUsuario()
		));
	}
		
	/*	Método Construtor
		@author: RubensM
		@date: 08/18
	*/
	public function __construct($login = "", $senha = ""){
		$this->setLogin($login);
		$this->setSenha($senha);
	}
	
	/*	Método auxiliar para exibir resultados quando array (metodo automatico)
		@author: RubensM
		@date: 08/18
	*/
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