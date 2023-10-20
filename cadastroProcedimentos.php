<?php session_start();
$login = $_SESSION["loginG"];
if ($login == null) {
  header("Location: login.php");
  include_once "classes/sql.php";
                        $conexao = new conexaosql();  
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/cadastroProcedimento.css" rel="stylesheet" type="text/css" />
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
      <form class="right-content" action="cadastroProcedimento.php" method="POST">
        <label class="text1">BEM VINDO</label>
        <label class="text2">Digite seu Cadastro</label>
        <div class="input">
          <div class="placeholder">
            <input class="text-wrapper" type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome">
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
            <input class="text-wrapper" type="text" name="tipo" placeholder="tipo">
            <img class="codicon-input" src="img/Vector-3.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
            <input class="text-wrapper" type="number" name="duracao" placeholder="duracao">
            <img class="codicon-input" src="img/Vector-6.png" />
          </div>
        </div>
        <button type="submit" name="confirmar" class="button2">Cadastrar</button>
        <button name="enviar" type="submit" class="button2">Cancelar</button>
        <label> <a href="Logado.php" class="text3">Voltar ></a></label>
      
      <section class="right-content2">
        <div class="input3">
          <label class="text2">Adicionar Item</label>
          <div class="input4">
            <div class="placeholder">
              <select class="text-wrapper" name="clinica">
              <?php 
                        

                        while ($counter <= 10) {
                            echo $conexao->nomeItem($counter);
                            $counter++;}
                        ?>
              </select>
              <img class="codicon-input" src="img/Vector-4.png" />
            </div>
          </div>
          <div class="input4">
            <div class="placeholder">
              <input class="text-wrapper" type="number" name="quantidade" placeholder="quantidade">
              <img class="codicon-input" src="img/Vector-5.png" />
            </div>
          </div>
          
          <button type="submit" name="confirmar" class="button2">Adicionar Item</button>
        </div>
      </section>
      <?php

if (isset($_POST['confirmar'])) {
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $itemId = $_POST["itens"];
    $quantidade = $_POST["quantidade"];
    $duracao = $_POST["duracao"];
    if($quantidade == null || $quantidade = 0){
      $itemId = 0;
      $quantidade = 0;
    }

    echo $conexao->cadastrarProcedimento($nome, $tipo, $duracao, $itemId, $quantidade);
  }



      ?>
    </div>
  </div>
  </div>
  </div>
</form>
  <script src="script.js"></script>
</body>

</html>