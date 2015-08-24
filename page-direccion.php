<?php
/**
 * Template Name: Dirección
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
        <article class="Direccion u-contenido">  
            
            <!-- Título del artículo -->
            <h1 class="Direccion-title"><?php the_title(); ?></h1>
            <!-- Contenido -->
            <?php the_content(); ?> 
            <!-- Grid de imágenes -->
            <section class="Direccion-grid">
                <!-- Programas -->
                <figure class="Direccion-gridFigure">
                    <a href="<?php the_permalink() ?>programas/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/01.jpg" alt="Programas">
                        <figcaption>Programas</figcaption>  
                    </a>        
                </figure>
                <!-- Servicios -->
                <figure class="Direccion-gridFigure">
                    <a href="<?php the_permalink() ?>servicios/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/02.jpg" alt="Servicios">
                        <figcaption>Servicios</figcaption> 
                    </a>                    
                </figure>
                <!-- Noticias -->
                <figure class="Direccion-gridFigure">
                    <a href="<?php the_permalink() ?>noticias/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/03.jpg" alt="Noticias">
                        <figcaption>Noticias</figcaption>  
                    </a>                    
                </figure>
                <!-- Deco -->
                <figure class="Direccion-gridFigure">
                    <a href="">
                        <img src="<?php bloginfo('template_directory'); ?>/images/04.jpg" alt="">
                    </a>
                </figure>
                <!-- Actividades semanales -->
                <figure class="Direccion-gridFigure">
                    <a href="<?php the_permalink() ?>actividades-semanales/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/05.jpg" alt="Actividades semanales">
                        <figcaption>Actividades semanales</figcaption>  
                    </a>                    
                </figure>
                <!-- Deco -->
                 <figure class="Direccion-gridFigure">
                    <a href="">
                        <img src="<?php bloginfo('template_directory'); ?>/images/06.jpg" alt="">
                    </a>
                </figure>
                <!-- Materiales -->
                <figure class="Direccion-gridFigure">
                    <a href="<?php the_permalink() ?>materiales/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/07.jpg" alt="Materiales">
                        <figcaption>Materiales</figcaption>  
                    </a>                    
                </figure>
                <!-- Deco -->
                 <figure class="Direccion-gridFigure">
                    <a href="">
                        <img src="<?php bloginfo('template_directory'); ?>/images/08.jpg" alt="">
                    </a>
                </figure>
                <!-- Estadísticas -->
                <figure class="Direccion-gridFigure">
                    <a href="<?php the_permalink() ?>estadisticas/">
                        <img src="<?php bloginfo('template_directory'); ?>/images/09.jpg" alt="Estadísticas">
                        <figcaption>Estadísticas</figcaption>  
                    </a>                    
                </figure>
            </section>

            <!-- Compartir en redes sociales -->
            <?php anliSocialShare(); ?>
       
        </article>
    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>