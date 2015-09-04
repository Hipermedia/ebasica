<?php
/**
 * Template Name: Directorio
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
         <article class="Page Directorio u-contenido">  
            <!-- Breadcrums -->
            <?php the_breadcrumb();  ?>
            <!-- Nombre de la dirección o programa -->
            <?php global $post; ?>
            <?php if($post->post_parent) :  ?>                
                <h1 class="Page-title"><?php echo get_the_title($post->post_parent); ?></h1>
            <?php endif; ?>
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