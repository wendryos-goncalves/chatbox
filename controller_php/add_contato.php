<?php 
session_start();

if (isset($_POST['email_usuario'])) {
$usuario_add  = $_POST['email_usuario'];
$meu_usuario  = $_SESSION['email'];


try {

$conexao = new PDO("mysql: host=localhost; dbname=bancodados", "root", "");

$query_verify = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
$usuario  = filter_var( $usuario_add , FILTER_SANITIZE_EMAIL   );
$usuarioAdd = trim($usuario);

$query_verify->bindValue(1, $usuarioAdd);
$query_verify->execute();

if ( $query_verify->rowCount() !=1 ) { 

echo "Não foi possível encontrar este usuário, verifique o email e tente novamente...";


} else {


if ($usuario_add == $meu_usuario) {

echo "Você não pode adicionar você mesmo.";

} else {

$query = $conexao->prepare("INSERT INTO contatos (usuario, outro_usuario) VALUES (?, ?)");
$query->bindParam(1, $meu_usuario   );
$query->bindParam(2, $usuarioAdd  );
$query->execute();

if ( $query->rowCount() > 0 ) { 

echo "Você adicionou o contato: " . $usuarioAdd . "com sucesso.";

} else { echo "Não foi possível adicionar este contato."; }


}


}




} catch (PDOException $e) {
    echo "ERROR_0";
	
}


} else {
	header("Location: index.php");
}







?>