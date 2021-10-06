/*!
 * Muslim Prayer Time BD - v2.3 - 5th April, 2021
 * by @realwebcare - https://www.realwebcare.com/
 */
 jQuery(document).ready(function() {
	"use strict";
	jQuery("#mptb_option").click(function() {
		if(jQuery("#mptb_option").is(":checked")){
			jQuery("#sehri_enable").slideDown("slow");
		} else {
			jQuery("#sehri_enable").slideUp("slow");
		}
	});
	if(jQuery("#mptb_option").is(":checked")){
		jQuery("#sehri_enable").css("display","block");
	} else {
		jQuery("#sehri_enable").slideUp("slow");
	}
	jQuery('.district_bg_color').wpColorPicker();
	jQuery('.district_font_color').wpColorPicker();
	jQuery('.prayer_name_bg').wpColorPicker();
	jQuery('.prayer_time_bg').wpColorPicker();
	jQuery('.sehri_time_bg').wpColorPicker();
	jQuery('.iftar_time_bg').wpColorPicker();
	jQuery('.sehri_time_font').wpColorPicker();
	jQuery('.prayer_name_font').wpColorPicker();
	jQuery('.prayer_time_font').wpColorPicker();
	jQuery("#clear_all").click(function() {
		var answer = confirm ("Are you sure you want to reset everything?");
		if (answer === true) {
			alert('Prayer timetable has successfully reset!');
			window.location.reload();
		}
	});
});