<?php
$business_step_heading = get_field( 'business_step_heading' );
$business_step_description = get_field( 'business_step_description' );
?>
<section class="business__step">
  <div class="container">
    <?php if( $business_step_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $business_step_heading ); ?></h2><?php endif; ?>
    <?php if( $business_step_description ): ?><p class="animation__fade"><?php echo esc_html( $business_step_description ); ?></p><?php endif; ?>
    <?php
    if( have_rows( 'business_steps' ) ):
    ?>
    <div class="business__slider animation__fade">
      <?php
      while( have_rows( 'business_steps' ) ) : the_row();
        $business_step_heading = get_sub_field( 'business_step_heading' );
        $business_step_description = get_sub_field( 'business_step_description' );
        $business_step_image = get_sub_field( 'business_step_image' );
      ?>
        <div class="business__slider__single">
          <?php
          if( $business_step_image ): 
          ?>
            <div class="business__slider__icon">
              <figure>
                <img class="w-full" width="680" height="760"  src="<?php echo esc_url( $business_step_image['url'] ); ?>" alt="<?php echo ( $business_step_image['alt'] ) ? esc_attr( $business_step_image['alt'] ) : esc_attr( $business_step_image['filename'] ); ?>" />
              </figure>
            </div>
          <?php endif; ?>
          <?php if( $business_step_heading ): ?><h5><?php echo esc_html( $business_step_heading ); ?></h5><?php endif; ?>
          <?php if( $business_step_description ): ?><p><?php echo esc_html( $business_step_description ); ?></p><?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>