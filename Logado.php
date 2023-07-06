<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

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
      <p>Login: <?php
      $login = $_SESSION["loginG"];
      echo $login;?></p>
    </section>
    <article class="Registre"></article>
    <div class="botaozada">
      <form method="post" action="">
        <button class="btn" type="submit" name="cadastroLogin">Cadastro de Login</button>
        <button class="btn btn-secondary" name="cadastroCliente">Cadastro de Cliente</button>

      <a href="login.php" class="clickVoltar"><label>Voltar ></label></a>
      </form>
      
      <?php
         $servername = "db4free.net";
         $username = "userpit";
         $password = "senhapit";
         $database = "pitclinica";
      $conn = new mysqli($servername, $username, $password, $database);

      
      if (isset($_POST['cadastroLogin'])) {
        
        $sql = "SELECT permissoes FROM usuario WHERE login='" . $login . "'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
          die("Query Failed.");
        }

        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row["permissoes"] == 1 || $row["permissoes"] == 3) {
          header("Location: cadastroUsuario.php");
          exit();
        }
      }
      if (isset($_POST['cadastroCliente'])) {
        
        $sql = "SELECT permissoes FROM usuario WHERE login='" . $login . "'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
          die("Query Failed.");
        }

        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row["permissoes"] == 2 || $row["permissoes"] == 3) {
          header("Location: cadastroCliente.php");
          exit();
        }
      }
      mysqli_close($conn);
      ?>

    </div>
  </nav>
</body>
</html>