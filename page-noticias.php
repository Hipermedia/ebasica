<?php
/**
 * Template Name: Noticias
 */

get_header(); ?>
   <section class="Noticias">
      <!-- Título del artículo -->
      <h1 class="Noticias-title"><?php the_title(); ?></h1>
      <!-- Contenido -->
      <?php the_content(); ?>

      <div class="Noticias-encabezado">
         <div class="Noticias-encabezadoIcono"></div>
         <div class="Noticias-encabezadoContenedor">
            <h3 class="Noticias-encabezadoContenedor-titulo">Noticias</h3>
         </div>
      </div>
      
      <?php $args = array('cat' => 3 ); ?>
      <?php $consulta = new WP_Query( $args ); ?>
      <?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>
         
      <div class="Noticias-bloque u-border-noticias">
      	<div class="Noticias-bloqueIcono u-icono-noticias"></div>
      	<div class="Noticias-bloqueContenido">
      	  <h2 class="Noticias-bloqueContenido-titulo u-titulo-noticias">
            <?php the_title(); ?>
      	  </h2>
      	  <p class="Noticias-bloqueContenido-data">
            Publicado el <?php the_time(get_option('date_format')); ?>
      	  </p>
      	  <div id="expand" class="Noticias-bloqueContenido-texto">
            <?php the_excerpt(); ?>
      	  </div>
      	  <a href="<?php the_permalink(); ?>" class="u-link">ver noticia</a>
      	</div>
      </div>
      <?php endwhile; // end of the loop. ?>
      <?php wp_reset_postdata(); ?>
   </section>
<?php get_footer(); ?>

