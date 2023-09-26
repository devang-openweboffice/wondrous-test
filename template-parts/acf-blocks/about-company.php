<?php 
$about_company_heading = get_field( 'about_company_heading' );
?>
<section class="company__wrapper">
  <div class="container">
    <?php if( $about_company_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $about_company_heading ); ?></h2><?php endif; ?>
    <?php 
    if( have_rows( 'company_numbers' ) ):
    ?>
      <div class="company__community">
        <?php
        while( have_rows( 'company_numbers' ) ) : the_row();
          $company_number = get_sub_field( 'company_number' );
          $company_number_heading = get_sub_field( 'company_number_heading' );
          $arr = array( 'span' => array() );
        ?>
        <div class="company__community__item animation__fade">
          <?php if( $company_number ): ?>
          <div class="company__community__count">
            <div class="company__community__number"><?php echo wp_kses( $company_number, $arr ); ?></div>
          </div>
          <?php endif; ?>
          <?php if( $company_number_heading ): ?><p><?php echo esc_html( $company_number_heading ); ?></p><?php endif; ?>
        </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>