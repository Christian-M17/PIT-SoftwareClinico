<?php 
session_start();
$loginG = $_SESSION["loginG"];

if($loginG == null){
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
      <form action="editarUsuario.php" method="POST">
      <section class="right-content">  
        <label class="text2">Edite o Usuario</label>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="id" placeholder="Id" value=<?php echo $idLogin ?>  readonly>
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="nome" oninput="formatarNome(this)" placeholder="Nome Completo" value= '<?php echo $conexao->getUsuario($idLogin, "nome")?>'>
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="login" placeholder="Login" value= '<?php echo $conexao->getUsuario($idLogin, "Login") ?>''>
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="senha" placeholder="Senha" value= '<?php echo $conexao->getUsuario($idLogin, "senha") ?>'>
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
        <label><a href="usuarios.php" class="text3">Voltar ></a></label>
</section>
      </form>
     <?php 
     if (isset($_POST['confirmar'])) {
       








      $nome = $_POST["nome"];
      $login = $_POST["login"];
      $senha = $_POST["senha"];
      $per = $conexao->PegarPermissoes($loginG);

      if ($per == 1 || $per == 3) {
      $resultado = $conexao->editarUsuario($idLogin, $nome, $login, $senha, );

      if($resultado == 1){
      echo   "<script>alert('Dados inseridos com sucesso!'); </script>";
      }
      else{
        echo "<script>alert('Login já existe ou erro no banco'); </script>";
      }
      
    }
  }
      
    


     ?>
    </div>


  </div>
  </div>
  </div>
  
      <script src="scripts/script.js"></script>

</body>

</html>