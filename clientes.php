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

  
      </a>
    </div>
  </header>
  <main>
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
?>

   
    

    </div>
  </main>
</body>

</html>