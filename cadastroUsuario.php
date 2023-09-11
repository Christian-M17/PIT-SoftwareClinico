<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/cadastroUsuario.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="img/logo1.ico" type="image/x-icon">
  <title>PIT</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
  <div class="tela">
    <div class="half-blue">
      <!-- Conteúdo da metade azul -->
      <div class="content">
        <label class="text1">LampClinic</label>
        <label class="text2">mais rápido Interface de fácil uso e eficiente.</label>
        <button class="button">Ver Mais</button>
      </div>

    </div>
    <div class="half-white">
      <!-- Conteúdo da metade branca -->
      <form action="validasenha.php" method="POST">
      <section class="right-content">  
        <label class="text2">Digite seu Cadastro</label>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome Completo">
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="login" placeholder="Login">
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="senha" placeholder="Senha">
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="ConfirmaSenha" placeholder="Confirmar Senha">
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <select class="text-wrapper" name="clinica">
            <option value="0">Clinica Lampada</option>
          </select>
            <img class="codicon-input" src="img/Vector-1.png" />
          </div>
        </div>
        
        <button name="confirmar" type="submit"  class="button2">Confirmar</button>
        <button class="button2">Bloquear Usuario</button>
        <button class="button2">Cancelar</button>
        <label><a href="index.html" class="text3">Voltar ></a></label>
</section>
<section class="right-content2">  
      <div class="input2">
      <label class="text2">Criar e editar usuarios</label>
          <div class="placeholder">
          <input class="text-wrapper"  type="radio" name="EditarUsuario" value="S">
            <label class="text5">SIM</label>
          </div>
          <div class="placeholder">
          <input class="text-wrapper"  type="radio" name="EditarUsuario" value="N">
            <label  class="text5">NAO</label>
          </div>
        </div>
        <div class="input2">
      <label class="text2">Criar e editar usuarios</label>
          <div class="placeholder">
          <input class="text-wrapper"  type="radio" name="EditarFichas" value="S">
            <label class="text5">SIM</label>
          </div>
          <div class="placeholder">
          <input class="text-wrapper" type="radio" name="EditarFichas" value="N">
            <label  class="text5">NAO</label>
          </div>
        </div>
        
</section>
      </form>
     
    </div>


  </div>
  </div>
  </div>
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
      <script src="scripts/script.js"></script>

</body>

</html>
