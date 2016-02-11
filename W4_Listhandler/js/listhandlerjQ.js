$(document).ready(function() {
  $('#moveright').click(function () {
  
  	var contents = $('ul#leftlist li' ).last().remove().html();
  	if (undefined != contents) {
  		$('ul#rightlist').append("<li>" + contents + "</li>");
	}  	
  });
  $('#moveleft').click(function () {
  
  	var contents = $( 'ul#rightlist li' ).last().remove().html();
  	if (undefined != contents) {
  		$('ul#leftlist').append("<li>" + contents + "</li>");
	}  	
  	
  });

});