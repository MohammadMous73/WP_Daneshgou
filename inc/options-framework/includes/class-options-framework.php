<?php
class Options_Framework {

	const VERSION = '1.8.0';

	function get_option_name() {

		$name = '';

		// Gets option name as defined in the theme
		if ( function_exists( 'optionsframework_option_name' ) ) {
			$name = optionsframework_option_name();
		}

		// Fallback
		if ( '' == $name ) {
			$name = get_option( 'stylesheet' );
			$name = preg_replace( "/\W/", "_", strtolower( $name ) );
		}

		return $name;

	}

	static function &_optionsframework_options() {
		static $options = null;

		if ( !$options ) {
	        // Load options from options.php file (if it exists)
	        $location = apply_filters( 'options_framework_location', array( 'inc/accesspress-options.php' ) );
	        if ( $optionsfile = locate_template( $location ) ) {
	            $maybe_options = require_once $optionsfile;
	            if ( is_array( $maybe_options ) ) {
					$options = $maybe_options;
	            } else if ( function_exists( 'optionsframework_options' ) ) {
					$options = optionsframework_options();
				}
	        }

	        // Allow setting/manipulating options via filters
	        $options = apply_filters( 'of_options', $options );
		}

		return $options;
	}

}