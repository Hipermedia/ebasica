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
			
			<form id="documentosFilter" action="" method="POST">
				<div id="documentos-panel" class="u-panel">
					<p id="comunicadosTrigger"><span class="u-circle comunicados"></span>comunicados</p>

					<p id="circularesTrigger"><span class="u-circle circulares"></span>circulares</p>
					
					<p id="oficiosTrigger"><span class="u-circle oficios"></span>oficios</p>

					<input id="documentosInput" type="hidden" name="filtroDocs" value="">
				</div>
			</form>

		</div>		
		<!-- botón/ficha Noticias -->
		<div class="Noticias">
			<img class="Noticias-image" src="<?php bloginfo('template_directory'); ?>/images/btn_noticias.png" alt="">
			
			<form id="noticiasFilter" action="" method="POST">
				<div id="noticias-panel" class="u-panel">
					<p id="convocatoriasTrigger"><span class="u-circle convocatorias"></span>convocatorias</p>
					<p id="estadisticasTrigger"><span class="u-circle estadisticas"></span>estadísticas</p>
					<p id="eventosTrigger"><span class="u-circle eventos"></span>eventos</p>

					<input id="noticiasInput" type="hidden" name="filtroDocs" value="">
				</div>
			</form>
		</div>
	<?php } ?>
	
	<?php // Obtengo de que programa o dirección depende la página
		global $post; 
		$template_name = get_post_meta( $post->post_parent, '_wp_page_template', true );
		$direccion_direccion = get_post_meta( $post->post_parent, 'direccionDireccion', true);
		$ciudad_direccion = get_post_meta( $post->post_parent, 'ciudadDireccion', true);
		$cp_direccion = get_post_meta( $post->post_parent, 'cpDireccion', true);
		$telefono_direccion = get_post_meta( $post->post_parent, 'telefonoDireccion', true);
		$correo_direccion = get_post_meta( $post->post_parent, 'correoDireccion', true);

		$direccion_programa = get_post_meta( $post->post_parent, 'direccionPrograma', true);
		$ciudad_programa = get_post_meta( $post->post_parent, 'ciudadPrograma', true);
		$cp_programa = get_post_meta( $post->post_parent, 'cpPrograma', true);
		$telefono_programa = get_post_meta( $post->post_parent, 'telefonoPrograma', true);
		$correo_programa = get_post_meta( $post->post_parent, 'correoPrograma', true);
	?>

	<?php if(is_page_template('page-programa.php') || $template_name == 'page-programa.php') { ?>
		<!-- botón/ficha Programa -->
		<figure class="ProgramaBtnSidebar">
			<?php if (is_page_template('page-programa.php')) : ?>
				<a href="<?php the_permalink() ?>programa/">
			<?php else : ?>
				<a href="<?php echo get_permalink($post->post_parent) ?>programa/">
			<?php endif; ?>
				<img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_programa.png" alt="">
			</a>
		</figure>
		<!-- botón/ficha Directorio -->
		<figure class="DirectorioBtnSidebar">
			<?php if (is_page_template('page-programa.php')) : ?>
				<a href="<?php the_permalink() ?>directorio/">
			<?php else : ?>
				<a href="<?php echo get_permalink($post->post_parent) ?>directorio/">
			<?php endif; ?>
				<img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_directorio.png" alt="">
			</a>
		</figure>
		<!-- botón/ficha Programa -->
		<figure class="ContactoBtnSidebar">
			<img class="ContactoBtnSidebar-image" src="<?php bloginfo('template_directory'); ?>/images/btn_contacto.png" alt="">
			<div id="contacto-panel" class="ContactoBtnSidebar-panel">
				<!-- Dirección -->
				<?php if (get_field('direccionPrograma') != '') :?>
				<p>
					<i class="fa fa-map-marker"></i> 
					<?php the_field('direccionPrograma'); ?>
					<br>
					<?php the_field('ciudadPrograma'); ?>
					<br>
					<?php the_field('cpPrograma'); ?>
				</p>
				<?php endif; ?>
				<!-- Teléfono -->
				<?php if (get_field('telefonoPrograma') != '') :?>
				<p>
					<i class="fa fa-phone"></i>
					<?php the_field('telefonoPrograma'); ?>
				</p>
				<?php endif; ?>
				<!-- Correo -->
				<?php if (get_field('correoPrograma') != '') :?>
					<p>
						<i class="fa fa-envelope"></i> 
						<a href="mailto:<?php the_field('correoPrograma'); ?>"><?php the_field('correoPrograma'); ?></a>
					</p>
				<?php endif; ?>

				<!-- dirección del padre en hijo (medio tronco pero funciona) -->
				<?php if ($direccion_programa != '') :?>
					<p>
						<i class="fa fa-map-marker"></i> 
						<?php echo $direccion_programa; ?>
						<br>
						<?php echo $ciudad_programa; ?>
						<br>
						<?php echo $cp_programa; ?>
					</p>
				<?php endif; ?>
				<!-- telefono -->
				<?php if ($telefono_programa != '') :?>
					<p>
						<i class="fa fa-phone"></i>
						<?php echo $telefono_programa; ?>
					</p>
				<?php endif; ?>
				<!-- correo -->
				<?php if ($correo_programa != '') :?>
					<p>
						<i class="fa fa-envelope"></i> 
						<a href="mailto:<?php echo $correo_programa; ?>"><?php echo $correo_programa; ?></a>
					</p>
				<?php endif; ?>
			</div>
		</figure>			
	<?php } ?>
	
	<?php if(is_page_template('page-direccion.php') || $template_name == 'page-direccion.php') { ?>
		<!-- botón/ficha Programa -->
		<figure class="ProgramaBtnSidebar">
			<?php if (is_page_template('page-direccion.php')) : ?>
				<a href="<?php the_permalink() ?>quienes-somos/">
			<?php else : ?>
				<a href="<?php echo get_permalink($post->post_parent) ?>quienes-somos/">
			<?php endif; ?>
				<img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_quienes_somos.png" alt="">
			</a>
		</figure>
		<!-- botón/ficha Directorio -->
		<figure class="DirectorioBtnSidebar">
			<?php if (is_page_template('page-direccion.php')) : ?>
				<a href="<?php the_permalink() ?>directorio/">
			<?php else : ?>
				<a href="<?php echo get_permalink($post->post_parent) ?>directorio/">
			<?php endif; ?>
				<img class="" src="<?php bloginfo('template_directory'); ?>/images/btn_directorio.png" alt="">
			</a>
		</figure>
		<!-- botón/ficha Programa -->
		<figure class="ContactoBtnSidebar">
			<img class="ContactoBtnSidebar-image" src="<?php bloginfo('template_directory'); ?>/images/btn_contacto.png" alt="">
			<div id="contacto-panel" class="ContactoBtnSidebar-panel">
			<!-- direccion -->
				<?php if (get_field('direccionDireccion') != '') :?>
					<p>
						<i class="fa fa-map-marker"></i> 
						<?php the_field('direccionDireccion'); ?>
						<br>
						<?php the_field('ciudadDireccion'); ?>
						<br>
						<?php the_field('cpDireccion'); ?>
					</p>
				<?php endif; ?>
				<!-- telefono -->
				<?php if (get_field('telefonoDireccion') != '') :?>
					<p>
						<i class="fa fa-phone"></i>
						<?php the_field('telefonoDireccion'); ?>
					</p>
				<?php endif; ?>
				<!-- correo -->
				<?php if (get_field('correoDireccion') != '') :?>
					<p>
						<i class="fa fa-envelope"></i> 
						<a href="mailto:<?php the_field('correoDireccion'); ?>"><?php the_field('correoDireccion'); ?></a>
					</p>
				<?php endif; ?>
				
				<!-- dirección del padre en hijo (medio tronco pero funciona) -->
				<?php if ($direccion_direccion != '') :?>
					<p>
						<i class="fa fa-map-marker"></i> 
						<?php echo $direccion_direccion; ?>
						<br>
						<?php echo $ciudad_direccion; ?>
						<br>
						<?php echo $cp_direccion; ?>
					</p>
				<?php endif; ?>
				<!-- telefono -->
				<?php if ($telefono_direccion != '') :?>
					<p>
						<i class="fa fa-phone"></i>
						<?php echo $telefono_direccion; ?>
					</p>
				<?php endif; ?>
				<!-- correo -->
				<?php if ($correo_direccion != '') :?>
					<p>
						<i class="fa fa-envelope"></i> 
						<a href="mailto:<?php echo $correo_direccion; ?>"><?php echo $correo_direccion; ?></a>
					</p>
				<?php endif; ?>
			</div>
		</figure>			
	<?php } ?>

	<?php if(is_home()) : ?>
		<figure class="ContactoBtnSidebar">
			<img class="ContactoBtnSidebar-image" src="<?php bloginfo('template_directory'); ?>/images/btn_contacto.png" alt="">
			<div id="contacto-panel" class="ContactoBtnSidebar-panel">
			<!-- direccion -->
				<?php if (get_field('direccionContacto', 'option') != '') :?>
					<p>
						<i class="fa fa-map-marker"></i> 
						<?php the_field('direccionContacto', 'option'); ?>
						<br>
						<?php the_field('ciudadContacto', 'option'); ?>
						<br>
						<?php the_field('cpContacto', 'option'); ?>
					</p>
				<?php endif; ?>
				<!-- telefono -->
				<?php if (get_field('telefonoContacto', 'option') != '') :?>
					<p>
						<i class="fa fa-phone"></i>
						<?php the_field('telefonoContacto', 'option'); ?>
					</p>
				<?php endif; ?>
				<!-- correo -->
				<?php if (get_field('correoContacto', 'option') != '') :?>
					<p>
						<i class="fa fa-envelope"></i> 
						<a href="mailto:<?php the_field('correoContacto', 'option'); ?>"><?php the_field('correoContacto', 'option'); ?></a>
					</p>
				<?php endif; ?>
			</div>
		</figure>			
	<?php endif; ?>

	<div class="Sidebar-banners">
		<?php while(have_rows('bannersSidebar', 'option')) : the_row(); ?>
			<figure>
				<a href="<?php if(get_sub_field('url', 'option')) { the_sub_field('url', 'option'); $style = "style='cursor: pointer'"; } else { echo "#"; $style = "style='cursor: default'"; } ?>" <?php echo $style; ?>>
					<img src="<?php the_sub_field('imagen', 'option'); ?>" alt="">
				</a>
			</figure>
		<?php endwhile ?>
	</div>
</aside>


