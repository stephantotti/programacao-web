<?php

class Servico{

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
    
    public function cadastrar($servico)
	{
		// Verifica se já está cadastrado antes de cadastrar
		$cmd = $this->pdo->prepare("SELECT id from servico WHERE servico = :e");
		$cmd->bindValue(":e",$servico);
		$cmd->execute();
		if($cmd->rowCount() > 0)//veio id
		{
			return false;
		}else//nao veio id
		{
			//cadastrar
			$cmd = $this->pdo->prepare("INSERT INTO servico (servico) values (:n)");
			$cmd->bindValue(":n",$servico);
			$cmd->execute();
			return true;
		}
    }
    
    public function buscarDadosPorId($id)
	{
		$cmd = $this->pdo->prepare("SELECT * from servico WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		$dados = $cmd->fetch();
		return $dados;
	}

	public function buscarTodos()
	{
		$consulta = $this->pdo->prepare("SELECT servico.id, servico.servico from servico order by servico.servico");
		$consulta->execute();

		$resultado = $consulta->setFetchMode(PDO::FETCH_ASSOC);
		return $resultado;
	}

	public function excluir($id)
	{
		$consulta = $this->pdo->prepare("DELETE from servico WHERE id = :id");
		$consulta->bindParam(":id",$id);
		$consulta->execute();

		$resultado = $consulta->rowCount();
		return $resultado;

	}
   
}

?>