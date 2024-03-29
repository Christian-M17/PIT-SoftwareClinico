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
      <form class="right-content" action="" method="POST">
        <label class="text1">BEM VINDO</label>
        <label class="text2">Digite seu Cadastro de Itens</label>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="nome" placeholder="Nome">
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper"type="number" name="quantidade" placeholder="quantidade" >
            <img class="codicon-input" src="img/Vector-4.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="number" name="valor" placeholder="valor">
            <img class="codicon-input" src="img/Vector-5.png" />
          </div>
        </div>
        <button type="submit" name="confirmar"  class="button2">Cadastrar</button>
        <button name="enviar" type="submit"  class="button2">Cancelar</button>
        <label> <a href="Logado.php" class="text3">Voltar ></a></label>
</form>
     <?php 

if (isset($_POST['confirmar'])) {
     $nome = $_POST["nome"];
     $quantidade = $_POST["quantidade"];
     $valor = $_POST["valor"];
     include_once "classes/sql.php";
     $conexao = new conexaosql();  
     
     echo $conexao->cadastrarItens($nome, $quantidade, $valor);}

    

     ?>
    </div>


  </div>
  </div>
  </div>
      <script src="script.js"></script>
</body>

</html>
