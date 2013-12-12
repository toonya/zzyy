jQuery(function($){
	$('.current-menu-item').addClass('active');


	var $container = $('.bonsai .item-wrapper');

	// initialize
	$container.css('padding',0).masonry({
	  itemSelector: '.item'
	});

	$('.bonsai').on('click','.item img',function(e){
		var full_image    = $(this).attr('data-full-src');
		var $caption      = $(this).closest('.item').find('.caption');
		var title         = $caption.find('h4').text();
		//var desc          = $caption.find('.desc').html();
		var $img          = $('<img>').attr('src',full_image).addClass('img-responsive');
		var $model        = $('#fullImage');

		/*
		 * showcase
		 */
		re = ' ';
		showcase_data = $(this).attr('data-showcase');
		showcase_thumbnails = showcase_data.split(re);
		showcase_full = showcase_thumbnails;

		/*
		 * remove 150x150
		 */

		$.each(showcase_full,function(i,v){
			reg = '-150x150';

			// final item.
			showcase_full[i] = v.replace(reg,'');
		});

		$model.find('.modal-title').text(title);
		$model.find('.modal-body').html($img);

		$.each(showcase_full,function(i,v){
			var $img = $('<img>').attr('src',v).addClass('img-responsive');
			$model.find('.modal-body').append($img);
		})

		$('.modal-body').scrollTop(0);
		//$model.find('.modal-footer').html(desc);
	});


	/*
	 * Before close the model window, clear the scroll value.
	 */

	$('.modal').on('hide.bs.modal', function () {
		$(this).find('.modal-body').scrollTop(0);
	})

	// ----------------------------------------
	// ! run tab-nav
	// ----------------------------------------

    $('#myTab a:last').tab('show');

    // ----------------------------------------
    // ! affix
    // ----------------------------------------
    $('#bonsai-tab').affix({
    offset: {
      top: function () {
        return (this.top = $('#banner').outerHeight(true)+$('header').outerHeight(true))
      }
    }
  })

})