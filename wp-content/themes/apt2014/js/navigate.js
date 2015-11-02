(function($){
$(document).ready(function(){
  $("#responsenav").on('click', function (evt){
  evt.preventDefault();      
  $("#nav").slideToggle();
})
})}(jQuery));