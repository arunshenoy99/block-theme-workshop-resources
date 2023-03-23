<?php
/**
 * Initializes the Block Theme
 */
class BlockTheme {
	/**
	 * Constructor for the Block Theme Class
	 */
	public function __construct() {
		// Enqueue block assets for both the front end and the editor.
		\add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_assets' ) );

		// Enqueue assets only for the editor.
		\add_action( 'after_setup_theme', array( $this, 'add_editor_styles' ) );

		// Hide the admin bar in the front end.
		\add_action( 'wp_loaded', array( $this, 'hide_admin_bar' ) );
	}

	/**
	 * Contains logic to enqueue block assets for both the front end and the editor.
	 * We should always version bust this, keeping it simple for the demo.
	 *
	 * @return void
	 */
	public function enqueue_block_assets() {
		// Enqueue our bootstrap file.
		wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery-js', 'popper-js' ), null, true );
		// Enqueue our jquery file.
		wp_enqueue_script( 'jquery-js', get_theme_file_uri( '/assets/js/jquery.min.js' ), null, null, true );
		// Enqueue our popper file.
		wp_enqueue_script( 'popper-js', get_theme_file_uri( '/assets/js/popper.min.js' ), null, null, true );
		// Enqueue our theme specific script.
		wp_enqueue_script( 'block-theme-js', get_theme_file_uri( '/assets/js/app.js' ), array( 'jquery-js' ), null, true );
		// Enqueue our bootstrap styles.
		wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
		// Enqueue our theme specific styles.
		wp_enqueue_style( 'block-theme-css', get_theme_file_uri( '/assets/css/styles.css' ) );
	}

	/**
	 * Adds theme supports and custom editor styles for the editor.
	 *
	 * @return void
	 */
	public function add_editor_styles() {
		add_theme_support( 'editor-styles' );

		add_editor_style(
			array(
				'assets/css/bootstrap.min.css',
				'assets/css/styles.css',
			)
		);
	}

	/**
	 * Hides the admin bar in the front end for the admin user as well.
	 *
	 * @return void
	 */
	public function hide_admin_bar() {
		$user = wp_get_current_user();

		if ( 1 === count( $user->roles ) && 'administrator' === $user->roles[0] ) {
			show_admin_bar( false );
		}
	}

}
/**
 * Initializes a custom block.
 */
class Block {
	/**
	 * The constructor
	 *
	 * @param string  $block_name The namespace of the dynamic block.
	 * @param boolean $render_callback Whether the block has a PHP render callback (or) not.
	 */
	public function __construct( $block_name, $render_callback = null ) {
		$this->block_name      = $block_name;
		$this->render_callback = $render_callback;
		\add_action( 'init', array( $this, 'initialize_block' ) );
	}

	/**
	 * Initializes all the block specific assets and registers the block
	 *
	 * @return void
	 */
	public function initialize_block() {
		\wp_register_script( $this->block_name, get_template_directory_uri() . "/build/{$this->block_name}.js", array( 'wp-blocks', 'wp-editor', 'bootstrap-js' ) );

		$args = array(
			'editor_script' => $this->block_name,
		);

		if ( $this->render_callback ) {
			$args['render_callback'] = array( $this, 'render_callback' );
		}

		\register_block_type( "blocktheme/{$this->block_name}", $args );
	}

	/**
	 * Requires the PHP render callback
	 *
	 * @param array $attributes The attributes of the block.
	 * @param array $content The block content
	 * @return string
	 */
	public function render_callback( $attributes, $content ) {
		ob_start();
		require get_theme_file_path( "blocks/{$this->block_name}/{$this->block_name}.php" );
		return ob_get_clean();
	}
}

// Initialize the Block Theme.
new BlockTheme();
// Initialize our custom blocks.
new Block( 'navbar', true );
new Block( 'slide', true );
new Block( 'slideshow', true );
new Block( 'static', false );
