<?php 
session_start();

$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];


try {

$conexao = new PDO("mysql: host=localhost; dbname=bancodados", "root", "");

$query_verify = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");

$email  = filter_var( $email_usuario , FILTER_SANITIZE_EMAIL );

$query_verify->bindValue(1, $email);
$query_verify->execute();

if ( $query_verify->rowCount() > 0 ) { 


$resultado_query = $query_verify->fetch();
$senha_bd = $resultado_query['senha'];

if ( password_verify( $senha_usuario, $senha_bd ) == 1 ) {
  $_SESSION['email']   = $resultado_query['email'];
  $_SESSION['usuario'] = $resultado_query['senha'];
  echo "SUCESS";

}

  } else {
          
    echo "ERROR_1";   // Usuario não encontrado...

  }
 
} catch (PDOException $e) {

    echo "ERROR_0";  //Erro no banco de dados...
  
}










?>