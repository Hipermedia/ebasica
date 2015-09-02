<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage SH_Base
 * @since SH Base 1.0
 */
?>


<aside class="Sidebar">

	<?php if(!is_page_template('page-escritorio.php')) { ?>
		<!-- Formulario de ingreso en el sidebar -->
		<?php loginSidebar(); ?>
	<?php } ?>
	
	<?php if(is_page_template('page-escritorio.php')) { ?>
		<!-- botón/ficha Documentos -->
		<div class="Documentos">
			<img class="Documentos-image" src="<?php bloginfo('template_directory'); ?>/images/btn_documentos.png" alt="">
			<div id="documentos-panel" class="u-panel">
				<p><span class="u-circle comunicados"></span>comunicados</p>
				<p><span class="u-circle circulares"></span>circulares</p>
				<p><span class="u-circle oficios"></span>oficios</p>
			</div>
		</div>		
		<!-- botón/ficha Noticias -->
		<div class="Noticias">
			<img class="Noticias-image" src="<?php bloginfo('template_directory'); ?>/images/btn_noticias.png" alt="">
			<div id="noticias-panel" class="u-panel">
				<p><span class="u-circle convocatorias"></span>convocatorias</p>
				<p><span class="u-circle estadisticas"></span>estadísticas</p>
				<p><span class="u-circle eventos"></span>eventos</p>
			</div>
		</div>
	<?php } ?>
	
	<?php // Obtengo de que programa o dirección depende la página
			global $post; 
			$template_name = get_post_meta( $post->post_parent, '_wp_page_template', true ); 
	?>

	<?php if(is_page_template('page-programa.php') || $template_name == 'page-programa.php') { ?>
		<!-- botón/ficha Programa -->
		<figure class="ProgramaBtnSidebar">
			<a href="<?php the_permalink() ?>programa/"><img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_programa.png" alt=""></a>
		</figure>
		<!-- botón/ficha Directorio -->
		<figure class="DirectorioBtnSidebar">
			<a href="<?php the_permalink() ?>directorio/"><img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_directorio.png" alt=""></a>
		</figure>
		<!-- botón/ficha Programa -->
		<figure class="ContactoBtnSidebar">
			<a href="<?php the_permalink() ?>contacto/"><img class="ContactoBtnSidebar-image" src="<?php bloginfo('template_directory'); ?>/images/btn_contacto.png" alt=""></a>
		</figure>			
	<?php } ?>
	
	<?php if(is_page_template('page-direccion.php') || $template_name == 'page-direccion.php') { ?>
		<!-- botón/ficha Programa -->
		<figure class="ProgramaBtnSidebar">
			<a href="<?php the_permalink() ?>quienes-somos/"><img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_quienes_somos.png" alt=""></a>
		</figure>
		<!-- botón/ficha Directorio -->
		<figure class="DirectorioBtnSidebar">
			<a href="<?php the_permalink() ?>directorio/"><img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_directorio.png" alt=""></a>
		</figure>
		<!-- botón/ficha Programa -->
		<figure class="ContactoBtnSidebar">
			<a href="<?php the_permalink() ?>contacto/"><img class="ContactoBtnSidebar-image" src="<?php bloginfo('template_directory'); ?>/images/btn_contacto.png" alt=""></a>
		</figure>			
	<?php } ?>



	


</aside>