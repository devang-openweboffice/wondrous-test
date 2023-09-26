<?php
$community_info_heading = get_field( 'community_info_heading' );
?>
<section class="community__wrapper">
  <div class="container">
    <?php if( $community_info_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $community_info_heading ); ?></h2><?php endif; ?>
  </div>
  <?php
  if( have_rows( 'community_info_card' ) ):
  ?>
    <div class="community__items">
      <?php
      while( have_rows( 'community_info_card' ) ) : the_row();
        $community_info_url = get_sub_field( 'community_info_url' );
        $community_info_image = get_sub_field( 'community_info_image' );
        $community_heading = get_sub_field( 'community_heading' );
        $community_desciption = get_sub_field( 'community_desciption' );
      ?>
        <div class="community__items__single">
          <?php if( $community_info_url ): ?>
            <a href="<?php echo esc_url( $community_info_url ); ?>">
          <?php endif; ?>
          <?php if( $community_info_image ): ?>
            <figure>
              <img class="w-full" width="680" height="760"  src="<?php echo esc_url( $community_info_image['url'] ); ?>" alt="<?php echo ( $community_info_image['alt'] ) ? esc_attr( $community_info_image['alt'] ) : esc_attr( $community_info_image['filename'] ); ?>" />
            </figure>
          <?php endif; ?>
            <div class="community__items__content">
              <?php if( $community_heading ): ?><div class="community__items__title"><h5><?php echo esc_html( $community_heading ); ?></h5> <?php echo imageAsSvg('arrow-right-black'); ?></div><?php endif; ?>
              <?php if( $community_desciption ): ?><p><?php echo esc_html( $community_desciption ); ?></p><?php endif; ?>
            </div>
          <?php if( $community_info_url ): ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>