<?php
/**
 * The Cover template file.
 */

get_header(); ?>

<section class="Cover">

	<?php if( have_rows('sliderPortada', 'option') ): ?>
		<!-- Rotatorio principal -->
		<section class="CoverSlider">	
			<div id="coverSlider" class="flexslider">
			  	<ul class="slides">
			  		<?php while( have_rows('sliderPortada', 'option') ): the_row(); ?>
				    	<li class="CoverSlider-slide">
							<a href="<?php the_sub_field('url'); ?>">
								<img class="CoverSlider-slideImage" src="<?php the_sub_field('imagen'); ?>" alt="<?php the_sub_field('titulo'); ?>">
							</a>
						</li>
					<?php endwhile; ?>
			  	</ul>
			</div>
			<span class="CoverSlider-deco"></span>
		</section>
	<?php endif; ?>

	<!-- Noticias de portada -->
	<?php 
	$args = array( 'posts_per_page' => 6, 'post_type' => 'noticias-portada' );
	$the_query = new WP_Query( $args ); 
	?>

	<?php if ( $the_query->have_posts() ) : ?>
		<section class="CoverNoticias">
			<div id="coverSliderNoticas" class="flexslider CoverNoticias-contenido">
			  	<ul class="slides">
			  		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  		<li class="CoverNoticias-noticia">
			  			<h2 class="CoverNoticias-noticia-titulo"><?php the_title(); ?></h2>
			  			<figure class="CoverNoticias-noticia-thumbnail">
			  				<?php the_post_thumbnail(); ?>
			  			</figure>
			  			<div class="CoverNoticias-noticia-excerpt">
			  				<?php the_excerpt(); ?>
			  			</div>
			  		</li>
			  		<?php endwhile; ?>
			  	</ul>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<!-- Pestañas de portada -->
	<section class="CoverTabs">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs CoverTabs-head" role="tablist">
			<!-- Programas - titulo  -->
			<li role="presentation" class="CoverTabs-tabTitle CoverTabs-tabTitle--programas">
		  		<a class="CoverTabs-btnTitle" href="#tabProgramas" aria-controls="tabProgramas" role="tab" data-toggle="tab"></a>
			</li>
			<!-- Programas - titulo  -->
			<li role="presentation" class="CoverTabs-tabTitle CoverTabs-tabTitle--servicios">
		  		<a class="CoverTabs-btnTitle" href="#tabServicios" aria-controls="tabServicios" role="tab" data-toggle="tab"></a>
			</li>
			<!-- Programas - titulo  -->
			<li role="presentation" class="CoverTabs-tabTitle CoverTabs-tabTitle--noticias">
		  		<a class="CoverTabs-btnTitle" href="#tabNoticias" aria-controls="tabServicios" role="tab" data-toggle="tab"></a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content CoverTabs-body">
			<!-- Programas - contenido  -->
			<div role="tabpanel" class="CoverTabs-contentTab tab-pane fade in" id="tabProgramas">
				<?php if( have_rows('recursoProgramas', 'option') ): ?>
			  		<ul class="CoverTabs-list">
			  		    <?php while( have_rows('recursoProgramas', 'option') ): the_row(); ?>
				  		    <li class="CoverTabs-listItem">
				  		   		<i class="fa fa-circle"></i>
				  		   		<a target="<?php the_sub_field('externo'); ?>" href="<?php the_sub_field('url'); ?>" class="CoverTabs-listItem--programas">
				  		   			<?php the_sub_field('titulo'); ?>
				  		   		</a>
				  		   	</li>
			  		   	<?php endwhile; ?>
			  		</ul>	
		  		<?php endif; ?>
	  			<img class="CoverSlider-slideImage" src="<?php bloginfo('template_directory'); ?>/images/tab_img_programas.png" alt="">       
		  	</div>
		  	<!-- Servicios - contenido  -->
			<div role="tabpanel" class="CoverTabs-contentTab tab-pane fade" id="tabServicios">
		  		<?php if( have_rows('recursoServicios', 'option') ): ?>
			  		<ul class="CoverTabs-list">
			  		    <?php while( have_rows('recursoServicios', 'option') ): the_row(); ?>
				  		    <li class="CoverTabs-listItem">
				  		   		<i class="fa fa-circle"></i>
				  		   		<a href="<?php the_sub_field('url'); ?>" class="CoverTabs-listItem--servicios">
				  		   			<?php the_sub_field('titulo'); ?>
				  		   		</a>
				  		   	</li>
			  		   	<?php endwhile; ?>
			  		</ul>	
		  		<?php endif; ?>
		  		<img class="CoverSlider-slideImage" src="<?php bloginfo('template_directory'); ?>/images/tab_img_servicios.png" alt="">  		
		  	</div>
		  	<!-- Noticias - contenido  -->
			<div role="tabpanel" class="CoverTabs-contentTab tab-pane fade" id="tabNoticias">
		  		<?php if( have_rows('recursoNoticias', 'option') ): ?>
			  		<ul class="CoverTabs-list">
			  		    <?php while( have_rows('recursoNoticias', 'option') ): the_row(); ?>
				  		    <li class="CoverTabs-listItem">
				  		   		<i class="fa fa-circle"></i>
				  		   		<a href="<?php the_sub_field('url'); ?>" class="CoverTabs-listItem--noticias">
				  		   			<?php the_sub_field('titulo'); ?>
				  		   		</a>
				  		   	</li>
			  		   	<?php endwhile; ?>
			  		</ul>	
		  		<?php endif; ?>
		  		<img class="CoverSlider-slideImage" src="<?php bloginfo('template_directory'); ?>/images/tab_img_noticias.png" alt="">	
		  	</div>
		</div>
	</section>

	<!-- Rotatorio secundario -->
	<?php if( have_rows('slidersecundarioportada', 'option') ): ?>
		<!-- Rotatorio principal -->
		<section class="CoverSecondarySlider is-collapsed">	
			<div id="coverSecondarySlider" class="flexslider">
			  	<ul class="slides">
			  		<?php while( have_rows('slidersecundarioportada', 'option') ): the_row(); ?>
				    	<li class="CoverSecondary-slide">
							<a href="<?php the_sub_field('url'); ?>">
								<img class="CoverSecondary-slideImage" src="<?php the_sub_field('imagen'); ?>" alt="<?php the_sub_field('titulo'); ?>">
							</a>
						</li>
					<?php endwhile; ?>
			  	</ul>
			</div>
		</section>
	<?php endif; ?>

</section>
<?php get_footer(); ?>