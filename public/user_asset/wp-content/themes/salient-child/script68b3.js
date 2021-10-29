console.log('scripts work');
(function($) {
$(document).ready(function(){

    console.log('jQuery works too');


    function forceMenuOpen() {
        var menuItem = '#menu-item-165'

        if (!jQuery(menuItem).hasClass('sfHover')) {
            console.log('no image');
            jQuery(menuItem).addClass('sfHover');
        }
    }
    forceMenuOpen();


    //Adds a custom class for columns that have a url	
	jQuery('.column-link').parent('.col').addClass('js_col-has-link');

});
})(jQuery);

// ---------------
// Support Tables
// ---------------
var checkmarks = document.querySelectorAll('.dalt-table > tbody > tr > td:not(:first-child)');
checkmarks.forEach(function(x) {
	//console.log(x);
	var str = x.innerHTML;
	var newStr = str.replace(/X/g, '<span class="bullet">&bull;</span>');
	x.innerHTML = newStr;
// 	console.log(x.innerHTML);
});