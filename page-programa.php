<?php
/**
 * Template Name: Programa
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
         <article class="Programa u-contenido">  
            
            <!-- Título del artículo -->
            <h1 class="Programa-title"><?php the_title(); ?></h1>
            <!-- Contenido -->
            <?php the_content(); ?> 
            <!-- Grid de imágenes -->
            <section class="Programa-grid">
                <!-- Materiales -->
                <figure class="Programa-gridFigure">
                    <a href="<?php the_permalink() ?>materiales/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/p01.png" alt="Materiales">
                        <figcaption>Materiales</figcaption>  
                    </a>        
                </figure>
                <!-- Actividades semanales -->
                <figure class="Programa-gridFigure">
                    <a href="<?php the_permalink() ?>actividades-semanales/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/p02.png" alt="Actividades semanales">
                        <figcaption>Actividades semanales</figcaption> 
                    </a>                    
                </figure>
                <!-- Estadísticas -->
                <figure class="Programa-gridFigure">
                    <a href="<?php the_permalink() ?>estadisticas/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/p03.png" alt="Estadísticas">
                        <figcaption>Estadísticas</figcaption>  
                    </a>                    
                </figure>                
            </section>

            <!-- Compartir en redes sociales -->
            <?php anliSocialShare(); ?>
       
        </article>

    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>