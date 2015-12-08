<?php
/**
 * Template Name: Estadísticas
 */

get_header(); ?>
   <section class="Estadisticas">

    <?php the_breadcrumb();  ?>
      <!-- Título del artículo -->
      <?php if($post->post_parent) :  ?>   
        <h1 class="Estadisticas-title"><?php echo get_the_title($post->post_parent); ?></h1>             
      <?php endif; ?>
      <!-- Contenido -->
      <?php the_content(); ?>

      <?php global $post; ?>
      <?php $template_name = get_post_meta( $post->post_parent, '_wp_page_template', true ); ?>
      <?php //echo $template_name; ?>
      <?php  
         $idPadre = $post->post_parent;

         if($template_name == 'page-programa.php') {
          $meta = 'gridPrograma';
          $img_array = 2;
         } elseif ($template_name = 'page-direccion.php') {
           $meta = 'gridDireccion';
           $img_array = 8;
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
        <div class="Estadisticas-encabezado">
           <div class="Estadisticas-encabezadoIcono" style="<?php echo $style; ?>"></div>
           <div class="Estadisticas-encabezadoContenedor">
              <h3 class="Estadisticas-encabezadoContenedor-titulo">Estadísticas</h3>
              <!-- <span class="Estadisticas-encabezadoContenedor-icon u-icon-pdf"></span> -->
              <span class="Estadisticas-encabezadoContenedor-icon u-icon-pdf"></span>  
           </div>
        </div>
        
        <?php $args = array( 'posts_per_page' => 8, 'cat' => 13, 'meta' => 'postArchivoDescripcion', 'author' => $post->post_author) 
        ?>
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
        <div class="Estadisticas-bloque u-border-estadisticas <?php //echo $remover; ?>">
           <div class="Estadisticas-bloqueIcono u-icono-estadisticas"></div>
           <div class="Estadisticas-bloqueContenido u-padding-estadisticas">
             <h2 class="Estadisticas-bloqueContenido-titulo u-titulo-estadisticas">
              <?php the_title(); ?>
             </h2>
             <p class="Estadisticas-bloqueContenido-data">
              Publicado el <?php the_time(get_option('date_format')); ?>
             </p>
             <div id="expand<?php echo $xyz; ?>" class="Estadisticas-bloqueContenido-texto">
              <?php the_field('postArchivoDescripcion'); ?>
             </div>
             <a href="<?php the_field('adjuntoPost'); ?>" target="_blank" class="u-link">descargar</a>
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
        <?php the_custom_numbered_nav( $consulta ); ?> 
        <?php wp_reset_postdata(); ?>
      </div>
   </section>
<?php get_footer(); ?>
