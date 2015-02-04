jQuery(document).on("click", ".rating-combo .rating-toggle",
function(e) {
	e.preventDefault();
	if (jQuery(this).parent().hasClass('combo-open'))
	 {
		jQuery(this).parent().removeClass('combo-open')
		 jQuery(this).next().hide();
	}
	 else
	 {
		jQuery(this).parent().addClass('combo-open')
		 jQuery(this).next().show();
	}
	return false;
});
jQuery(document).on("click", ".rating-combo ul li a",
function() {
	var score = jQuery(this).data("rating");
	var id = jQuery(this).parent().parent().parent().data("post-id");
	var rateHolder = jQuery(this).parent().parent().parent().parent();
	var history = rateHolder.html();
	var ajax_data = {
		action: "bigfa_rate",
		um_id: id,
		um_score: score
	};
	jQuery(rateHolder).html('loading..');
	jQuery.ajax({
			url: fancyratings_ajax_url,
			type: "POST",
			data: ajax_data,
			dataType: "json",
			success: function(data) {
				if (data.status == 200) {

					var item = new Object();
					item = data.data;
						jQuery(rateHolder).html('<div class="post-rate"><span class="rating-stars" title="评分 ' + item.average + ', 满分 5 星" style="width:' + item.percent + '%"></span></div><div class="piao">' + item.raters + ' 票</div>');
					
					
				} else {
					jQuery(rateHolder).html(history);
					console.log(data.status);
				}
			}
		});

	return false;
});