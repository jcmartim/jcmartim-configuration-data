<?php

if ( ! class_exists('JCMartim_Configuration_Data_Settings') ) {
    class JCMartim_Configuration_Data_Settings {

        public static $options_1 = [];
        public static $options_2 = [];
        public static $options_3 = [];

        public function __construct()
        {
            // Nome da chave no banco de dados
            self::$options_1 = get_option('jcmartim_configuration_data_options_1');
            self::$options_2 = get_option('jcmartim_configuration_data_options_2');
            self::$options_3 = get_option('jcmartim_configuration_data_options_3');
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
            /**
             * Campos
             */
            //Campos da primeira página
            add_settings_field( //Campo nome da empresa
                $id = 'jcmartim_configuration_data_company_name',
                $title = esc_html__('Company Name', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_company_name_callback'],
                $page = 'jcmartim_configuration_data_page_business',
                $section = 'jcmartim_configuration_data_business',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_company_name',
                    'shortcode' => '[configuration data="company"]'
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
            add_settings_field( //Campo Telefone
                $id = 'jcmartim_configuration_data_tel',
                $title = esc_html__('Telephone', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_tel_callback'],
                $page = 'jcmartim_configuration_data_page_business',
                $section = 'jcmartim_configuration_data_business',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_tel',
                    'shortcode' => '[configuration data="tel"]'
                ]
            );
            add_settings_field( //Campo WhatApp
                $id = 'jcmartim_configuration_data_whatsapp',
                $title = esc_html__('WhatsApp Number', 'jcmartim-configuration-data'),
                $callback = [$this, 'jcmartim_configuration_data_whatsapp_callback'],
                $page = 'jcmartim_configuration_data_page_business',
                $section = 'jcmartim_configuration_data_business',
                $args = [
                    'label_for' => 'jcmartim_configuration_data_whatsapp',
                    'shortcode' => '[configuration data="whatsapp"]'
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


        }
        //Texto ecplicativo da premeira seção.
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
        /**
         * Conteúdo dos campos.
         * PRIMEIRA SEÇÃO
         */
        //Nome da Empresa
        public function jcmartim_configuration_data_company_name_callback( $args )
        {
            ?>
            <input
                type="text"
                placeholder="<?php esc_html_e('Company / business name', 'jcmartim-configuration-data'); ?>"
                name="jcmartim_configuration_data_options_1[jcmartim_configuration_data_company_name]" 
                id="jcmartim_configuration_data_company_name"
                value="<?php echo isset(self::$options_1['jcmartim_configuration_data_company_name']) ? esc_html__(self::$options_1['jcmartim_configuration_data_company_name'], 'jcmartim-configuration-data') : '' ?>""
                <?php echo  empty(self::$options_1['jcmartim_configuration_data_company_name']) ? 'style="border-color:red"' : 'style="border-color:green"'; ?>
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e('Short code in the business name for insertion into the website content.', 'jcmartim-configuration-data') ?></p>
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
                value="<?php echo isset(self::$options_1['jcmartim_configuration_data_cnpj']) ? esc_html__(self::$options_1['jcmartim_configuration_data_cnpj'], 'jcmartim-configuration-data') : '' ?>"
                <?php echo empty(self::$options_1['jcmartim_configuration_data_cnpj']) ? '"' : 'style="border-color:green"'; ?>
            />
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
                <?php echo  empty(self::$options_1['jcmartim_configuration_data_address']) ? 'style="border-color:red"' : 'style="border-color:green"'; ?>
            ><?php echo isset(self::$options_1['jcmartim_configuration_data_address']) ? esc_html__(self::$options_1['jcmartim_configuration_data_address'], 'jcmartim-configuration-data') : '' ?></textarea>
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Adrees shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
            <?php
        }
        //Telefone da empresa
        public function jcmartim_configuration_data_tel_callback( $args )
        {
            ?>
            <input
                type="text"
                placeholder="<?php esc_html_e('(00) 00000-0000', 'jcmartim-configuration-data'); ?>"
                name="jcmartim_configuration_data_options_1[jcmartim_configuration_data_tel]" 
                id="jcmartim_configuration_data_tel"
                value="<?php echo isset(self::$options_1['jcmartim_configuration_data_tel']) ? esc_html__(self::$options_1['jcmartim_configuration_data_tel'], 'jcmartim-configuration-data') : '' ?>"
                <?php echo empty(self::$options_1['jcmartim_configuration_data_tel']) ? 'style="border-color:red"' : 'style="border-color:green"'; ?>
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
                name="jcmartim_configuration_data_options_1[jcmartim_configuration_data_whatsapp]" 
                id="jcmartim_configuration_data_whatsapp"
                value="<?php echo isset(self::$options_1['jcmartim_configuration_data_whatsapp']) ? esc_html__(self::$options_1['jcmartim_configuration_data_whatsapp'], 'jcmartim-configuration-data') : '' ?>"
                <?php echo empty(self::$options_1['jcmartim_configuration_data_whatsapp']) ? 'style="border-color:red"' : 'style="border-color:green"'; ?>
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("WhatsApp shortcode for insertion in the website's content.", "jcmartim-configuration-data") ?></p>
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
                placeholder="https://www.facebook.com/company"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_facebook]" 
                id="jcmartim_configuration_data_facebook"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_facebook']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_facebook'], 'jcmartim-configuration-data') : '' ?>"
                <?php echo empty(self::$options_2['jcmartim_configuration_data_facebook']) ? '' : 'style="border-color:green"'; ?>
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
                placeholder="https://www.instagram.com/company"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_instagram]" 
                id="jcmartim_configuration_data_instagram"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_instagram']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_instagram'], 'jcmartim-configuration-data') : '' ?>"
                <?php echo empty(self::$options_2['jcmartim_configuration_data_instagram']) ? '' : 'style="border-color:green"'; ?>
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
                placeholder="https://twitter.com/company"
                name="jcmartim_configuration_data_options_2[jcmartim_configuration_data_twitter]" 
                id="jcmartim_configuration_data_twitter"
                value="<?php echo isset(self::$options_2['jcmartim_configuration_data_twitter']) ? esc_attr__(self::$options_2['jcmartim_configuration_data_twitter'], 'jcmartim-configuration-data') : '' ?>"
                <?php echo empty(self::$options_2['jcmartim_configuration_data_twitter']) ? '' : 'style="border-color:green"'; ?>
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Twitter link shortcode for insertion into website content.", "jcmartim-configuration-data") ?></p>
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
                <?php echo empty(self::$options_3['jcmartim_configuration_data_external_link']) ? '' : 'style="border-color:green"'; ?>
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
                <?php echo empty(self::$options_3['jcmartim_configuration_data_pixel']) ? '' : 'style="border-color:green"'; ?>
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
                <?php echo empty(self::$options_3['jcmartim_configuration_data_analytics']) ? '' : 'style="border-color:green"'; ?>
            />
            <p class="shortcode"><strong><?php echo $args['shortcode']; ?></strong></p>
            <p><?php esc_html_e("Paste the Google Analytics ID. E.g.: G-XX3ZCML7LK", "jcmartim-configuration-data") ?></p>
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
                    case 'jcmartim_configuration_data_company_name':
                        if( empty( $value ) ) {
                            add_settings_error(
                                'jcmartim_configuration_data_options_1', // ID da classe de settings.
                                'jcmartim-configuration-data-message', // Classe a ser adicionada ao html da mensagem.
                                $message = esc_html__('Please! Fill in the company name field.', 'jcmartim-configuration-data'), // Mensagem de sucesso!
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
                                $message = esc_html__('Please! Fill in the company address field.', 'jcmartim-configuration-data'), // Mensagem de sucesso!
                                'error' // Tipo de mensagem.
                            );
                        } else {
                            $field_sanitize[$key] = sanitize_text_field($value);
                        }
                        break;
                    case 'jcmartim_configuration_data_tel':
                        if( empty( $value ) ) {
                            add_settings_error(
                                'jcmartim_configuration_data_options_1', // ID da classe de settings.
                                'jcmartim-configuration-data-message', // Classe a ser adicionada ao html da mensagem.
                                $message = esc_html__('Please! Fill in the company phone field.', 'jcmartim-configuration-data'), // Mensagem de sucesso!
                                'error' // Tipo de mensagem.
                            );
                        } else {
                            $field_sanitize[$key] = sanitize_text_field($value);
                        }
                        break;
                    case 'jcmartim_configuration_data_whatsapp':
                        if( empty( $value ) ) {
                            add_settings_error(
                                'jcmartim_configuration_data_options_1', // ID da classe de settings.
                                'jcmartim-configuration-data-message', // Classe a ser adicionada ao html da mensagem.
                                $message = esc_html__('Please! Fill in the company WhatsApp number field.', 'jcmartim-configuration-data'), // Mensagem de sucesso!
                                'error' // Tipo de mensagem.
                            );
                        } else {
                            $field_sanitize[$key] = intval($value);
                        }
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
                    case 'jcmartim_configuration_data_pixel':
                        $field_sanitize[$key] = esc_url_raw($value);
                        break;
                    case 'jcmartim_configuration_data_twitter':
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
    }
}