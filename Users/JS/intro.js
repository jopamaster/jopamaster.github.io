$(document).ready(function()
{
    $('.banner').hide(); 
	$('.form').hide();
	$('.footer').hide();
	$(this).scrollTop(0);

	//BS Modal//
	$(window).on('load',function()
	{
		$('#intro_Modal').modal('show');
	});

	$('#intro_Modal').modal(
	{
		backdrop: 'static',
		keyboard: false
	});	

	$('#btn-proceed').click(function() 
	{	
		$('.banner').toggle("slide", {direction: "left"}, 500);
		$('.form').delay(500).toggle("slide", {direction: "left"}, 500);
		$('.footer').delay(1000).toggle("slide", {direction: "left"}, 500);
	}); 
	//BS Modal//

});