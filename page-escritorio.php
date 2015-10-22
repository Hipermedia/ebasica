<?php
/**
 * Template Name: Escritorio
 */

get_header(); ?>
   <?php while ( have_posts() ) : the_post(); ?>
      <section class="Escritorio">

         <!-- obtengo el ID del usuario loggeado -->
         <?php $usuarioID = wp_get_current_user(); ?>
         <?php $id_query = $usuarioID->user_login; ?>
         
         <h1 class="Page-title"><?php echo $usuarioID->display_name; ?></h1>
      
       	<figure class="Escritorio-imagenSuperior">
       		<img src="<?php echo get_plantilla_url().'/images/cabecera_MiEscritorio.png' ?>" alt="">
       	</figure>
              
         <!-- se dividen en dos: documentos y noticias -->
         <!-- noticias ID = 3 -->
         <!-- documentos ID = 4 -->
         <?php
         $filtro =  $_POST['filtroDocs'] ? $_POST['filtroDocs'] : "'3,4'";
         //$filtro =  $_POST['filtroNoti'] ? $_POST['filtroNoti'] : "'3,4'";
         //echo $filtro;

         $args = array( 'author' => $id_query, 'cat' => $filtro, 'posts_per_page' => -1 );

         $the_query = new WP_Query( $args ); 
         ?>
         <?php if ( $the_query->have_posts() ) : ?>
            <!-- pagination here -->
            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
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
                  <div class="Escritorio-bloqueIcono <?php echo $ico; ?>-icon-co"></div>
                  <div class="Escritorio-bloqueContenido u-bg-<?php echo $bg; ?>">
                     <h2 class="Escritorio-bloqueContenido-titulo u-title-<?php echo $title; ?>">
                        <?php the_title(); ?>
                     </h2>
                     <p class="Escritorio-bloqueContenido-data">
                        Subsecretaría de Educación de Veracruz, <?php the_time(get_option('date_format')); ?>
                     </p>
                     <!-- <p class="Escritorio-bloqueContenido-texto"> -->
                        <?php the_excerpt(); ?>
                     <!-- </p> -->
                     <a href="" class="u-link">descargar</a>
                     <a href="" class="u-link">ver más</a>
                  </div>
               </div>
             <?php endwhile; ?>
             <!-- end of the loop -->
             <!-- pagination here -->
             <?php wp_reset_postdata(); ?>
         <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
         <?php endif; ?>


       	<!-- <div class="Escritorio-bloque">
       		<div class="Escritorio-bloqueIcono docs-icon-co"></div>
       		<div class="Escritorio-bloqueContenido u-bg-documentos">
       			<h2 class="Escritorio-bloqueContenido-titulo u-title-documentos">
       				Capacita IVEA a Enlaces Regionales de Incorporación
       			</h2>
       			<p class="Escritorio-bloqueContenido-data">
       				Subsecretaría de Educación de Veracruz, Xalapa, Ver,. 09 de agosto de 2015
       			</p>
       			<p id="expand" class="Escritorio-bloqueContenido-texto">
       				El Instituto Veracruzano de Educación para los Adultos (IVEA) capacitó a 275 voluntarios como Enlaces Regionales de Incorporación (ERI) este fin de semana, en los municipios... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus dicta debitis laudantium dolore libero delectus harum voluptas a deserunt mollitia!
       			</p>
       			<a href="" class="u-link">descargar</a>
       			<p id="trigger-expand" class="u-link">ver más</p>
       		</div>
       	</div>

       	<div class="Escritorio-bloque">
       		<div class="Escritorio-bloqueIcono docs-icon-ci"></div>
       		<div class="Escritorio-bloqueContenido u-bg-documentos">
       			<h2 class="Escritorio-bloqueContenido-titulo u-title-documentos">
       				Capacita IVEA a Enlaces Regionales de Incorporación
       			</h2>
       			<p class="Escritorio-bloqueContenido-data">
       				Subsecretaría de Educación de Veracruz, Xalapa, Ver,. 09 de agosto de 2015
       			</p>
       			<p class="Escritorio-bloqueContenido-texto">
       				El Instituto Veracruzano de Educación para los Adultos (IVEA) capacitó a 275 voluntarios como Enlaces Regionales de Incorporación (ERI) este fin de semana, en los municipios...
       			</p>
       			<a href="" class="u-link">descargar</a>
       			<a href="" class="u-link">ver más</a>
       		</div>
       	</div>

       	<div class="Escritorio-bloque">
       		<div class="Escritorio-bloqueIcono noti-icon-co"></div>
       		<div class="Escritorio-bloqueContenido u-bg-noticias">
       			<h2 class="Escritorio-bloqueContenido-titulo u-title-noticias">
       				Se inaugura XIX Congreso Ordinario del SETSE
       			</h2>
       			<p class="Escritorio-bloqueContenido-data">
       				Subsecretaría de Educación de Veracruz, Xalapa, Ver,. 09 de agosto de 2015
       			</p>
       			<p class="Escritorio-bloqueContenido-texto">
       				La secretaria de Educación de Veracruz, Xóchitl Osorio Martínez, inauguró el XIX Congreso Ordinario del Sindicato Estatal de Trabajadores al Servicios de la Educación (Setse), con...
       			</p>
       			<a href="" class="u-link">descargar</a>
       			<a href="" class="u-link">ver más</a>
       		</div>
       	</div>

       	<div class="Escritorio-bloque">
       		<div class="Escritorio-bloqueIcono docs-icon-of"></div>
       		<div class="Escritorio-bloqueContenido u-bg-documentos">
       			<h2 class="Escritorio-bloqueContenido-titulo u-title-documentos">
       				Capacita IVEA a Enlaces Regionales de Incorporación
       			</h2>
       			<p class="Escritorio-bloqueContenido-data">
       				Subsecretaría de Educación de Veracruz, Xalapa, Ver,. 09 de agosto de 2015
       			</p>
       			<p class="Escritorio-bloqueContenido-texto">
       				El Instituto Veracruzano de Educación para los Adultos (IVEA) capacitó a 275 voluntarios como Enlaces Regionales de Incorporación (ERI) este fin de semana, en los municipios...
       			</p>
       			<a href="" class="u-link">descargar</a>
       			<a href="" class="u-link">ver más</a>
       		</div>
       	</div>

       	<div class="Escritorio-bloque">
       		<div class="Escritorio-bloqueIcono noti-icon-es"></div>
       		<div class="Escritorio-bloqueContenido u-bg-noticias">
       			<h2 class="Escritorio-bloqueContenido-titulo u-title-noticias">
       				Se inaugura XIX Congreso Ordinario del SETSE
       			</h2>
       			<p class="Escritorio-bloqueContenido-data">
       				Subsecretaría de Educación de Veracruz, Xalapa, Ver,. 09 de agosto de 2015
       			</p>
       			<p class="Escritorio-bloqueContenido-texto">
       				La secretaria de Educación de Veracruz, Xóchitl Osorio Martínez, inauguró el XIX Congreso Ordinario del Sindicato Estatal de Trabajadores al Servicios de la Educación (Setse), con...
       			</p>
       			<a href="" class="u-link">descargar</a>
       			<a href="" class="u-link">ver más</a>
       		</div>
       	</div>

       	<div class="Escritorio-bloque">
       		<div class="Escritorio-bloqueIcono noti-icon-ev"></div>
       		<div class="Escritorio-bloqueContenido u-bg-noticias">
       			<h2 class="Escritorio-bloqueContenido-titulo u-title-noticias">
       				Se inaugura XIX Congreso Ordinario del SETSE
       			</h2>
       			<p class="Escritorio-bloqueContenido-data">
       				Subsecretaría de Educación de Veracruz, Xalapa, Ver,. 09 de agosto de 2015
       			</p>
       			<p class="Escritorio-bloqueContenido-texto">
       				La secretaria de Educación de Veracruz, Xóchitl Osorio Martínez, inauguró el XIX Congreso Ordinario del Sindicato Estatal de Trabajadores al Servicios de la Educación (Setse), con...
       			</p>
       			<a href="" class="u-link">descargar</a>
       			<a href="" class="u-link">ver más</a>
       		</div>
       	</div>

       	<div class="Escritorio-bloque">
       		<div class="Escritorio-bloqueIcono docs-icon-of"></div>
       		<div class="Escritorio-bloqueContenido u-bg-documentos">
       			<h2 class="Escritorio-bloqueContenido-titulo u-title-documentos">
       				Capacita IVEA a Enlaces Regionales de Incorporación
       			</h2>
       			<p class="Escritorio-bloqueContenido-data">
       				Subsecretaría de Educación de Veracruz, Xalapa, Ver,. 09 de agosto de 2015
       			</p>
       			<p class="Escritorio-bloqueContenido-texto">
       				El Instituto Veracruzano de Educación para los Adultos (IVEA) capacitó a 275 voluntarios como Enlaces Regionales de Incorporación (ERI) este fin de semana, en los municipios...
       			</p>
       			<a href="" class="u-link">descargar</a>
       			<a href="" class="u-link">ver más</a>
       		</div>
       	</div> -->
       </section>
    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>