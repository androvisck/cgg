<?php
	require_once 'CLASSES/usuarios.php';
	$u=new Usuario;
	
	include("conexao.php");
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: admin.php');
		exit;
	}
	$iduser=$_SESSION['id'];
	
	$sql="SELECT * FROM admin WHERE id= '$iduser'";
	$resultado=$mysqli->query($sql);
	$row1=$resultado->fetch_assoc();	

	// var_dump($row1)
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Administração - dRAD </title>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<tr></br><?php echo utf8_encode($row1['nome']);?> | <a href="home_admin.php">Voltar</a></br></br></tr><hr>
	<body>
		<div class="content">
			<div style="height:800px;">
				<a class="links" id="paracadastro"></a>
				<!--FORMULÁRIO DE CADASTRO-->
				<div id="cadastro">
					<form method="post" action=""> 
						<h1>Novo Usuário</h1>
						<p> 
							<label for="nome"></label>
							<input id="nome" name="nome" required="required" type="text" placeholder="Nome" maxlength="30"/>
						</p>

						<p> 
							<label for="sobrenome"></label>
							<input id="sobrenome" name="sobrenome" required="required" type="text" placeholder="Sobrenome" maxlength="30"/>
						</p>
						
						<p> 
							<label for="matricula"></label>
							<input id="matricula" name="matricula" required="required" type="text" placeholder="Matrícula ou CPF" maxlength="20"/>
						</p>

						<p> 
							<label for="lotacao"></label>
							<input id="lotacao" name="lotacao" required="required" type="text" placeholder="Lotação (Unidade / Departamento)" maxlength="80"/>
						</p>

						<p> 
							<label for="titulo"></label>
							<input id="titulo" name="titulo" required="required" type="text" placeholder="Título" maxlength="30"/>
						</p>

						<p> 
							<label for="email"></label>
							<input id="email" name="email" required="required" type="email" placeholder="E-mail" maxlength="40"/> 
						</p>

						<p> 
							<label for="senha">Sua Senha</label>
							<input id="senha" name="senha" required="required" type="password" placeholder="Digite a sua senha" maxlength="15"/>
							<input id="confsenha" name="confsenha" required="required" type="password" placeholder="Confirme sua senha" maxlength="15"/>
						</p>

						<p> 
							<input type="submit" value="Cadastrar"/> 
						</p>

					</form>
				</div>
			</div>
		</div>
		<?php
			if(isset($_POST['nome']))
			{
				$nome=addslashes(utf8_encode($_POST['nome']));
				$sobrenome=addslashes(utf8_encode($_POST['sobrenome']));
				$matricula=addslashes($_POST['matricula']);
				$lotacao=addslashes(utf8_encode($_POST['lotacao']));
				$titulo=addslashes( $_POST['titulo']);
				$email =addslashes( $_POST['email']);
				$senha=addslashes( $_POST['senha']);
				$confsenha=addslashes( $_POST['confsenha']);
				// verificar se está preenchido
				if(!empty($nome) && !empty($sobrenome) && !empty($matricula) && !empty($lotacao) && !empty($titulo) && !empty($email) && !empty($senha) && !empty($confsenha))
				{
					$u->conectar("projeto","localhost","root","");
					if($u->msgErro == "")//se está tudo ok
					{
						if($senha==$confsenha)
						{
							if($u->cadastrar($nome, $sobrenome, $matricula, $lotacao, $titulo, $email, $senha))
							{
								?>
								<div id="msg-sucesso">
									Cadastrado com sucesso!
								</div>
								<?php
							}
							else
							{
								?>
								<div class="msg-erro">
									E-mail já cadastrado!
								</div>
								<?php						
							}
						}
						else	
						{
							?>
							<div class="msg-erro">
								Senha e a confirmação da senha não correspondem!
							</div>
							<?php	
						}
					}
					else
					{
					?>
					<div class="msg-erro">
						<?php echo "Erro: ".$u->msgErro;?>
					</div>
					<?php
					}
				}
				else
				{
					?>
					<div class="msg-erro">
						Preencha todos os campos!
					</div>
					<?php	
				}				
			}			
		?>
	</body>
</div><footer>Desenvolvido por: ajf@poli.br</footer></body>	</body>
</html>