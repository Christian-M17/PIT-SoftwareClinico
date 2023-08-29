<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width">
  <title>PIT</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
</head>

<body class="primeiro-body">
  <nav class="LoginGeral">
    <section class="LoginContainer">
      <p>Login</p>
      <div class="line"></div>
      <form action="validasenha.php" method="POST">
        <div class="InputBlock">
          <input type="text" name="login" placeholder="Login">
          <input type="password" name="senha" placeholder="Senha">
          <select class="selectLogin" name="clinica">
            <option value="0">Clinica Lampada</option>
          </select>
          <a href="indexsenha.php"><label>Esqueceu a senha?</label></a>
        </div>
        <button name="enviar" type="submit" class="LoginBlock">LOGIN</button>
        <a href="index.html" class="clickVoltar"><label>Voltar ></label></a>
      </form>

     
    </section>
  </nav>

  <script src="scripts/script.js"></script>

</body>

</html>
