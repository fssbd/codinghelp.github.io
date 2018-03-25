$('.coutner').one('inview', function(event, visible) {
		if (visible == true) {
			$('.count').each(function() {
				$(this).prop('Counter', 0).animate({
					Counter: $(this).text()
				}, {
					duration: 15000,
					easing: 'swing',
					step: function(now) {
						$(this).text(Math.ceil(now));
					}
				});
			});
		}
	});

