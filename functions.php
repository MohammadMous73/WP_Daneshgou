<?php 
require get_template_directory() . '/inc/options-framework/options-framework.php';
require get_template_directory() . '/inc/accesspress-options.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/inc/custom_fields.php';
define('OPTIONS_FRAMEWORK_DIRECTORY',get_template_directory_uri(  ).'/inc/options-framework/');

function theme_setup(){
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'html5' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'category-thumb', 300, 400, true );
    register_nav_menus( array(
        'primary_menu' => esc_html__( 'Primary Menu', 'MohDeveloper' ),
        'footer_menu'  => esc_html__( 'Footer Menu', 'MohDeveloper' ),
    ) );
}

function pagination_m() {
        global $wp_query;
    
        $big = 999999999; // need an unlikely integer
    
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => true,
            'prev_text'    => __('قبلی'),
            'next_text'    => __('بعدی'),
        ) );
}

add_action('after_setup_theme','theme_setup');


function moh_scripts(  ){
    wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/css/bootstrap.min.css", false, '3.3.7' );
    wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri()."/css/bootstrap-rtl.min.css", false, '3.3.7' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/css/font-awesome.min.css", false, '3.3.7' );
    wp_enqueue_style( 'swiper', get_template_directory_uri()."/css/swiper.min.css", false, '3.3.7' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'ld_jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '1.12.4' );
	
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', false, '4.5.0' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', false, '3.3.7' );	
}
add_action( 'wp_enqueue_scripts', 'moh_scripts' );


function my_register_sidebars() {
    register_sidebar(
        array(
            'id'            => 'blog_sidebar',
            'name'          => __( 'Sidebar-Site' ),
            'description'   => __( 'ستون کناری وبلاگ' ),
            'before_widget' => '<section class="widget">',
            'after_widget'  => '</section>',
            'before_title'  => '<header class="widget_title"><h6><span>',
            'after_title'   => '</span></h6></header>',
        )
    );
    register_sidebar(
        array(
            'id'            => 'single_sidebar',
            'name'          => __( 'Sidebar-singlepage' ),
            'description'   => __( 'ستون کناری صفخه داخلی' ),
            'before_widget' => '<section class="widget">',
            'after_widget'  => '</section>',
            'before_title'  => '<header class="widget_title"><h6><span>',
            'after_title'   => '</span></h6></header>',
        )
    );
}
add_action( 'widgets_init', 'my_register_sidebars' );



function wpdocs_codex_book_init() {
    $labels = array(
        'name'                  => _x( 'Download', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Downloads', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Download', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Download', 'textdomain' ),
        'new_item'              => __( 'New Download', 'textdomain' ),
        'edit_item'             => __( 'Edit Download', 'textdomain' ),
        'view_item'             => __( 'View Download', 'textdomain' ),
        'all_items'             => __( 'All Downloads', 'textdomain' ),
        'search_items'          => __( 'Search Downloads', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Downloads:', 'textdomain' ),
        'not_found'             => __( 'No Downloads found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Downloads found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Download Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Download archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Download', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Download', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Downloads list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Downloads list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Downloads list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'download' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'download', $args );
}
 
add_action( 'init', 'wpdocs_codex_book_init' );