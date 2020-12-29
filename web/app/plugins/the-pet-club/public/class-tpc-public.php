<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       victorcrespo.net
 * @since      1.0.0
 *
 * @package    Tpc
 * @subpackage Tpc/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tpc
 * @subpackage Tpc/public
 * @author     Víctor Crespo <victor182@msn.com>
 */
class Tpc_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
        $this->version = $version;
        
        $this->load_dependencies();

    }
    
    /*
    *
    *   Load dependencies for the public view.
    *
    */
    private function load_dependencies() {

        require_once TPC_PLUGIN_PATH . 'public/controllers/class_vendor_dashboard.php';
		require_once TPC_PLUGIN_PATH . 'public/controllers/class_vendor_dashboard_action.php';
		
		require_once TPC_PLUGIN_PATH . 'public/controllers/class_search_dashboard.php';
        require_once TPC_PLUGIN_PATH . 'public/controllers/class_search_dashboard_action.php';

    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tpc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tpc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_style( $this->plugin_name . '_bootstrap_styles', 
			plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css', 
			array(), 
			$this->version, 
			'all' );

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tpc-public.css', array(), $this->version, 'all' );

		wp_register_style( $this->plugin_name . '_wizard_styles', 
			'https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css', 
			array(), 
			$this->version, 
			'all' );

		wp_register_style( $this->plugin_name . '_form_styles', 
			plugin_dir_url( __FILE__ ) . 'assets/css/tpc_form.css', 
			array(), 
			$this->version, 
			'all' );

		wp_register_style( $this->plugin_name . '_fontawesome', 
			plugin_dir_url( __FILE__ ) . 'assets/css/fontawesome/css/fontawesome.min.css', 
			array(), 
			$this->version, 
			'all' );

		wp_register_style( $this->plugin_name . '_fontawesome_solid', 
			plugin_dir_url( __FILE__ ) . 'assets/css/fontawesome/css/solid.min.css', 
			array($this->plugin_name . '_fontawesome'), 
			$this->version, 
			'all' );

		wp_register_style( $this->plugin_name . '_search', 
			plugin_dir_url( __FILE__ ) . 'assets/css/tpc_search.css', 
			array($this->plugin_name . '_bootstrap_styles'), 
			$this->version, 
			'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tpc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tpc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tpc-public.js', array( 'jquery' ), $this->version, false );

		wp_register_script( $this->plugin_name . '_jquery_ajax', 
			plugin_dir_url( __FILE__ ) . 'assets/js/tpc_jquery_ajax.js', 
			array( 'jquery' ), 
			$this->version, 
			false );

		wp_localize_script(
			$this->plugin_name . '_jquery_ajax',
			'tpc_object',
			[
				'ajax_url' => admin_url( 'admin-ajax.php' )
			]);

		wp_register_script( $this->plugin_name . '_popper', 
			'https://unpkg.com/@popperjs/core@2', 
			array(), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_bootstrap', 
			plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.bundle.min.js', 
			array(
				'jquery',
				$this->plugin_name . '_popper'
			), 
			$this->version, 
			false );
		
		wp_register_script( $this->plugin_name . '_smart_wizard', 
			'https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js', 
			array( 'jquery' ), 
			$this->version, 
			false );
        
		wp_register_script( $this->plugin_name . '_validate', 
			plugin_dir_url( __FILE__ ) . 'assets/js/jquery.validate.min.js', 
			array( 'jquery' ), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_tpc_reg_form_wizard', 
			plugin_dir_url( __FILE__ ) . 'assets/js/tpc_reg_form_wizard.js', 
			array( 
				$this->plugin_name . '_smart_wizard', 
			), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_tpc_custom_wizard_process', 
			plugin_dir_url( __FILE__ ) . 'assets/js/tpc_custom_wizard_process.js', 
			array( 
				$this->plugin_name . '_tpc_reg_form_wizard', 
			), 
			$this->version, 
			false );

        wp_register_script( $this->plugin_name . '_tpc_reg_keeper_address', 
            plugin_dir_url( __FILE__ ) . 'assets/js/tpc_reg_keeper_address.js', 
			array( 
				$this->plugin_name . '_validate',
				$this->plugin_name . '_tpc_custom_wizard_process'
			), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_tpc_reg_keeper_contact', 
            plugin_dir_url( __FILE__ ) . 'assets/js/tpc_reg_keeper_contact.js', 
			array( 
				$this->plugin_name . '_validate',
				$this->plugin_name . '_tpc_custom_wizard_process'
			), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_tpc_reg_keeper_home', 
            plugin_dir_url( __FILE__ ) . 'assets/js/tpc_reg_keeper_home.js', 
			array( 
				$this->plugin_name . '_validate',
				$this->plugin_name . '_tpc_custom_wizard_process'
			), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_tpc_reg_keeper_services', 
            plugin_dir_url( __FILE__ ) . 'assets/js/tpc_reg_keeper_services.js', 
			array( 
				$this->plugin_name . '_validate',
				$this->plugin_name . '_tpc_custom_wizard_process'
			), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_tpc_wp_media_upload_image', 
            plugin_dir_url( __FILE__ ) . 'assets/js/tpc_wp_media_upload_image.js', 
			array( 
				'jquery'
			), 
			$this->version, 
			false );
		
		/*wp_register_script( $this->plugin_name . '_google_maps', 
            'https://maps.googleapis.com/maps/api/js?key=&libraries=places', 
			array(), 
			$this->version, 
			false );

		wp_register_script( $this->plugin_name . '_tpc_map', 
			plugin_dir_url( __FILE__ ) . 'assets/js/tpc_map.js', 
			array('jquery', $this->plugin_name . '_google_maps'), 
			$this->version, 
			false );*/

		wp_register_script( $this->plugin_name . '_tpc_search_controls', 
			plugin_dir_url( __FILE__ ) . 'assets/js/tpc_search_controls.js', 
			array('jquery'), 
			$this->version, 
			false );

    }
    
     /**
	 * Register the shortcodes for the public area.
	 *
	 * @since    1.0.0
	 */

	public function register_shortcodes() { 

		$vendor_dashboard 	= new Tpc_Vendor_Dashboard($this->plugin_name);
		$search_dashboard 	= new Tpc_Search_Dashboard($this->plugin_name);

		add_shortcode('tpc_vendor_dashboard', array($vendor_dashboard, 'tpc_load_vendor_dashboard'));
		add_shortcode('tpc_search_dashboard', array($search_dashboard, 'tpc_load_search_dashboard'));
	}
	
	/**
	 * Activate media uploader.
	 *
	 * @since    1.0.0
	 */

	public function enqueue_media_uploader() { 

		wp_enqueue_media();

	}

	/**
	 * Modify Dokan dashboard view.
	 *
	 * @since    1.0.0
	 */

	public function modify_dokan_dashboard( $urls ) { 

		unset( $urls['products'] );
		return $urls;

	}

	/**
	 * Registration checking.
	 *
	 * @since    1.0.0
	 */

	public function check_registration() { 

		if( is_page( 'dashboard' ) ){

			if( !is_user_logged_in() ) {
				wp_safe_redirect( home_url() );
				exit();
			}

			$user_id = get_current_user_id();
			$complete_reg = get_user_meta( $user_id, 'tpc_vendor_registration', true );

			if( empty($complete_reg) ){
				wp_safe_redirect( home_url('/tpc_vendor_registration') );
				exit();
			}
		}

		if( is_page( 'tpc_vendor_registration' ) ){

			if( !is_user_logged_in() ) {
				wp_safe_redirect( home_url() );
				exit();
			}

			$user_id = get_current_user_id();
			$complete_reg = get_user_meta( $user_id, 'tpc_vendor_registration', true );
			
			if( ! empty($complete_reg) ){
				wp_safe_redirect( home_url('/dashboard') );
				exit();
			}

		}

		return;

	}

}
