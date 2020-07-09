//animação do menu da landing page
$("#btn-inicio").click(function(){
  
  var body = $("html, body");
  var target = $(".section-banner");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-quemsomos").click(function(){
  
  var body = $("html, body");
  var target = $(".section-0");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-sistema").click(function(){
  
  var body = $("html, body");
  var target = $(".section-1");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-contato").click(function(){
  
  var body = $("html, body");
  var target = $(".footer");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-banner").click(function(){
  
  var body = $("html, body");
  var target = $(".section-1");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

//Script para alteração dinamica do modal
$('#forgot-btn').on('click', function () {

    $.ajax({url: "http://localhost/condosoftware/src/views/pages/forgotpass.php", success: function(result){
      $("#modal-content").html(result);
    }});

    $('#forgotreg-modal').show('fade');
});

$('#reg-btn').on('click', function () {
  
    $.ajax({url: "http://localhost/condosoftware/src/views/pages/registro.php", success: function(result){
      $("#modal-content").html(result);
    }});
    
    $('#forgotreg-modal').show('fade');
});

$('#modal-close').on('click', function() {
    $('#forgotreg-modal').hide('fade');
});