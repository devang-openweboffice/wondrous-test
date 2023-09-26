<?php
/**
 * Add Custom functions for this theme.
 *
 * @package WordPress
 * @subpackage Base_Theme
 * @since Base Theme 1.0
*/
if ( ! class_exists( 'Base_Theme_Custom_Theme_Functions' ) ) {

    /**
	 * ACF Custom Theme Functions
	 */
	class Base_Theme_Custom_Theme_Functions {

        public function __construct() {

            // base theme setup function
            add_action( 'after_setup_theme', array( $this, 'base_theme_setup' ) );      
            
            // base theme widget
            add_action( 'widgets_init', array( $this,'base_theme_widgets_init' ) );

            // body class hook to add page slud to body class
            add_filter( 'body_class', array( $this,'base_theme_add_slug_body_class' ) );

            //SVG support added to theme
            add_filter( 'wp_check_filetype_and_ext', array( $this, 'base_theme_wp_check_filetype' ), 10, 4 );
            add_filter( 'upload_mimes', array( $this, 'base_theme_cc_mime_types' ) );
            add_action( 'admin_head', array( $this, 'base_theme_fix_svg' ) );

    
        }  
        
        /**
         * Base Theme functions
         *
         */
        public function base_theme_setup() {
            /*
                * Make theme available for translation.
                * Translations can be filed in the /languages/ directory.
                * If you're building a theme based on Base Theme, use a find and replace
                * to change 'base_theme' to the name of your theme in all the template files.
                */
            load_theme_textdomain( 'base_theme', get_template_directory() . '/languages' );

            // Add default posts and comments RSS feed links to head.
            add_theme_support( 'automatic-feed-links' );

            /*
                * Let WordPress manage the document title.
                * By adding theme support, we declare that this theme does not use a
                * hard-coded <title> tag in the document head, and expect WordPress to
                * provide it for us.
                */
            add_theme_support( 'title-tag' );

            /*
                * Enable support for Post Thumbnails on posts and pages.
                *
                * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
                */
            add_theme_support( 'post-thumbnails' );

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'primary' => esc_html__( 'Primary', 'base_theme' ),
                    'footer_primary' => esc_html__( 'Footer Primary', 'base_theme' ),
                )
            );

            /*
                * Switch default core markup for search form, comment form, and comments
                * to output valid HTML5.
                */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );

            // Set up the WordPress core custom background feature.
            add_theme_support(
                'custom-background',
                apply_filters(
                    'base_theme_custom_background_args',
                    array(
                        'default-color' => 'ffffff',
                        'default-image' => '',
                    )
                )
            );

            // Add theme support for selective refresh for widgets.
            add_theme_support( 'customize-selective-refresh-widgets' );

            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support(
                'custom-logo',
                array(
                    'height'      => 250,
                    'width'       => 250,
                    'flex-width'  => true,
                    'flex-height' => true,
                )
            );
        }

        /**
         * Register widget area.
         *
         * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
         */
        public function base_theme_widgets_init() {
            register_sidebar(
                array(
                    'name'          => esc_html__( 'Sidebar', 'base_theme' ),
                    'id'            => 'sidebar-1',
                    'description'   => esc_html__( 'Add widgets here.', 'base_theme' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
        }

        /**
         * Add page slug to body for custom css
        */
        public function base_theme_add_slug_body_class( $classes ) {

            global $post;
            if ( isset( $post ) ) {
                $classes[] = $post->post_type . '-' . $post->post_name;
            }
            return $classes;

        }

        /**
         * Check file type to add SVG support
         *
        */
        public function base_theme_wp_check_filetype( $data, $file, $filename, $mimes ){
            global $wp_version;
            if ( $wp_version !== '4.7.1' ) {
                return $data;
            }

            $filetype = wp_check_filetype( $filename, $mimes );

            return [
                'ext'             => $filetype['ext'],
                'type'            => $filetype['type'],
                'proper_filename' => $data['proper_filename']
            ];

        }

        /**
         * Check file type to add SVG support
         *
        */
        public function base_theme_cc_mime_types( $mimes ){
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }

        /**
         * Check file type to add SVG support
         *
        */
        public function base_theme_fix_svg() {
            echo '<style type="text/css">
                    .attachment-266x266, .thumbnail img {
                        width: 100% !important;
                        height: auto !important;
                    }
                    </style>';
        }

    }
    
}
new Base_Theme_Custom_Theme_Functions();
?>