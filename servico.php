<!DOCTYPE html>
<html>

<head>
  <title>PUCPR</title>
  <meta charset="utf-8">
  <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  <link href="assets/css/fontawesome-free-5.15.1-web/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">

</head>

<body>
  <div>
    <a href="usuario.html" class="nav-menu"> Usuário</a>
    <a href="pet.php" class="nav-menu"> Pet</a>
    <a href="servico.php" class="nav-menu"> Serviço</a>
    <a href="agenda.html" class="nav-menu"> Agenda</a>
  </div>
  <h2> CADASTRO DE SERVIÇO </h2>
  <form method="post" action="servico_action.php">
    <label for="fservico">Novo serviço</label><br>
    <input type="text" id="fservico" name="fservico">
    <br><br>
    <input type="submit" name="namebtn" value="Cadastrar">
    <br><br>
  </form>

  <?php
  echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>Id</th><th>Serviços</th><th>Excluir</th></tr>";

  $servername = "127.0.0.1:3306";
  $username = "root";
  $password = "";
  $dbname = "petshop";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, servico FROM servico");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($stmt->fetchAll() as $linha) {
      echo "<tr><td>" . $linha["id"] . "</td><td>" . $linha["servico"] . "</td> <td> <a href='servico.php?idexcluir=" . $linha["id"] . "'> ✖ </td></tr>";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "</table>";
  ?>

</body>

</html>

<?php

function excluir($idexcluir){
  require_once 'servico_class.php';
  $us = new Servico("petshop", "127.0.0.1:3306", "root", "");
  if($us->excluir($idexcluir)) { 
      header("Location:servico.php");
  }
}


if (isset($_GET['idexcluir'])) {
  excluir($_GET['idexcluir']);
}

?>
