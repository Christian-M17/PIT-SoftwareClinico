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
        // Classes
        include_once "classes/sql.php";
        include_once "classes/permissoes.php";
        

        $conexao = new conexaosql();
        $permissoes = $conexao->PegarPermissoes($login);
        $per = new Permissoes($permissoes);

        // Fim das Classes
      
      if (isset($_POST['cadastroLogin'])) {
        
        $per->AcessoCadastroU();


      }
      if (isset($_POST['cadastroCliente'])) {
        
        $per->AcessoCadastroC();
      }
      
      ?>

    </div>
  </nav>
</body>
</html>