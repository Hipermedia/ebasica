<?php
/**
 * Template Name: Actividades Semanales
 */

get_header(); ?>
   <section class="Materiales">
      <?php the_breadcrumb();  ?>
      <!-- Título del artículo -->
      <h1 class="Materiales-title"><?php the_title(); ?></h1>
      <!-- Contenido -->
      <?php the_content(); ?>

      <?php global $post; ?>
      <?php $template_name = get_post_meta( $post->post_parent, '_wp_page_template', true ); ?>
      <?php  
         $idPadre = $post->post_parent;
         if($template_name == 'page-programa.php') {
          $meta = 'gridPrograma';
          $img_array = 1;
         } elseif ($template_name = 'page-direccion.php') {
           $meta = 'gridDireccion';
           $img_array = 4;
         }
         $args = array( 'page_id' => $idPadre, 'meta_key' => $meta ); 
         $consulta_acf_img = new WP_Query( $args ); 
      ?>
      <?php if ( $consulta_acf_img->have_posts() ) : ?>
         <?php while ( $consulta_acf_img->have_posts() ) : $consulta_acf_img->the_post(); ?>
            <?php if(get_field($meta)) : ?>
            <?php $imagen = get_field($meta); ?>
            <?php $img = $imagen[$img_array]; ?>
            <?php $primera = $img['imagen']; ?>
            <?php endif; ?>
            <?php if($primera!="") { $style = "background-image: url(".$primera.");"; } else { $style = ""; } ?>
         <?php endwhile; ?>
         <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      <div class="Materiales-encabezado">
         <div class="Materiales-encabezadoIcono" style="<?php echo $style; ?>"></div>
         <div class="Materiales-encabezadoContenedor">
            <h3 class="Materiales-encabezadoContenedor-titulo">Actividades Semanales</h3>
            <span class="Materiales-encabezadoContenedor-icon u-icon-pdf"></span>
            <span class="Materiales-encabezadoContenedor-icon u-icon-audio"></span>
            <span class="Materiales-encabezadoContenedor-icon u-icon-imagen"></span>
            <span class="Materiales-encabezadoContenedor-icon u-icon-documento"></span>  
         </div>
      </div>
      
      <?php $args = array( 'posts_per_page' => 4, 'cat' => 12, 'meta' => 'postArchivoDescripcion', 'author' => $post->post_author); ?>
      <?php $consulta = new WP_Query( $args ); ?>
      <?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>

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
      	<div class="Materiales-bloqueContenido">
      	  <h2 class="Materiales-bloqueContenido-titulo u-titulo-<?php echo $clase; ?>">
            <?php the_title(); ?>
      	  </h2>
      	  <p class="Materiales-bloqueContenido-data">
             <?php the_time(get_option('date_format')); ?>
      	  </p>
      	  <div id="expand" class="Materiales-bloqueContenido-texto">
            <?php the_field('postArchivoDescripcion'); ?>
      	  </div>
      	  <a href="" class="u-link">descargar</a>
      	  <p id="trigger-expand" class="u-link">ver más</p>
      	</div>
      </div>
      <?php endwhile; // end of the loop. ?>
      <?php the_custom_numbered_nav( $consulta ); ?> 
      <?php wp_reset_postdata(); ?>
   </section>
<?php get_footer(); ?>

