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
   <div class='patient-info-container'>
      <h2>Informações do Usuario</h2>
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
        <h4>Escreve algo ai</h4>
        <p>xxxxxx</p>
      </div>
      <div class='procedure-record'>
        <h4>Escreve algo ai</h4>
        <p>xxxxxx</p>
        <button type='button'>Editar</button>
      </div>
      
    </div>
  </main>
</body>

</html>