<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
	   
	    <article class="Page u-contenido">	
			
			<!-- Título del artículo -->
			<h1 class="Page-title"><?php the_title(); ?></h1>
						<!-- Imágen destacada -->
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="Page-featuredImage">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>
			
			<!-- Contenido -->
			<?php $content = get_the_content(); ?>
			<?php if ( $content == '') : ?>
				<a href="javascript:history.back()">
					<img class="u-enConstruccion" src="<?php bloginfo('template_directory'); ?>/images/trabajando.png">
				</a>
			<?php else : ?>			
				<?php the_content();  ?>		
			<?php endif; ?>

			<?php // the_content(); ?>	
			<!-- Compartir en redes sociales -->
			<?php anliSocialShare(); ?>
	   
		</article>
	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>