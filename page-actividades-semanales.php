<?php
/**
 * Template Name: Actividades Semanales
 */

get_header(); ?>
   <section class="ActividadesSemanales">
      <?php the_breadcrumb();  ?>
      <!-- Título del artículo -->
      <?php if($post->post_parent) :  ?>   
        <h1 class="ActividadesSemanales-title"><?php echo get_the_title($post->post_parent); ?></h1>             
      <?php endif; ?>
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
      
      <div class="u-auxiliar-div">
         <div class="ActividadesSemanales-encabezado">
            <div class="ActividadesSemanales-encabezadoIcono" style="<?php echo $style; ?>"></div>
            <div class="ActividadesSemanales-encabezadoContenedor">
               <h3 class="ActividadesSemanales-encabezadoContenedor-titulo u-minus">Actividades</h3>
               <h3 class="ActividadesSemanales-encabezadoContenedor-titulo u-normal">Semanales</h3> 
            </div>
         </div>
         
         <?php $args = array( 'posts_per_page' => 4, 'cat' => 12, 'meta' => 'postArchivoDescripcion', 'author' => $post->post_author); ?>
         <?php $consulta = new WP_Query( $args ); ?>
         <?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>
            
         <div class="ActividadesSemanales-bloque u-border-actividades">
         	<div class="ActividadesSemanales-bloqueContenido">
         	  <h2 class="ActividadesSemanales-bloqueContenido-titulo u-titulo-actividades">
               <?php the_title(); ?>
         	  </h2>
         	  <p class="ActividadesSemanales-bloqueContenido-data">
                <?php the_time(get_option('date_format')); ?>
         	  </p>
         	  <div id="expand" class="ActividadesSemanales-bloqueContenido-texto">
               <?php the_excerpt(); ?>
         	  </div>
         	  <a href="<?php the_permalink(); ?>" class="u-link">ver más</a>
         	</div>
         </div>
         <?php endwhile; // end of the loop. ?>
         <?php the_custom_numbered_nav( $consulta ); ?> 
         <?php wp_reset_postdata(); ?>
      </div>
   </section>
<?php get_footer(); ?>

