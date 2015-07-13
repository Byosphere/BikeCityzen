$(document).ready(function(){

	$( window ).scroll(function() {
		if($('body').scrollTop()>0){

			$('.navigation').removeClass('top');

		} else {

			$('.navigation').addClass('top');
		}
	});

	$('.button-menu').click(function(){

		$('#side-panel').toggleClass('open');
		return false;

	});

});
