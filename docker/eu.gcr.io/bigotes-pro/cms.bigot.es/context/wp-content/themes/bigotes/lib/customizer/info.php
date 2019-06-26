<?php
/**
 * Envo Magazine Theme Info
 *
 * @package Envo Magazine
 */

function envo_magazine_customizer_theme_info( $wp_customize ) {
	$theme_data = wp_get_theme();

    /** Important Links */
	  $wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<p>';
	/* translators: %s: "demos here" string */
	$theme_info .= sprintf( __( 'You can use this theme to create a website like these %1$s', 'envo-magazine' ),  '<a href="' . esc_url( 'https://envothemes.com/envo-magazine/' ) . '" target="_blank">' . esc_html__( 'demos', 'envo-magazine' ) . '</a>' );
    $theme_info .= '</p><p>';
	/* translators: %s: "documentation" string */
    $theme_info .= sprintf( __( 'For step-by-step videos and text tutorials, see %1$s', 'envo-magazine' ),  '<a href="' . esc_url( 'https://envothemes.com/envo-magazine/documentation/' ) . '" target="_blank">' . esc_html__( 'documentation', 'envo-magazine' ) . '</a>' );   
    $theme_info .= '</p>';

	  $wp_customize->add_control( new envo_magazine_Info_Text( $wp_customize,
        'theme_info_theme', 
            array(
                'section'     => 'theme_info',
                'description' => $theme_info
            )
        )
    );
    
    
}
add_action( 'customize_register', 'envo_magazine_customizer_theme_info' );

if ( class_exists( 'WP_Customize_control' ) ) {

	class envo_magazine_Info_Text extends Wp_Customize_Control {
		
		public function render_content(){ ?>
    	    <span class="customize-control-title">
    			<?php echo esc_html( $this->label ); ?>
    		</span>
    
    		<?php if( $this->description ){ ?>
    			<span class="description customize-control-description">
    			<?php echo wp_kses_post($this->description); ?>
    			</span>
    		<?php }
        }
	}
}