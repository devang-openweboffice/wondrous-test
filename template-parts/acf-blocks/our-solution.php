<?php 
$our_solution_section_heading = get_field( 'our_solution_section_heading' );
$our_solution_section_description = get_field( 'our_solution_section_description' );
?>
<section class="solution__wrapper">
    <div class="container">
      <?php if( $our_solution_section_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $our_solution_section_heading ); ?></h2><?php endif; ?>
      <?php if( $our_solution_section_description ): ?><p class="animation__fade"><?php echo esc_html( $our_solution_section_description ); ?></p><?php endif; ?>
    </div>
    <?php 
    if( have_rows( 'our_solutions' ) ):
    ?>
      <div class="solution__items">
        <?php
          while( have_rows( 'our_solutions' ) ) : the_row();
            $our_solution_icon = get_sub_field( 'our_solution_icon' );
            $our_solution_heading = get_sub_field( 'our_solution_heading' );
            $our_solution_description = get_sub_field( 'our_solution_description' );
        ?>
          <div class="solution__items__single animation__fade">
            <?php if( $our_solution_icon ): ?>
              <div class="solution__items__icon">
                <figure>
                  <img class="w-full" width="680" height="760"  src="<?php echo esc_url( $our_solution_icon['url'] ); ?>" alt="<?php echo ( $our_solution_icon['alt'] ) ? esc_attr( $our_solution_icon['alt'] ) : esc_attr( $our_solution_icon['filename'] ); ?>" />
                </figure>
              </div>
            <?php endif; ?>
            <?php if( $our_solution_heading ): ?><h5><?php echo esc_html( $our_solution_heading ); ?></h5><?php endif; ?>
            <?php if( $our_solution_description ): ?><p><?php echo esc_html( $our_solution_description ); ?></p><?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
</section>