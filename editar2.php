<?php
	include("conexao.php");
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: index.php');
		exit;
	}
	$iduser=$_SESSION['id'];
	
	$sql="SELECT id, nome, matricula, sobrenome, log FROM cgg_user WHERE id= '$iduser'";
	$resultado=$mysqli->query($sql);
	$row1=$resultado->fetch_assoc();	
	
	$id=$_GET["id"];
	$row2="";
	include_once("conexao.php");
	$sqli="SELECT * FROM cgg WHERE id= $id";
	$resultado_foto=$mysqli->query($sqli);
	$row2=mysqli_fetch_assoc($resultado_foto);
	//var_dump($row2)
	
	// endereço de retorno salvo
	$prev = $_SESSION["prev"];
	//echo $prev;
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title> CGG - Editar </title>
		<link type="text/css" rel="stylesheet" media="screen" href="CSS/style1.css"/>
	</head><br>
	<?php echo utf8_decode($row1['nome']) . " ". utf8_decode($row1['sobrenome']);?> <a href="<?php echo $prev?>">Voltar</a></br></br><hr>
	<body>
		<div class="container">
			<div class="content">
				<div id="vip" style="margin:auto" align=center>
					<h2><strong>EDIÇÃO</strong></h2>
						<form action="" name="CadastroAlunos" type="text" method="post" enctype="multipart/form-data">
							<table>
								<input type="hidden" name="id" value="<?php echo $row2['id'];?>">
								<tr>
									<td><input type="text" name="task" placeholder="Task" value="<?php echo $row2['task'];?>"></td>
									<td><input type="text" name="apk" placeholder="APK Name" value="<?php echo $row2['apk'];?>"></td>								
									<td><input type="text" name="version" placeholder="Version" value="<?php echo $row2['version'];?>"></td>								
									<td><input type="text" name="model" placeholder="Model" value="<?php echo $row2['model'];?>"></td>								
								</tr>
							</table>
							<table>
								<textarea name="comment" rows="10" cols="80""> <?php echo $row2['comment'];?></textarea>
							</table>
							<table width="200px">	
								<tr width="200px">
									<td><input type="submit" value="Salvar" name="salvar"/></td>
								</tr>
							</table>					
						</form>

					<?php
						$msg="";
						if(isset($_POST["salvar"]))
						{		
							// Create connection
							include 'conn.php';
							$conn = OpenCon();
							
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
								
							$id= $row2['id'];
							$comment = $_POST['comment'];
							$task = $_POST['task'];
							$apk = $_POST['apk'];
							$version = $_POST['version'];
							$model = $_POST['model'];

							$sql_code ="UPDATE cgg SET comment=TRIM('$comment'), task='$task', apk='$apk', version='$version', model='$model' WHERE id='$id'";
							mysqli_query($conn, $sql_code);
							$msg="Registro editado com sucesso!";
														
							//auto refresh da página p/ mostar valores atualizados
							echo "<meta http-equiv='refresh' content='0'>";
						}
					?></br>
				</div>
			</div>
		</div><!-- aqui fechamos a div conteudo -->				
	</body>
</html>