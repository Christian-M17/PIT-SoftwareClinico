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
      <a href="index.html"><img src="img/logo.png" alt="Logo"></a>
    </div>
    <div class="profile">
    </div>
  </header>
  <main>
  <form class="pesquisar">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" min="0" step="1" pattern="[0-9]*" required>
        <input type="submit" value="Pesquisar">
    </form>
  <?php         
$counter = 1;
$cpfpicker = [];
include_once "classes/sql.php";
$conexao = new conexaosql();  

while ($counter <= 10) {
  $cpfpicker[$counter] = $conexao ->  pegaCpf($counter);
  echo $conexao->imprimirClientes($counter);
  
  $counter++;

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
