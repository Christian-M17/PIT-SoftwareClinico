<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width">
  <title>PIT</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="shortcurt icon" href="img/logo.ico" type="image/x-icon">
</head>

<body class="primeiro-body">
  <nav class="LoginGeral">
    <section class="LoginContainer3">
      <p>Cadastro</p>
      <div class="line"></div>
      <form action="cadastroUsuario.php" method="POST">
        <div class="ContainerInput">
          <div class="InputBlock">
          <input type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome Completo">  
          <input type="text" name="login" placeholder="Login">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="ConfirmaSenha" placeholder="Confirmar Senha">
          </div>
          <select class="selectLogin">
            <option value="0">Clinica Lampada</option>
          </select>
        </div>
        <p>Permitir</p>
        <div class="line"></div>
        <div class="ContainersPermissoes">
          <div class="Permissoes">
            <h4>Criar e editar Usuarios</h4>
            <input type="radio" name="EditarUsuario" value="S">
            <h5>Permitido</h5>
            <input type="radio" name="EditarUsuario" value="N">
            <h5>Nao Permitido</h5>
          </div>

          <div class="Permissoes">
            <h4>Criar e editar Fichas de Pacientes</h4>
            <input type="radio" name="EditarFichas" value="S">
            <h5>Permitido</h5>
            <input type="radio" name="EditarFichas" value="N">
            <h5>Nao Permitido</h5>
          </div>
          
      </section>

      <button name="confirmar" type="submit" class="PermissionBlock">Confirmar</button>
      
      <div class="BotoesBlock">
        <button class="buttons">Bloquear Usuario</button>
        <button class="buttons">Cancelar</button>
      </div>
      <a href="Logado.php" class="clickVoltar"><label>Voltar ></label>
      </form>
      <?php
      if (isset($_POST['confirmar'])) {
        $servername = "db4free.net";
        $username = "userpit";
        $password = "senhapit";
        $database = "pitclinica";
        $conn = new mysqli($servername, $username, $password, $database);








      $nome = $_POST["nome"];
      $login = $_POST["login"];
      
      $senha = $_POST["senha"];
      $confirmaSenha = $_POST["ConfirmaSenha"];
      if($senha == $confirmaSenha){
      $sqlverifica = "Select login from usuario where login='" . $login . "'";
      $result = mysqli_query($conn, $sqlverifica);

      
      if (!$result) { die("Query Failed."); }
      $row = $result->fetch_array(MYSQLI_ASSOC);

      if ($row == null)
      {
        $EditarUsuario = $_POST['EditarUsuario'];
        $EditarFichas = $_POST['EditarFichas'];
        if($EditarUsuario == "S" && $EditarFichas == "S"){
          $permissoes = 3;
        }
        else if($EditarUsuario == "S"){
          $permissoes = 1;
        }
        else if($EditarFichas == "S"){
          $permissoes = 2;
        }
        else{
          $permissoes = 0;
        }
      
        $sqlenvia = "insert into usuario(nome, login, senha, Tipo_idTipo, permissoes) values('" . $nome . "','". $login . "','" . $senha ."',1," . $permissoes . ")";
        if (mysqli_query($conn, $sqlenvia)) {
          echo"<script>alert('Dados inseridos com sucesso!'); </script>";
      } else {
          echo "<script>alert('Erro: " . mysqli_error($conn) . "');' </script>";
      }

      mysqli_close($conn);
      }
      else{
        echo "<script>alert('Login já existente!'); </script>";
      }
      
      }else{
        echo "<script>alert('SENHA NÃO CONFERE!'); </script>";
    }}
      
      
      ?>
      <section class="ContainerPermission">
   


    </section>
    <article class="Registre">
    </article>
  </nav>






  <script src="scripts/script.js"></script>


</body>

</html>