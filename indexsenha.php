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
        $servername = "db4free.net";
        $username = "userpit";
        $password = "senhapit";
        $database = "pitclinica";
      $conn = new mysqli($servername, $username, $password, $database);








      
      $login = $_POST["login"];
      
      $nome = $_POST["nome"];
      $sql = "Select nome, senha from usuario where login='" . $login . "'";
      $result = mysqli_query($conn, $sql);

      
      if (!$result) { die("Query Failed."); }
      $row = $result->fetch_array(MYSQLI_ASSOC);

      if ($row != null){
        $nomevalida = $row["nome"];
         if($nome == $nomevalida){
         $senha = $row["senha"];
        $sqlenvia = "insert into alerta(nome, senha) values ('" . $login . "', '" . $senha . "')";
        if (mysqli_query($conn, $sqlenvia)) {
          echo "<script>alert('Pedido realizado com sucesso!'); </script>";
      } else {
          echo "<script>alert('Erro: " . mysqli_error($conn) . "');' </script>";
      }

          
          exit();}
          else{"<script>alert('Nome invalido!'); </script>";}
      }
      mysqli_close($conn);
    }
      
      ?>
    
    <a href="login.php" class="clickVoltar"><label>Voltar ></label>
      
  </section>





  <script src="scripts/script.js"></script>

  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
</body>

</html>