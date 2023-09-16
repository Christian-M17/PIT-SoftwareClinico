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
    <section class="LoginContainer4">    
    <p>Recuperação</p>
    <div class="line"></div>
    <span>Faça um pedido para o admnistrador</span>
    <form method="POST">
      <div class="InputBlock">
        <input type="text" name="login" placeholder="Usuario">
        <input type="text" name="nome" placeholder="Nome">
        <select class="selectLogin">
          <option value="0">Clinica Lampada</option>
        </select>
      </div>
      <button name= "enviar" class="LoginBlock">Fazer Pedido</button>
    </form>
    <?php 
       
      if (isset($_POST['enviar'])) {
        







      
        $login = $_POST["login"];
        $nome = $_POST["nome"];
        include_once "classes/sql.php";
        $conexao = new conexaosql();
  
        echo $conexao->recuperarSenha($login, $nome);}
      
      ?>
    
    <a href="login.php" class="clickVoltar"><label>Voltar ></label>
      
  </section>





  <script src="script.js"></script>

</body>

</html>