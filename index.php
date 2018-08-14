<?php

require_once("config.php");
//============================================
//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

//============================================
// Retorna um unico usuario por ID
//============================================
//$root = new Usuario();
//$root->loadById(3);
//echo $root;

//============================================
// Retorna uma lista de usuario
//============================================
//$lista = Usuario::getList();
//echo json_encode($lista);

//============================================
// Retorna uma lista de usuario pelo login
//============================================
//$search = Usuario::search("r");
//echo json_encode($search);

//============================================
// Retorna uma lista de usuario
//============================================
//$usuario = new Usuario();
//$usuario->login('rubens','marcondes');
//echo $usuario;

//============================================
// Inserir novo usuario (ANTES MET. CONSTRUTOR)
//============================================
//$aluno = new Usuario();
//$aluno->setLogin("RubensM");
//$aluno->setSenha("rbs123");
//$aluno->insert();
//echo $aluno;

//============================================
// Inserir novo usuario (COM MET. CONSTRUTOR)
//============================================
//$aluno = new Usuario("RubensM","213rew423");
//$aluno->insert();
//echo $aluno;

//============================================
// Inserir novo usuario (COM MET. CONSTRUTOR)
//============================================
$usuario = new Usuario();
$usuario->loadById(13);
$usuario->update("professor","naoaa");
echo $usuario;
?>