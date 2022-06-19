<?php
if(isset($_POST['flogin']))
{
	$login = addslashes($_POST['flogin']);
    $senha = addslashes($_POST['fsenha']);
    $nivel_acesso = addslashes($_POST['fnivel']);

	if(!empty($login) || !empty($senha)  || !empty($nivel_acesso)) {

        require_once 'usuario_class.php';
        $us = new Usuario("petshop", "127.0.0.1:3306", "root", "");
        if($us->cadastrar($login, $senha, $nivel_acesso)) { 
            header("Location:usuario.php");
	}else
			{ ?>
				<p>Usuário já está cadastrado!</p><a href="usuario.php">Voltar</a></p> 
<?php		}
	}	
	}else
	{ ?>
		<p>Preencha todos os campos!</p><a href="usuario.php">Voltar</a></p> 
<?php 

}
?>
