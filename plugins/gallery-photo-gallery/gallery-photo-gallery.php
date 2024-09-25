<?php
ob_start();
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ays-pro.com/
 * @since             1.0.0
 * @package           Gallery_Photo_Gallery
 *
 * @wordpress-plugin
 * Plugin Name:       Gallery - Photo Gallery
 * Plugin URI:        https://ays-pro.com/wordpress/photo-gallery
 * Description:       If you want to be different and represent your photos in a cool way, then our Photo Gallery plugin is perfect for you.
 * Version:           5.8.4
 * Author:            Photo Gallery Team
 * Author URI:        https://ays-pro.com/
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gallery-photo-gallery
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( ! defined( 'AYS_GPG_BASE_URL' ) ) {
    define( 'AYS_GPG_BASE_URL', plugin_dir_url(__FILE__ ) );
}

if( ! defined( 'AYS_GPG_DIR' ) )
    define( 'AYS_GPG_DIR', plugin_dir_path( __FILE__ ) );

if( ! defined( 'AYS_GPG_ADMIN_URL' ) ) {
    define( 'AYS_GPG_ADMIN_URL', plugin_dir_url(__FILE__ ) . 'admin/' );
}


if( ! defined( 'AYS_GPG_PUBLIC_URL' ) ) {
    define( 'AYS_GPG_PUBLIC_URL', plugin_dir_url(__FILE__ ) . 'public/' );
}

if( ! defined( 'AYS_GPG_BASENAME' ) )
    define( 'AYS_GPG_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AYS_GALLERY_VERSION', '5.8.4' );
define( 'AYS_GALLERY_NAME_VERSION', '5.8.4' );
define( 'AYS_GALLERY_NAME', 'gallery-photo-gallery' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gallery-photo-gallery-activator.php
 */
function activate_gallery_photo_gallery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gallery-photo-gallery-activator.php';
	Gallery_Photo_Gallery_Activator::ays_gallery_db_check();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gallery-photo-gallery-deactivator.php
 */
function deactivate_gallery_photo_gallery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gallery-photo-gallery-deactivator.php';
	Gallery_Photo_Gallery_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gallery_photo_gallery' );
register_deactivation_hook( __FILE__, 'deactivate_gallery_photo_gallery' );

add_action( 'plugins_loaded', 'activate_gallery_photo_gallery' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gallery-photo-gallery.php';


require plugin_dir_path( __FILE__ ) . 'gallery/gallery-photo-gallery-block.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gallery_photo_gallery() {
    // add_action( 'activated_plugin', 'gallery_p_gallery_activation_redirect_method' );
    add_action( 'admin_notices', 'general_gpg_admin_notice' );
	$plugin = new Gallery_Photo_Gallery();
	$plugin->run();

}

function gpg_get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function gallery_p_gallery_activation_redirect_method( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=' . AYS_GALLERY_NAME ) ) );
    }
}
function general_gpg_admin_notice(){
    if ( isset($_GET['page']) && strpos($_GET['page'], AYS_GALLERY_NAME) !== false ) {
        ?>
            <div class="ays-notice-banner">
                <div class="navigation-bar">
                    <div id="navigation-container">                        
                        <div class="ays-gpg-logo-container-upgrade">
                            <div class="ays-gpg-logo-container">
                                <a href="https://ays-pro.com/wordpress/photo-gallery" target="_blank" style="box-shadow: none;">
                                    <img  class="gpg-logo" src="<?php echo esc_attr(AYS_GPG_ADMIN_URL) . '/images/gallery.png'; ?>" alt="<?php echo __( "Gallery - Photo Gallery", AYS_GALLERY_NAME ); ?>" title="<?php echo __( "Gallery - Photo Gallery", AYS_GALLERY_NAME ); ?>"/>
                                </a>
                            </div>
                            <div class="ays-gpg-upgrade-container">
                                <a href="https://ays-pro.com/wordpress/photo-gallery?utm_source=dashboard-gallery&utm_medium=free-gallery&utm_campaign=top-menu-gallery" target="_blank">                                    
                                    <img src="<?php echo esc_attr(AYS_GPG_ADMIN_URL) . '/images/icons/lightning-hover.svg'; ?>" >
                                    <span><?php echo __( "Upgrade", AYS_GALLERY_NAME ); ?></span>
                                </a>
                                <span class="ays-gpg-logo-container-one-time-text"><?php echo __( "One-time payment", 'photo-gallery' ); ?></span>
                            </div>
                        </div>
                        <ul id="menu">                            
                            <li class="modile-ddmenu-lg"><a class="ays-btn" href="https://ays-demo.com/wordpress-photo-gallery-plugin-free-demo/" target="_blank">Demo</a></li>
                            <li class="modile-ddmenu-lg"><a class="ays-btn" href="https://wordpress.org/support/plugin/gallery-photo-gallery/" target="_blank">Free Support</a></li>
                            <li class="modile-ddmenu-xs make_a_suggestion"><a class="ays-btn" href="https://ays-demo.com/gallery-plugin-survey/" target="_blank">Make a Suggestion</a></li>
                            <li class="modile-ddmenu-lg"><a class="ays-btn" href="https://wordpress.org/support/plugin/gallery-photo-gallery/" target="_blank">Contact us</a></li>
                            <li class="modile-ddmenu-md">
                                <a class="toggle_ddmenu" href="javascript:void(0);"><i class="fa ays_fa_ellipsis_h"></i></a>
                                <ul class="ddmenu" data-expanded="false">                                
                                    <li><a class="ays-btn" href="https://ays-demo.com/wordpress-photo-gallery-plugin-free-demo/" target="_blank">Demo</a></li>
                                    <li><a class="ays-btn" href="https://wordpress.org/support/plugin/gallery-photo-gallery/" target="_blank">Free Support</a></li>
                                    <li><a class="ays-btn" href="https://wordpress.org/support/plugin/gallery-photo-gallery/" target="_blank">Contact us</a></li>
                                </ul>
                            </li>
                            <li class="modile-ddmenu-sm">
                                <a class="toggle_ddmenu" href="javascript:void(0);"><i class="fa ays_fa_ellipsis_h"></i></a>
                                <ul class="ddmenu" data-expanded="false">
                                    <li><a class="ays-btn" href="https://ays-demo.com/wordpress-photo-gallery-plugin-free-demo/" target="_blank">Demo</a></li>
                                    <li><a class="ays-btn" href="https://wordpress.org/support/plugin/gallery-photo-gallery/" target="_blank">Free Support</a></li>
                                    <li class="make_a_suggestion"><a class="ays-btn" href="https://ays-demo.com/gallery-plugin-survey/" target="_blank">Make a Suggestion</a></li>
                                    <li><a class="ays-btn" href="https://wordpress.org/support/plugin/gallery-photo-gallery/" target="_blank">Contact us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ays_ask_question_content">
                <div class="ays_ask_question_content_inner">
                    <a href="https://wordpress.org/support/plugin/gallery-photo-gallery/" class="ays_gpg_question_link" target="_blank">
                        <span class="ays-ask-question-content-inner-question-mark-text">?</span>
                        <span class="ays-ask-question-content-inner-hidden-text">Ask a question</span>
                    </a>

                </div>
            </div>
        <?php
    }
}

run_gallery_photo_gallery();
