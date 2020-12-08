<?php
session_start();
if (isset($_SESSION['email'])) {


try {

$conexao = new PDO("mysql: host=localhost; dbname=bancodados", "root", "");
$query_verify = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");

$email  = $_SESSION['email'];

$query_verify->bindValue(1, $email);
$query_verify->execute();

if ( $query_verify->rowCount() > 0 ) { 

$me = $query_verify->fetch();




  } else {
          


  }
 
} catch (PDOException $e) {

    echo "ERROR_0";  
  
}




?>
  
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
  	<title> Chatbox V.1</title>
    <!--  meta tags -->


    <!-- CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="visual/chat.css">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {


$(".contatos_footer").click(function() {

let usuario_add = prompt('Digite o email do usuário...',"");
if(usuario_add != "") {


$.ajax({
      type: "POST",
      url: "controller_php/add_contato.php",
      data: {
      	email_usuario: usuario_add
      },
      dataType: "html",
      beforeSend: function() {

     }
}).done(function( retorno ) {
 
 alert(retorno);
});





} else {
	alert("Digite um email...");
}


});




$('#form-cadastro').submit(function(er) {
er.preventDefault();



let dados = $(this).serialize();



$.ajax({
      type: "POST",
      url: "controller_php/cadastro_usuario.php",
      data: dados,
      dataType: "html",
      beforeSend: function() {

     }
}).done(function( retorno ) {
 
});




                 
});






  

});








</script>


</head>
 <body>





 <div class="container_chat">

    <div class="container_chatbox_desktop">

    	 <div class="div1"> 

    	 	<div class="container_chatbox_head">
<a href="dashboard/usuario.php">		
<div class="container_imagem" style="
background: url(<?=$me['imagem_perfil']?>);
background-repeat: no-repeat;
background-position: center center;
background-size: cover;">
</div>	
</a> 	

<li class="chatbox_head_name"> <?=$me['nome']; ?>   </li>
<a href="controller_php/logout.php" class="chatbox_head_logout"> <i class="fas fa-sign-out-alt"> </i>  </a>
<a href="dashboard/usuario.php" class="chatbox_head_config">  <i class="fas fa-cog"> </i> </a> 
    	 	</div>
    		
<div class="container_chatbox_dashboard">

<div class="chatbox_dashboard_conversas">
<h4 style="text-align: left; margin-left: 10px; margin-bottom: 15px;"> Conversas </h4>  

<div class="container_conversas">
	<div class="conversas_vazio">	Você ainda não possui nenhuma conversa</div>
</div>


<br>
<br>

<h4 style="text-align: left; margin-left: 10px; margin-bottom: 15px;"> Contatos </h4>  
<div class="contatos_footer">	<i class="fas fa-user-plus"></i> Adicionar contato </div>

	 
<div class="container_contatos">

<?php 

$query_verify = $conexao->prepare("SELECT * FROM contatos WHERE usuario = ?");
$meu_email = $me['email'];

$query_verify->bindValue(1, $meu_email);
$query_verify->execute();

if ( $query_verify->rowCount() > 0 ) { 

$resultado_contatos = $query_verify->fetchAll();

foreach ($resultado_contatos as $row) {
$oU = $row['outro_usuario'];

$query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
$query->bindValue(1, $oU);
$query->execute();

$contato = $query->fetch();

echo "<li style='margin-bottom:20px; margin-top: 10px; text-align:center;'> 
<div style='background:url(".$contato['imagem_perfil'] ."); width: 42px; height: 42px; background-size:cover; background-position: center center; position:relative; left: 20px;top: 4px;'/>" . 
"<div style='position: relative; top: 15px; left: 35px; width:200px;'>". $contato['nome'] . "</div>" . "</li>";


echo "\n";




}



} else {

echo '<div class="contatos_vazio">	Você ainda não possui nenhum contato </div>';


}





?>







</div>



</div>	




</div>
    
    	 	<div class="container_chatbox_footer">
    	 		
    	 	</div>
    		 



    	</div>



   </div>






   <div class="container_chatbox_mobile"></div>

</div>













  </body>
</html>






<?php

} else {
	header("Location: index.php");
}


?>