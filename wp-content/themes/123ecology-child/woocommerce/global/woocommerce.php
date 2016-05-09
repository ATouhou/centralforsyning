<?php

/**
 * Plugin Name: WooCommerce
 * Plugin URI: http://www.woothemes.com/woocommerce/
 * Description: An e-commerce toolkit that helps you sell anything. Beautifully.
 * Version: 2.5.5
 * Author: WooThemes
 * Author URI: http://woothemes.com
 * Requires at least: 4.1
 * Tested up to: 4.3
 *
 * Text Domain: woocommerce
 * Domain Path: /i18n/languages/
 *
 * @package WooCommerce
 * @category Core
 * @author WooThemes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WooCommerce' ) ) :

/**
 * Main WooCommerce Class.
 *
 * @class WooCommerce
 * @version	2.5.0
 */
final class WooCommerce {

	/**
	 * WooCommerce version.
	 *
	 * @var string
	 */
	public $version = '2.5.5';

	/**
	 * The single instance of the class.
	 *
	 * @var WooCommerce
	 * @since 2.1
	 */
	protected static $_instance = null;

	/**
	 * Session instance.
	 *
	 * @var WC_Session
	 */
	public $session = null;

	/**
	 * Query instance.
	 *
	 * @var WC_Query
	 */
	public $query = null;

	/**
	 * Product factory instance.
	 *
	 * @var WC_Product_Factory
	 */
	public $product_factory = null;

	/**
	 * Countries instance.
	 *
	 * @var WC_Countries
	 */
	public $countries = null;

	/**
	 * Integrations instance.
	 *
	 * @var WC_Integrations
	 */
	public $integrations = null;

	/**
	 * Cart instance.
	 *
	 * @var WC_Cart
	 */
	public $cart = null;

	/**
	 * Customer instance.
	 *
	 * @var WC_Customer
	 */
	public $customer = null;

	/**
	 * Order factory instance.
	 *
	 * @var WC_Order_Factory
	 */
	public $order_factory = null;

	/**
	 * Main WooCommerce Instance.
	 *
	 * Ensures only one instance of WooCommerce is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @static
	 * @see WC()
	 * @return WooCommerce - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Cloning is forbidden.
	 * @since 2.1
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce' ), '2.1' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 * @since 2.1
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce' ), '2.1' );
	}

	/**
	 * Auto-load in-accessible properties on demand.
	 * @param mixed $key
	 * @return mixed
	 */
	public function __get( $key ) {
		if ( in_array( $key, array( 'payment_gateways', 'shipping', 'mailer', 'checkout' ) ) ) {
			return $this->$key();
		}
	}

