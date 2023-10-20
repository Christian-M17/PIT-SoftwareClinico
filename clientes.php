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
    </div>
  </header>
  <main>
  <form method='POST' action='' class="pesquisar">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" min="0" step="1" pattern="[0-9]*" required>
        <input type="submit" name="Pesquisa" value="Pesquisa">
    </form>
  <?php         
$counter = 1;

include_once "classes/sql.php";
$conexao = new conexaosql();  

if (isset($_POST['editarCliente'])) {
  $valor = $_POST['editarCliente'];
  $_SESSION["idCliente"] = $valor;
  header("Location: editarCliente.php");}


if (isset($_POST['Pesquisa'])) {
  $idpesquisa = $_POST['numero'];
  echo $conexao->imprimirClientes($idpesquisa);
} else {
  // Se o botão "Pesquisa" não foi pressionado, exiba todos os clientes.
  while ($counter <= 10) {
      echo $conexao->imprimirClientes($counter);
      $counter++;
  }
}
if (isset($_POST['editar'])) {
  $valor = $_POST['editar'];
  $texto = $_POST['texto' . $valor];
  echo $conexao->anotar($valor, $texto);}
?>

   
    

    </div>
  </main>
</body>

</html>
