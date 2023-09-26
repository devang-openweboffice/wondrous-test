<?php 
$testimonials_section_heading = get_field( 'testimonials_section_heading' );
$client_stories_link = get_field( 'client_stories_link' );
?>
<section class="testimonials__wrapper">
  <div class="container">
    <?php if( $testimonials_section_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $testimonials_section_heading ); ?></h2><?php endif; ?>
    <?php if( have_rows( 'testimonials' ) ): ?>
    <div class="testimonials__slider animation__fade">
      <?php
        while( have_rows( 'testimonials' ) ) : the_row();
          $testimonial_image = get_sub_field( 'testimonial_image' );
          $testimonial_image_bg_color = get_sub_field( 'testimonial_image_bg_color' );
          $testimonial_author = get_sub_field( 'testimonial_author' );
          $testimonial_author_designation = get_sub_field( 'testimonial_author_designation' );
          $testimonial_text = get_sub_field( 'testimonial_text' );
          $testimonial_link = get_sub_field( 'testimonial_link' );
      ?>
      <div class="testimonials__slider__single">
        <?php if( $testimonial_image ): ?>
          <div class="testimonials__slider__image" <?php if( $testimonial_image_bg_color ){ ?> style="background-color:<?php echo $testimonial_image_bg_color; ?>" <?php } ?>>
            <figure>
              <img class="w-full" width="680" height="760"  src="<?php echo esc_url( $testimonial_image['url'] ) ?>" alt="<?php echo ( $testimonial_image['alt'] ) ? esc_attr( $testimonial_image['alt'] ) : esc_attr( $testimonial_image['filename'] ); ?>" />
            </figure>
          </div>
        <?php endif; ?>
        <div class="testimonials__slider__content">
          <?php if( $testimonial_author ): ?><h5><?php echo esc_html( $testimonial_author ); ?></h5><?php endif; ?>
          <?php if( $testimonial_author_designation ): ?><span><?php echo esc_html( $testimonial_author_designation ); ?></span><?php endif; ?>
          <?php if( $testimonial_text ): ?><p><?php echo esc_html( $testimonial_text ); ?></p><?php endif; ?>
          <?php 
          if( $testimonial_link ): 
              $link_url = $testimonial_link['url'];
              $link_title = $testimonial_link['title'];
              $link_target = $testimonial_link['target'] ? $testimonial_link['target'] : '_self';
          ?>
              <a class="button animation__fade" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
    <div class="testimonials__progressbar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
      <span class="slider__label"></span>
    </div>
    <?php endif; ?>
    <div class="testimonials__action">
      <?php 
      if( $client_stories_link ): 
          $client_stories_url = $client_stories_link['url'];
          $client_stories_title = $client_stories_link['title'];
          $client_stories_target = $client_stories_link['target'] ? $client_stories_link['target'] : '_self';
      ?>
          <a class="button animation__fade" href="<?php echo esc_url( $client_stories_url ); ?>" target="<?php echo esc_attr( $client_stories_target ); ?>"><?php echo esc_html( $client_stories_title ); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>