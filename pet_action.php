<?php
if(isset($_POST['nome']))
{

	$nome = addslashes($_POST['fpetname']);
	$email = addslashes($_POST['fdtnascimento']);
	$senha = addslashes($_POST['senha']);
	$confSenha = addslashes($_POST['confSenha']);
	$telefone = addslashes($_POST['telefone']);


	if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confSenha) && !empty($telefone))
	{
		
			require_once 'pet_class.php';
			$us = new Pet("petshop", "127.0.0.1:3305", "root", "");
			if($us->cadastrar($nome, $email, $senha, $telefone, $telefone))
			{ ?>
				<p class="mensagem">Cadastrado com sucesso!<a href="entrar.php">Acesse já!</a></p> 
				
<?php		}else
			{ ?>
				<p class="mensagem">Email já está cadastrado!</p>
<?php		}
	}	
	}else
	{ ?>
		<p class="mensagem">Preencha todos os campos!</p>
<?php }
}
?>