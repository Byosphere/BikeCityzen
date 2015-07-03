$(document).ready(function(){
	
	$( window ).scroll(function() {
		if($('body').scrollTop()>0){
			
			$('.navigation').removeClass('top');
			
		} else {
			
			$('.navigation').addClass('top');
		}
	});
	
});