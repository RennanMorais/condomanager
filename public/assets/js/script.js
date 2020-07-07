$("#btn-inicio").click(function(){
  
  var body = $("html, body");
  var target = $(".section-banner");

  $(body).animate({
    scrollTop: target.offset().top
  }, 2000);

});

$("#btn-quemsomos").click(function(){
  
  var body = $("html, body");
  var target = $(".section-0");

  $(body).animate({
    scrollTop: target.offset().top
  }, 1000);

});

$("#btn-sistema").click(function(){
  
  var body = $("html, body");
  var target = $(".section-1");

  $(body).animate({
    scrollTop: target.offset().top
  }, 1000);

});

$("#btn-contato").click(function(){
  
  var body = $("html, body");
  var target = $(".footer");

  $(body).animate({
    scrollTop: target.offset().top
  }, 1000);

});

$("#btn-banner").click(function(){
  
  var body = $("html, body");
  var target = $(".section-2");

  $(body).animate({
    scrollTop: target.offset().top
  }, 1000);

});