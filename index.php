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
$usuario = new Usuario();
$usuario->login('rubens','marcondes');
echo $usuario;
?>