<!DOCTYPE html>
<html lang="pt-BR">
  <head>
  	<title> Chatbox V.1</title>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="visual/visual.css">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {

$("#btn_eCad").click(function() {

$(".container_login").css('display','none');
$(".container_cadastro").css('display','block');

});


$("#btn_eLog").click(function() {

$(".container_login").css('display','block');
$(".container_cadastro").css('display','none');

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
 
switch( retorno ) {
   
  case 'ERROR_0': 
  $(".warning_cad").html("Houve um problema com a conexão, tente mais tarde...");
  break;

  case 'ERROR_1': 
  $(".warning_cad").html("Este email já está cadastrado...");
  break;

  case 'ERROR_2': 
  $(".warning_cad").html("Não foi possível realizar o cadastro...");
  break;

  case 'SUCESS': 
  $(".warning_cad").html("Cadastro realizado com sucesso...");
  break;

}


$(".warning_cad").css("border","1px dotted gray");
$(".warning_cad").fadeIn(500);


                 
});

  

});




$('#form-login').submit(function(er) {
er.preventDefault();


let dados = $(this).serialize();



$.ajax({
      type: "POST",
      url: "controller_php/login_usuario.php",
      data: dados,
      dataType: "html",
      beforeSend: function() {

     }
}).done(function( retorno ) {


switch( retorno ) {
   
  case 'ERROR_0': 
  $(".warning_login").html("Houve um problema com a conexão, tente mais tarde...");
  break;

   case 'ERROR_1': 
  $(".warning_login").html("Não foi possível realizar o login...");
  break;

  case 'SUCESS': 
  $(".warning_login").html("Login realizado com sucesso<br>Em dois segundos você será redirecionado...");
  setTimeout(login,2000);
  break;

}


$(".warning_login").css("border","1px dotted gray");
$(".warning_login").fadeIn(2000);

                
});

  

});







function login() {
  window.location.href = "chat.php";
}


});



</script>


</head>
 <body>






 <div class="container_entry">


  <div class="container_login">
  <h1 style="margin-bottom: 40px; position: relative; left: 8%; border-bottom: 1px solid rgba(0,0,0,0.3); width: 25%; 
  padding-bottom: 25px; pointer-events: none;"> Login </h1>

    <form action="#" id="form-login"> 

     <span style="position: relative; left: 8.5%; margin-bottom: 10px; font-size: 18px; font-weight: bolder;"> Email</span>
     <input type="email"     class="form-input" name="email" required autocomplete="off" minlength="12" placeholder="email@exemplo.com.br" autofocus="on">

<br>

     <span style="position: relative; left: 8.5%; margin-bottom: 10px; font-size: 18px; font-weight: bolder;"> Senha</span>
     <input type="password"  class="form-input" name="senha" required minlength="6" placeholder="Digite sua senha....">


 <div style="position: relative; left: 8.5%; margin-bottom: 10px; margin-top: 10px;">
     <input type="checkbox"  name="lembrar-me" id="lembrar_me"> <label for="lembrar_me">Lembrar - me</label> 
</div>

     <button type="submit" class="form-submit"> Login </button>

 <div class="warning_login" style="position: relative; top: 25px; margin: 0 auto; padding: 15px; width: 90%; text-align: center;">
</div>

<div style="position: relative; top: 100%; margin-top: 0px; text-align: center; display: grid"> Não tem uma conta ainda? 
<br>
<br> 
<button id="btn_eCad" type="button"> Crie a sua conta aqui </button> 
</div>

</form>
</div>
  












  <div class="container_cadastro">
  <h1 style="margin-bottom: 40px; position: relative; left: 8%; border-bottom: 1px solid rgba(0,0,0,0.3); width: 25%; 
  padding-bottom: 25px; pointer-events: none;"> Cadastrar </h1>

    <form action="#" id="form-cadastro"> 

     <span style="position: relative;  left: 8.5%; margin-bottom: 10px; font-size: 18px; font-weight: bolder;"> Nome</span>
     <input type="text"     class="form-input" name="nome" required autocomplete="off" minlength="12" placeholder="Nome e sobrenome" autofocus="on">


     <span style="position: relative;  left: 8.5%; margin-bottom: 10px; font-size: 18px; font-weight: bolder;"> Email</span>
     <input type="email"     class="form-input" name="email" required autocomplete="off" minlength="12" placeholder="email@exemplo.com.br" autofocus="on">


     <span style="position: relative; left: 8.5%; margin-bottom: 10px; font-size: 18px; font-weight: bolder;"> Senha</span>
     <input type="password"  class="form-input" name="senha" required minlength="6" placeholder="Digite sua senha....">

  


     <br>
     <button type="submit" class="form-submit"> Cadastrar </button>

 <div class="warning_cad" style="position: relative; top: 25px; margin: 0 auto; padding: 15px; width: 90%; text-align: center;">
</div>


<div style="position: relative; top: 100%; margin-top: 5px; text-align: center; display: grid"> Já possui uma conta? 

<button id="btn_eLog" type="button"> Realize o login aqui </button> 
</div>

</form>
</div>
  


</div>















  </body>
</html>