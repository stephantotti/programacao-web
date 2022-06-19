<?php

class Usuario{

    public function __construct($dbname, $host, $usuario, $senha)
	{
		try
		{
			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);
		} catch(PDOException $e) 
		{
			echo "Erro com BD: ".$e->getMessage();
		} catch(Exception $e)
		{
			echo "Erro: ".$e->getMessage();
		}
    }
    
    public function cadastrar($login, $senha, $nivel_acesso)
	{
		// Verifica se já está cadastrado antes de cadastrar
		$cmd = $this->pdo->prepare("SELECT id from usuario WHERE usuario.login = :e");
		$cmd->bindValue(":e",$login);
		$cmd->execute();
		if($cmd->rowCount() > 0)//veio id
		{
			return false;
		}else//nao veio id
		{
			//cadastrar
			$cmd = $this->pdo->prepare("INSERT INTO usuario (usuario.login, usuario.senha, usuario.nivel_acesso) values (:n, :m, :x)");
            $cmd->bindValue(":n",$login);
            $cmd->bindValue(":m",$senha);
            $cmd->bindValue(":x",$nivel_acesso);
			$cmd->execute();
			return true;
		}
    }
    
    public function buscarDadosPorId($id)
	{
		$cmd = $this->pdo->prepare("SELECT * from usuario WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		$dados = $cmd->fetch();
		return $dados;
	}

	public function buscarTodos()
	{
		$consulta = $this->pdo->prepare("SELECT usuario.id, usuario.login, usuario.nivel_acesso from usuario order by usuario.login");
		$consulta->execute();

		$resultado = $consulta->setFetchMode(PDO::FETCH_ASSOC);
		return $resultado;
	}

	public function excluir($id)
	{
		$consulta = $this->pdo->prepare("DELETE from usuario WHERE id = :id");
		$consulta->bindParam(":id",$id);
		$consulta->execute();

		$resultado = $consulta->rowCount();
		return $resultado;

	}
   
}

?>