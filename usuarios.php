<?php session_start();
$login = $_SESSION["loginG"];
if($login == null){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>LampClinic</title>
  <link rel="stylesheet" type="text/css" href="css/landingPage.css">
  <link rel="shortcut icon" href="img/logo1.ico" type="image/x-icon">
</head>

<body class="body-parte2">
  <header>
    <div class="logo">
      <a href="logado.php"><img src="img/logo.png" alt="Logo"></a>
    </div>
    <div class="profile">

  
      </a>
    </div>
  </header>
  <main>
   <?php 
   $counter = 1;

   include_once "classes/sql.php";
$conexao = new conexaosql();  

if (isset($_POST['bloquear'])) {
  $valor = $_POST['bloquear'];
  echo $conexao->bloquear($valor);
 
}
if (isset($_POST['editar'])) {
    $valor = $_POST['editar'];
    $_SESSION["idUsuario"] = $valor;
    header("Location: editarUsuario.php");
  
  }

while ($counter <= 10) {
  
  $output = $conexao->imprimirUsuarios($counter);
  if ($output == "fim") {
    break;
  }
  else{
  echo $output;
  $counter++;
  }

}





  ?>


 
  </main>
</body>

</html>
