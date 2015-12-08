<?php
/**
 * Template Name: Escritorio
 */
if(!is_user_logged_in()) {

  wp_redirect( home_url() ); exit;

} else {

get_header(); ?>

   <?php while ( have_posts() ) : the_post(); ?>
      <section class="Escritorio">
         <!-- obtengo el ID del usuario loggeado -->
         <?php $usuarioID = wp_get_current_user(); ?>
         <?php $id_query = $usuarioID->user_login; ?>
         
         <h1 class="Page-title"><?php echo $usuarioID->display_name; ?></h1>
      
       	<figure class="Escritorio-imagenSuperior">
          <a href="<?php echo get_option('home') ?>/escritorio">
            <img src="<?php echo get_plantilla_url().'/images/cabecera_MiEscritorio.png' ?>" alt="">
          </a>
       	</figure>
              
         <!-- se dividen en dos: documentos y noticias -->
         <!-- noticias ID = 3 -->
         <!-- documentos ID = 4 -->
         <?php
         $filtro =  $_POST['filtroDocs'] ? $_POST['filtroDocs'] : "'3,4'";
         //$filtro =  $_POST['filtroNoti'] ? $_POST['filtroNoti'] : "'3,4'";
         //echo $filtro;
         // Preguntamos si el current user es hijo de alguna dependencia mayor para mostrar los posts padre
         if( $id_query == 15 || $id_query == 38 || $id_query == 41 || $id_query == 39 ) {
          
          $autor_extra = 14;

         } elseif ( $id_query == 7 || $id_query == 8 ) {
          
          $autor_extra = 6;

         } elseif ( $id_query == 11 || $id_query == 10 ) {
          
          $autor_extra = 9;
         
         } else {

          $autor_extra = $id_query;
         }

         $args = array( 'paged' => get_query_var('paged'), 'author' => ''.$id_query.',62', 'cat' => $filtro, 'posts_per_page' => 10 );

         $the_query = new WP_Query( $args ); 
         ?>
         <?php if ( $the_query->have_posts() ) : ?>
            <!-- pagination here -->
            <!-- the loop -->
            <?php $xyz = 0; ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php $xyz++; ?>
            <?php //global $post; ?>
            <?php //var_dump($post); ?>

            <?php //the_field('privacidadPost'); ?>
            
            <?php //var_dump(get_the_category()); ?>
            <?php $cats_array = get_the_category(); ?>

            <?php foreach($cats_array as $categoria) {
                  $normalID = $categoria->cat_ID;
                  $parentID = $categoria->category_parent;
                  }

                  if ( $parentID == 3 || $normalID == 3 ) {
                     $bg = "noticias";
                     $title = "noticias";
                     $ico = "noti";
                  }

                  if ( $parentID == 4 || $normalID == 4 ) {
                     $bg = "documentos";
                     $title = "documentos";
                     $ico = "docs";
                  }
            ?>

               <div class="Escritorio-bloque">
                  <div class="Escritorio-bloqueIcono <?php the_field('tipoPublicacionEscritorioPost'); ?>"></div>
                  <div class="Escritorio-bloqueContenido u-bg-<?php echo $bg; ?>">
                     <h2 class="Escritorio-bloqueContenido-titulo u-title-<?php echo $title; ?>">
                        <?php the_title(); ?>
                     </h2>
                     <p class="Escritorio-bloqueContenido-data">
                        <!--Subsecretaría de Educación de Veracruz, --><?php the_time(get_option('date_format')); ?>
                     </p>
                      <div id="expand<?php echo $xyz; ?>" class="Escritorio-bloqueContenido-texto">
                         <?php the_field('descripcion_del_archivo_privado'); ?>
                      </div>
                     <!-- <p class="Escritorio-bloqueContenido-texto"> -->
                        <?php //the_excerpt(); ?>
                     <!-- </p> -->
                     <?php if(get_field('adjuntoPost')) : ?>
                     <a href="<?php the_field('adjuntoPost'); ?>" class="u-link" target="_blank">descargar</a>
                     <?php endif; ?>
                     <a id="trigger-expand<?php echo $xyz; ?>" class="u-link">ver más</a>
                  </div>
               </div>

               <script>
                  jQuery('#trigger-expand<?php echo $xyz; ?>').click(function() {
                      jQuery('#expand<?php echo $xyz; ?>').toggleClass('appear');
                      jQuery('#expand<?php echo $xyz; ?>').toggleClass('animated fadeIn');
                  });
               </script>
             <?php endwhile; ?>
             <!-- end of the loop -->
             <!-- pagination here -->
             <?php the_custom_numbered_nav($the_query); ?> 
             <?php wp_reset_postdata(); ?>
         <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
         <?php endif; ?>
       </section>
    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>

<?php } ?>