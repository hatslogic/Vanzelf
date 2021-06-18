<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' ); ?>
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
 hello_elementor_body_open();

// if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
// 	get_template_part( 'template-parts/header' );
// }

?>
<header class="main-header-outer">
	<div class="header-innerblock">
		<div class="logo-continer">
			<a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/vanzelf_logo.svg" alt="Logo"></a>
		</div>
		<div class="right-outerblock">
			<div class="nav-content"> 

				<?php wp_nav_menu( array( 'menu' => 'mainheadernav' ) ); ?>
   

			</div>
			<div class="buttons-container">
				<div class="main-btn"><a href="#">Schrijf je in</a></div>
				<div class="badge-btn">
					<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/verified-CIRE.png" alt="badge"></a>
					<div class="badgedetails-block">
						Vanzelf is aangesloten bij CIRE. Dit is terug te zien in het CIRE keurmerk. Dit initiatief wordt ondersteund door de Autoriteit Consument en Markt (ACM).
					</div>
				</div>
			</div>
			<div class="nav-trigger-cont">
				<span></span><span></span><span></span>
			</div> 
		</div> 
	</div>
</header> 

