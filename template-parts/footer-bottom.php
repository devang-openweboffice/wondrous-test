<?php 
$website_logo = get_field( 'website_logo', 'option' );
$footer_site_heading = get_field( 'footer_site_heading', 'option' );
$footer_copyright = get_field( 'footer_copyright', 'option' );
?>
<div class="footer__bottom">
  <div class="container mx-auto">
    <?php if( $website_logo ): ?>
      <figure>
          <a href="<?php echo home_url(); ?>" target="_self" title="<?php echo get_bloginfo( 'name' ); ?>">
              <img width="400" height="131" class="w-full footer__logo" src="<?php echo esc_url( $website_logo['url'] ); ?>" alt="<?php echo ( $website_logo['alt'] ) ? esc_attr( $website_logo['alt'] ) : esc_attr( $website_logo['filename'] ); ?>" />
          </a>
      </figure>
    <?php endif; ?>
    <div class="footer__bottom__content">
      <div class="footer__bottom__left">
        <?php if( $footer_site_heading ): ?><p><?php echo esc_html( $footer_site_heading ); ?></p><?php endif; ?>
      </div>
      <div class="footer__bottom__right">
        <?php 
          if ( has_nav_menu( 'footer_primary' ) ):
              wp_nav_menu( array( 'theme_location' => 'footer_primary' ) );
          endif; ?>
      </div>
    </div>
    <div class="footer__bottom__social">
        <?php if( $footer_copyright ): ?><p><?php echo esc_html( $footer_copyright ); ?></p><?php endif; ?>
        <?php if( have_rows( 'website_socials', 'option' ) ): ?>
          <ul>
              <?php 
              while( have_rows( 'website_socials', 'option' ) ) : the_row(); 
                $social_link = get_sub_field( 'social_link' );
                if( $social_link ): 
                    $social_link_url = $social_link['url'];
                    $social_link_title = $social_link['title'];
                    $social_link_target = $social_link['target'] ? $social_link['target'] : '_self';
              ?>
                  <li>
                      <a href="<?php echo esc_url( $social_link_url ); ?>" title="<?php echo esc_attr( $social_link_title ); ?>" target="<?php echo esc_attr( $social_link_target ); ?>">
                          <?php echo imageAsSvg(strtolower( $social_link_title )); ?>
                      </a>
                  </li>
                <?php endif; ?>
              <?php endwhile; ?>
          </ul>
        <?php endif; ?>
    </div>
  </div>
</div>