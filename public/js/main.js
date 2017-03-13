$(document).ready( function() 
{
	$(".menu-item-nav-mini").click( function() 
	{
		$("#container").toggleClass("container-shift");
		$("nav").toggleClass("nav-shift");
		$(this).toggleClass("nav-mini-clicked");
	} );

	//$(".rslides").responsiveSlides();
});

