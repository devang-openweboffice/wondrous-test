<?php
$banner_section_image = get_field( 'banner_section_image' );
if( !empty( $banner_section_image ) ){
  $img_url = $banner_section_image['url'];
  $img_alt = $banner_section_image['alt'] ? $banner_section_image['alt'] : $banner_section_image['filename'];
}else{
  $img_url = 'https://placehold.co/756x852';
  $img_alt = 'No Image';
}
$banner_section_heading = get_field( 'banner_section_heading' );
$banner_section_description = get_field( 'banner_section_description' );
$banner_section_link = get_field( 'banner_section_link' ); 
?>
<section class="banner__section">
  <div class="banner__image">
    <figure>
      <img class="w-full skip-lazy" width="680" height="760"  src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />
    </figure>
  </div>
  <div class="banner__content">
    <div class="banner__content__info">
      <?php if( $banner_section_heading ): ?><h1 class="animation__fade"><?php echo esc_html( $banner_section_heading ); ?></h1><?php endif; ?>
      <?php if( $banner_section_description ): ?><h4 class="animation__fade"><?php echo esc_html( $banner_section_description ); ?></h4><?php endif; ?>
      <?php 
      if( $banner_section_link ): 
          $link_url = $banner_section_link['url'];
          $link_title = $banner_section_link['title'];
          $link_target = $banner_section_link['target'] ? $banner_section_link['target'] : '_self';
      ?>
          <a class="button animation__fade" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>