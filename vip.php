<?php
	include("conexao.php");
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: index.php');
		exit;
	}
	$iduser=$_SESSION['id'];
	
	$sql="SELECT * FROM cgg_user WHERE id= '$iduser'";
	$resultado=$mysqli->query($sql);
	$row1=$resultado->fetch_assoc();
	
	$nome = utf8_encode($row1['nome']);
	$usuario = $row1['nome'];
	$cargo = $row1['cargo'];
	//var_dump($row1);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CGG - Congregate </title>
		<link rel="stylesheet" href="CSS/style2.css">
		<tr></br>Olá, <?php $s1 = '! | ';$s2 = ' | '; echo utf8_decode($row1['nome']) . " ". utf8_decode($row1['sobrenome']);echo "$s1";echo "<a href='perfil.php'>Perfil</a>";;echo "$s2";echo "<a href='sair.php'>Sair</a>";?></br></br></tr><hr>
	</head>
	<body>
		<div class="container" >
			<div class="content">
				<div id="vip" style="margin:auto auto" align=center>
					<form method="post" action="">
						<h1>Enviar</h1>
						<table style="width: 40%;table-layout:fixed">
							<tr><td style="width:40px"<td style="width:20px"><input type="button" value="Inserir" onclick="javascript: location.href='insert.php';" /></td></tr>							
						</table>
						</br>
						</br>
						<h1>Consultar</h1>
						<table style="width: 40%;table-layout:fixed">
							<tr><td style="width:40px"<td style="width:20px"><input type="button" value="Busca" onclick="javascript: location.href='search.php';" /></td></tr>							
						</table>					
					</form>
				</div>
			</div>
		</div>
</html>