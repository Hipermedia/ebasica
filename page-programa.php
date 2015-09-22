<?php
/**
 * Template Name: Programa
 */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
         <article class="Programa u-contenido">  
            <!-- Breadcrums -->
            <?php the_breadcrumb();  ?>
            <!-- Título del artículo -->
            <h1 class="Programa-title"><?php the_title(); ?></h1>
            <!-- Contenido -->
            <?php the_content(); ?> 
            <!-- Grid de imágenes -->
            <section class="Programa-grid">
                <!-- arrays -->
                <?php $grid_name = array("Materiales", "Actividades Semanales", "Estadísticas"); ?>
                <?php $url = array("materiales", "actividades-semanales", "estadisticas"); ?>
                <?php $defaul_img = array("1.png", "2.png", "3.png"); ?>
                <?php $user_img = array(); ?>
                <!-- acf images -->
                <?php while(have_rows('gridPrograma')) : the_row(); ?>
                    <?php array_push($user_img, get_sub_field('imagen')); ?>
                <?php endwhile; ?>
                <!-- Materiales -->
                <?php for ($i=0; $i < 3; $i++) { ?>
                <figure class="Programa-gridFigure">
                    <a href="<?php the_permalink() ?><?php echo $url[$i]; ?>/">
                        <img src="<?php if($user_img[$i]!='') { echo $user_img[$i]; } else { echo "http://www.dev4.hipermedia.in/wp-content/themes/ebasica/images/p0".$defaul_img[$i]; } ?>" alt="<?php print $url[$i]; ?>">
                        <figcaption><?php echo $grid_name[$i]; ?></figcaption>  
                    </a>        
                </figure>
                <?php } ?>
            </section>
            <!-- Compartir en redes sociales -->
            <?php anliSocialShare(); ?>
        </article>
    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
