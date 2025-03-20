"use strict";
			
//OBSERVERA document och inte window
document.addEventListener("DOMContentLoaded", function() {
	
	let imgRefs = document.querySelectorAll( "div div img" );
	let nbr = imgRefs.length;
	let counter = 0;

	for( counter = 0; counter < nbr; counter++ ) {
		imgRefs.item( counter ).setAttribute( "class", "animation" );
	}
});