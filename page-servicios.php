<?php
/**
 * Template Name: Servicios
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article class="Page u-contenido u-programas">  
        <!-- Breadcrums -->
        <?php the_breadcrumb();  ?>
        <!-- Nombre de la dirección o programa -->
        <?php global $post; ?>
        <?php if($post->post_parent) :  ?>                
            <h1 class="Page-title"><?php echo get_the_title($post->post_parent); ?></h1>
        <?php endif; ?>
        <!-- Título del artículo -->
        <div class="Page-divAuxiliar">
        	<div class="Page-encabezado">
        	   <div class="Page-encabezadoIcono u-servicios"></div>
        	   <div class="Page-encabezadoContenedor">
        	      <h3 class="Page-encabezadoContenedor-titulo">Servicios</h3>
        	   </div>
        	</div>
        	<!-- Contenido -->
        	<?php the_content(); ?> 
        	<!-- Acordeón -->
        	<div class="panel-group Acordeon" role="tablist" aria-multiselectable="true">
        	    <?php if( have_rows('enlaces') ): ?>
        	        <?php while( have_rows('enlaces') ): the_row(); ?>
        	            <div class="panel panel-default">
        	                <div class="panel-heading" role="tab">
        	                    <h4 class="panel-title">
        	                        <a href="<?php the_sub_field('url'); ?>">
        	                        	<i class="fa fa-circle-o"></i> <?php the_sub_field('titulo'); ?>
        	                        </a>
        	                    </h4>
        	                </div>
        	            </div>
        	        <?php endwhile; ?>
        	    <?php endif; ?>
        	</div>
        	<!-- Compartir en redes sociales -->
        	<?php anliSocialShare(); ?>
        </div>
    </article>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>

