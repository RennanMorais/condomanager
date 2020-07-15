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

//animação do menu mobile da landing page
$("#btn-inicio-m").click(function(){
  
  var body = $("html, body");
  var target = $(".section-banner");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-quemsomos-m").click(function(){
  
  var body = $("html, body");
  var target = $(".section-0");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-sistema-m").click(function(){
  
  var body = $("html, body");
  var target = $(".section-1");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-contato-m").click(function(){
  
  var body = $("html, body");
  var target = $(".footer");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$("#btn-banner-m").click(function(){
  
  var body = $("html, body");
  var target = $(".section-1");

  $(body).animate({
    scrollTop: target.offset().top
  }, 500);

});

$('.menu-mobile-btn').on('click', function(){

  var menu = $('.menu-mobile');

  if(menu.css('display') == 'none') {
    $(menu).show('fade');
  } else {
    $(menu).hide('fade');
  }
  


})

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

//Chart Visitantes

var ctx = document.getElementById('visitor-chart').getContext('2d');
var myChart = new Chart(ctx, {

    type: 'line',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: 'Visitantes',
            data: [12, 19, 3, 5, 2, 3, 5, 6, 12, 25, 23, 21],
            backgroundColor: [
                '#C7E8ED'
            ],
            borderColor: [
                '#148A9D'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});