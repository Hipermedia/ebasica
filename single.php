<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
	    <article class="Post u-contenido">	
			
			<!-- Imágen destacada -->
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="Post-featuredImage">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>
			<!-- Título del artículo -->
			<h1 class="Post-title"><?php the_title(); ?></h1>
			<!-- Contenido -->
			<?php the_content(); ?>	
			<!-- Compartir en redes sociales -->
			<?php anliSocialShare(); ?>
	   
		</article>
	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>