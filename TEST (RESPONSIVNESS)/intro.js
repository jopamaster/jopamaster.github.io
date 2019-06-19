
 $(document).ready(function(){
    $(this).scrollTop(0);
$.ui.dialog.prototype.options.responsive = true;
    var dialog = document.getElementById("myDialog");
	var close = document.getElementsByClassName("close-btn")[0];
	$(window).on('load',function(){
	$('#myDialog').dialog('show');});
	close.onclick = function() {
	dialog.style.display = "none";}
});
