<?php
/**
 * Plugin Name:       Address Autocomplete using NextGenAPI
 * Plugin URI:        https://nextgenapi.com/autocomplete
 * Description:       This plugin will help you to add autocomplete any German Address using NextGenAPI
 * Version:           1.0
 * Author:            NextGenAPI
 * Author URI:        https://nextgenapi.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ga-auto
 * Domain Path:       /languages
 */

/*

*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Don\'t make me mad';
	exit;
}
include('admin_settings.php');
define( 'AUTOCOMPLET_VERSION', '1.0.0' );
define( 'AUTOCOMPLET__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'AUTOCOMPLET__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Scripts are including
add_action( 'wp_enqueue_scripts', 'autocomplete_nextgenapi_enqueue_scripts' );
function autocomplete_nextgenapi_enqueue_scripts() {
	// Load the required JavaScript and CSS files
	wp_enqueue_style('autocomplete-css','css/autocomplete.css','','',true);
	wp_enqueue_script('autocomplete',AUTOCOMPLET__PLUGIN_URL.'js/autocomplete.js',array('jquery'),'',true);
	wp_enqueue_script('autocomplete-custom',AUTOCOMPLET__PLUGIN_URL.'js/custom.js',array('autocomplete'),'',true);
	
}

// Putting on wp head
add_action('wp_head','autocomplete_set_nextgenapi_autocomplete');
function autocomplete_set_nextgenapi_autocomplete(){

	$search_fields = array();
	$gaaf_names = get_option('gaaf_field_name');

	$url = myprefix_get_option( 'url' );
	$street_field_id = myprefix_get_option( 'street_field_id' );
	$plz_field_id = myprefix_get_option( 'plz_field_id' );
	$city_field_id = myprefix_get_option( 'city_field_id' );
	$country_ifield_d = myprefix_get_option( 'country_field_id' );

	
?>

<script>
	var url = '<?php echo $url ?>';
	var street_field_id = '<?php echo $street_field_id ?>';
	var plz_field_id = '<?php echo  $plz_field_id ?>';
	var city_field_id = '<?php echo  $city_field_id ?>';
	var country_field_id = '<?php echo  $country_field_id ?>';
	</script>
	
<?php }