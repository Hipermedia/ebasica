<?php
/**
 * Template Name: Estadísticas
 */

get_header(); ?>
   <section class="Materiales">
      <!-- Título del artículo -->
      <h1 class="Materiales-title"><?php the_title(); ?></h1>
      <!-- Contenido -->
      <?php the_content(); ?>

      <div class="Materiales-encabezado">
         <div class="Materiales-encabezadoIcono"></div>
         <div class="Materiales-encabezadoContenedor">
            <h3 class="Materiales-encabezadoContenedor-titulo">Materiales</h3>
            <span class="Materiales-encabezadoContenedor-icon u-icon-pdf"></span>
            <span class="Materiales-encabezadoContenedor-icon u-icon-audio"></span>
            <span class="Materiales-encabezadoContenedor-icon u-icon-imagen"></span>
            <span class="Materiales-encabezadoContenedor-icon u-icon-documento"></span>  
         </div>
      </div>
      
      <?php $args = array('cat' => 11, 'meta' => 'postArchivoDescripcion'); ?>
      <?php $consulta = new WP_Query( $args ); ?>
      <?php $xyz = 0; ?>
      <?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>
      <?php $xyz++; ?>
      <?php 
         $categories = get_the_category(); 
         $cat1 = $categories[0]->cat_ID;
         $cat2 = $categories[1]->cat_ID;

         if($cat1 == 16 || $cat2 == 16) {
            $clase = "imagen";
         }
         
         if($cat1 == 15 || $cat2 == 15) {
            $clase = "audio";
         }

         if($cat1 == 17 || $cat2 == 17) {
            $clase = "documento";
         }

         if($cat1 == 14 || $cat2 == 14) {
            $clase = "pdf";
         }
      ?>
         
      <div class="Materiales-bloque u-border-<?php echo $clase; ?>">
         <div class="Materiales-bloqueIcono u-icono-<?php echo $clase; ?>"></div>
         <div class="Materiales-bloqueContenido u-padding-<?php echo $clase; ?>">
           <h2 class="Materiales-bloqueContenido-titulo u-titulo-<?php echo $clase; ?>">
            <?php the_title(); ?>
           </h2>
           <p class="Materiales-bloqueContenido-data">
            Publicado el <?php the_time(get_option('date_format')); ?>
           </p>
           <div id="expand<?php echo $xyz; ?>" class="Materiales-bloqueContenido-texto">
            <?php the_field('postArchivoDescripcion'); ?>
           </div>
           <a href="" class="u-link">descargar</a>
           <p id="trigger-expand<?php echo $xyz; ?>" class="u-link">ver más</p>
         </div>
      </div>

      <script>
         jQuery('#trigger-expand<?php echo $xyz; ?>').click(function() {
             jQuery('#expand<?php echo $xyz; ?>').toggleClass('appear');
             jQuery('#expand<?php echo $xyz; ?>').toggleClass('animated fadeIn');
         });
      </script>

      <?php endwhile; // end of the loop. ?>
      <?php wp_reset_postdata(); ?>
   </section>
<?php get_footer(); ?>