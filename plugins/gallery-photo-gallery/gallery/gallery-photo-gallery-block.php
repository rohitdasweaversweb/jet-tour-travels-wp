<?php
    /**
     * Enqueue front end and editor JavaScript
     */

    function ays_gpg_gutenberg_scripts() {        
        global $current_screen;
        global $wp_version;
        $version1 = $wp_version;
        $operator = '>=';
        $version2 = '5.3.1';
        $versionCompare = aysGalleryVersionCompare($version1, $operator, $version2);
        if( ! $current_screen ){
            return null;
        }

        if( ! $current_screen->is_block_editor ){
            return null;
        }

        // wp_enqueue_script( AYS_GALLERY_NAME, AYS_GPG_PUBLIC_URL . '/js/gallery-photo-gallery-public.js', array('jquery'), AYS_GALLERY_VERSION, true);        

        // Enqueue the bundled block JS file
        if( $versionCompare ){
            wp_enqueue_script(
                'gallery-photo-gallery-block-js',
                AYS_GPG_BASE_URL ."/gallery/gallery-photo-gallery-block-new.js",
                array( 'jquery', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ),
                AYS_GALLERY_VERSION, true
            );
        }
        else{
            wp_enqueue_script(
                'gallery-photo-gallery-block-js',
                AYS_GPG_BASE_URL ."/gallery/gallery-photo-gallery-block.js",
                array( 'jquery', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ),
                AYS_GALLERY_VERSION, true
            );
        }
        
        // wp_enqueue_style( AYS_GALLERY_NAME, AYS_GPG_PUBLIC_URL . '/css/gallery-photo-gallery-public.css', array(), AYS_GALLERY_VERSION, 'all');

        // Enqueue the bundled block CSS file
        if( $versionCompare ){            
            wp_enqueue_style(
                'gallery-photo-gallery-block-css',
                AYS_GPG_BASE_URL ."/gallery/gallery-photo-gallery-block-new.css",
                array(),
                AYS_GALLERY_VERSION, 'all'
            );
        }
        else{            
            wp_enqueue_style(
                'gallery-photo-gallery-block-css',
                AYS_GPG_BASE_URL ."/gallery/gallery-photo-gallery-block.css",
                array(),
                AYS_GALLERY_VERSION, 'all'
            );
        }
    }

    function ays_gpg_gutenberg_block_register() {
        
        global $wpdb;
        $block_name = 'gallery';
        $block_namespace = 'gallery-photo-gallery/' . $block_name;
        
        $sql = "SELECT * FROM ". $wpdb->prefix . "ays_gallery";
        $results = $wpdb->get_results($sql, "ARRAY_A");
        
        register_block_type(
            $block_namespace, 
            array(
                'render_callback'   => 'gallery_p_gallery_render_callback',
                'editor_script'     => 'gallery-photo-gallery-block-js',
                'style'             => 'gallery-photo-gallery-block-css',
                'attributes'	    => array(
                    'idner' => $results,
                    'metaFieldValue' => array(
                        'type'  => 'integer', 
                    ),
                    'shortcode' => array(
                        'type'  => 'string',				
                    ),
                    'className' => array(
                        'type'  => 'string',
                    ),
                    'openPopupId' => array(
                        'type'  => 'string',
                    ),
                ),                
            )
        );       
    }    
    
    function gallery_p_gallery_render_callback( $attributes ) { 

        $ays_html = "<div class='ays-gallery-render-callback-box'></div>";

        if(isset($attributes["metaFieldValue"]) && $attributes["metaFieldValue"] === 0) {
            return $ays_html;
        }

        if(isset($attributes["shortcode"]) && $attributes["shortcode"] != '') {
            // $ays_html = do_shortcode( $attributes["shortcode"] );
            $ays_html = $attributes["shortcode"] ;
        }
        return $ays_html;
    }

    function aysGalleryVersionCompare($version1, $operator, $version2) {
    
        $_fv = intval ( trim ( str_replace ( '.', '', $version1 ) ) );
        $_sv = intval ( trim ( str_replace ( '.', '', $version2 ) ) );
    
        if (strlen ( $_fv ) > strlen ( $_sv )) {
            $_sv = str_pad ( $_sv, strlen ( $_fv ), 0 );
        }
    
        if (strlen ( $_fv ) < strlen ( $_sv )) {
            $_fv = str_pad ( $_fv, strlen ( $_sv ), 0 );
        }
    
        return version_compare ( ( string ) $_fv, ( string ) $_sv, $operator );
    }

    if(function_exists("register_block_type")){
            // Hook scripts function into block editor hook
        add_action( 'enqueue_block_editor_assets', 'ays_gpg_gutenberg_scripts' );
        add_action( 'init', 'ays_gpg_gutenberg_block_register' );
    }