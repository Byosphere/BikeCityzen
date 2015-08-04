var selectedVelo = 0;

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

	$('.velo').click(function() {

		selectedVelo = $(this).attr('data-id');
		$('.idVelo').val(selectedVelo);
		$('.velo').removeClass('active');
		$(this).addClass('active');

	});

	$('.buttonNext').click(function(){

		if(selectedVelo ==0){

			return false;

		}
	});

});
