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
		<title>CGG - Inserção </title>
		<link type="text/css" rel="stylesheet" media="screen" href="CSS/style1.css"/>
	</head><br>
	<?php echo utf8_decode($row1['nome']) . " ". utf8_decode($row1['sobrenome']);?> <a href="vip.php">Voltar</a></br></br><hr>
	<body>
		<div class="container" >
			<div class="content">
				<div id="vip" style="margin:auto auto" align=center>
					<h2>Inserção de dados</h2>
						<form action="" name="CadastroAlunos" type="text" method="post" enctype="multipart/form-data">
							<table>
							<tr>
								<td><input type="text" name="task"  placeholder="SEL Task"/></td>
								<td><input type="text" name="apk"  placeholder="APK Name"/></td>
								<td><input type="text" name="version"  placeholder="APK Version"/></td>
								<td><input type="text" name="model"  placeholder="Model Name"/></td>
							</tr>
							</table>
							
							<table>
							<tr>
								<td><h3>COMENTÁRIO:</h3></td>
								<td><h3>SOLUÇÃO:</h3></td>
							<tr>
								<td><textarea name="comment" rows="10" cols="60"></textarea></td>
								<td><textarea name="solution" rows="10" cols="60"></textarea></td>
							</tr>
							</table>
							<table width="400px">	
								<tr width="400px">
									<td width="200px"><input type="submit" value="Carregar" name="carregar"/></td>
									<td width="200px"><input type="submit" value="Mostrar" name="mostra"/></td>
								</tr>
							</table>					
						</form>
						<?php // onclick="window.open('upload4.php', '_blank');"  
							$msg="";
							if(isset($_POST["carregar"]))
							{								
								if((empty($_POST['comment'])) || (empty($_POST['solution'])) || (empty($_POST['apk'])) || (empty($_POST['model'])) || (empty($_POST['task'])) || (empty($_POST['version'])))
								{
									$msg="Preencha todos os campos!";
								}else{
									// Create connection
									include 'conn.php';
									$conn = OpenCon();
									
									// Check connection
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}
									
									$iduser= $row1['log'];
									$comment = $_POST['comment'];
									$solution = $_POST['solution'];
									$task = $_POST['task'];
									$apk = $_POST['apk'];
									$version = $_POST['version'];
									$model = $_POST['model'];

									$sql_code ="INSERT INTO cgg (iduser, task, version, apk, model, comment, solution) VALUES('$iduser', '$task', '$version', '$apk', '$model', '$comment', '$solution')";
									//$varX=mysqli_query($conn, $sql_code);
									
									if ($conn->query($sql_code) === TRUE) {
										$msg="Atualizado com sucesso!";
									} else {
										$msg="Erro: " . $conn->error;
									}									
								}
							}				
							if(isset($_POST["mostra"]))
							{
								// Create connection
								include 'conn.php';
								$conn = OpenCon();
								
								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}

								$iduser= $row1['log'];
								$result = "SELECT * FROM cgg WHERE iduser LIKE '%".$iduser."%' ORDER BY id DESC";

								$res=mysqli_query($conn,$result);
								// var_dump($res);
								while($row=mysqli_fetch_array($res)){
								   ?><table style="float:left"><br><hr><br>
										<tr>
											<td><?php 
											//var_dump($row);
													$var1 = $row["task"];
													$var2 = $row["apk"];
													$var3 = $row["version"];
													$var4 = $row["model"];
													$var5 = $row["comment"];
													$varZ = sprintf("<b>Task: </b>%s<br> <b>APK name: </b>%s<br> <b>APK Version: </b>%s<br> <b>Model: </b>%s<br> <b>Comentário: </b><br><br>%s", $var1, $var2, $var3, $var4, nl2br($var5));
													echo $varZ;
													// var_dump(explode('  ', $var1));
												?>
											</td>
										</tr>
										<tr>
											<td><br>
												<?php echo "<a href='editar2.php?id=" . $row['id'] . "'>Editar</a>"; ?>				
												<?php echo " | "; ?>				
												<?php echo "<a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Deseja mesmo apagar o registro?');\">Apagar</a>"; ?>								
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