<!DOCTYPE html>
<html>

<head>
    <title>PUCPR - Cadastro PET</title>
    <meta charset="utf-8" >
    <link href="assets/css/fontawesome-free-5.15.1-web/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
<body>
    <div> 
        <a href="usuario.html" class="nav-menu"> Usuário</a>
        <a href="pet.php" class="nav-menu"> Pet</a>
        <a href="servico.php" class="nav-menu"> Serviço</a>
        <a href="agenda.html" class="nav-menu"> Agenda</a>
    </div>
<h2>Cadastro PET</h2>
<form action="pet_action.php" method="POST">

    <label for="fpetname">Nome pet:</label><br>
    <input type="text" id="fpetname" nama="fpetname" value=""><br><br>

    <label for="fdtnascimento">Data nascimento pet:</label><br>
    <input type="date" id="fdtnascimento" nama="fdtnascimento" value=""><br><br>

    <label for="fcuidador">Cuidador(a):</label><br>
    <input  type="text" id="fcuidador" nama="fcuidador" value=""><br><br>

    <label for="fcontato">Contato:</label><br>
    <input type="text" id="fcontato" nama="fcontato" value=""><br><br>

    <label for="femail">E-mail:</label><br>
    <input type="text" id="femail" nama="femail" value=""><br>
    <br><br>
    <input type="submit" name="namebtn" value="Cadastrar"> 
    <br><br>
</form>    

<table>
    <tr>
      <th>Pet</th>
      <th>Cuidador (a)</th>
      <th>Contato</th>
      <th>E-mail</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
    <tr>
      <td>Cookie</td>
      <td>Maria Anders</td>
      <td>(41) 9999-9999</td>
      <td>x@gmail.com</td>
      <td><i class="fas fa-edit"></i></td>
      <td><i class="fas fa-trash"></i></td>
    </tr>
    <tr>
      <td>Pochy</td>
      <td>Francisco Chang</td>
      <td>(41) 9999-9999</td>
      <td>x@gmail.com</td>
      <td><i class="fas fa-edit"></i></td>
      <td><i class="fas fa-trash"></i></td>
    </tr>
    <tr>
      <td>Ernst Handel</td>
      <td>Roland Mendel</td>
      <td>(41) 9999-9999</td>
      <td>x@gmail.com</td>
      <td><i class="fas fa-edit"></i></td>
      <td><i class="fas fa-trash"></i></td>
    </tr>
    <tr>
      <td>Lala</td>
      <td>Helen Bennett</td>
      <td>(41) 9999-9999</td>
      <td>x@gmail.com</td>
      <td><i class="fas fa-edit"></i></td>
      <td><i class="fas fa-trash"></i></td>
    </tr>
    <tr>
      <td>Ajudante de Papai Noel</td>
      <td>Yoshi Tannamuri</td>
      <td>(41) 9999-9999</td>
      <td>x@gmail.com</td>
      <td><i class="fas fa-edit"></i></td>
      <td><i class="fas fa-trash"></i></td>
    </tr>
    <tr>
      <td>Totó</td>
      <td>Giovanni Rovelli</td>
      <td>(41) 9999-9999</td>
      <td>x@gmail.com</td>
      <td><i class="fas fa-edit"></i></td>
      <td><i class="fas fa-trash"></i></td>
    </tr>
  </table>
</body>
</html>

