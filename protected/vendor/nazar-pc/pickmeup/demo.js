$(function () {
    var plus_1_days	= new Date;
	plus_1_days.addDays(1);
    $("#visit_period").pickmeup({
        mode : 'range',
        date : [
			new Date,
			plus_1_days
		],
        calendars : 2,
        position: "left",
        format: "Y-m-d",
        view: 	"months"
    });
});

    /*
jQuery(function ($) {
    jQuery('body').on('click', '#yt0', function () {
        jQuery.ajax({
            'url': '/index.php?r=trip/whattimeisit',
            'cache': false,
            'success': function (html) {
                jQuery("#req_time").html(html)
            }});
        return false;
    });

    jQuery('body').on('change', '#region_id', function () {
        jQuery.ajax({
            'type': 'POST',
            'url': '/index.php?r=trip/equipageisavailable',
            'data': {'region_id': this.value},
            'cache': false,
            'success': function (html) {
                jQuery("#city_name").html(html)
            }});
        return false;
    });
});
*/