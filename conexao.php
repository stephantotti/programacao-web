<?PHP
$dbname ='petshop';
$host = "127.0.0.1:3305";
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);
