function terClearMe(formfield){ if(formfield.defaultValue==formfield.value) formfield.value = ''; }
function terSelectAll(id){ document.getElementById(id).focus(); document.getElementById(id).select(); }

//Add function call to footer.php or individual sidebar templates
function terSidebarResize(){
	if(jQuery(window).width() > 768) jQuery('#secondary').css('min-height', jQuery('#primary').outerHeight(true) + 'px');
	jQuery(window).resize(function(){
		if(jQuery(window).width() < 768){
			jQuery('#secondary').css('min-height','0');
			return;
		} 
		var terWindowHeight = jQuery('#primary').outerHeight(true);
		jQuery('#secondary').css('min-height', terWindowHeight + 'px');
	});
}
function terSetCookie(c_name,value,exdays){
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toUTCString());
	document.cookie = c_name + "=" + c_value + ';path=/';
}
function terViewport(){ return jQuery(window).width() + ',' + jQuery(window).height(); }
/* Slide Nav Animation >~~~~~~~~> */
terNavAnimateOpen = false;
function terNavAnimate(element,location){
	if(!terNavAnimateOpen){jQuery(element).animate({width:'80%'},600); jQuery('#page').animate({marginLeft:'80%',width:'100%'},600); terNavAnimateOpen = 1; terScrollFooterNav(location);}
	else{jQuery('.slide-collapse').animate({width:0},600); jQuery('#page').animate({marginLeft:'0',width:'inherit'},600); terNavAnimateOpen = false; }
}
function terScrollFooterNav(location){ if(location == 'footer') jQuery('html,body').animate({scrollTop:0},500); }
/* <~~~~~~~~< Slide Nav Animation */