<?php
$partnered_logos_heading = get_field( 'partnered_logos_heading' );
$partnered_logos = get_field( 'partnered_logos' );
?>
<section class="partnered__section">
  <div class="container">
    <?php if( $partnered_logos_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $partnered_logos_heading ); ?></h2><?php endif; ?>
    <?php 
    if( $partnered_logos ):
    ?>
    <ul class="partnered__logo animation__fade">
      <?php 
      foreach( $partnered_logos as $partnered_logo ): 
      ?>
        <li>
          <figure>
            <img class="w-full" width="680" height="760"  src="<?php echo esc_url( $partnered_logo['url'] ); ?>" alt="<?php echo esc_attr( $partnered_logo['alt'] ); ?>" />
          </figure>
        </li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>
</section>