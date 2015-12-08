<?php
/**
 * Template Name: Materiales
 */

get_header(); ?>
   <section class="Materiales">
      <?php the_breadcrumb();  ?>
      <!-- Título del artículo -->
      <?php if($post->post_parent) :  ?>   
        <h1 class="Materiales-title"><?php echo get_the_title($post->post_parent); ?></h1>             
      <?php endif; ?>
      <!-- Contenido -->
      <?php the_content(); ?>

      <?php global $post; ?>
      <?php $template_name = get_post_meta( $post->post_parent, '_wp_page_template', true ); ?>
      <?php  
         $idPadre = $post->post_parent;

         if($template_name == 'page-programa.php') {
          $meta = 'gridPrograma';
          $img_array = 0;
         } elseif ($template_name = 'page-direccion.php') {
           $meta = 'gridDireccion';
           $img_array = 6;
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

      <div class="u-auxiliar-div">
         <div class="Materiales-encabezado">
            <div class="Materiales-encabezadoIcono" style="<?php echo $style; ?>"></div>
            <div class="Materiales-encabezadoContenedor">
               <h3 class="Materiales-encabezadoContenedor-titulo">Materiales</h3>
               <form class="Materiales-encabezadoContenedor-form" action="" name="filtrarpor" method="GET">
                  <span class="Materiales-encabezadoContenedor-icon u-icon-pdf">
                     <input type="submit" OnClick="document.filtrarpor.submit()" name="material" value="14"  >
                  </span>
   
                  <span class="Materiales-encabezadoContenedor-icon u-icon-audio">
                     <input type="submit" OnClick="document.filtrarpor.submit()" name="material" value="15"  >
                  </span>
   
                  <span class="Materiales-encabezadoContenedor-icon u-icon-imagen">
                     <input type="submit" OnClick="document.filtrarpor.submit()" name="material" value="16"  >
                  </span>
   
                  <span class="Materiales-encabezadoContenedor-icon u-icon-documento">
                     <input type="submit" OnClick="document.filtrarpor.submit()" name="material" value="17"  >
                  </span>
               </form>
            </div>
         </div>
         
         <?php $cat_material  = $_GET['material']?$_GET['material']:'11'; ?>
         <?php $args = array( 'paged' => get_query_var('paged'), 'posts_per_page' => 8, 'cat' => $cat_material, 'meta' => 'postArchivoDescripcion', 'author' => $post->post_author); ?>
         <?php $consulta = new WP_Query( $args ); ?>
         <?php $xyz = 0; ?>
         <?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>
         <?php 
         // if(get_field('privacidadPost') == '') {
         //    $remover = 'private-hide';
         // } else {
         //    $remover = '';
         // }
         ?>
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
            
         <div class="Materiales-bloque u-border-<?php echo $clase; ?> <?php //echo $remover; ?>">
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
              <?php if(get_field('adjuntoPost')): ?>
         	     <a href="<?php the_field('adjuntoPost'); ?>" target="_blank" class="u-link">descargar</a>
         	  <?php endif; ?>
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
         <?php the_custom_numbered_nav($consulta); ?>  
         <?php wp_reset_postdata(); ?>
      </div>
   </section>
<?php get_footer(); ?>
