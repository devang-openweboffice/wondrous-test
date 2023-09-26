<?php
$company_info_heading = get_field( 'company_info_heading' );
$company_info_description = get_field( 'company_info_description' );
?>
<section class="company__info">
  <div class="container">
    <?php if( $company_info_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $company_info_heading ); ?></h2><?php endif; ?>
    <?php if( $company_info_description ): ?><p class="animation__fade"><?php echo esc_html( $company_info_description ); ?></p><?php endif; ?>
  </div>
</section>