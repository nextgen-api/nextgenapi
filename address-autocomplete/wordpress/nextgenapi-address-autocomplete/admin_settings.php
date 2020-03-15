<?php
//including meta box
include('cmb2/init.php');


add_action( 'cmb2_admin_init', 'nextgenapi_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function nextgenapi_register_theme_options_metabox() {
	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'           => 'nextgenapi_option_metabox',
		'title'        => esc_html__( 'Address Autocomplete', 'nextgenapi' ),
		'object_types' => array( 'options-page' ),
		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */
		'option_key'      => 'autocomplete', // The option key and admin menu page slug.
		 'icon_url'        => 'dashicons-location-alt', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'nextgenapi' ), // Falls back to 'title' (above).
		// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
		'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'nextgenapi' ), // The text for the options-page save button. Defaults to 'Save'.
		'cmb_styles' => false,
	) );
	/*
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */

	$cmb_options->add_field( array(
		'name' => 'NextGenAPI Address Autocomplete',
		'desc' => 'This plugin autocompletes any German Address using NextGenAPI. You can autocomplete Street Name, Postal Code or City. The plugin makes a REST call against NextGenAPI. <br />
		<ul>
		<li>If no addresses are returned, queried address did not match any address. </li>
		<li>If one address is returned, the queried address matched exactly. </li>
		<li>If there are more addresses matching, a maximum of 5 addresses would be returned. </li>
		</ul>
		It is not required to fill all IDs. If any field ID is not filled, a default value of the filed is used to query the address. Default values for Street, Postal Code is *, default value for Country is DE. <br><br>
		Check https://nextgenapi.com for more information.',
		'type' => 'title',
		'id'   => 'wiki_test_title'
	) );


	// Street Field

	$cmb_options->add_field( array(
		'name' => __( 'Street Field', 'nextgenapi' ),
		'desc' => __( 'Enter of Street input field ID. Example: #street_id', 'nextgenapi' ),
		'id'   => 'street_field_id',
		'type' => 'text',
		'default' => '',
	) );

	// Post Code Field

	$cmb_options->add_field( array(
		'name' => __( 'PostCode Field', 'nextgenapi' ),
		'desc' => __( 'Enter of Post Code field ID. Example: #plz_id', 'nextgenapi' ),
		'id'   => 'plz_field_id',
		'type' => 'text',
		'default' => '',
	) );

	// City Field

	$cmb_options->add_field( array(
		'name' => __( 'City Field', 'nextgenapi' ),
		'desc' => __( 'Enter of City field ID. Example: #city_id', 'nextgenapi' ),
		'id'   => 'city_field_id',
		'type' => 'text',
		'default' => '',
	) );

	// Country Field
	$cmb_options->add_field( array(
		'name' => __( 'Country Field', 'nextgenapi' ),
		'desc' => __( 'Enter of Country input field ID. Example: #country_id', 'nextgenapi' ),
		'id'   => 'country_field_id',
		'type' => 'text',
		'default' => '',
	) );

	// API Endpoint
	$cmb_options->add_field( array(
		'name' => __( 'NextGenAPI Address API URL', 'nextgenapi' ),
		'desc' => __( 'Please do not change unless you are instructed by NextGenAPI', 'nextgenapi' ),
		'id'   => 'url',
		'type' => 'text',
		'default' => 'https://api.nextgenapi.com:8243/address-service/v1/address',
	) );

	
  
}
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function nextgenapi_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( 'autocomplete', $key, $default );
	}
	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( 'autocomplete', $default );
	$val = $default;
	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}
	return $val;
}
