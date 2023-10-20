<!DOCTYPE html>
<?php 
session_start();
$loginG = $_SESSION["loginG"];
if($loginG == null){
  header("Location: login.php");
  
}
include_once "classes/sql.php";
$conexao = new conexaosql();
?>
<html>

<head>
    <title>LampClinic</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <div class="agenda">
            <h1>Realizar Procedimento</h1>
            <form action="procedimentos.php" method="post">
           
                <div class="divselect">
                    <label for="data">Profissional :</label>
                    <select class="select" name="Usuario">
                    <?php 
                  while ($counter1 <= 10) {
                  echo $conexao->nomeLogin($counter1);
                  $counter1++;
    } ?>
                    </select>

                </div>
                <div class="divselect">
                <label for="data">Clientes :</label>
                    <select class="select" name="Cliente">
                    <?php 


                        while ($counter2 <= 10) {
                            echo $conexao->nomeCliente($counter2);
                            $counter2++;}
                        ?>
                    </select>
                    
                </div>
                <div class="divselect">
                    <label for="data">Procedimento:</label>
                    <select class="select" name="procedimento">
                    <?php 


while ($counter3 <= 10) {
    echo $conexao->nomeProcedimento($counter3);
    $counter3++;}
?>
                    </select>
                    
                </div>
                <div class="divselect">
                    <label for="data">Digite a data:</label>
                    <input type="date" name="data" class="data">
                    <button type="submit" name="confirmar">Enviar</button>
                </div>
               
           
            </form>
            <?php 
     if (isset($_POST['confirmar'])) {
       








      $usuario = $_POST["Usuario"];
      $cliente = $_POST["Cliente"];
      $procedimento = $_POST["procedimento"];
      $data = $_POST["data"];

      if($data != null){
      $resultado = $conexao->cadastrarAgendamento($usuario, $cliente, $procedimento, $data );

      echo $resultado;}
      
  }
      
    


     ?>
        </div>
        </div>
    </main>
</body>

</html>