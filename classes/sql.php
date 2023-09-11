<?php

class conexaosql {
  private $conn;
  

  public function __construct() {
      $servername = "db4free.net";
      $username = "userpit";
      $password = "senhapit";
      $database = "pitclinica";
      $this->conn = new mysqli($servername, $username, $password, $database);
  }

  public function fazendologin($login_verifica, $senha_verifica) {
      $sql = "SELECT senha FROM usuario WHERE login='" . $login_verifica . "'";
      $result = mysqli_query($this->conn, $sql);

      if (!$result) {
          mysqli_close($this->conn);
          return 11;
      } else {
          $row = $result->fetch_array(MYSQLI_ASSOC);

          if ($row != null) {
              $senhavalida = $row["senha"];
              if ($senha_verifica == $senhavalida) {
                  mysqli_close($this->conn);
                  return 10;
              } else {
                  mysqli_close($this->conn);
                  return 12;
              }
          }
          mysqli_close($this->conn);
      }
  }


  public function PegarPermissoes($login_verifica){
    $sql = "SELECT permissoes FROM usuario WHERE login='" . $login_verifica . "'";
    $result = mysqli_query($this->conn, $sql);
    
    if (!$result) {
      mysqli_close($this->conn);
      return 11;}
    else{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['permissoes'];}

  }
}