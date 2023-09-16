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

   include_once "classes/sql.php";
$conexao = new conexaosql();  

while ($counter <= 10) {
  echo $conexao->imprimirItens($counter);
  $counter++;
}


?>
   
  </main>
</body>

</html>
