<?php

if ( ! class_exists('JCMartim_Configuration_Data_Settings') ) {
    class JCMartim_Configuration_Data_Settings {

        public static $options_1 = [];
        public static $options_2 = [];
        public static $options_3 = [];
        public static $options_4 = [];
        public static $options_5 = [];

        public function __construct()
        {
            // Nome da chave no banco de dados
            self::$options_1 = get_option('jcmartim_configuration_data_options_1');
            self::$options_2 = get_option('jcmartim_configuration_data_options_2');
            self::$options_3 = get_option('jcmartim_configuration_data_options_3');
            self::$options_4 = get_option('jcmartim_configuration_data_options_4');
            self::$options_5 = get_option('jcmartim_configuration_data_options_5');
            add_action( 'admin_init', [$this, 'jcmartim_configuration_data_admin_init'] );
        }

         /**
         * Método que cria as seções e campos da página de adminstração.
         */
        public function jcmartim_configuration_data_admin_init()
        {
            register_setting( //Registra a chave que deve guardar todas as informações no banco de dados.
                $option_group = 'jcmartim_configuration_data_group_1',                // Grupo ( usado em settings_field na page view )
                $option_name = 'jcmartim_configuration_data_options_1',               // Nome da chave (mesma da "get_option acima").           
                $args = [$this, 'jcmartim_configuration_data_options_sinitize_1'],    // Callback para fazer as devidas validações dos campos.
            );

            register_setting( //Registra a chave que deve guardar todas as informações no banco de dados.
                $option_group = 'jcmartim_configuration_data_group_2',                // Grupo ( usado em settings_field na page view )
                $option_name = 'jcmartim_configuration_data_options_2',               // Nome da chave (mesma da "get_option acima").           
                $args = [$this, 'jcmartim_configuration_data_options_sinitize_2'],    // Callback para fazer as devidas validações dos campos.
            );

            register_setting( //Registra a chave que deve guardar todas as informações no banco de dados.
                $option_group = 'jcmartim_configuration_data_group_3',                // Grupo ( usado em settings_field na page view )
                $option_name = 'jcmartim_configuration_data_options_3',               // Nome da chave (mesma da "get_option acima").           
                $args = [$this, 'jcmartim_configuration_data_options_sinitize_3'],    // Callback para fazer as devidas validações dos campos.
            );

            register_setting( //Registra a chave que deve guardar todas as informações no banco de dados.
                $option_group = 'jcmartim_configuration_data_group_4',                // Grupo ( usado em settings_field na page view )
                $option_name = 'jcmartim_configuration_data_options_4',               // Nome da chave (mesma da "get_option acima").           
                $args = [$this, 'jcmartim_configuration_data_options_sinitize_4'],    // Callback para fazer as devidas validações dos campos.
            );

            register_setting( //Registra a chave que deve guardar todas as informações no banco de dados.
                $option_group = 'jcmartim_configuration_data_group_5',                // Grupo ( usado em settings_field na page view )
                $option_name = 'jcmartim_configuration_data_options_5',               // Nome da chave (mesma da "get_option acima").           
                $args = [$this, 'jcmartim_configuration_data_options_sinitize_5'],    // Callback para fazer as devidas validações dos campos.
            );

            /**
             * Seções
             */
            //Primeira Seção
            add_settings_section(
                $id = 'jcmartim_configuration_data_business',
                $title = esc_html__( 'Enter the business data', 'jcmartim-configuration-data' ),
                $callback = [$this, 'jcmartim_configuration_data_business_explanation'],
                $page = 'jcmartim_configuration_data_page_business'
            );
            //Segunda Seção
            add_settings_section(
                $id = 'jcmartim_configuration_data_social_media',
                $title = esc_html__( 'Enter your social media links', 'jcmartim-configuration-data' ),
                $callback = null,
                $page = 'jcmartim_configuration_data_page_social_media'
            );
            //Terceira Seção
            add_settings_section(
                $id = 'jcmartim_configuration_data_external',
                $title = esc_html__( 'Links and external keys', 'jcmartim-configuration-data' ),
                $callback = [$this, 'jcmartim_configuration_data_external_calback'],
                $page = 'jcmartim_configuration_data_page_external'
            );
            //Quarta Seção
            add_settings_section(
                $id = 'jcmartim_configuration_data_footer',
                $title = esc_html__( 'Footer data', 'jcmartim-configuration-data' ),
                $callback = [$this, 'jcmartim_configuration_data_footer_calback'],
                $page = 'jcmartim_configuration_data_page_footer'
            );
            //Quinta Seção
            add_settings_section(
                $id = 'jcmartim_configuration_data_contacts',
                $title = esc_html__( 'Contacts data', 'jcmartim-configuration-data' ),
                $callback = [$this, 'jcmartim_configuration_data_contacts_calback'],
                $page = 'jcmartim_configuration_data_page_contacts'
            );
            /**
             * Campos
             */
            //Campos da primeira página
            add_settings_field( //Campo nome da empresa
                $id = 'jcmartim_configuration_data_mycompany_name',
                $title = esc_html__('Company Name', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_mycompany_name_callback'],
                $page = 'jcmartim_configuration_data_page_business',
                $section = 'jcmartim_configuration_data_business',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_mycompany_name',
                    'shortcode' => '[configuration data="mycompany"]'
                ]
            );
            add_settings_field( //Campo CNPJ
                $id = 'jcmartim_configuration_data_cnpj',
                $title = esc_html__('CNPJ', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_cnpj_callback'],
                $page = 'jcmartim_configuration_data_page_business',
                $section = 'jcmartim_configuration_data_business',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_cnpj',
                    'shortcode' => '[configuration data="cnpj"]'
                ]
            );
            add_settings_field( //Campo Endereço
                $id = 'jcmartim_configuration_data_address',
                $title = esc_html__('Address', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_address_callback'],
                $page = 'jcmartim_configuration_data_page_business',
                $section = 'jcmartim_configuration_data_business',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_address',
                    'shortcode' => '[configuration data="address"]'
                ]
            );
            //Campos da segunda página
            add_settings_field( //Facebook
                $id = 'jcmartim_configuration_data_facebook',
                $title = esc_html__('Facebook page link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_facebook_callback'],
                $page = 'jcmartim_configuration_data_page_social_media',
                $section = 'jcmartim_configuration_data_social_media',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_facebook',
                    'shortcode' => '[configuration data="facebook"]'
                ]
            );
            add_settings_field( //Instagram
                $id = 'jcmartim_configuration_data_instagram',
                $title = esc_html__('Instagram link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_instagram_callback'],
                $page = 'jcmartim_configuration_data_page_social_media',
                $section = 'jcmartim_configuration_data_social_media',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_instagram',
                    'shortcode' => '[configuration data="instagram"]'
                ]
            );
            add_settings_field( //Twitter
                $id = 'jcmartim_configuration_data_twitter',
                $title = esc_html__('Twitter link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_twitter_callback'],
                $page = 'jcmartim_configuration_data_page_social_media',
                $section = 'jcmartim_configuration_data_social_media',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_twitter',
                    'shortcode' => '[configuration data="twitter"]'
                ]
            );
            add_settings_field( //Linkedin
                $id = 'jcmartim_configuration_data_linkedin',
                $title = esc_html__('Linkedin link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_linkedin_callback'],
                $page = 'jcmartim_configuration_data_page_social_media',
                $section = 'jcmartim_configuration_data_social_media',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_linkedin',
                    'shortcode' => '[configuration data="linkedin"]'
                ]
            );
            add_settings_field( //Pinterest
                $id = 'jcmartim_configuration_data_pinterest',
                $title = esc_html__('Pinterest link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_pinterest_callback'],
                $page = 'jcmartim_configuration_data_page_social_media',
                $section = 'jcmartim_configuration_data_social_media',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_pinterest',
                    'shortcode' => '[configuration data="pinterest"]'
                ]
            );
            add_settings_field( //Youtube
                $id = 'jcmartim_configuration_data_youtube',
                $title = esc_html__('Youtube link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_youtube_callback'],
                $page = 'jcmartim_configuration_data_page_social_media',
                $section = 'jcmartim_configuration_data_social_media',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_youtube',
                    'shortcode' => '[configuration data="youtube"]'
                ]
            );
            //Campos da terceira página
            add_settings_field( //Link externo para outro site
                $id = 'jcmartim_configuration_data_external_link',
                $title = esc_html__('Link to the page of an external service', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_external_link_callback'],
                $page = 'jcmartim_configuration_data_page_external',
                $section = 'jcmartim_configuration_data_external',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_external_link',
                    'shortcode' => '[configuration data="external-page-link"]'
                ]
            );
            add_settings_field( //Facebook Pixel 
                $id = 'jcmartim_configuration_data_pixel',
                $title = esc_html__('Facebook Pixel ID', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_pixel_callback'],
                $page = 'jcmartim_configuration_data_page_external',
                $section = 'jcmartim_configuration_data_external',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_pixel',
                    'shortcode' => '[configuration data="pixel"]'
                ]
            );
            add_settings_field( //Google Analytics
                $id = 'jcmartim_configuration_data_analytics',
                $title = esc_html__('Google Analytics ID', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_analytics_callback'],
                $page = 'jcmartim_configuration_data_page_external',
                $section = 'jcmartim_configuration_data_external',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_analytics',
                    'shortcode' => '[configuration data="analytics"]'
                ]
            );
            //Campos da quarta página
            add_settings_field( //Rodapé
                $id = 'jcmartim_configuration_data_footer_column_1',
                $title = esc_html__('Column footer 1', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_footer_column_1_callback'],
                $page = 'jcmartim_configuration_data_page_footer',
                $section = 'jcmartim_configuration_data_footer',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_footer_column_1',
                    'shortcode' => '[configuration data="footer_column_1"]'
                ]
            );
            add_settings_field( //Rodapé
                $id = 'jcmartim_configuration_data_footer_column_2',
                $title = esc_html__('Column footer 2', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_footer_column_2_callback'],
                $page = 'jcmartim_configuration_data_page_footer',
                $section = 'jcmartim_configuration_data_footer',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_footer_column_2',
                    'shortcode' => '[configuration data="footer_column_2"]'
                ]
            );
            add_settings_field( //Rodapé
                $id = 'jcmartim_configuration_data_footer_column_3',
                $title = esc_html__('Column footer 3', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_footer_column_3_callback'],
                $page = 'jcmartim_configuration_data_page_footer',
                $section = 'jcmartim_configuration_data_footer',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_footer_column_3',
                    'shortcode' => '[configuration data="footer_column_3"]'
                ]
            );
            add_settings_field( //Rodapé
                $id = 'jcmartim_configuration_data_footer_column_4',
                $title = esc_html__('Column footer 4', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_footer_column_4_callback'],
                $page = 'jcmartim_configuration_data_page_footer',
                $section = 'jcmartim_configuration_data_footer',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_footer_column_4',
                    'shortcode' => '[configuration data="footer_column_4"]'
                ]
            );
            //Campos da quinta página
            add_settings_field( //Campo Telefone
                $id = 'jcmartim_configuration_data_tel',
                $title = esc_html__('Telephone', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_tel_callback'],
                $page = 'jcmartim_configuration_data_page_contacts',
                $section = 'jcmartim_configuration_data_contacts',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_tel',
                    'shortcode' => '[configuration data="tel"]'
                ]
            );
            add_settings_field( //Campo WhatApp
                $id = 'jcmartim_configuration_data_whatsapp',
                $title = esc_html__('WhatsApp Number', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_whatsapp_callback'],
                $page = 'jcmartim_configuration_data_page_contacts',
                $section = 'jcmartim_configuration_data_contacts',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_whatsapp',
                    'shortcode' => '[configuration data="whatsapp"]'
                ]
            );
            add_settings_field( //Campo Telegram
                $id = 'jcmartim_configuration_data_telegram',
                $title = esc_html__('Telegram link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_telegram_callback'],
                $page = 'jcmartim_configuration_data_page_contacts',
                $section = 'jcmartim_configuration_data_contacts',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_telegram',
                    'shortcode' => '[configuration data="telegram"]'
                ]
            );
            add_settings_field( //Campo Skype
                $id = 'jcmartim_configuration_data_skype',
                $title = esc_html__('Skype link', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_skype_callback'],
                $page = 'jcmartim_configuration_data_page_contacts',
                $section = 'jcmartim_configuration_data_contacts',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_skype',
                    'shortcode' => '[configuration data="skype"]'
                ]
            );
            add_settings_field( //Campo e-mail
                $id = 'jcmartim_configuration_data_email',
                $title = esc_html__('Email address', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_email_callback'],
                $page = 'jcmartim_configuration_data_page_contacts',
                $section = 'jcmartim_configuration_data_contacts',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_email',
                    'shortcode' => '[configuration data="email"]'
                ]
            );
        }
        //Texto explicativo das seções
        public function jcmartim_configuration_data_business_explanation()
        {
            ?>
            <p style="max-width: 600px;"><?php esc_html_e('How to do? Fill in the data for each field, save them by clicking on the "Save Settings" button. Okay, now copy the shortcodes that are below each corresponding field and paste where you need this information to appear in the website content, such as: website header, footer, sidebar, etc.', 'jcmartim-configuration-data') ?></p>
            <?php
        }
        public function jcmartim_configuration_data_external_calback()
        {
            ?>
            <p style="max-width: 600px;"><?php esc_html_e('Enter here with some external settings like links and service keys.', 'jcmartim-configuration-data') ?></p>
            <?php
        }
        public function jcmartim_configuration_data_footer_calback()
        {
            ?>
            <p style="max-width: 600px;"><?php esc_html_e('Enter the site footer content separated by columns.', 'jcmartim-configuration-data') ?></p>
            <?php
        }
        public function jcmartim_configuration_data_contacts_calback()
        {
            ?>
            <p style="max-width: 600px;"><?php esc_html_e('Enter your contact details.', 'jcmartim-configuration-data') ?></p>
            <?php
        }
        /**
         * Conteúdo dos campos.
         * PRIMEIRA SEÇÃO
         */
        //Nome da Empresa
        public function jcmartim_configuration_data_mycompany_name_callback( $args )
        {
            ?>
            <input
                type="text"
                placeholder="<?php esc_html_e('myCompany / business name', 'jcmartim-configuration-data'); ?>"
                name="jcmartim_configuration_data_options_1[jcmartim_configuration_data_mycompany_name]" 
                id="jcmartim_configuration_data_mycompany_name"
                value="<?php echo isset(self::$options_1['jcmartim_configuration_data_mycompany_name']) ? esc_html__(self::$options_1['jcmartim_configuration_data_mycompany_name'], 'jcmartim-configuration-data') : '' ?>""            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e('Shortcode in the business name for insertion into the website content.', 'jcmartim-configuration-data') ?></p>
            <?php
        }
        //CNPJ da Empresa
        public function jcmartim_configuration_data_cnpj_callback( $args )
        {
            ?>
            <input
                type="text"
                name="jcmartim_configuration_data_options_1[jcmartim_configuration_data_cnpj]" 
                placeholder="<?php esc_html_e('00.000.000/0000-00', 'jcmartim-configuration-data') ?>"
                id="jcmartim_configuration_data_cnpj"
                value="<?php echo isset(self::$options_1['jcmartim_configuration_data_cnpj']) ? esc_html__(self::$options_1['jcmartim_configuration_data_cnpj'], 'jcmartim-configuration-data') : '' ?>"            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("CNPJ shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Endereço da empresa
        public function jcmartim_configuration_data_address_callback( $args )
        {
            ?>
            <textarea 
                name="jcmartim_configuration_data_options_1[jcmartim_configuration_data_address]"
                placeholder="<?php esc_html_e('Complete address', 'jcmartim-configuration-data'); ?>"
                id="jcmartim_configuration_data_address" 
                cols="30" 
                rows="5"
            ><?php echo isset(self::$options_1['jcmartim_configuration_data_address']) ? esc_html__(self::$options_1['jcmartim_configuration_data_address'], 'jcmartim-configuration-data') : '' ?></textarea>
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Adrees shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        /**
         * Conteúdo dos campos.
         * SEGUNDA SESSÃO
         */
        //Facebook
        public function jcmartim_configuration_data_facebook_callback( $args )
        {
            ?>
            <input
                type="url"
                placeholder="https://www.facebook.com/mycompany"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_facebook]" 
                id="jcmartim_configuration_data_facebook"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_facebook']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_facebook'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Facebook page link shortcode for insertion into website content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Instagram
        public function jcmartim_configuration_data_instagram_callback( $args )
        {
            ?>
            <input
                type="url"
                placeholder="https://www.instagram.com/mycompany"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_instagram]" 
                id="jcmartim_configuration_data_instagram"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_instagram']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_instagram'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Instagram link shortcode for insertion into website content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Twitter
        public function jcmartim_configuration_data_twitter_callback( $args )
        {
            ?>
            <input
                type="url"
                placeholder="https://twitter.com/mycompany"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_twitter]" 
                id="jcmartim_configuration_data_twitter"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_twitter']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_twitter'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Twitter link shortcode for insertion into website content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Linkedin
        public function jcmartim_configuration_data_linkedin_callback($args)
        {
            ?>
            <input
                type="url"
                placeholder="https://www.linkedin.com/in/mycompany"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_linkedin]" 
                id="jcmartim_configuration_data_linkedin"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_linkedin']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_linkedin'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Linkedin link shortcode for insertion into website content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Pinterest
        public function jcmartim_configuration_data_pinterest_callback($args)
        {
            ?>
            <input
                type="url"
                placeholder="https://br.pinterest.com/mycompany"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_pinterest]" 
                id="jcmartim_configuration_data_pinterest"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_pinterest']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_pinterest'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Pinterest link shortcode for insertion into website content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Youtube
        public function jcmartim_configuration_data_youtube_callback($args)
        {
            ?>
            <input
                type="url"
                placeholder="https://www.youtube.com/channel/mycompany"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_youtube]" 
                id="jcmartim_configuration_data_youtube"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_youtube']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_youtube'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Youtube link shortcode for insertion into website content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        /**
         * Terceira seção
         */
        //Link para página externa
        public function jcmartim_configuration_data_external_link_callback($args)
        {
            ?>
            <input
                type="url"
                placeholder="https://www.page.com/subpage"
                name="jcmartim_configuration_data_options_3[jcmartim_configuration_data_external_link]" 
                id="jcmartim_configuration_data_external_link"
                value="<?php echo isset(self::$options_3['jcmartim_configuration_data_external_link']) ? esc_attr__(self::$options_3['jcmartim_configuration_data_external_link'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Enter here with a link to an external page.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        public function jcmartim_configuration_data_pixel_callback($args)
        {
            ?>
            <input
                type="number"
                placeholder="ID Pixel"
                name="jcmartim_configuration_data_options_3[jcmartim_configuration_data_pixel]" 
                id="jcmartim_configuration_data_pixel"
                value="<?php echo isset(self::$options_3['jcmartim_configuration_data_pixel']) ? esc_attr__(self::$options_3['jcmartim_configuration_data_pixel'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Paste the Facebook Pixel ID. E.g.: 463272213166527", "jcmartim-configuration-data") ?></p>
            <?php
        }
        public function jcmartim_configuration_data_analytics_callback($args)
        {
            ?>
            <input
                type="text"
                placeholder="ID Google Analytics"
                name="jcmartim_configuration_data_options_3[jcmartim_configuration_data_analytics]" 
                id="jcmartim_configuration_data_analytics"
                value="<?php echo isset(self::$options_3['jcmartim_configuration_data_analytics']) ? esc_attr__(self::$options_3['jcmartim_configuration_data_analytics'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Paste the Google Analytics ID. E.g.: G-XX3ZCML7LK", "jcmartim-configuration-data") ?></p>
            <?php
        }
        /**
         * Quarta Seção
         */
        public function jcmartim_configuration_data_footer_column_1_callback($args)
        {
            ?>
            <textarea 
                name="jcmartim_configuration_data_options_4[jcmartim_configuration_data_footer_column_1]"
                id="jcmartim_configuration_data_footer_column_1" 
                cols="50" 
                rows="8"
            ><?php echo isset(self::$options_4['jcmartim_configuration_data_footer_column_1']) ? 
            esc_html__(self::$options_4['jcmartim_configuration_data_footer_column_1'], 'jcmartim-configuration-data') : '' ?></textarea>
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Column 1 Contents.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        public function jcmartim_configuration_data_footer_column_2_callback($args)
        {
            ?>
            <textarea 
                name="jcmartim_configuration_data_options_4[jcmartim_configuration_data_footer_column_2]"
                id="jcmartim_configuration_data_footer_column_2" 
                cols="50" 
                rows="8"
            ><?php echo isset(self::$options_4['jcmartim_configuration_data_footer_column_2']) ? 
            esc_html__(self::$options_4['jcmartim_configuration_data_footer_column_2'], 'jcmartim-configuration-data') : '' ?></textarea>
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Column 2 Contents.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        public function jcmartim_configuration_data_footer_column_3_callback($args)
        {
            ?>
            <textarea 
                name="jcmartim_configuration_data_options_4[jcmartim_configuration_data_footer_column_3]"
                id="jcmartim_configuration_data_footer_column_3" 
                cols="50" 
                rows="8"
            ><?php echo isset(self::$options_4['jcmartim_configuration_data_footer_column_3']) ? 
            esc_html__(self::$options_4['jcmartim_configuration_data_footer_column_3'], 'jcmartim-configuration-data') : '' ?></textarea>
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Column 3 Contents.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        public function jcmartim_configuration_data_footer_column_4_callback($args)
        {
            ?>
            <textarea 
                name="jcmartim_configuration_data_options_4[jcmartim_configuration_data_footer_column_4]"
                id="jcmartim_configuration_data_footer_column_4" 
                cols="50" 
                rows="8"
            ><?php echo isset(self::$options_4['jcmartim_configuration_data_footer_column_4']) ? 
            esc_html__(self::$options_4['jcmartim_configuration_data_footer_column_4'], 'jcmartim-configuration-data') : '' ?></textarea>
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Column 4 Contents.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        /**
         * Quinta seção
         */
        //Telefone da empresa
        public function jcmartim_configuration_data_tel_callback( $args )
        {
            ?>
            <input
                type="text"
                placeholder="<?php esc_html_e('(00) 00000-0000', 'jcmartim-configuration-data'); ?>"
                name="jcmartim_configuration_data_options_5[jcmartim_configuration_data_tel]" 
                id="jcmartim_configuration_data_tel"
                value="<?php echo isset(self::$options_5['jcmartim_configuration_data_tel']) ? esc_html__(self::$options_5['jcmartim_configuration_data_tel'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Telephone shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Número do WhatsApp
        public function jcmartim_configuration_data_whatsapp_callback( $args )
        {
            ?>
            <input
                type="number"
                placeholder="00000000000"
                name="jcmartim_configuration_data_options_5[jcmartim_configuration_data_whatsapp]" 
                id="jcmartim_configuration_data_whatsapp"
                value="<?php echo isset(self::$options_5['jcmartim_configuration_data_whatsapp']) ? esc_html__(self::$options_5['jcmartim_configuration_data_whatsapp'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("WhatsApp shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Telegram
        public function jcmartim_configuration_data_telegram_callback($args)
        {
            ?>
            <input
                type="url"
                placeholder="https://t.me/mycompany"
                name="jcmartim_configuration_data_options_5[jcmartim_configuration_data_telegram]" 
                id="jcmartim_configuration_data_telegram"
                value="<?php echo isset(self::$options_5['jcmartim_configuration_data_telegram']) ? esc_html__(self::$options_5['jcmartim_configuration_data_telegram'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Telegram shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Skype
        public function jcmartim_configuration_data_skype_callback($args)
        {
            ?>
            <input
                type="url"
                placeholder="https://join.skype.com/invite/sGjbM8VYz6vb"
                name="jcmartim_configuration_data_options_5[jcmartim_configuration_data_skype]" 
                id="jcmartim_configuration_data_skype"
                value="<?php echo isset(self::$options_5['jcmartim_configuration_data_skype']) ? esc_html__(self::$options_5['jcmartim_configuration_data_skype'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Skype shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        public function jcmartim_configuration_data_email_callback($args)
        {
            ?>
            <input
                type="email"
                placeholder="contact@mycompany.com"
                name="jcmartim_configuration_data_options_5[jcmartim_configuration_data_email]" 
                id="jcmartim_configuration_data_email"
                value="<?php echo isset(self::$options_5['jcmartim_configuration_data_email']) ? esc_html__(self::$options_5['jcmartim_configuration_data_email'], 'jcmartim-configuration-data') : '' ?>"
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Email shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }

        /**
         * Método para satatização dos campos.
         *
         * @param array $fields
         * @return void
         */
        public function jcmartim_configuration_data_options_sinitize_1($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_configuration_data_mycompany_name':
                        if( empty( $value ) ) {
                            add_settings_error(
                                'jcmartim_configuration_data_options_1', // ID da classe de settings.
                                'jcmartim-configuration-data-message', // Classe a ser adicionada ao html da mensagem.
                                $message = esc_html__('Please! Fill in the mycompany name field.', 'jcmartim-configuration-data'), // Mensagem de sucesso!
                                'error' // Tipo de mensagem.
                            );
                        } else {
                            $field_sanitize[$key] = sanitize_text_field($value);
                        }
                        break;
                    case 'jcmartim_configuration_data_cnpj':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_configuration_data_address':
                        if( empty( $value ) ) {
                            add_settings_error(
                                'jcmartim_configuration_data_options_1', // ID da classe de settings.
                                'jcmartim-configuration-data-message', // Classe a ser adicionada ao html da mensagem.
                                $message = esc_html__('Please! Fill in the mycompany address field.', 'jcmartim-configuration-data'), // Mensagem de sucesso!
                                'error' // Tipo de mensagem.
                            );
                        } else {
                            $field_sanitize[$key] = sanitize_text_field($value);
                        }
                        break;
                }
            }
            return $field_sanitize;
        }

        public function jcmartim_configuration_data_options_sinitize_2($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_configuration_data_facebook':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_instagram':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_twitter':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_linkedin':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_pinterest':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_youtube':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    default :
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                }
            }
            return $field_sanitize;
        }
        public function jcmartim_configuration_data_options_sinitize_3($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_configuration_data_external_link':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_pixel':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_configuration_data_analytics':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    default :
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                }
            }
            return $field_sanitize;
        }
        public function jcmartim_configuration_data_options_sinitize_4($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_configuration_data_footer_column_1':
                        $field_sanitize[$key] = sanitize_textarea_field($value);
                        break;
                    case 'jcmartim_configuration_data_footer_column_2':
                        $field_sanitize[$key] = sanitize_textarea_field($value);
                        break;
                    case 'jcmartim_configuration_data_footer_column_3':
                        $field_sanitize[$key] = sanitize_textarea_field($value);
                        break;
                    case 'jcmartim_configuration_data_footer_column_4':
                        $field_sanitize[$key] = sanitize_textarea_field($value);
                        break;
                    default :
                        $field_sanitize[$key] = sanitize_textarea_field($value);
                        break;
                }
            }
            return $field_sanitize;
        }
        public function jcmartim_configuration_data_options_sinitize_5($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_configuration_data_tel':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_configuration_data_whatsapp':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_configuration_data_telegram':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_skype':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_email':
                        $field_sanitize[$key] = sanitize_email($value);
                        break;
                    default :
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                }
            }
            return $field_sanitize;
        }

    }
}