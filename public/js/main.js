$(document).ready( function() 
{
	$(".menu-item-nav").click( function() 
	{
		$("nav").toggleClass("nav-transition");
		$(".container").toggleClass("container-shift");
		$(this).toggleClass("nav-mini-clicked");
	} );
});

