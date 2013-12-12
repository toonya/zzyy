jQuery(function($){
    // ----------------------------------------
    // ! modify options on user page
    // ----------------------------------------

    //jQuery('#createuser').find('[for="url"]').closest('.form-field').hide();
    //jQuery('#your-profile').find('.form-table').first().hide();
    //jQuery('[name="admin_bar_front"]').attr('checked','checked');
    //jQuery('[for="url"]').closest('tr').hide();

    // ----------------------------------------
    // ! banner options
    // ----------------------------------------
    var banner_uploader;
    var banner_reciever;
    var banner_preview;

    jQuery('#banner-option').on('click.openMediaManager','.open-media',function(e){

        // Prevent the default action from occuring.
        e.preventDefault();

        // Get our Parent element
        banner_reciever = jQuery(this).closest('.control').siblings('.info').find('.imgurl');

        // preview
        banner_preview = jQuery(this).closest('.control').find('.preview');

        // If the frame already exists, re-open it.
        if ( banner_uploader ) {
            banner_uploader.open();
            return;
        }
        banner_uploader = wp.media.frames.banner_uploader = wp.media({

            //createe our media frame
            className: 'media-frame banner-media-frame',
            frame: 'select', //Allow Select Only
            multiple: false //Disallow Mulitple selections
        });

        // ----------------------------------------
        // ! when select
        // ----------------------------------------

        banner_uploader.on('select', function(){
            // Grab our attachment selection and construct a JSON representation of the model.
            var media_attachment = banner_uploader.state().get('selection').map( function( attachment ) {
                attachment = attachment.toJSON();
                return attachment;
            });
            // Send the attachment URL to our custom input field via jQuery.

            var imgurl = media_attachment[0].url;

            banner_reciever.val(imgurl);
            //console.log(banner_reciever);

            var $preview = jQuery('<img>').attr('src',imgurl).addClass('img-responsive');

            banner_preview.html($preview);

        });

        // Now that everything has been set, let's open up the frame.
        banner_uploader.open();

    })

	// ----------------------------------------
	// ! add new banner item
	// ----------------------------------------
	jQuery('#banner-option #addnew').on('click.addBannerItem','.add',function(e) {
        e.preventDefault();
        var _validation = validation(jQuery(this));
        if(!_validation)
        	return false;

        $newItem = jQuery(this).closest('#addnew').clone();
        $newItemNav = jQuery('<li>').append('<a href="#" data-toggle="tab"></a>');
        addNewInit();

		$newItem.removeClass('active');
		$newItem.find('.add').addClass('save').removeClass('add').parent().addClass('col-sm-3').removeClass('col-sm-6').after('<div class="col-sm-3"><button type="button" class="btn btn-warning btn-block delete">删除本新闻</button></div>');
        //console.log($newItem);
        //console.log($newItemNav);

        // insert
        jQuery('#banner-option .nav-tabs li').last().before($newItemNav);
        jQuery('#banner-option #addnew').before($newItem);

        reNumber();
	});

	// ----------------------------------------
	// ! init the addnew area
	// ----------------------------------------
	function addNewInit() {
		jQuery('#banner-option #addnew').find('input').val('').closest('#addnew').find('.preview').html('').closest('#addnew').find('url').val('');
	}

	// ----------------------------------------
	// ! save modify
	// ----------------------------------------
	jQuery('#banner-option').on('click.saveBannerList','.save',function(e) {
		e.preventDefault();
		var _validation = validation(jQuery(this));
        if(!_validation)
        	return false;

		save_banner_option();
	})

	// ----------------------------------------
	// ! delete banner item
	// ----------------------------------------
	jQuery('#banner-option .tab-content').on('click.deleteBannerItem','.delete',function(e) {
        e.preventDefault();

		var _this = jQuery(this).closest('.tab-pane');
		var _num  = _this.attr('id')-1;
		jQuery('#banner-option .nav-tabs li').eq(_num).remove();
		_this.remove();

		reNumber();
		jQuery('[href="#addnew"]').click();
    });

    // ----------------------------------------
    // ! rebuild number
    // ----------------------------------------
    function reNumber() {
	    jQuery('#banner-option .nav-tabs li:not(:last)').each(function(i,e) {
	    	var number = i+1;
		    jQuery(e).find('a').attr('href','#'+number).text(number);
	    });
	    jQuery('#banner-option .tab-content .tab-pane:not(:last)').each(function(i,e) {
	    	var number = i+1;
		    jQuery(e).attr('id',number);
	    });

	    save_banner_option();
    }

    // ----------------------------------------
    // ! draggable nav-tabs
    // ----------------------------------------
    $( ".nav-tabs" ).sortable({axis:"x",stop: function( event, ui ) {
	    banner_sort();
    }});

    // ----------------------------------------
    // ! resort the list
    // ----------------------------------------
    function banner_sort(){

		var $before   = jQuery('#banner-option .nav-tabs li a:not([href="#addnew"])');
		var args      = [];

		$before.each(function(i,e){   // collect item value that we want to sort on.
			args[i] = $(e).text()-1;
		});
		//console.log(args);

		var $new = [];
		$.each(args,function(i,e) {
			$new[i] = $('.tab-pane').eq(e).clone().attr('id',e);
		});

		jQuery('.tab-content .tab-pane:not(:last)').remove();

		$.each($new,function(i,e) {
			$('.tab-content #addnew').before(e);
		})

		var $addNew = jQuery('#banner-option .nav-tabs li a[href="#addnew"]').closest('li').detach();
		jQuery('#banner-option .nav-tabs').append($addNew);

		reNumber();
	}

	// ----------------------------------------
	// ! save banner option
	// ----------------------------------------
	function save_banner_option() {
		var status_container = jQuery('#banner-option h1').first();
		status_container.attr('data-origin-title',status_container.text()).text('正在处理...');

		var banner_data = banner_option;
		banner_data.bannerlist = [];

		//get every banner info.
		jQuery('.tab-pane:not(:last)').each(function(i,e) {
			var banner_item = {} ;

			banner_item.title = jQuery(e).find('input.title').val();
			banner_item.url   = jQuery(e).find('input.url').val();
			banner_item.imgurl   = jQuery(e).find('input.imgurl').val();

			banner_data.bannerlist[i] = banner_item;
		});

		//post to server.
		jQuery.post(banner_data.url, banner_data, function(response) {})
			.done(function(){
				status_container.text('保存成功！');
				setTimeout(function(){jQuery('#banner-option h1').first().text(jQuery('#banner-option h1').first().data('origin-title'))},1000);
				})
			.fail(function(){
				status_container.text('请重新保存！');
				setTimeout(function(){jQuery('#banner-option h1').first().text(jQuery('#banner-option h1').first().data('origin-title'))},1000);
			});
	}

	// ----------------------------------------
	// ! banner imgurl input focusout
	// ----------------------------------------
	jQuery('#banner-option').on('focusout.changeImgUrl','input.imgurl', freshPreview);

	// ----------------------------------------
	// ! change preview img
	// ----------------------------------------
	function freshPreview() {
		var num = jQuery(this).closest('.tab-pane').index('.tab-pane');
		var $target = jQuery('#banner-option .tab-pane').eq(num);
		var imgUrl = $target.find('input.imgurl').val();
		$target.find('.preview').children('img').attr('src',imgUrl);
		if(!imgUrl)
			$target.find('.preview').children('img').attr('src','#');
	}

	// ----------------------------------------
	// ! keydown event
	// ----------------------------------------
	jQuery('#banner-option').on('keydown.inputDone', 'input.imgurl' ,inputDone);

	function inputDone(e){
		charCode = e.charCode || e.keyCode;

		if(charCode  == 13){
			jQuery(this).focusout();
		}
	}

	// ----------------------------------------
	// ! input validate
	// ----------------------------------------
	function validation(_this) {
		var _validation = true;

		_this.closest('.tab-pane').find('.need').each(function(i,e){
			if(!jQuery(e).val()) {
			console.log(i);
				_validation = false;
				jQuery(e).addClass('inputError');
			}
		});
		return _validation;
	}

	// ----------------------------------------
	// ! inputError focus
	// ----------------------------------------
	jQuery('#banner-option').on('focusin.removeError','.inputError',function(){
		jQuery(this).removeClass('inputError');
	});

	// ----------------------------------------
	// ! open-close edit area.
	// ----------------------------------------

	jQuery('.funtions').on('click.editOpen','.edit-close',function(e){
		jQuery(this).addClass('edit-open').removeClass('edit-close').text('完成');
		jQuery('.showcase .item:not(.template) .edit-area').removeClass('hidden');
	});
	jQuery('.funtions').on('click.editClose','.edit-open',function(e){
		jQuery(this).addClass('edit-close').removeClass('edit-open').text('编辑');
		jQuery('.showcase .item:not(.template) .edit-area').addClass('hidden');
	});

	/*
	 * make delete function
	 */

	jQuery('.showcase').on('click.deleteItem','.close',function(e){
		jQuery(this).closest('.item').remove();
		fresh_showcase();
	})

	/*
	 * fresh showcase item, make the name value strong.
	 */

	function fresh_showcase(){
		jQuery('.showcase .item:not(.template) input').each(function(i,e){
			new_name = jQuery(e).attr('id')+'['+i+']';
			jQuery(e).attr('name',new_name);
		})
	}


	/*
	 * two variable we need here.
	 */


	var showcase_uploader;
	var showcase_reciever;

	// Bind to our click event in order to open up the new media experience.
	$('#showcase .funtions .new').on('click.imgOpenMediaManager' ,function(e){ //ty-open-media is the class of our form button

		/*
		 * check whether the wp media manager is exist.
		 */


		if ( showcase_uploader ) {
			showcase_uploader.open();
			return;
		}

		/*
		* if not. init the wp media manager
		*/


		showcase_uploader = wp.media.frames.showcase_uploader = wp.media({

		 //createe our media frame

		 	multiple: true, //Disallow Mulitple selections

		});


		showcase_uploader.on('select', function(){
		// Grab our attachment selection and construct a JSON representation of the model.
			var media_attachment = showcase_uploader.state().get('selection').map( function( attachment ) {
											  attachment = attachment.toJSON();
											  return attachment;
											  });

		//the current quantity of item
		count  = jQuery('#showcase .item').not('.template').size();


		/*
		 * handle the data.
		 */


		$.each(media_attachment,function(i,$img){

			$img = $img.url;

			reg = /\.[a-zA-Z]*\b/g;

			/*
			 * match items to array
			 */

			match_list = $img.match(reg);

			/*
			 * get the laset match item
			 */


			the_last   = match_list[match_list.length-1];
			the_value  = '-150x150'+the_last;

			// final item.
			$img = $img.replace(the_last, the_value);

			/*
			 * make the name value
			 */

			/*
			 * the media info. reciever
			 */

			showcase_reciever = jQuery('#showcase .template').clone();

			// because the count is begin from 1, and the [] from 0, so doesn't need to add 1.
			name   = showcase_reciever.find('input').attr('id')+'['+count+']';

			/*
			 * make the new item
			 */

			showcase_reciever.removeClass('hidden').removeClass('template')
			.find('input').val($img).attr('name',name)
			.parent().find('img').attr('src',$img);

			jQuery('.showcase').append(showcase_reciever);

			count = count+1;

		})


		});


		/*
		 * first time open.
		 */


		showcase_uploader.open();
	});
})


