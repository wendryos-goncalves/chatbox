<?php 

if (empty($_POST)) {

header("Location: index.php"); 

} else {

$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];


try {
	
$conexao = new PDO("mysql: host=localhost;dbname=bancodados;",'root','');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $conexao->prepare("INSERT INTO usuarios ( usuario, senha ) VALUES ( ?, ? )");

$n_usuario = $usuario;
$n_senha   = password_hash($senha, PASSWORD_ARGON2I);

$query->bindParam( 1, $n_usuario );
$query->bindParam( 2, $n_senha );
$query->execute();

echo $query->rowCount();



} catch (PDOException $e) {
	echo "<p> Houve um problema ao tentar com se conectar ao banco de dados... <p>";
}


}





?>