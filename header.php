<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('leading-normal'); ?>>
<div id="page" class="site">
	<?php 
		$website_logo = get_field( 'website_logo', 'option' );
		$website_logo_white = get_field( 'website_logo_white', 'option' ); 
	?>
	<header id="masthead" class="header">
		<div class="container mx-auto">
			<div class="header__top">
				<?php if( $website_logo_white ): ?>
					<div class="header__logo">
						<figure>
							<a href="<?php echo home_url(); ?>" target="_self" title="<?php echo get_bloginfo( 'name' ); ?>">
								<img class="w-full skip-lazy" width="95" height="31" src="<?php echo esc_url( $website_logo_white['url'] ); ?>" alt="<?php echo ( $website_logo_white['alt'] ) ? esc_attr( $website_logo_white['alt'] ) : esc_attr( $website_logo_white['filename'] ); ?>" />
							</a>
						</figure>
					</div>
				<?php endif; ?>
				<?php if( $website_logo ): ?>
					<div class="header__logo__mobile">
						<figure>
							<a href="<?php echo home_url(); ?>" target="_self" title="<?php echo get_bloginfo( 'name' ); ?>">
								<img class="w-full skip-lazy" width="95" height="31" src="<?php echo esc_url( $website_logo['url'] ); ?>" alt="<?php echo ( $website_logo['alt'] ) ? esc_attr( $website_logo['alt'] ) : esc_attr( $website_logo['filename'] ); ?>" />
							</a>
						</figure>
					</div>
				<?php endif; ?>
				<div class="header__menu">
					<div class="header__menu__backdrop"></div>
					<button class="icon__menu">
						<img width="18" height="9" class="w-full" src=<?php echo get_template_directory_uri().'/assets/images/menu.svg'; ?> alt="menu-icon">
					</button>
					<div class="header__menu__block" id="header__menu__block">
						<div class="header__menu__top">
							<?php if( $website_logo_white ): ?>
								<figure>
									<a href="<?php echo home_url(); ?>" target="_self" title="<?php echo get_bloginfo( 'name' ); ?>">
										<img class="w-full skip-lazy" width="95" height="31" src="<?php echo esc_url( $website_logo_white['url'] ); ?>" alt="<?php echo ( $website_logo_white['alt'] ) ? esc_attr( $website_logo_white['alt'] ) : esc_attr( $website_logo_white['filename'] ); ?>" />
									</a>
								</figure>
							<?php endif; ?>
							<button class="icon__menu">
								<img class="w-full" width="17" height="17" src=<?php echo get_template_directory_uri().'/assets/images/close.svg'; ?> alt="close-icon">
							</button>
						</div>
						<div class="header__menu__middle">
							<?php 
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( array( 'theme_location' => 'primary' ) );
							}
							?>
						</div>
					</div>
				</div>	
				<nav id="site-navigation" class="main-navigation header__nav">
					<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary' ) );
					}
					?>
				</nav>		
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
