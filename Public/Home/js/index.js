$(function () {
	$('.app').hover(function () {
		$(this).css({
			background : '#fff',
			color : '#333',
		}).find('.list').show();
	}, function () {
		$(this).css({
			background : 'none',
			color : '#fff',
		}).find('.list').hide();
	});
})
