<?php 
session_start();
$login = $_SESSION["loginG"];
if($login == null){
  header("Location: login.php");
}
include_once "classes/sql.php";
$conexao = new conexaosql();
$idLogin = $_SESSION["idUsuario"]
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/cadastroUsuario.css" rel="stylesheet" type="text/css" />
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
      <form action="cadastrousuario.php" method="POST">
      <section class="right-content">  
        <label class="text2">Edite o Usuario</label>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="id" placeholder="Id" value=<?php echo $idLogin?>>
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome Completo" value=<?php echo $conexao->getUsuario($idLogin, "nome")?>>
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="login" placeholder="Login" <?php echo $conexao->getUsuario($idLogin, "Login")?>>
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="senha" placeholder="Senha" <?php echo $conexao->getUsuario($idLogin, "senha")?>>
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <select class="text-wrapper" name="clinica">
            <option value="0">Clinica Lampada</option>
          </select>
            <img class="codicon-input" src="img/Vector-3.png" />
          </div>
        </div>
        
        <button name="confirmar" type="submit"  class="button2">Confirmar</button>
        <button class="button2">Cancelar</button>
        <label><a href="Logado.php" class="text3">Voltar ></a></label>
</section>
      </form>
     
    </div>


  </div>
  </div>
  </div>
  
      <script src="scripts/script.js"></script>

</body>

</html>