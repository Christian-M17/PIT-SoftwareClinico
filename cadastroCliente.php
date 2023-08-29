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
  <nav class="LoginGeral">
    <section class="LoginContainer2">
      <p>Cadastro</p>
      <div class="line"></div>
      <form method="post" action="cadastroCliente.php">
        <div class="ContainerInput">
          <div class="InputBlock">
            <input type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome">
            
             <input type="text" id="cpfInput" name="cpf" placeholder="Cpf" maxlength="14" oninput="formatarCPF(this)">

            <select name="sexo" class="selectLogin">
              <option value="0">Masculino</option>
              <option  value="1">Feminino</option>
              <option  value="2">Outro</option>
            </select>
            <!-- tem que trocar essa data para uma que não tenha como colocar que vc nasceu em 31/01/2050 -->
            <input type="date" id="dataNascimentoInput" name="data" placeholder="Data de nascimento">
          </div>
        </div>
        <button type="submit" name="confirmar" class="PermissionBlock">Confirmar</button>
      </form>
      
      <?php
      if (isset($_POST['confirmar'])) {
        $servername = "db4free.net";
        $username = "userpit";
        $password = "senhapit";
        $database = "pitclinica";
        $conn = new mysqli($servername, $username, $password, $database);

      $nome = $_POST["nome"];
      $cpf = $_POST["cpf"];
      $date = $_POST["data"];

      
      
      
      $sqlverifica = "Select cpf from cliente where cpf='" . $cpf . "'";
      $result = mysqli_query($conn, $sqlverifica);

      
      if (!$result) { die("Query Failed."); }
      $row = $result->fetch_array(MYSQLI_ASSOC);

      if ($row == null)
      {
        $sexo = $_POST["sexo"];
        if($sexo == 0){
          $sexoEnvia = 'M';
        }
        else if($sexo == 1){
          $sexoEnvia = 'F';
        }
        else{
          $sexoEnvia = 'O';
        }
        $dataFormatada = date('Y-m-d', strtotime($date));
      
        $sqlenvia = "insert into cliente(nome, cpf, dataNascimento, sexo) values('" . $nome . "','". $cpf . "','" . $dataFormatada . "','" . $sexoEnvia . "')";
        if (mysqli_query($conn, $sqlenvia)) {
          echo "<script>alert('Dados inseridos com sucesso!'); </script>";
      } else {
          echo "<script>alert('Erro: " . mysqli_error($conn) . "');' </script>";
      }

      mysqli_close($conn);
      }
      else{
        echo "<script>alert('CPF já existente!'); </script>";
      }
      
     }
    
      
      
      ?>
      <div class="BotoesBlock">

        <button class="buttons">Cancelar</button>
      </div>
      <a href="Logado.php" class="clickVoltar"><label>Voltar ></label>
    </section>

  </nav>






  <script src="scripts/script.js"></script>
</body>

</html>