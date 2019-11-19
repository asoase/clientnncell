/**
 * Bootstrap Accordion header active v1.0
 * Manu Morante @unavezfui
 * Last update: 20/10/2014
 * https://codepen.io/unavezfui/pen/HibzA
 */
(function() {
  
  $(".judul-list1").on("show.bs.collapse hide.bs.collapse", function(e) {
    if (e.type=='show'){
      $(this).addClass('active');
    }else{
      $(this).removeClass('active');
    }
  });  

}).call(this);

(function(){
	let children = $('.headeraktif').data('headeraktif');
	$('.headeraktif li:nth-child('+children+')').addClass('active');
}).call(this);