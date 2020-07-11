<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$timber = new Timber\Timber();

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber\Timber::$dirname = [ 'templates', 'views' ];

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber\Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
  /** Add timber support. */
  public function __construct() {
    add_action( 'after_setup_theme', [ $this, 'theme_supports' ] );
    add_filter( 'timber/context', [ $this, 'add_to_context' ] );
    add_filter( 'timber/twig', [ $this, 'add_to_twig' ] );
    add_action( 'init', [ $this, 'register_post_types' ] );
    add_action( 'init', [ $this, 'register_taxonomies' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
    parent::__construct();
  }
  /** This is where you can register custom post types. */
  public function register_post_types() {

  }
  /** This is where you can register custom taxonomies. */
  public function register_taxonomies() {

  }

  /** This is where you add some context
   *
   * @param string $context context['this'] Being the Twig's {{ this }}.
   */
  public function add_to_context( $context ) {
    $context['foo']   = 'bar';
    $context['stuff'] = 'I am a value set in your functions.php file';
    $context['notes'] = 'These values are available everytime you call Timber::context();';
    $context['menu']  = new Timber\Menu();
    $context['site']  = $this;
    return $context;
  }

  public function theme_supports() {
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

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      [
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      ]
    );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support(
      'post-formats',
      [
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
      ]
    );

    add_theme_support( 'menus' );
  }


  public function enqueue_scripts() {
    wp_enqueue_script( 'index', get_file_uri('/dist/index.js'), null, get_file_version_string('/dist/index.js') );
  }

  public function enqueue_styles() {
    wp_enqueue_style( 'styles', get_file_uri('/dist/styles.css'), null, get_file_version_string('/dist/styles.css') );
  }

  /** This is where you can add your own functions to twig.
   *
   * @param Twig $twig get extension.
   */
  public function add_to_twig( $twig ) {
    $twig->addExtension( new Twig\Extension\StringLoaderExtension() );
    $twig->addFilter( new Twig\TwigFilter( 'myfoo', [ $this, 'myfoo' ] ) );
    return $twig;
  }

}

new StarterSite();

/**
 * Helper functions
 */

function get_file_uri(string $filename) {
  return get_stylesheet_directory_uri() . $filename;
}

function get_file_version_string(string $filename) {
  return filemtime(get_stylesheet_directory() . "/{$filename}");
}
