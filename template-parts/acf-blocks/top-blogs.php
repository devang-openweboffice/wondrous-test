<?php
$top_blogs_heading = get_field( 'top_blogs_heading' );
$top_blogs_description = get_field( 'top_blogs_description' );
$select_blogs = get_field( 'select_blogs' );
?>
<section class="blog__wrapper">
  <div class="container">
    <?php if( $top_blogs_heading ): ?><h2 class="animation__fade"><?php echo esc_html( $top_blogs_heading ); ?></h2><?php endif; ?>
    <?php if( $top_blogs_description ): ?><p class="animation__fade"><?php echo esc_html( $top_blogs_description ); ?></p><?php endif; ?>
    <?php if( $select_blogs ): ?>
    <div class="blog__list">
      <?php 
      foreach( $select_blogs as $select_blog ): 
        $article_permalink = get_the_permalink( $select_blog );
        $article_title = get_the_title( $select_blog );
        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $select_blog ), 'full' );
        if( empty( $featured_image ) ){
            $image_url = 'https://placehold.jp/394x265?text=No+Image+Available';
            $image_alt = 'No Image';
        }else{
            $image_url = $featured_image[0];
            $image_alt = get_post_meta( get_post_thumbnail_id( $select_blog ) , '_wp_attachment_image_alt', true );
        }
        $card_article_content = get_the_excerpt( $select_blog );
        $card_article_category_obj = get_the_category( $select_blog );
        $card_article_category = '';     
        if( !empty( $card_article_category_obj ) ){
            $card_article_category = $card_article_category_obj[0]->name;
        } 
      ?>
        <div class="blog__list__item animation__fade">
          <div class="blog__list__item__image">
            <figure>
              <img class="w-full" width="680" height="760"  src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" />
            </figure>
          </div>
          <div class="blog__list__item__content">
            <span><?php echo esc_html( $card_article_category ); ?></span>
            <h5><?php echo esc_html( $article_title ); ?></h5>
            <p><?php echo esc_html( $card_article_content ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>