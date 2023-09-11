 <?php session_start();
$login = $_SESSION["loginG"];
if($login == null){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/logadoo.css" rel="stylesheet" type="text/css" />
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
      <div class="right-content">
      <div class="content1">
      <p class="text-wrapper">Login: <?php
      $login = $_SESSION["loginG"];
      echo $login;?></p>
    <article class="Registre"></article>
</div>
    <div class="divform">
      <form method="post" action="">
        <button  class="button" type="submit" name="cadastroLogin">Cadastro de Login</button>
        <button class="button" name="cadastroCliente">Cadastro de Cliente</button>
        <button  class="button" ><a href="Selecione.html">Cadastro de Login</a></button>
      <a href="login.php" class="clickVoltar"><label>Voltar ></label></a>
      </form>


</div>
    </div>


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
  </div>
  </div>
</body>

</html>
