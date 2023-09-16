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
   
      <div class="content">
        <label class="text1">LampClinic</label>
        <label class="text2">mais rápido Interface de fácil uso e eficiente.</label>
        <button class="button"><a href="index.html">Ver Mais</a></button>
      </div>

    </div>
    <div class="half-white">

      <form class="right-content" method="POST">
        <label class="text1">Recuperação</label>
        <label class="text2">Faça um pedido para o admnistrador</label>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome">
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper"type="text" name="login" placeholder="login">
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

        <button type="submit" name="confirmar"  class="button2">Fazer Pedido</button>
        <label> <a href="login.php" class="text3">Voltar ></a></label>
</form>
     
    </div>


  </div>
  </div>
  </div>
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
    
      <script src="script.js"></script>
</body>

</html>
