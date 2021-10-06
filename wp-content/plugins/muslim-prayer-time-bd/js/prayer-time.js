/*!
 * Muslim Prayer Time BD - v2.3 - 5th April, 2021
 * by @realwebcare - https://www.realwebcare.com/
 */
 function prayerOnChange(prayer_id, ptime, card, city) {
	"use strict";
	jQuery.ajax({
		type: 'POST',
		url: mptbajax.ajaxurl,
		data: {
			action: 'mptb_muslim_prayer_time',
			cityid: city,
			id: prayer_id,
			prtime: ptime,
			srcard: card
		},
		success:function(data, textStatus, XMLHttpRequest){
			var linkid = '#' + prayer_id;
			jQuery(linkid).fadeOut("slow");
			jQuery(linkid).html("");
			jQuery(linkid).append(data.substr(data.length-1, 1) === '0'? data.substr(0, data.length-1) : data).fadeIn("slow");
		},
		error: function(MLHttpRequest, textStatus, errorThrown){
			alert(errorThrown);
		}
	});
}