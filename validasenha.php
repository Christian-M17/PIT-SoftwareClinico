<?php 
session_start(); 
include_once "classes/sql.php";

logando();

function logando(){
if (isset($_POST['enviar'])) {
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        


$conexao = new conexaosql();

$codigo = $conexao->fazendologin($login, $senha);

if ($codigo == 10){
    $_SESSION["loginG"] = $login;
    header("Location: Logado.php");
    }
else if ($codigo == 11){
    echo "<script>alert('Erro: lp11 Erro com o banco'); </script>";
    header("Location: Login.php");
}
else if ($codigo == 12){
    echo "<script>alert('Senha Invalida'); </script>";
    header("Location: Login.php");
}
else {
    echo "<script>alert('Erro Desconhecido'); </script>";
    header("Location: Login.php");
}

}}
      ?>