<?php

Class admin
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
	public function logar($login, $senha)		
	{
		global $pdo;
		//Verificar se o login e senha estão cadastrados
		$sql = $pdo->prepare("SELECT id FROM admin WHERE login = :e AND senha= :p");
		$sql->bindValue(":e",$login);
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
	public function cadastrar($nome, $sobrenome, $matricula, $lotacao, $titulo, $login, $senha)
	{
		global $pdo;
		//*verificar se já está cadastrado
		$sql = $pdo->prepare("SELECT id FROM admin WHERE login = :e");
		$sql->bindValue(":e",$login);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false; //* já está cadastrada
		}
		else
		{
			$sql = $pdo->prepare("INSERT INTO admin (nome, sobrenome, matricula, lotacao, titulo, login, senha) VALUES (:n, :s, :m, :d, :t, :e, :p)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":s",$sobrenome);
			$sql->bindValue(":m",$matricula);
			$sql->bindValue(":d",$lotacao);
			$sql->bindValue(":t",$titulo);
			$sql->bindValue(":e",$login);
			$sql->bindValue(":p",md5($senha));
			$sql->execute();
			return true;
		}
	}
}
?>
