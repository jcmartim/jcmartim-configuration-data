<?php

if ( ! class_exists( 'JCMartim_Configuration_Data_Shortcode' ) ) {
    class JCMartim_Configuration_Data_Shortcode {
        public function __construct()
        {
            add_shortcode('configuration', [$this, 'data_shortcode_company']);
        }

       /**
        * Método para shortecode nome da empresa.
        *
        * @return string
        */
        public function data_shortcode_company($atts = [], $content = null, $shortcode_tag = '' )
        {

            $data_business      =    get_option('jcmartim_configuration_data_options_1');
            $data_social_media  =    get_option('jcmartim_configuration_data_options_2');
            $data_external      =    get_option('jcmartim_configuration_data_options_3');
            $data_footer        =    get_option('jcmartim_configuration_data_options_4');

            //Passa todos os parametros para minúsculas.
            $atts = array_change_key_case((array) $atts, CASE_LOWER);

            extract( //Extrai para variáveis. Ex.: $id, $ordebay.
                shortcode_atts(
                $pairs = [                  //Array com todos os atributos.
                    'data' => ''
                ], 
                $atts,                      // Parametro de onde vem os atributos.
                $shortcode_tag              //O nome do shortcode, fornecido para contexto para habilitar a filtragem.
                )   
            );

            if ( ! empty( $data ) && $data === 'company' ) {
                return $data_business['jcmartim_configuration_data_company_name'];
            } elseif ( ! empty( $data ) && $data === 'cnpj' ) {
                return $data_business['jcmartim_configuration_data_cnpj'];
            } elseif ( ! empty( $data ) && $data === 'address' ) {
                return $data_business['jcmartim_configuration_data_address'];
            } elseif ( ! empty( $data ) && $data === 'tel' ) {
                return $data_business['jcmartim_configuration_data_tel'];
            } elseif ( ! empty( $data ) && $data === 'whatsapp' ) {
                return $data_business['jcmartim_configuration_data_whatsapp'];
            } elseif ( ! empty( $data ) && $data === 'facebook' ) {
                return $data_social_media['jcmartim_configuration_data_facebook'];
            } elseif ( ! empty( $data ) && $data === 'instagram' ) {
                return $data_social_media['jcmartim_configuration_data_instagram'];
            } elseif ( ! empty( $data ) && $data === 'twitter' ) {
                return $data_social_media['jcmartim_configuration_data_twitter'];
            } elseif ( ! empty( $data ) && $data === 'external-page-link' ) {
                return $data_external['jcmartim_configuration_data_external_link'];
            } elseif ( ! empty( $data ) && $data === 'pixel' ) {
                return $data_external['jcmartim_configuration_data_pixel'];
            } elseif ( ! empty( $data ) && $data === 'analytics' ) {
                return $data_external['jcmartim_configuration_data_analytics'];
            } elseif ( ! empty( $data ) && $data === 'footer_column_1' ) {
                return $data_footer['jcmartim_configuration_data_footer_column_1'];
            } elseif ( ! empty( $data ) && $data === 'footer_column_2' ) {
                return $data_footer['jcmartim_configuration_data_footer_column_2'];
            } elseif ( ! empty( $data ) && $data === 'footer_column_3' ) {
                return $data_footer['jcmartim_configuration_data_footer_column_3'];
            } elseif ( ! empty( $data ) && $data === 'footer_column_4' ) {
                return $data_footer['jcmartim_configuration_data_footer_column_4'];
            }
        }
    }
}