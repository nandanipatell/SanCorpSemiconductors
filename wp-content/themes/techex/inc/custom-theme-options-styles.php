<?php
// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
function techex_theme_options_style() {
    // Globalizing theme options values
    $techex = get_option( 'techex' );
    //
    // Enqueueing StyleSheet file
    //
    wp_enqueue_style( 'techex-theme-options-style', get_theme_file_uri( '/assets/css/theme_options_style.css' ) );
    $page_id    = get_the_ID();
    $css_output = '';
    /*=============================================
    =            CUSTOM BACKGROUND STYLE          =
    =============================================*/

    if ( isset( $techex['logo_max_width_desktop'] ) ) {
        $css_output .= "
			.site-branding,.site-logo{
				max-width: {$techex['logo_max_width_desktop']}px;
			}
		";
    }
    if ( isset( $techex['logo_max_width_mobile'] ) ) {
        $css_output .= "
			@media (max-width: 680px){
				.site-branding, .site-logo{
					max-width: {$techex['logo_max_width_mobile']}px;
				}
			}
		";
    }

    if (isset($techex['scustom_css'])) {
		$css_output .= $techex['scustom_css'];
	}

    // theme color set
    if ( isset( $techex['custom_accent_color'] ) || isset( $techex['heading_color'] ) || isset( $techex['text_color'] ) ) {
        $body_bg_color  = isset($techex['body_bg_color']) ? $techex['body_bg_color'] : '';
        $accent_color   = isset($techex['custom_accent_color']) ? $techex['custom_accent_color'] : '';
        $accent_color_2 = isset($techex['custom_accent_color_2']) ? $techex['custom_accent_color_2'] : '';
        $heading_color  = isset($techex['heading_color']) ? $techex['heading_color'] : '';
        $text_color     = isset($techex['text_color']) ? $techex['text_color'] : '';

        $css_output .= "
		:root {
			--accent-color: {$accent_color};
			--accent-color-2: {$accent_color_2};
			--heading-color: {$heading_color};
			--text-color: {$text_color};
		}

		body {
			background-color: {$body_bg_color};
		}

		";

    }

    //
    // Header Buttons Color
    //
    $body_background_color = get_post_meta( get_the_ID(), 'body_background_color', true );
    if ( $body_background_color ) {
        $css_output .= "
			body.page-id-{$page_id} {
				background-color: {$body_background_color};
			}
		";
    }

    wp_add_inline_style( 'techex-theme-options-style', $css_output );

}
add_action( 'wp_enqueue_scripts', 'techex_theme_options_style' );
