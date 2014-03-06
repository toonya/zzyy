<?php
add_action( 'admin_menu', 'add_setting' );

function add_setting() {
    add_menu_page( '设置', '设置', 'manage_options', 'add-setting', 'add_setting_page', '', 110 );
}
function add_setting_page() {
    //setting option
?>

<div id="add-setting" class="admin-page">
    <h1>设置</h1>

    <form action="options.php" method="post">
        <?php
    settings_fields('add-setting');
    do_settings_sections('add-setting');
    submit_button();
        ?>
    </form>
</div>

<?php }
function add_setting_func() {
    // Add the section to reading settings so we can add our
    // fields to it
    add_settings_section('add_setting',
                         '',
                         'add_setting_section',
                         'add-setting');

    // Add the field with the names and function to use for our new
    // settings, put it in our new section
    add_settings_field('51la',
                       '统计代码',
                       'add_setting_stats',
                       'add-setting',
                       'add_setting');
    add_settings_field('OSS_ACCESS_ID',
                       'OSS_ACCESS_ID',
                       'oss_access_id',
                       'add-setting',
                       'add_setting');
    add_settings_field('OSS_ACCESS_KEY',
                       'OSS_ACCESS_KEY',
                       'oss_access_key',
                       'add-setting',
                       'add_setting');
    add_settings_field('OSS_ACCESS_BUCKET',
                       'OSS_ACCESS_BUCKET',
                       'oss_access_bucket',
                       'add-setting',
                       'add_setting');
    add_settings_field('OSS_ACCESS_DOMAIN',
                       'OSS_ACCESS_DOMAIN',
                       'oss_access_domain',
                       'add-setting',
                       'add_setting');
    add_settings_field('footer_contact',
                       'footer_contact',
                       'footer_contact_info',
                       'add-setting',
                       'add_setting');
    add_settings_field('site-keywords',
                       'site_contact',
                       'site_contact_info',
                       'add-setting',
                       'add_setting');

    // Register our setting so that $_POST handling is done for us and
    // our callback function just has to echo the <input>
    register_setting('add-setting','51la');
    register_setting('add-setting','OSS_ACCESS_ID');
    register_setting('add-setting','OSS_ACCESS_KEY');
    register_setting('add-setting','OSS_ACCESS_BUCKET');
    register_setting('add-setting','OSS_ACCESS_DOMAIN');
    register_setting('add-setting','footer_contact');
    register_setting('add-setting','site_keywords');
}// eg_settings_api_init()

add_action('admin_init', 'add_setting_func');

function add_setting_section() {
}
function add_setting_stats() {
	echo '<a target="_blank" href="http://51.la">登录 51la 网站</a>测试账户huifuyou密码huifuyou';
	echo '<textarea name="51la" value="" class="form-control" rows="3">'.esc_attr(get_option('51la')).'</textarea>';
}
function oss_access_id() {
	echo '<input name="OSS_ACCESS_ID" type="text" class="form-control" value="'.esc_attr(get_option('OSS_ACCESS_ID')).'" />';
}
function oss_access_key() {
	echo '<input name="OSS_ACCESS_KEY" type="text" class="form-control" value="'.esc_attr(get_option('OSS_ACCESS_KEY')).'" />';
}
function oss_access_bucket() {
	echo '<input name="OSS_ACCESS_BUCKET" type="text" class="form-control" value="'.esc_attr(get_option('OSS_ACCESS_BUCKET')).'" />';
}
function oss_access_domain() {
	echo '<input name="OSS_ACCESS_DOMAIN" type="text" class="form-control" value="'.esc_attr(get_option('OSS_ACCESS_DOMAIN')).'" />';
}
function footer_contact_info() {
	echo '<textarea name="footer_contact" value="" class="form-control" rows="3">'.esc_attr(get_option('footer_contact')).'</textarea>';
}
function site_contact_info() {
	echo '<input name="site_keywords" type="text" class="form-control" value="'.esc_attr(get_option('site_keywords')).'" />';
}
?>