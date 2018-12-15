function terxClearMe(formfield){ if(formfield.defaultValue==formfield.value) formfield.value = ''; }
function terxSelectAll(id){ document.getElementById(id).focus(); document.getElementById(id).select(); }

//Add function call to footer.php or individual sidebar templates
function terxSidebarResize(){
	if(jQuery(window).width() > 768) jQuery('#secondary').css('min-height', jQuery('#primary').outerHeight(true) + 'px');
	jQuery(window).resize(function(){
		if(jQuery(window).width() < 768){
			jQuery('#secondary').css('min-height','0');
			return;
		} 
		var terxWindowHeight = jQuery('#primary').outerHeight(true);
		jQuery('#secondary').css('min-height', terxWindowHeight + 'px');
	});
}
function terxSetCookie(c_name,value,exdays){
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toUTCString());
	document.cookie = c_name + "=" + c_value + ';path=/';
}
function terxViewport(){ return jQuery(window).width() + ',' + jQuery(window).height(); }
/* Slide Nav Animation >~~~~~~~~> */
terxNavAnimateOpen = false;
function terxNavAnimate(element,location){
	if(!terxNavAnimateOpen){jQuery(element).animate({width:'80%'},600); jQuery('#page').animate({marginLeft:'80%',width:'100%'},600); terxNavAnimateOpen = 1; terxScrollFooterNav(location);}
	else{jQuery('.slide-collapse').animate({width:0},600); jQuery('#page').animate({marginLeft:'0',width:'inherit'},600); terxNavAnimateOpen = false; }
}
function terxScrollFooterNav(location){ if(location == 'footer') jQuery('html,body').animate({scrollTop:0},500); }
/* <~~~~~~~~< Slide Nav Animation */