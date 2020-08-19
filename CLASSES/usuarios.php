<?php

Class Usuario
{
	private $pdo;
	public $msgErro = "";	
	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		global $msgErro;
		try
		{
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
		}catch (PDOException $e){
			$msgErro = $e->getMessage();
		}
	}
	public function cadastrar($nome, $sobrenome, $matricula, $log, $cargo, $email, $senha)
	{
		global $pdo;
		//*verificar se já está cadastrado
		$sql = $pdo->prepare("SELECT id FROM cgg_user WHERE email = :e");
		$sql->bindValue(":e",$email);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false; //* já está cadastrada
		}
		else
		{
			$sql = $pdo->prepare("INSERT INTO cgg_user (nome, sobrenome, matricula, log, cargo, email, senha) VALUES (:n, :s, :m, :d, :t, :e, :p)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":s",$sobrenome);
			$sql->bindValue(":m",$matricula);
			$sql->bindValue(":d",$log);
			$sql->bindValue(":t",$cargo);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":p",md5($senha));
			$sql->execute();
			return true;
		}
	}
	public function logar($email, $senha)		
	{
		global $pdo;
		//Verificar se o email e senha estão cadastrados
		$sql = $pdo->prepare("SELECT id FROM cgg_user WHERE email = :e AND senha= :p");
		$sql->bindValue(":e",$email);
		$sql->bindValue(":p",md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			$dado =$sql->fetch();
			session_start();
			$_SESSION['id']=$dado['id'];
			return true; //usuario cadastrado com sucesso
		}
		else
		{
			return false; //nao foi possivel logar
		}
	}
}
?>
