<?php
$host="localhost";
$usuario="root";
$senha="";
$bd="projeto";

$mysqli = new mysqli($host,$usuario,$senha,$bd);

if($mysqli->connect_error)
	echo"Falha na conexão: (".$mysqli->connect_error.") ".$mysqli->connect_error;
//cria a conexao
// $conn=mysqli_connect($servidor, $email, $senha, $dbname);

?>