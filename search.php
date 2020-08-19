<?php
	include("conexao.php");
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: index.php');
		exit;
	}
	$iduser=$_SESSION['id'];
	
	$prev = $_SERVER["REQUEST_URI"];
	$_SESSION['prev'] = $prev;
	
	$sql="SELECT id, nome, matricula, sobrenome, log FROM cgg_user WHERE id= '$iduser'";
	$resultado=$mysqli->query($sql);
	$row1=$resultado->fetch_assoc();
	//var_dump($row1);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CGG - Busca </title>
		<link type="text/css" rel="stylesheet" media="screen" href="CSS/style1.css"/>
	</head><br>
	<?php echo utf8_decode($row1['nome']) . " ". utf8_decode($row1['sobrenome']);?> <a href="vip.php">Voltar</a></br></br><hr>
	<body>
		<div class="container" >
			<div class="content">
				<div id="vip" style="margin:auto auto" align=center>
					<h2>Busca de dados</h2>
						<form action="" name="CadastroAlunos" type="text" method="post" enctype="multipart/form-data">
							<table>
								<tr>
									<td width="800px"><input type="text" name="termo"  placeholder="Task / APK / Versão / Model / Termo"/></td>
									<td width="200px"><input type="submit" value="Buscar" name="mostra"/></td>
								</tr>
							</table>					
						</form>
						<?php // onclick="window.open('upload4.php', '_blank');"  
							$msg="";
							if(isset($_POST["mostra"]))
							{
								// Create connection
								include 'conn.php';
								$conn = OpenCon();
								
								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								
								$termo = $_POST['termo'];
								$iduser= $row1['log'];
								
								//$result = "SELECT * FROM cgg WHERE iduser LIKE '%".$iduser."%' AND CONCAT(task,apk,version,model,comment) LIKE '%".$termo."%' ORDER BY task ASC";
								$result = "SELECT * FROM cgg WHERE TRIM(CONCAT(iduser,task,apk,version,model,comment)) LIKE '%".$termo."%' ORDER BY task ASC";
								$res=mysqli_query($conn,$result);
								// var_dump($res);
								while($row=mysqli_fetch_array($res)){
								   ?><table style="float:left"><br><hr><br>
										<tr>
											<td><?php 
											//var_dump($row);
													$var0 = $row["iduser"];
													$var1 = $row["task"];
													$var2 = $row["apk"];
													$var3 = $row["version"];
													$var4 = $row["model"];
													$var5 = ltrim($row["comment"]," ");
													$varZ = sprintf("<b>Usuário: </b>%s<br> <b>Task: </b>%s<br> <b>APK name: </b>%s<br> <b>APK Version: </b>%s<br> <b>Model: </b>%s<br> <b>Comentário:</b><br><br>%s", $var0, $var1, $var2, $var3, $var4, nl2br($var5));
													echo $varZ;
													// var_dump(explode('  ', $var1));
												?>
											</td>
										</tr>
										<tr>
											<td><br>
												<?php echo "<a href='editar2.php?id=" . $row['id'] . "'>Editar</a>"; ?>				
											</td>
										</tr>
										
									</table>
								   <?php 
								}
							}
						?>				
					<?php if($msg != false) echo "<p> $msg </p>"; ?>
				</div>
			</div>
</html>