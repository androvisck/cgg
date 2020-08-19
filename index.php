<?php
	require_once 'CLASSES/cgg_user.php';
	$u= new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> CGG - Congregate</title>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body>
	</br></br></br></br></br></br>
	<div class="container" >
		<a class="links" id="paralogin"></a>		
		<div class="content">      
		  <!--FORMULÁRIO DE login-->
			<div id="login">
				<form method="post" action=""> 
				 <h1>Acesso</h1> 
					<?php
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
					?>
				  <p> 
					<label for="email">Seu e-mail</label>
					<input id="email" name="email" required="required" type="email" placeholder="Digite o seu e-mail"/>
				  </p>
				   
				  <p> 
					<label for="senha">Sua senha</label>
					<input id="senha" name="senha" required="required" type="password" placeholder="Digite o sua senha" /> 
				  </p> 
				  <p> 
					<input width="40" type="submit" value="Entrar" /> 
				  </p>
				   
				  <p class="link">
					Ainda não tem conta?
					<a href="cadastro.php">Cadastre-se</a>
					<?php echo "<a href='' onclick=\"return confirm('Por favor, entre em contato com o administrador (adm@adm.com)');\">Esqueceu a Senha?</a>"; ?>

				  </p>
				</form>
			</div>
		</div>
		<?php
		if(isset($_POST['email']))
			{
				$email =addslashes( $_POST['email']);
				$senha=addslashes( $_POST['senha']);
				// verificar se está preenchido
				if(!empty($email) && !empty($senha))
				{
					include 'conn.php';
					$conexao = OpenCon();
					$u->conectar("projeto","localhost","root","");
					if($u->msgErro =="")
					{
					if($u->logar($email,$senha))
					{
						header('Location: vip.php');
					}
					else
					{
						?>
						<div class="msg-erro">
							E-mail ou senha inválidos!
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
</html>