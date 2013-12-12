<?php
// ----------------------------------------
// ! add a admin page to edit the banner
//   slide images
// ----------------------------------------

add_action( 'admin_menu', 'home_images' );

function home_images() {
    add_menu_page( '首页图片', '首页图片', 'manage_options', 'homeImageOptions', 'homeImagesPageBuilder', '', 11 );
}
function homeImagesPageBuilder() {
    $banner_list = get_option('bannerlist');
	$add_new_focus = false;
	if(!$banner_list)
		$add_new_focus = true;
?>

<div id="banner-option">
    <h1>首页图片管理</h1>
    <p class="text-info banner-img">注意，首页幻灯片图片长宽必须为1680px*550px。</p>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
    <?php if($banner_list) {
        foreach($banner_list as $key=>$item) {
            $num = $key+1;
            if($num==1)
            	echo '<li class="active"><a href="#'.$num.'" data-toggle="tab">'.$num.'</a></li>';
            else
         		echo '<li><a href="#'.$num.'" data-toggle="tab">'.$num.'</a></li>';
        }
    }
?>
        <li <?php if($add_new_focus) echo'class="active"';?>><a href="#addnew" data-toggle="tab">+</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content container tab-container">
    <?php if($banner_list) {
        foreach($banner_list as $key=>$item) {
            $num = $key+1;
            $img = $item['imgurl'];
            $url = $item['url'];
            $title = $item['title'];
            ?>

        <div class="tab-pane <?php if($num==1) echo 'active'; ?>" id="<?php echo $num; ?>">
            <div class="col-sm-11">
                <!-- input area for store data -->
                <div class="info">
                    <input type="text" value="<?php echo $title; ?>" class="form-control title need" placeholder="输入标题" />
                    <input type="text" value="<?php echo $url; ?>" class="form-control url" placeholder="输入超链接" />
                    <input type="text" value="<?php echo $img; ?>" class="form-control imgurl need" placeholder="输入图片地址，或点击下面的按钮从图片库中选择" />
                </div>
                <!-- control area -->
                <div class="row control">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary btn-danger btn-block open-media">选择图片</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-primary btn-block save">保存</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-warning btn-block delete">删除本新闻</button>
                    </div>
                    <div class="preview col-sm-9">
	                    <img class="img-responsive" src="<?php echo $img; ?>" alt="<?php echo $title; ?>" />
                    </div>
                </div>
            </div>
        </div>

            <?php
        }
    }
    ?>
        <div class="tab-pane <?php if($add_new_focus) echo 'active' ?>" id="addnew">
            <div class="col-sm-11">
                <!-- input area for store data -->
                <div class="info">
                    <input type="text" class="form-control title need" placeholder="输入标题" />
                    <input type="text" class="form-control url" placeholder="输入超链接" />
                    <input type="text" class="form-control imgurl need"  placeholder="输入图片地址，或点击下面的按钮从图片库中选择" />
                </div>
                <!-- control area -->
                <div class="row control">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary btn-danger btn-block open-media">选择图片</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary btn-block add">保存新闻</button>
                    </div>
                    <div class="preview col-sm-9">
	                    <img src="" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }


// ----------------------------------------
// ! load some info for js.file
// ----------------------------------------
function loadBannerAjax() {
    $banner_option_ajax_nonce = wp_create_nonce("banner-option-nonce");
    wp_localize_script( 'admin-javascript', 'banner_option',
                       array( 'url' => admin_url( 'admin-ajax.php' ), 'action'=>'save_banner_option' , 'security'=>$banner_option_ajax_nonce ));
}

add_action( 'admin_enqueue_scripts', 'loadBannerAjax' );

// ----------------------------------------
// ! save banner option
// ----------------------------------------
function save_banner_option() {
    //check nonce
    check_ajax_referer( 'banner-option-nonce', 'security' );

    $results = '';

    $banner_list = $_POST['bannerlist'];
    update_option( 'bannerlist', $banner_list );
    $bannerlistval =  get_option('bannerlist') ;


    if ( $bannerlistval )
    {
        $results = $bannerlistval ;
    }
    else {
        $results = false ;
    }
    // Return the String
    wp_send_json($results);
}
add_action('wp_ajax_nopriv_save_banner_option', 'save_banner_option');
add_action('wp_ajax_save_banner_option', 'save_banner_option');

?>