$(document).ready(function(){
	
	//Bouton pour remonter en haut de page
	$(function()
	{
		$('#scrolltop').click(function()
		{
			$('html').animate({scrollTop:0},'slow');
		});
	});

})