<?php 
$nome_usuario  = $_POST['nome'];
$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];


try {

$conexao = new PDO("mysql: host=localhost; dbname=bancodados", "root", "");

$query_verify = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
$query_verify->bindValue(1, $email_usuario);
$query_verify->execute();

if ( $query_verify->rowCount() > 0 ) { 

echo "ERROR_1";


} else {

$query = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, imagem_perfil) VALUES (?, ?, ?, ?)");

$nome   = filter_var( $nome_usuario ,  FILTER_SANITIZE_STRING  );
$email  = filter_var( $email_usuario , FILTER_SANITIZE_EMAIL   );
$senha  = filter_var( $senha_usuario , FILTER_SANITIZE_STRING  );

$n_senha   = password_hash( $senha, PASSWORD_BCRYPT );
$n_nome    = trim($nome);
$n_email   = trim($email);
$n_imagem  = "visual/imagens/icon_default.png";

$query->bindParam(1, $n_nome   );
$query->bindParam(2, $n_email  );
$query->bindParam(3, $n_senha  );
$query->bindParam(4, $n_imagem );
$query->execute();

if ( $query->rowCount() > 0 ) { 


	echo "SUCESS";

} else {

	echo "ERROR_2";
}

	}

} catch (PDOException $e) {
    echo "ERROR_0";
	
}










?>