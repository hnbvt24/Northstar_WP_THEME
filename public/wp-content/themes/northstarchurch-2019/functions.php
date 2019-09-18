<?php

function northstar_files() {
	wp_enqueue_script('jquery-v3_4_1',get_theme_file_uri('/js/jquery-v3_4_1.js'),NULL, '1.0', true);
	wp_enqueue_script('slow-scroll-js',get_theme_file_uri('/js/slow-scroll.js'), NULL, '1.0', true);
	wp_enqueue_script('link-disabled-js',get_theme_file_uri('/js/link-disabled.js'), NULL, '1.0', true);
	wp_enqueue_script('hamburger-js',get_theme_file_uri('/js/hamburger-menu.js'), NULL, '1.0', true);
	wp_enqueue_script('audio-player.js', get_theme_file_uri('/js/audio-player.js'),NULL, '1.0', true);
	wp_enqueue_style('google_font','https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
	wp_enqueue_style('northstar_main_styles',get_stylesheet_uri());
	wp_enqueue_style('hamburger_menu', get_template_directory_uri() . '/css/hamburgers.css', true, '1.0', 'all');
} 

add_action('wp_enqueue_scripts','northstar_files');

function northstar_features() {
	register_nav_menu('primary','Primary Menu');
	register_nav_menu('footer','Footer Menu');
	add_theme_support('title-tag');
}

add_action('after_setup_theme','northstar_features');

/* For Blog Post Images */
add_theme_support( 'post-thumbnails' );

/**
 * Remove the href from empty links `<a href="#">` in the nav menus
 * @param string $menu the current menu HTML
 * @return string the modified menu HTML
 */
function wpse_remove_empty_links( $menu ) {
    return str_replace( '<a href="#">', '<a>', $menu );
}

add_filter( 'wp_nav_menu_items', 'wpse_remove_empty_links' );

add_filter('acf/settings/remove_wp_meta_box', '__return_false');

function northstar_adjust_queries( $query ) {
	$today = date('Ymd');
	if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
		$query->set('meta_key', 'event_date');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'ASC');
		$query->set('meta_query', array(
                        array(
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today,
                            'type' => 'numeric'
                        )
                    ));
	}
	
}

add_action('pre_get_posts', 'northstar_adjust_queries');

/**
* Add fields to General Settings page
*
* @reference
*/

$nf_top_desc = new General_Settings_Field('top_description', 'top description');
$nf_bottom_desc = new General_Settings_Field('bottom_description', 'bottom description');
$nf_excerpt = new General_Settings_Field('excerpt_description', 'excerpt description');


$nf_top_desc->init();
$nf_bottom_desc->init();
$nf_excerpt->init();

class General_Settings_Field {

protected $name;
protected $value;

public function __construct($name, $value = null)
{
$this->setName($name);

if ($value == null)
$this->setValue( $name );
else
$this->setValue( $value );
}

public function setName($name) {
$this->name = $name;
}

public function setValue($value) {
$this->value = $value;
}

public function getName() {
return $this->name;
}

public function getValue() {
return $this->value;
}

public function init() {
add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
}

public function register_fields()
{
register_setting( 'general', $this->getName(), 'esc_attr' );
add_settings_field( $this->getName(), '<label for="'.$this->getName().'">' . __( ucfirst($this->getValue() ) , $this->getName() ).'</label>' , array(&$this, 'fields_html') , 'general' );
}

public function fields_html()
{
	$val = get_option( $this->getName(), '' );
echo '<input type="text" '. $this->getName() .'" id="'.$this->getName().'" name="'.$this->getName().'" value="' . $val . '" />';
}

}

/**
* Function so we can get info from our WP Settings page (bloginfo) via a shortcode – e.g., [bloginfo key=”fav_color”]
*/

function handle_shortcode_bloginfo($field)
{
return get_option($field['key']);
}
add_shortcode( 'bloginfo', 'handle_shortcode_bloginfo' );

?>