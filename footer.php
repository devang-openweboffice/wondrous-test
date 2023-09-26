<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base_Theme
 */

?>
</div>
	<footer id="colophon" class="footer">
		<?php get_template_part( 'template-parts/footer', 'top' ); ?>
		<?php get_template_part( 'template-parts/footer', 'bottom' ); ?>		
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
