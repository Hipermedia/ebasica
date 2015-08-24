<?php
/**
 * Template Name: Escritorio
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
        <article class="Page u-contenido">  
            
            <!-- Título del artículo -->
            <h1 class="Page-title"><?php the_title(); ?></h1>
            <!-- Contenido -->
            <?php the_content(); ?> 

       
        </article>
    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>