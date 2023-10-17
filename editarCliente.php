<?php 
session_start();
$login = $_SESSION["loginG"];
if($login == null){
  header("Location: login.php");
}
include_once "classes/sql.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/cadastrocliente.css" rel="stylesheet" type="text/css" />
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
        <button class="button"><a href="index.html">Ver Mais</a></button>
      </div>

    </div>
    <div class="half-white">
      <!-- Conteúdo da metade branca -->
      <form class="right-content" action="validasenha.php" method="POST">
        <label class="text1">BEM VINDO</label>
        <label class="text2">Escolha as opçoes para editar o perfil de cliente</label>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="id" placeholder="Id">
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome">
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper"type="text" name="cpf" placeholder="Cpf" maxlength="14" oninput="formatarCPF(this)">
            <img class="codicon-input" src="img/cpf.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <select class="text-wrapper" name="sexo">
          <option value="0">Masculino</option>
              <option  value="1">Feminino</option>
              <option  value="2">Outro</option>
          </select>
            <img class="codicon-input" src="img/cliente.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="date" name="data" placeholder="Data de nascimento">
            <img class="codicon-input" src="img/date.png" />
          </div>
        </div>
        <button type="submit" name="confirmar"  class="button2">Editar</button>
        <button name="enviar" type="submit"  class="button2">Cancelar</button>
        <label> <a href="Logado.php" class="text3">Voltar ></a></label>
</form>
     
    </div>


  </div>
  </div>
  </div>
  
      <script src="script.js"></script>
</body>

</html>
