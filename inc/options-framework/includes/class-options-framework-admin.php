<?php
class Options_Framework_Admin {

    protected $options_screen = null;

    public function init() {

		// Gets options to load
    	$options = & Options_Framework::_optionsframework_options();

		// Checks if options are available
    	if ( $options ) {

			// Add the options page and menu item.
			add_action( 'admin_menu', array( $this, 'add_page_custom_options' ) );

			// Add the required scripts and styles
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

			// Settings need to be registered after admin_init
			add_action( 'admin_init', array( $this, 'settings_init' ) );

			// Adds options menu to the admin bar
			add_action( 'wp_before_admin_bar_render', array( $this, 'optionsframework_admin_bar' ) );

		}

    }

	function settings_init() {
		// Get the option name
		$options_framework = new Options_Framework;
	    $name = $options_framework->get_option_name();
		// Registers the settings fields and callback
		register_setting( 'optionsframework', $name, array ( $this, 'validate_options' ) );
		// Displays notice after options save
		add_action( 'optionsframework_after_validate', array( $this, 'save_options_notice' ) );
    }

	static function menu_settings() {

		$menu = array(

			// Modes: submenu, menu
            'mode' => 'submenu',

            // Submenu default settings
            'page_title' => __( 'Theme Options', 'LotusDeveloper' ),
			'menu_title' => __( 'Theme Options', 'LotusDeveloper' ),
			'capability' => 'edit_theme_options',
			'menu_slug' => 'staple-options',
            'parent_slug' => 'themes.php',

            // Menu default settings
            'icon_url' => 'dashicons-admin-generic',
            'position' => '61'

		);

		return apply_filters( 'optionsframework_menu', $menu );
	}

	function add_page_custom_options() {

		$menu = $this->menu_settings();

		$this->options_screen = add_theme_page(
            $menu['page_title'],
            $menu['menu_title'],
            $menu['capability'],
            $menu['menu_slug'],
            array( $this, 'options_page' )
        );

	}

	function enqueue_admin_styles( $hook ) {

		if ( $this->options_screen != $hook )
	        return;

		wp_enqueue_style( 'optionsframework', OPTIONS_FRAMEWORK_DIRECTORY . 'css/optionsframework.css', array(),  Options_Framework::VERSION );
		wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/inc/css/admin.css');
	}

	function enqueue_admin_scripts( $hook ) {

		if ( $this->options_screen != $hook )
	        return;
        // Enqueue Custom JS by theme 
        wp_enqueue_script( 'admin-custom-js', get_template_directory_uri() . '/inc/js/custom.js', array(), '1.0', true );
		// Enqueue custom option panel JS
		wp_enqueue_script( 'options-custom', OPTIONS_FRAMEWORK_DIRECTORY . 'js/options-custom.js', array( 'jquery','wp-color-picker' ), Options_Framework::VERSION );

		// Inline scripts from options-interface.php
		add_action( 'admin_head', array( $this, 'of_admin_head' ) );
	}

	function of_admin_head() {
		// Hook to add custom scripts
		do_action( 'optionsframework_custom_scripts' );
	}

	 function options_page() { ?>

	<div id="optionsframework-wrap" class="wrap">
		<div class="theme-header clearfix">
			<div class="accesspresslite-logo">
				<a href="http://lotusdeveloper.ir/" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/options-framework/images/logo.png" alt="<?php esc_attr_e('LotusDeveloper','LotusDeveloper'); ?>" /></a>
			</div>
		</div>
		
        
	    <div class="optionsframework-holder clearfix">

			<div class="nav-tab-wrapper">
				<?php echo wp_kses_post(Options_Framework_Interface::optionsframework_tabs()); ?>   
			</div>
		 
			<div id="optionsframework-metabox" class="metabox-holder">
				<div class="save-message"><?php settings_errors( 'options-framework' ); ?></div>
				<div id="optionsframework" class="postbox">
					<form action="options.php" method="post">
					<?php settings_fields( 'optionsframework' ); ?>
					<?php Options_Framework_Interface::optionsframework_fields(); /* Settings */ ?>
					<div id="optionsframework-submit">
						<input type="submit" class="button-primary" name="update" value="<?php esc_attr_e( 'Save Options', 'LotusDeveloper' ); ?>" />
						<input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e( 'Restore Defaults', 'LotusDeveloper' ); ?>" onclick="return confirm( '<?php print esc_js( __( 'Click OK to reset. Any theme settings will be lost!', 'LotusDeveloper' ) ); ?>' );" />
						<div class="clear"></div>
					</div>
					</form>
				</div> <!-- / #container -->    
			</div>
			
        </div>
		<?php do_action( 'optionsframework_after' ); ?>   
	</div> <!-- / .wrap -->

	<?php
	}

	function validate_options( $input ) {

		if ( isset( $_POST['reset'] ) ) {
			add_settings_error( 'options-framework', 'restore_defaults', __( 'Default options restored.', 'LotusDeveloper' ), 'updated fade' );
			return $this->get_default_values();
		}

		$clean = array();
		$options = & Options_Framework::_optionsframework_options();
		foreach ( $options as $option ) {

			if ( ! isset( $option['id'] ) ) {
				continue;
			}

			if ( ! isset( $option['type'] ) ) {
				continue;
			}

			$id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );

			// Set checkbox to false if it wasn't sent in the $_POST
			if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
				$input[$id] = false;
			}

			// Set each item in the multicheck to false if it wasn't sent in the $_POST
			if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
				foreach ( $option['options'] as $key => $value ) {
					$input[$id][$key] = false;
				}
			}

			// For a value to be submitted to database it must pass through a sanitization filter
			if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
				$clean[$id] = apply_filters( 'of_sanitize_' . $option['type'], $input[$id], $option );
			}
		}

		// Hook to run after validation
		do_action( 'optionsframework_after_validate', $clean );

		return $clean;
	}

	/**
	 * Display message when options have been saved
	 */

	function save_options_notice() {
		add_settings_error( 'options-framework', 'save_options', __( 'Options saved.', 'LotusDeveloper' ), 'updated fade' );
	}

	function get_default_values() {
		$output = array();
		$config = & Options_Framework::_optionsframework_options();
		foreach ( (array) $config as $option ) {
			if ( ! isset( $option['id'] ) ) {
				continue;
			}
			if ( ! isset( $option['std'] ) ) {
				continue;
			}
			if ( ! isset( $option['type'] ) ) {
				continue;
			}
			if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
				$output[$option['id']] = apply_filters( 'of_sanitize_' . $option['type'], $option['std'], $option );
			}
		}
		return $output;
	}

	/**
	 * Add options menu item to admin bar
	*/

	function optionsframework_admin_bar() {

		$menu = $this->menu_settings();

		global $wp_admin_bar;

		if ( 'menu' == $menu['mode'] ) {
			$href = admin_url( 'admin.php?page=' . $menu['menu_slug'] );
		} else {
			$href = admin_url( 'themes.php?page=' . $menu['menu_slug'] );
		}

		$args = array(
			'parent' => 'appearance',
			'id' => 'of_theme_options',
			'title' => $menu['menu_title'],
			'href' => $href
		);

		$wp_admin_bar->add_menu( apply_filters( 'optionsframework_admin_bar', $args ) );
	}

}