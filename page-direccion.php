<?php
/**
 * Template Name: Dirección
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
        <article class="Direccion u-contenido">  
            <!-- Breadcrums -->
            <?php the_breadcrumb();  ?>
            
            <!-- Título del artículo -->
            <h1 class="Direccion-title"><?php the_title(); ?></h1>
            <!-- Contenido -->
            <?php the_content(); ?>
            
            <!-- arrays -->
            <?php $url = array("programas", "servicios", "noticias", "", "actividades-semanales", "", "materiales", "", "estadisticas"); ?>
            <?php $defaul_img = array("1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg", "8.jpg", "9.jpg" ); ?>
            <?php $user_img = array(); ?>
            
            <!-- acf images -->
            <?php while(have_rows('gridDireccion')) : the_row(); ?>
                <?php array_push($user_img, get_sub_field('imagen')); ?>
            <?php endwhile; ?>

            <!-- Grid de imágenes -->
            <section class="Direccion-grid">
            <?php for ($i=0; $i < 9; $i++) { ?>
                <figure class="Direccion-gridFigure">
                    <a href="<?php the_permalink() ?><?php echo $url[$i]; ?>/">
                        <img src="<?php if($user_img[$i]!='') { echo $user_img[$i]; } else { echo "http://www.dev4.hipermedia.in/wp-content/themes/ebasica/images/0".$defaul_img[$i]; } ?>" alt="<?php print $url[$i]; ?>">
                        <figcaption><?php $name = $url[$i]; echo $name = ucfirst($name); ?></figcaption>  
                    </a>        
                </figure>
            <?php } ?>
            </section>
            <!-- Compartir en redes sociales -->
            <?php anliSocialShare(); ?>
        </article>
    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>