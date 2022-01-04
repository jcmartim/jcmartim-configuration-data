<div class="wrap">
    <h1><?php echo esc_html__( get_admin_page_title(), 'jcmartim-configuration-data' ) ?></h1>
    <?php
        // Tabs 
        // Define a tab ativa por padrão.
        // Se a query "tab" estiver ativa a tab atual vai ser a ativa se não o padão será a "business-data".
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'business-data';
     ?>
    <h2 class="nav-tab-wrapper">
        <a 
            class="nav-tab <?php echo $active_tab == 'business-data' ? 'nav-tab-active' : ''; ?>" 
            href="admin.php?page=configuration-data&tab=business-data"
        >
            <?php esc_html_e('Business Data', 'jcmartim-configuration-data') ?>
        </a>
        <a 
            class="nav-tab <?php echo $active_tab == 'social-media' ? 'nav-tab-active' : ''; ?>" 
            href="admin.php?page=configuration-data&tab=social-media"
        >
            <?php esc_html_e('Social Media', 'jcmartim-configuration-data') ?>
        </a>
        <a 
            class="nav-tab <?php echo $active_tab == 'external' ? 'nav-tab-active' : ''; ?>" 
            href="admin.php?page=configuration-data&tab=external"
        >
            <?php esc_html_e('External', 'jcmartim-configuration-data') ?>
        </a>
    </h2>
    <form action="options.php" method="post">
        <?php
            if ($active_tab == 'business-data') {
                settings_fields('jcmartim_configuration_data_group_1');                     // Adiciona campos hidden e nouce ao formulário.
                do_settings_sections('jcmartim_configuration_data_page_business');          // Conteúdo da segunda seção.
                
                //Mensagem de sucesso!
                if (isset($_GET['settings-updated'])) {// Verifica via get se a query string "settings-updated" está ativa.
                    add_settings_error(
                        'jcmartim_configuration_data_options_1',                                          // ID da classe de settings.
                        'jcmartim-configuration-data-message',                                          // Classe a ser adicionada ao html da mensagem.
                        $message = esc_html__('Settings saved successfully!', 'jcmartim-configuration-data'),   // Mensagem de sucesso!
                        'success'                                                                       // Tipo de mensagem.
                    );
                }
                settings_errors('jcmartim_configuration_data_options_1');
            } elseif ($active_tab == 'social-media') {
                settings_fields('jcmartim_configuration_data_group_2');                     // Adiciona campos hidden e nouce ao formulário.
                do_settings_sections('jcmartim_configuration_data_page_social_media');      // Conteúdo da segunda seção.
                //Mensagem de sucesso!
                if (isset($_GET['settings-updated'])) {// Verifica via get se a query string "settings-updated" está ativa.
                    add_settings_error(
                        'jcmartim_configuration_data_options_2',                                          // ID da classe de settings.
                        'jcmartim-configuration-data-message',                                          // Classe a ser adicionada ao html da mensagem.
                        $message = esc_html__('Settings saved successfully!', 'jcmartim-configuration-data'),   // Mensagem de sucesso!
                        'success'                                                                       // Tipo de mensagem.
                    );
                }
                settings_errors('jcmartim_configuration_data_options_2');
            } else {
                settings_fields('jcmartim_configuration_data_group_3');                     // Adiciona campos hidden e nouce ao formulário.
                do_settings_sections('jcmartim_configuration_data_page_external');      // Conteúdo da segunda seção.
                //Mensagem de sucesso!
                if (isset($_GET['settings-updated'])) {// Verifica via get se a query string "settings-updated" está ativa.
                    add_settings_error(
                        'jcmartim_configuration_data_options_3',                                          // ID da classe de settings.
                        'jcmartim-configuration-data-message',                                          // Classe a ser adicionada ao html da mensagem.
                        $message = esc_html__('Settings saved successfully!', 'jcmartim-configuration-data'),   // Mensagem de sucesso!
                        'success'                                                                       // Tipo de mensagem.
                    );
                }
                settings_errors('jcmartim_configuration_data_options_3');
            }
            submit_button(esc_html__('Save Settings', 'jcmartim-configuration-data'));          //Botão para enviar os dados para o banco.
        ?>
    </form>
</div>