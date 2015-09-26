<?php 

$login = $_POST['login'];
$senha = $_POST['senha'];

$con = mysql_connect('localhost', 'root', '') or die ('Sem conexão com o servidor');
$select = mysql_select_db('systransportes') or die('Sem acesso ao DB, Entre em contato com o Administrador');


$result = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha'");

	if(mysql_num_rows ($result) > 0 )
	{
		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		header('location: ../../index.php');
	}
	else{
	session_destroy();
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location: login.php');
	
	}

?>