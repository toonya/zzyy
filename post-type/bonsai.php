<?php
	function bonsai_post_type() {
	$default = array(
		'name' => '盆景',
		'slug' => 'bonsai'
	);

  $labels = array(
    'name' => $default['name'],
    'singular_name' => $default['name'],
    'add_new' => '添加新'.$default['name'],
    'add_new_item' => '添加新'.$default['name'],
    'edit_item' => '编辑'.$default['name'].'信息',
    'new_item' => '添加新'.$default['name'],
    'all_items' => '全部'.$default['name'],
    'view_item' => '浏览该'.$default['name'],
    'search_items' => '查找'.$default['name'],
    'not_found' =>  '没有发现',
    'not_found_in_trash' => '垃圾箱中没有',
    'parent_item_colon' => '',
    'menu_name' => $default['name']
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
	//Provide a callback function that will be called when setting up the meta boxes for the edit form. Do remove_meta_box() and add_meta_box() calls in the callback.
	  'register_meta_box_cb' => 'bonsai_showcase',
	//'with_front' => bool Should the permastruct be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/). Defaults to true
    'rewrite' => array( 'slug' => $default['slug'] ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title','thumbnail' )
  );

  register_post_type( $default['slug'], $args );
}
if(!post_type_exists('bonsai'))
	add_action( 'init', 'bonsai_post_type' );


function gree_tree_bulder() {
  $default = array(
		'name' => '景观树类',
		'slug' => 'greentree'
	);

  $labels = array(
    'name' => $default['name'],
    'singular_name' => $default['name'],
    'add_new' => '添加新'.$default['name'],
    'add_new_item' => '添加新'.$default['name'],
    'edit_item' => '编辑'.$default['name'].'信息',
    'new_item' => '添加新'.$default['name'],
    'all_items' => '全部'.$default['name'],
    'view_item' => '浏览该'.$default['name'],
    'search_items' => '查找'.$default['name'],
    'not_found' =>  '没有发现',
    'not_found_in_trash' => '垃圾箱中没有',
    'parent_item_colon' => '',
    'menu_name' => $default['name']
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
	//Provide a callback function that will be called when setting up the meta boxes for the edit form. Do remove_meta_box() and add_meta_box() calls in the callback.
	  'register_meta_box_cb' => 'greentree_showcase',
	//'with_front' => bool Should the permastruct be prepended with the front base. (example: if your permalink structure is /blog/, then your links will be: false->/news/, true->/blog/news/). Defaults to true
    'rewrite' => array( 'slug' => $default['slug'] ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title','thumbnail' ),
    'taxonomies' => array('绿化树类')
  );

  register_post_type( $default['slug'], $args );
}
if(!post_type_exists('greentree'))
	add_action( 'init', 'gree_tree_bulder' );


function bonsai_showcase() {
	add_meta_box(
			'showcase'
			,'相片集'
			,'render_showcase'
			,'bonsai'
			,'normal'
			,'core'
		);
}
function greentree_showcase() {
	add_meta_box(
			'showcase'
			,'相片集'
			,'render_showcase'
			,'greentree'
			,'normal'
			,'core'
		);
}
function render_showcase($post) {

	wp_nonce_field( 'custom_showcase', 'custom_showcase_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $value = get_post_meta( $post->ID, 'showcase', true );
	?>
	<div class="row">
		<div class="funtions col-xs-11">
			<div class="btn-group btn-group-justified">
				<a href="#" class="btn btn-default disable new">新增</a>
				<a href="#" class="btn btn-default disable edit-close">编辑</a>
			</div>
			<div class="hidden item template">
				  <input type="hidden" id="showcase" name="" value="" />
				  <div class="edit-area hidden">
					  <button type="button" class="close">×</button>
				  </div>
					<img src="" alt="" />
			</div>

			<div class="showcase"><!--
				<?php if($value): foreach($value as $key=>$url){ ?>
					--><div class="item">
						  <input type="hidden" id="showcase" name="showcase[<?php echo $key; ?>]" value="<?php echo esc_attr($url); ?>" />
						  <div class="edit-area hidden">
							  <button type="button" class="close">×</button>
						  </div>
							<img src="<?php echo esc_attr($url); ?>" alt="" />
					</div><!--
				<?php } endif;?>
			--></div>
		</div>
		<div class="clear"></div>
	</div>
	<?php
}

function myplugin_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['custom_showcase_nonce'] ) )
    return $post_id;

  $nonce = $_POST['custom_showcase_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'custom_showcase' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return $post_id;

  // Check the user's permissions.
  if ( 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;

  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  if( !empty($_POST['showcase']) ) {
	  $mydata =  $_POST['showcase'] ;

	  // Update the meta field in the database.
	  update_post_meta( $post_id, 'showcase', $mydata );
  }
}
add_action( 'save_post', 'myplugin_save_postdata' );




function call_wp_media_scripts_api($post_type){

	/*
	 * call scripts api for wp_media
	 */

	if($post_type=='bonsai'||$post_type=='greentree'){
		wp_enqueue_media();
	}
}
add_action( 'admin_enqueue_scripts', 'call_wp_media_scripts_api',10,1 );