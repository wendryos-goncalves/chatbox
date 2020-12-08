$(document).ready(function() {
	



$('#eye-password').click(function() {

let type = $('#login-password').attr('type');

switch(type)
{
  case 'password': 
  $('#login-password').attr('type','text');
  $(this).html("<i class='fas fa-eye-slash'> </i>");
  break;

  case 'text': 
  $('#login-password').attr('type','password');
  $(this).html("<i class='fas fa-eye'> </i>");
  break;

} 


  });


$('#eye-password_c').click(function() {

let type = $('#cadastro-password').attr('type');

switch(type)
{
  case 'password': 
  $('#cadastro-password').attr('type','text');
  $(this).html("<i class='fas fa-eye-slash'> </i>");
  break;

  case 'text': 
  $('#cadastro-password').attr('type','password');
  $(this).html("<i class='fas fa-eye'> </i>");
  break;

} 


  });




$('.btn-aheader').click(function() {
let btn = $(this).attr('class');

switch(btn)
{
  case 'btn-aheader align-left': 
    document.querySelector('.align-left').style = "border-bottom: 3px solid #fff; opacity: 1;";
    document.querySelector('.align-right').style = "border-bottom: 1px solid #fff; opacity: 0.3;";
    $('.acesso-cadastro').css('display','none');
    $('.acesso-login').css('display','block');
  break;

  case 'btn-aheader align-right': 
    document.querySelector('.align-right').style = "border-bottom: 3px solid #fff; opacity: 1;";
    document.querySelector('.align-left').style = "border-bottom: 1px solid #fff; opacity: 0.3;";
    $('.acesso-login').css('display','none');
    $('.acesso-cadastro').css('display','block');

  break;
}




});



});