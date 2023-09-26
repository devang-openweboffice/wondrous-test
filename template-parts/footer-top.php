<?php 
$footer_form_sub_heading = get_field( 'footer_form_section_sub_heading', 'option' );
$footer_form_section_heading = get_field( 'footer_form_section_heading', 'option' );
$footer_form_shortcode = get_field( 'footer_form_shortcode', 'option' );
?>
<div class="footer__top">
  <div class="footer__top__main">
    <div class="footer__top__left">
        <?php if( $footer_form_sub_heading ): ?><p><?php echo esc_html( $footer_form_sub_heading ); ?></p><?php endif; ?>
        <?php if( $footer_form_section_heading ): ?><h4><?php echo esc_html( $footer_form_section_heading ); ?></h4><?php endif; ?>
    </div>
    <?php if( $footer_form_shortcode ): ?>
    <div class="footer__top__right">
        <?php echo do_shortcode( $footer_form_shortcode ); ?>
    </div>
    <?php endif; ?>
  </div>
</div>