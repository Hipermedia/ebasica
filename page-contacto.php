<?php
/**
 * Template Name: Contacto
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
         <article class="Page Contacto u-contenido">  
            
            <!-- Título del artículo -->
            <img class="Directorio-titulo" src="<?php bloginfo('template_directory'); ?>/images/titulo-contacto.png" alt="Directorio">
            
            <!-- Contenido -->
            <?php the_content(); ?> 

            <!-- Compartir en redes sociales -->
            <?php anliSocialShare(); ?>
       
        </article>

    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>