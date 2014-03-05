jQuery(function($){
	$('.current-menu-item').addClass('active');
	$('.single .item img').each(function(i,e){
		var imgSrc = $(this).attr('src');
		var reg = '-150x150';
		imgSrc = imgSrc.replace(reg,'');

		$(this).attr('src',imgSrc);
	});
})