var selectedVelo = 0;
var cpt=0;

$(document).ready(function(){

	$('.datepicker').datepicker({

		format: 'dd-mm-yyyy'
	});

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

	$('.addDate').click(function() {

		cpt++;
		$('.blocDate').append("<div><input type='text' class='datepicker' name='date"+cpt+"'><select class='periode' name='periode"+cpt+"'><option value='am'>Matin</option><option value='pm'>Après-midi</option></select></div>");
		$('.datepicker').datepicker({

			format: 'dd-mm-yyyy'
		});
	});

	$('.buttonNext').click(function(){

		if(selectedVelo ==0){

			return false;

		}
	});

});
