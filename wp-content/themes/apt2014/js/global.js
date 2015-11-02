jQuery(document).ready(function($) {
	
//Start Fixed Height Controls

	$( document ).ready(function() {
	$('.entry_meta').fixed_height({columns:3, itemName:'.biobox'});
	$('.entry_meta').fixed_height({columns:3, itemName:'.bioboxcompany'});
	$('.entry_meta').fixed_height({columns:3, itemName:'.bio'});
});


$.fn.fixed_height = function(options) {
	var defaults = {
		columns:3, itemName:'.item'
	}
	
	var settings = $.extend({}, defaults, options );
	var items = $(this).find(settings.itemName);
	var rowHeights = [10];
	var row = 0;

	//First, get the greatest height for each row
	items.each(function(index, element) {
		myHeight = $(element).height();
		if(myHeight >= rowHeights[row]){
			rowHeights[row] = myHeight;
		}
		//increment rowHeights index
		if(index%settings.columns >= (settings.columns-1)){
			row++;
			rowHeights.push(10);
		}
		console.log (index%settings.columns);
	});
	
	//Next, Set the values to each row item
	row=0;
	items.each(function(index, element) {
		//console.log(rowHeights[row]);
		$(element).height( rowHeights[row] );
		//increment rowHeights index
		if(index%settings.columns >= (settings.columns-1)){
			row++;
		}
	});
}

//End Fixed Height Controls
	
});