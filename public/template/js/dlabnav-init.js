(function($) {

	var dlabSettingsOptions = {
		typography: "roboto",
        version: "light",
        layout: "Vertical",
        headerBg: "color_1",
        navheaderBg: "color_11",
        sidebarBg: "color_1",
        sidebarStyle: "full",
        sidebarPosition: "fixed",
        headerPosition: "fixed",
        containerLayout: "full",
		direction: 'rtl',
	};
	
	jQuery(document).ready(function(){
		new dlabSettings(dlabSettingsOptions); 
	});
		
	jQuery(window).on('resize',function(){
		new dlabSettings(dlabSettingsOptions);
	});
	
})(jQuery);

(function($) {
	"use strict"

	new dlabSettings({
		direction: "rtl"
	});
	
})(jQuery);