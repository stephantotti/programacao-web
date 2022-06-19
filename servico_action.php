<?php
if(isset($_POST['fservico']))
{
	$servico = addslashes($_POST['fservico']);

	if(!empty($servico) ) {

        require_once 'servico_class.php';
        $us = new Servico("petshop", "127.0.0.1:3306", "root", "");
        if($us->cadastrar($servico)) { 
            header("Location:servico.php");
	}else
			{ ?>
				<p>Serviço já está cadastrado!</p><a href="servico.php">Voltar</a></p> 
<?php		}
	}	
	}else
	{ ?>
		<p>Preencha todos os campos!</p><a href="servico.php">Voltar</a></p> 
<?php 

}
?>
