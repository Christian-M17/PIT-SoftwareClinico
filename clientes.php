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
  $servername = "db4free.net";
        $username = "userpit";
        $password = "senhapit";
        $database = "pitclinica";
        $conn = new mysqli($servername, $username, $password, $database);

        
$counter = 1;  

while ($counter <= 10) {  
  $sql = "SELECT nome, dataNascimento, cpf  FROM cliente WHERE id='" . $counter . "'";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die("Query Failed.");
  } else {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($row != null) {
      $nome = $row["nome"];
      $data = $row["dataNascimento"];
      $cpf = $row["cpf"];
      echo "<div class='patient-info-container'>
      <h2>Informações do Paciente</h2>
      <div class='patient-profile'>
        <div class='profile-picture2'>
          <img src='img/lampada.jpg' alt='Profile Picture'>
        </div>
        <div class='profile-details'>
          <h3>" . $nome . "</h3>
          <p>". $data . "</p>
          <p>" . $cpf . "</p>
        </div>
      </div>
      <div class='procedure-record'>
        <h4>Registro de Procedimento:</h4>
        <p>xxxxxx</p>
      </div>
      <div class='procedure-record'>
      <h4>Adicionar Anotações:</h4>
      <textarea rows='4' cols='50'></textarea>
      <button type='button'>Salvar Anotações</button>
    </div>
    </div>";
    }
    
  }
    $counter++;  // Incrementa o contador em 1
}
mysqli_close($conn);
?>

   
    

    </div>
  </main>
</body>

</html>