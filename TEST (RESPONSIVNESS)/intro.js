
$(document).ready(function(){
    
	$(this).scrollTop(0);
	
	//BS Modal//
    var modal = document.getElementById("intro_Modal");
	
	$(window).on('load',function()
	{
	$('#intro_Modal').modal('show');
	});
	
	$('#intro_Modal').modal({
    backdrop: 'static',
    keyboard: false
	});	
	//BS Modal//
	
});
