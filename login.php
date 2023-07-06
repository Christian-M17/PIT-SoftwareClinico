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
      <form action="login.php" method="POST">
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

      <?php
      if (isset($_POST['enviar'])) {
        $servername = "db4free.net";
        $username = "userpit";
        $password = "senhapit";
        $database = "pitclinica";
        $conn = new mysqli($servername, $username, $password, $database);

        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $sql = "SELECT senha FROM usuario WHERE login='" . $login . "'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
          die("Query Failed.");
        } else {
          $row = $result->fetch_array(MYSQLI_ASSOC);

          if ($row != null) {
            $senhavalida = $row["senha"];
            if ($senha == $senhavalida) {
              $_SESSION["loginG"] = $login;
              header("Location: Logado.php");
              exit();
            }
          }
          mysqli_close($conn);
        }
      }
      ?>
    </section>
  </nav>

  <script src="script.js"></script>

</body>

</html>