	/**
	 * WooCommerce Constructor.
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();

		do_action( 'woocommerce_loaded' );
	}

	/**
	 * Hook into actions and filters.
	 * @since  2.3
	 */
	private function init_hooks() {
		register_activation_hook( __FILE__, array( 'WC_Install', 'install' ) );
		add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );
		add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11 );
		add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'init', array( 'WC_Shortcodes', 'init' ) );
		add_action( 'init', array( 'WC_Emails', 'init_transactional_emails' ) );
	}

	/**
	 * Define WC Constants.
	 */
	private function define_constants() {
		$upload_dir = wp_upload_dir();

		$this->define( 'WC_PLUGIN_FILE', __FILE__ );
		$this->define( 'WC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'WC_VERSION', $this->version );
		$this->define( 'WOOCOMMERCE_VERSION', $this->version );
		$this->define( 'WC_ROUNDING_PRECISION', 4 );
		$this->define( 'WC_DISCOUNT_ROUNDING_MODE', 2 );
		$this->define( 'WC_TAX_ROUNDING_MODE', 'yes' === get_option( 'woocommerce_prices_include_tax', 'no' ) ? 2 : 1 );
		$this->define( 'WC_DELIMITER', '|' );
		$this->define( 'WC_LOG_DIR', $upload_dir['basedir'] . '/wc-logs/' );
		$this->define( 'WC_SESSION_CACHE_GROUP', 'wc_session_id' );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param  string $name
	 * @param  string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * What type of request is this?
	 * string $type ajax, frontend or admin.
	 *
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin' :
				return is_admin();
			case 'ajax' :
				return defined( 'DOING_AJAX' );
			case 'cron' :
				return defined( 'DOING_CRON' );
			case 'frontend' :
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {
		include_once( 'includes/class-wc-autoloader.php' );
		include_once( 'includes/wc-core-functions.php' );
		include_once( 'includes/wc-widget-functions.php' );
		include_once( 'includes/wc-webhook-functions.php' );
		include_once( 'includes/class-wc-install.php' );
		include_once( 'includes/class-wc-geolocation.php' );
		include_once( 'includes/class-wc-download-handler.php' );
		include_once( 'includes/class-wc-comments.php' );
		include_once( 'includes/class-wc-post-data.php' );
		include_once( 'includes/class-wc-ajax.php' );

		if ( $this->is_request( 'admin' ) ) {
			include_once( 'includes/admin/class-wc-admin.php' );
		}

		if ( $this->is_request( 'frontend' ) ) {
			$this->frontend_includes();
		}

		if ( $this->is_request( 'frontend' ) || $this->is_request( 'cron' ) ) {
			include_once( 'includes/abstracts/abstract-wc-session.php' );
			include_once( 'includes/class-wc-session-handler.php' );
		}

		if ( $this->is_request( 'cron' ) && 'yes' === get_option( 'woocommerce_allow_tracking', 'no' ) ) {
			include_once( 'includes/class-wc-tracker.php' );
		}

		$this->query = include( 'includes/class-wc-query.php' );                // The main query class
		$this->api   = include( 'includes/class-wc-api.php' );                  // API Class

		include_once( 'includes/class-wc-auth.php' );                           // Auth Class
		include_once( 'includes/class-wc-post-types.php' );                     // Registers post types
		include_once( 'includes/abstracts/abstract-wc-product.php' );           // Products
		include_once( 'includes/abstracts/abstract-wc-order.php' );             // Orders
		include_once( 'includes/abstracts/abstract-wc-settings-api.php' );      // Settings API (for gateways, shipping, and integrations)
		include_once( 'includes/abstracts/abstract-wc-shipping-method.php' );   // A Shipping method
		include_once( 'includes/abstracts/abstract-wc-payment-gateway.php' );   // A Payment gateway
		include_once( 'includes/abstracts/abstract-wc-integration.php' );       // An integration with a service
		include_once( 'includes/class-wc-product-factory.php' );                // Product factory
		include_once( 'includes/class-wc-countries.php' );                      // Defines countries and states
		include_once( 'includes/class-wc-integrations.php' );                   // Loads integrations
		include_once( 'includes/class-wc-cache-helper.php' );                   // Cache Helper

		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			include_once( 'includes/class-wc-cli.php' );
		}
	}

	/**
	 * Include required frontend files.
	 */
	public function frontend_includes() {
		include_once( 'includes/wc-cart-functions.php' );
		include_once( 'includes/wc-notice-functions.php' );
		include_once( 'includes/wc-template-hooks.php' );
		include_once( 'includes/class-wc-template-loader.php' );                // Template Loader
		include_once( 'includes/class-wc-frontend-scripts.php' );               // Frontend Scripts
		include_once( 'includes/class-wc-form-handler.php' );                   // Form Handlers
		include_once( 'includes/class-wc-cart.php' );                           // The main cart class
		include_once( 'includes/class-wc-tax.php' );                            // Tax class
		include_once( 'includes/class-wc-customer.php' );                       // Customer class
		include_once( 'includes/class-wc-shortcodes.php' );                     // Shortcodes class
		include_once( 'includes/class-wc-https.php' );                          // https Helper
		include_once( 'includes/class-wc-embed.php' );                          // Embeds
	}

	/**
	 * Function used to Init WooCommerce Template Functions - This makes them pluggable by plugins and themes.
	 */
	public function include_template_functions() {
		include_once( 'includes/wc-template-functions.php' );
	}

	/**
	 * Init WooCommerce when WordPress Initialises.
	 */
	public function init() {
		// Before init action.
		do_action( 'before_woocommerce_init' );

		// Set up localisation.
		$this->load_plugin_textdomain();

		// Load class instances.
		$this->product_factory = new WC_Product_Factory();                      // Product Factory to create new product instances
		$this->order_factory   = new WC_Order_Factory();                        // Order Factory to create new order instances
		$this->countries       = new WC_Countries();                            // Countries class
		$this->integrations    = new WC_Integrations();                         // Integrations class

		// Session class, handles session data for users - can be overwritten if custom handler is needed.
		if ( $this->is_request( 'frontend' ) || $this->is_request( 'cron' ) ) {
			$session_class  = apply_filters( 'woocommerce_session_handler', 'WC_Session_Handler' );
			$this->session  = new $session_class();
		}

		// Classes/actions loaded for the frontend and for ajax requests.
		if ( $this->is_request( 'frontend' ) ) {
			$this->cart     = new WC_Cart();                                    // Cart class, stores the cart contents
			$this->customer = new WC_Customer();                                // Customer class, handles data such as customer location
		}

		$this->load_webhooks();

		// Init action.
		do_action( 'woocommerce_init' );
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/woocommerce/woocommerce-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/woocommerce-LOCALE.mo
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'woocommerce' );

		load_textdomain( 'woocommerce', WP_LANG_DIR . '/woocommerce/woocommerce-' . $locale . '.mo' );
		load_plugin_textdomain( 'woocommerce', false, plugin_basename( dirname( __FILE__ ) ) . '/i18n/languages' );
	}

	/**
	 * Ensure theme and server variable compatibility and setup image sizes.
	 */
	public function setup_environment() {
		/**
		 * @deprecated 2.2 Use WC()->template_path()
		 */
		$this->define( 'WC_TEMPLATE_PATH', $this->template_path() );

		$this->add_thumbnail_support();
		$this->add_image_sizes();
	}

	/**
	 * Ensure post thumbnail support is turned on.
	 */
	private function add_thumbnail_support() {
		if ( ! current_theme_supports( 'post-thumbnails' ) ) {
			add_theme_support( 'post-thumbnails' );
		}
		add_post_type_support( 'product', 'thumbnail' );
	}

	/**
	 * Add WC Image sizes to WP.
	 *
	 * @since 2.3
	 */
	private function add_image_sizes() {
		$shop_thumbnail = wc_get_image_size( 'shop_thumbnail' );
		$shop_catalog	= wc_get_image_size( 'shop_catalog' );
		$shop_single	= wc_get_image_size( 'shop_single' );

		add_image_size( 'shop_thumbnail', $shop_thumbnail['width'], $shop_thumbnail['height'], $shop_thumbnail['crop'] );
		add_image_size( 'shop_catalog', $shop_catalog['width'], $shop_catalog['height'], $shop_catalog['crop'] );
		add_image_size( 'shop_single', $shop_single['width'], $shop_single['height'], $shop_single['crop'] );
	}

	/**
	 * Get the plugin url.
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Get the template path.
	 * @return string
	 */
	public function template_path() {
		return apply_filters( 'woocommerce_template_path', 'woocommerce/' );
	}

	/**
	 * Get Ajax URL.
	 * @return string
	 */
	public function ajax_url() {
		return admin_url( 'admin-ajax.php', 'relative' );
	}

	/**
	 * Return the WC API URL for a given request.
	 *
	 * @param string $request
	 * @param mixed $ssl (default: null)
	 * @return string
	 */
	public function api_request_url( $request, $ssl = null ) {
		if ( is_null( $ssl ) ) {
			$scheme = parse_url( home_url(), PHP_URL_SCHEME );
		} elseif ( $ssl ) {
			$scheme = 'https';
		} else {
			$scheme = 'http';
		}

		if ( strstr( get_option( 'permalink_structure' ), '/index.php/' ) ) {
			$api_request_url = trailingslashit( home_url( '/index.php/wc-api/' . $request, $scheme ) );
		} elseif ( get_option( 'permalink_structure' ) ) {
			$api_request_url = trailingslashit( home_url( '/wc-api/' . $request, $scheme ) );
		} else {
			$api_request_url = add_query_arg( 'wc-api', $request, trailingslashit( home_url( '', $scheme ) ) );
		}

		return esc_url_raw( apply_filters( 'woocommerce_api_request_url', $api_request_url, $request, $ssl ) );
	}

	/**
	 * Load & enqueue active webhooks.
	 *
	 * @since 2.2
	 */
	private function load_webhooks() {
		if ( false === ( $webhooks = get_transient( 'woocommerce_webhook_ids' ) ) ) {
			$webhooks = get_posts( array(
				'fields'         => 'ids',
				'post_type'      => 'shop_webhook',
				'post_status'    => 'publish',
				'posts_per_page' => -1
			) );
			set_transient( 'woocommerce_webhook_ids', $webhooks );
		}
		foreach ( $webhooks as $webhook_id ) {
			$webhook = new WC_Webhook( $webhook_id );
			$webhook->enqueue();
		}
	}

	/**
	 * Get Checkout Class.
	 * @return WC_Checkout
	 */
	public function checkout() {
		return WC_Checkout::instance();
	}

	/**
	 * Get gateways class.
	 * @return WC_Payment_Gateways
	 */
	public function payment_gateways() {
		return WC_Payment_Gateways::instance();
	}

	/**
	 * Get shipping class.
	 * @return WC_Shipping
	 */
	public function shipping() {
		return WC_Shipping::instance();
	}

	/**
	 * Email Class.
	 * @return WC_Emails
	 */
	public function mailer() {
		return WC_Emails::instance();
	}
	
	
	/** Deprecated methods *********************************************************/

	/**
	 * @deprecated 2.1.0
	 * @param $image_size
	 * @return array
	 */
	public function get_image_size( $image_size ) {
		_deprecated_function( 'Woocommerce->get_image_size', '2.1', 'wc_get_image_size()' );
		return wc_get_image_size( $image_size );
	}

	/**
	 * @deprecated 2.1.0
	 * @return WC_Logger
	 */
	public function logger() {
		_deprecated_function( 'Woocommerce->logger', '2.1', 'new WC_Logger()' );
		return new WC_Logger();
	}

	/**
	 * @deprecated 2.1.0
	 * @return WC_Validation
	 */
	public function validation() {
		_deprecated_function( 'Woocommerce->validation', '2.1', 'new WC_Validation()' );
		return new WC_Validation();
	}

	/**
	 * @deprecated 2.1.0
	 * @param $post
	 * @return WC_Product
	 */
	public function setup_product_data( $post ) {
		_deprecated_function( 'Woocommerce->setup_product_data', '2.1', 'wc_setup_product_data' );
		return wc_setup_product_data( $post );
	}

	/**
	 * @deprecated 2.1.0
	 * @param $content
	 * @return string
	 */
	public function force_ssl( $content ) {
		_deprecated_function( 'Woocommerce->force_ssl', '2.1', 'WC_HTTPS::force_https_url' );
		return WC_HTTPS::force_https_url( $content );
	}

	/**
	 * @deprecated 2.1.0
	 * @param int $post_id
	 */
	public function clear_product_transients( $post_id = 0 ) {
		_deprecated_function( 'Woocommerce->clear_product_transients', '2.1', 'wc_delete_product_transients' );
		wc_delete_product_transients( $post_id );
	}

	/**
	 * @deprecated 2.1.0 Access via the WC_Inline_Javascript_Helper helper
	 * @param $code
	 */
	public function add_inline_js( $code ) {
		_deprecated_function( 'Woocommerce->add_inline_js', '2.1', 'wc_enqueue_js' );
		wc_enqueue_js( $code );
	}

	/**
	 * @deprecated 2.1.0
	 * @param      $action
	 * @param bool $referer
	 * @param bool $echo
	 * @return string
	 */
	public function nonce_field( $action, $referer = true , $echo = true ) {
		_deprecated_function( 'Woocommerce->nonce_field', '2.1', 'wp_nonce_field' );
		return wp_nonce_field('woocommerce-' . $action, '_wpnonce', $referer, $echo );
	}

	/**
	 * @deprecated 2.1.0
	 * @param        $action
	 * @param string $url
	 * @return string
	 */
	public function nonce_url( $action, $url = '' ) {
		_deprecated_function( 'Woocommerce->nonce_url', '2.1', 'wp_nonce_url' );
		return wp_nonce_url( $url , 'woocommerce-' . $action );
	}

	/**
	 * @deprecated 2.1.0
	 * @param        $action
	 * @param string $method
	 * @param bool   $error_message
	 * @return bool
	 */
	public function verify_nonce( $action, $method = '_POST', $error_message = false ) {
		_deprecated_function( 'Woocommerce->verify_nonce', '2.1', 'wp_verify_nonce' );
		if ( ! isset( $method[ '_wpnonce' ] ) ) {
			return false;
		}
		return wp_verify_nonce( $method[ '_wpnonce' ], 'woocommerce-' . $action );
	}

	/**
	 * @deprecated 2.1.0
	 * @param       $function
	 * @param array $atts
	 * @param array $wrapper
	 * @return string
	 */
	public function shortcode_wrapper( $function, $atts = array(), $wrapper = array( 'class' => 'woocommerce', 'before' => null, 'after' => null ) ) {
		_deprecated_function( 'Woocommerce->shortcode_wrapper', '2.1', 'WC_Shortcodes::shortcode_wrapper' );
		return WC_Shortcodes::shortcode_wrapper( $function, $atts, $wrapper );
	}

	/**
	 * @deprecated 2.1.0
	 * @return object
	 */
	public function get_attribute_taxonomies() {
		_deprecated_function( 'Woocommerce->get_attribute_taxonomies', '2.1', 'wc_get_attribute_taxonomies' );
		return wc_get_attribute_taxonomies();
	}

	/**
	 * @deprecated 2.1.0
	 * @param $name
	 * @return string
	 */
	public function attribute_taxonomy_name( $name ) {
		_deprecated_function( 'Woocommerce->attribute_taxonomy_name', '2.1', 'wc_attribute_taxonomy_name' );
		return wc_attribute_taxonomy_name( $name );
	}

	/**
	 * @deprecated 2.1.0
	 * @param $name
	 * @return string
	 */
	public function attribute_label( $name ) {
		_deprecated_function( 'Woocommerce->attribute_label', '2.1', 'wc_attribute_label' );
		return wc_attribute_label( $name );
	}

	/**
	 * @deprecated 2.1.0
	 * @param $name
	 * @return string
	 */
	public function attribute_orderby( $name ) {
		_deprecated_function( 'Woocommerce->attribute_orderby', '2.1', 'wc_attribute_orderby' );
		return wc_attribute_orderby( $name );
	}

	/**
	 * @deprecated 2.1.0
	 * @return array
	 */
	public function get_attribute_taxonomy_names() {
		_deprecated_function( 'Woocommerce->get_attribute_taxonomy_names', '2.1', 'wc_get_attribute_taxonomy_names' );
		return wc_get_attribute_taxonomy_names();
	}

	/**
	 * @deprecated 2.1.0
	 * @return array
	 */
	public function get_coupon_discount_types() {
		_deprecated_function( 'Woocommerce->get_coupon_discount_types', '2.1', 'wc_get_coupon_types' );
		return wc_get_coupon_types();
	}

	/**
	 * @deprecated 2.1.0
	 * @param string $type
	 * @return string
	 */
	public function get_coupon_discount_type( $type = '' ) {
		_deprecated_function( 'Woocommerce->get_coupon_discount_type', '2.1', 'wc_get_coupon_type' );
		return wc_get_coupon_type( $type );
	}

	/**
	 * @deprecated 2.1.0
	 * @param $class
	 */
	public function add_body_class( $class ) {
		_deprecated_function( 'Woocommerce->add_body_class', '2.1' );
	}

	/**
	 * @deprecated 2.1.0
	 * @param $classes
	 */
	public function output_body_class( $classes ) {
		_deprecated_function( 'Woocommerce->output_body_class', '2.1' );
	}

	/**
	 * @deprecated 2.1.0
	 * @param $error
	 */
	public function add_error( $error ) {
		_deprecated_function( 'Woocommerce->add_error', '2.1', 'wc_add_notice' );
		wc_add_notice( $error, 'error' );
	}

	/**
	 * @deprecated 2.1.0
	 * @param $message
	 */
	public function add_message( $message ) {
		_deprecated_function( 'Woocommerce->add_message', '2.1', 'wc_add_notice' );
		wc_add_notice( $message );
	}

	/**
	 * @deprecated 2.1.0
	 */
	public function clear_messages() {
		_deprecated_function( 'Woocommerce->clear_messages', '2.1', 'wc_clear_notices' );
		wc_clear_notices();
	}

	/**
	 * @deprecated 2.1.0
	 * @return int
	 */
	public function error_count() {
		_deprecated_function( 'Woocommerce->error_count', '2.1', 'wc_notice_count' );
		return wc_notice_count( 'error' );
	}

	/**
	 * @deprecated 2.1.0
	 * @return int
	 */
	public function message_count() {
		_deprecated_function( 'Woocommerce->message_count', '2.1', 'wc_notice_count' );
		return wc_notice_count( 'message' );
	}

	/**
	 * @deprecated 2.1.0
	 * @return mixed
	 */
	public function get_errors() {
		_deprecated_function( 'Woocommerce->get_errors', '2.1', 'wc_get_notices( "error" )' );
		return wc_get_notices( 'error' );
	}

	/**
	 * @deprecated 2.1.0
	 * @return mixed
	 */
	public function get_messages() {
		_deprecated_function( 'Woocommerce->get_messages', '2.1', 'wc_get_notices( "success" )' );
		return wc_get_notices( 'success' );
	}

	/**
	 * @deprecated 2.1.0
	 */
	public function show_messages() {
		_deprecated_function( 'Woocommerce->show_messages', '2.1', 'wc_print_notices()' );
		wc_print_notices();
	}

	/**
	 * @deprecated 2.1.0
	 */
	public function set_messages() {
		_deprecated_function( 'Woocommerce->set_messages', '2.1' );
	}

}

endif;

/**
 * Main instance of WooCommerce.
 *
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  2.1
 * @return WooCommerce
 */
function WC() {
	return WooCommerce::instance();
}

// Global for backwards compatibility.
$GLOBALS['woocommerce'] = WC();
