<?php

class Pet{

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
    
    public function cadastrar($contato, $cuidador, $dt_nasc, $email, $pet)
	{
		// Verifica se já está cadastrado antes de cadastrar
		$cmd = $this->pdo->prepare("SELECT id from pet WHERE email = :e");
		$cmd->bindValue(":e",$email);
		$cmd->execute();
		if($cmd->rowCount() > 0)//veio id
		{
			return false;
		}else//nao veio id
		{
			//cadastrar
			$cmd = $this->pdo->prepare("INSERT INTO pet (contato, cuidador, dt_nasc, email, pet) values (:n, :e, :s, :t, :v)");
			$cmd->bindValue(":n",$contato);
			$cmd->bindValue(":e",$cuidador);
			$cmd->bindValue(":s",($dt_nasc));
			$cmd->bindValue(":t",$pet);
			$cmd->execute();
			return true;
		}
    }
    
    public function buscarDadosPorId($id)
	{
		$cmd = $this->pdo->prepare("SELECT * from pet WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		$dados = $cmd->fetch();
		return $dados;
	}

	public function buscarTodos()
	{
		$cmd = $this->pdo->prepare("SELECT pet.id, pet.contato, pet.cuidador, pet.dt_nasc, pet.email, pet.pet from pet order by pet.cuidador");
		$cmd->execute();
		$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $dados;
	}
}

?>