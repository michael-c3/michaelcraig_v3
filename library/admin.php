<?php
	

//custom admin login 
function custom_login_css() {
	
	wp_enqueue_style('login_styles', get_template_directory_uri() .'/css/style-login.css');
}

function my_login_logo_url() {
	return get_bloginfo( 'url' );
}

function my_login_logo_url_title() {
	return 'ThreeModern Creative';
}

//Custom admin greeting
function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);

    return $translated;
}	
	
function b3m_add_dashboard_widgets() {
  wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'b3m_theme_info');
}
add_action('wp_dashboard_setup', 'b3m_add_dashboard_widgets' );

	
function b3m_theme_info() {
  echo "<ul>
  <li><strong>Developed By:</strong> ThreeModern Creative</li>
  <li><strong>Website:</strong> <a href='http://www.threemodern.com'>www.threemodern.com</a></li>
  <li><strong>Contact:</strong> <a href='mailto:support@threemodern.com'>support@threemodern.com</a></li>
  </ul>";
}

function remove_footer_admin () {
    echo "Customized by <a href='http://www.threemodern.com'>Michael Craig</a>";
} 

add_action('login_head','custom_login_css');//Custom login Styles

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

add_filter( 'login_headertitle', 'my_login_logo_url_title' );
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter('admin_footer_text', 'remove_footer_admin');
add_filter('gettext', 'change_howdy', 10, 3);
?>