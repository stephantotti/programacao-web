<!DOCTYPE html>
<html>

<head>
    <title>PUCPR</title>
    <meta charset="utf-8" >
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/fontawesome-free-5.15.1-web/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
</head>
<body>

    <div> 
        <a href="usuario.php" class="nav-menu"> Usuário</a>
        <a href="pet.php" class="nav-menu"> Pet</a>
        <a href="servico.php" class="nav-menu"> Serviço</a>
        <a href="agenda.html" class="nav-menu"> Agenda</a>
    </div>

    <h2> PETSHOP </h2>
    <form method="post" action="usuario_action.php">
        <label for="flogin">Login:</label><br>
        <input type = "text" id="flogin" name="flogin">
        <br><br>
        <label for="fsenha">Senha:</label><br>
        <input type = "text" id="fsenha" name="fsenha">
        <br><br>
        <label for="fnivel">Nível de acesso:</label><br>
        <select name="fnivel" id="fnivel">
            <option value="1">Administrador</option>
            <option value="2">Colaborador</option>
          </select>
        <br><br>
        <input type="submit"  name="namebtn" value="Cadastrar">
        <br><br>
    </form>
    <?php
      echo "<table style='border: solid 1px black;'>";
      echo "<tr><th>Id</th><th>Login</th><th>Nível Acesso</th> <th>Excluir</th></tr>";
      $servername = "127.0.0.1:3306";
      $username = "root";
      $password = "";
      $dbname = "petshop";

      try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT usuario.id, usuario.login, usuario.nivel_acesso FROM usuario");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt->fetchAll() as $linha) {
         echo "<tr><td>" . $linha["id"] . "</td><td>" . $linha["login"] . "</td> <td>" . $linha["nivel_acesso"] . "</td><td> <a href='usuario.php?idexcluir=" . $linha["id"] . "'> ✖ </td></tr>";
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        
      }
      $conn = null;
      echo "</table>"
    ?>
</body>
</html>

<?php

function excluir($idexcluir){
  require_once 'usuario_class.php';
  $us = new Usuario("petshop", "127.0.0.1:3306", "root", "");
  if($us->excluir($idexcluir)) { 
      header("Location:usuario.php");
  }
}


if (isset($_GET['idexcluir'])) {
  excluir($_GET['idexcluir']);
}

?>
