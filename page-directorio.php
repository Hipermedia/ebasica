<?php
/**
 * Template Name: Directorio
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
         <article class="Page Directorio u-contenido">  
            
            <!-- Título del artículo -->
            <img class="Directorio-titulo" src="<?php bloginfo('template_directory'); ?>/images/titulo-directorio.png" alt="Directorio">
            
            <!-- Contenido -->
            <div class="Directorio-contenido">
                <?php the_content(); ?> 
            </div>           

            <!-- Compartir en redes sociales -->
            <?php anliSocialShare(); ?>
       
        </article>

    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>