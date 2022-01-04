<?php

/**
 * JCMartim Configuration Data
 *
 * @package             JCMARTIM-CONFIGURATION-DATA
 * @author              JCMartim
 * @license             gplv2
 * @version             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:         JCMartim Configuration Data
 * Plugin URI:          https://jcmartim.site/plugins/jcmartim-configuration-data
 * Description:         This plugin helps to configure the basic information of the site that should be shown in the font-end, such as: e-mail, link to social networks, address, telephone, etc.
 * Version:             1.0.0
 * Author:              JCMartim
 * Author URI:          https://www.jcmartim.site/
 * Requires at least:   4.7
 * Tested up to:        5.8.2
 * Requires PHP:        7.3
 * Text Domain:         jcmartim-configuration-data
 * Domain Path:         /languages
 * License:             GPLv2
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Site Config. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

if ( ! class_exists('JCMartim_Configuration_Data')) {
    class JCMartim_Configuration_Data
    {
        function __construct()
        {   
            //Instancia as constantes
            $this->define_constants();

            //
            $this->load_textdomain();

            //Front-end do plugin;
            add_action('admin_menu', [ $this, 'jcmartim_configuration_data_admin_menu' ]);

            //Classe de configurações do plugin.
            require_once(JCMARTIM_CONFIGATION_DATA_PATH . 'class.jcmartim-configuration-data-settings.php');
            new JCMartim_Configuration_Data_Settings();

            //Classe de shortcodes
            require_once(JCMARTIM_CONFIGATION_DATA_PATH . 'shortcodes/class.jcmartim-configuration-data-shortcode.php');
            new JCMartim_Configuration_Data_Shortcode();
        }

        /**
         * Define as constantes do plugin.
         */
        public function define_constants()
        {
            define('JCMARTIM_CONFIGATION_DATA_PATH', plugin_dir_path(__FILE__));
            define('JCMARTIM_CONFIGATION_DATA', plugin_dir_url(__FILE__));
            define('JCMARTIM_CONFIGATION_DATA_VERSION', '1.0.0');
        }

        /**
         * Método de ativação do plugin.
         */
        public static function activate()
        {   
            update_option('rewrite_rules', '');
        }

        /**
         * Método de desativação do plugin.
         */
        public static function deactivation()
        {
            flush_rewrite_rules();
        }

        /**
         * Método de desinstalação do plugin.
         */
        public static function uninstall()
        {
            # code...
        }

        /**
         * Método para carregar os arquivos de tradução do plugin.
         *
         * @return void
         */
        public function load_textdomain()
        {
            load_plugin_textdomain(
                $domain = 'jcmartim-configuration-data', 
                $deprecated = false, 
                $plugin_rel_path = dirname(plugin_basename(__FILE__)) . '/languages/'
            );
        }
        
        /**
         * Método de configuração do menu e página do plugin.
         *
         * @return void
         */
        public function jcmartim_configuration_data_admin_menu()
        {
            add_menu_page(
                $page_title = esc_html__('Configuration Data', 'jcmartim-configuration-data'),
                $menu_title = esc_html__('Configuration Data', 'jcmartim-configuration-data'),
                $capability = 'edit_pages',
                $menu_slug = 'configuration-data',
                $function = [$this, 'jcmartim_configuration_page'],
                $icon_url = 'dashicons-admin-generic'
            );
        }
        public function jcmartim_configuration_page()
        {
            //Verifica se o usuário possue permisão para acessar a página.
            if (!current_user_can('edit_pages')) {
                wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'jcmartim-configuration-data'));
            }

            //Importa a classe de configurações.
            require_once(JCMARTIM_CONFIGATION_DATA_PATH . 'views/jcmartim-configuration-data-view.php');
        }

    }
}

if (class_exists('JCMartim_Configuration_Data')) {

    //Canha os métodos de ativação, desativação e desinstalação.
    register_activation_hook( __FILE__, ['JCMartim_Configuration_Data', 'activate'] );
    register_deactivation_hook( __FILE__, ['JCMartim_Configuration_Data', 'deactivation'] );
    register_uninstall_hook( __FILE__, ['JCMartim_Configuration_Data', 'uninstall'] );

    //Instância a classe pricipal do plugin.
    $site_config = new JCMartim_Configuration_Data();

}
