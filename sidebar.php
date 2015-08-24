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

	<?php if(!is_page_template('page-escritorio.php')) { ?>
		<!-- Formulario de ingreso en el sidebar -->
		<?php loginSidebar(); ?>
	<?php } ?>


</aside>