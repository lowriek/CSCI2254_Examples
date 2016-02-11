$(document).ready(function() {
	$('#moveleft').click(function() {
		$('#leftlist').append($('#rightlist .selected').removeClass('selected'));
	});

	$('#moveright').click(function() {
		$('#rightlist').append($('#leftlist .selected').removeClass('selected'));
	});
	
	  
	$('body').on('click', 'li', function() {
	   $(this).toggleClass('selected');
	});
});