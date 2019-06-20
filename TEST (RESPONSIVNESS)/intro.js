
 $(document).ready(function(){
    $(this).scrollTop(0);

    var dialog = document.getElementById("myDialog");
	var close = document.getElementsByClassName("close-btn")[0];
	$(window).on('load',function(){
	$('#myDialog').dialog('show');});
	close.onclick = function() {
	dialog.style.display = "none";}
	
	


});
