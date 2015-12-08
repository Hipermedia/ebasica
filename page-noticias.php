<?php
/**
 * Template Name: Noticias
 */

get_header(); ?>
   <section class="Noticias">
      <?php the_breadcrumb();  ?>
      <!-- Título del artículo -->
      <?php if($post->post_parent) :  ?>   
        <h1 class="Noticias-title"><?php echo get_the_title($post->post_parent); ?></h1>             
      <?php endif; ?>
      <!-- Contenido -->
      <?php the_content(); ?>
        <?php global $post; ?>
        <?php  
           $idPadre = $post->post_parent;
           $args = array( 'page_id' => $idPadre, 'meta_key' => 'gridDireccion' ); 
           $consulta_acf_img = new WP_Query( $args ); 
        ?>
        <?php if ( $consulta_acf_img->have_posts() ) : ?>
           <?php while ( $consulta_acf_img->have_posts() ) : $consulta_acf_img->the_post(); ?>
              <?php if(get_field('gridDireccion')) : ?>
              <?php $imagen = get_field('gridDireccion'); ?>
              <?php $img = $imagen[2]; ?>
              <?php $primera = $img['imagen']; ?>
              <?php endif; ?>
              <?php if($primera!="") { $style = "background-image: url(".$primera.");"; } else { $style = ""; } ?>
           <?php endwhile; ?>
           <?php wp_reset_postdata(); ?>
        <?php endif; ?>

      <div class="u-auxiliar-div">
        <div class="Noticias-encabezado">
           <div class="Noticias-encabezadoIcono" style="<?php echo $style; ?>"></div>
           <div class="Noticias-encabezadoContenedor">
              <h3 class="Noticias-encabezadoContenedor-titulo">Noticias</h3>
           </div>
        </div>

        <?php $args = array( 'posts_per_page' => 8, 'cat' => 3, 'author' => $post->post_author); ?>
        <?php $consulta = new WP_Query( $args ); ?>
        <?php while ( $consulta->have_posts() ) : $consulta->the_post(); ?>
        <?php if(get_field('privacidadPost') == '') {
           $remover = 'private-hide';
        } else {
           $remover = '';
        }
        ?>
           <div class="Noticias-bloque u-border-noticias <?php echo $remover; ?>">
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
        <?php the_custom_numbered_nav( $consulta ); ?> 
        <?php wp_reset_postdata(); ?>
      </div>
   </section>
<?php get_footer(); ?>

