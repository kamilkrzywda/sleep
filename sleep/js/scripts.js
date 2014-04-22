$(function() {

	$('#content .box .button').click(function(){
		$('#popup_wrapper').fadeIn();
	})

	$('#popup .button').click(function(){
		$('#popup_wrapper').fadeOut();
	})

});