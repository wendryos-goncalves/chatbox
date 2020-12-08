<?php 

if (empty($_POST)) {

header("Location: index.php"); 

} else {

$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];


try {
	
$conexao = new PDO("mysql: host=localhost;dbname=bancodados;",'root','');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $conexao->prepare(" SELECT * FROM usuarios WHERE email = ? ");
$n_usuario = $usuario;

$query->bindValue( 1, $n_usuario );
$query->execute();


if ( $query->rowCount() > 0 ) {
$result  = $query->fetch();
$n_senha = $result['senha'];

if ( password_verify($senha, $n_senha) > 0 ) {
	echo "sucesso";
	$_SESSION['usuario'] = $n_usuario;

} else {
	echo "error1";
}


} else {
	echo "error2";
}

/*
$query->bindParam( 2, $n_senha );
$query->execute();

$n_senha   = password_hash($senha, PASSWORD_ARGON2I);
*/


} catch (PDOException $e) {
	echo "error3";
}


}
