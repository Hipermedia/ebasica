<?php
/**
 * Template Name: Quienes Somos
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
        <article class="Page u-contenido">  
            <!-- Breadcrums -->
            <?php the_breadcrumb();  ?>
            <!-- Nombre de la dirección o programa -->
            <?php global $post; ?>
            <?php if($post->post_parent) :  ?>                
                <h1 class="Page-title"><?php echo get_the_title($post->post_parent); ?></h1>
            <?php endif; ?>
            <!-- Título del artículo -->
            <img src="<?php bloginfo('template_directory'); ?>/images/titulo-acercade.png" alt="Acerca del programa">
            <!-- Contenido -->
            <?php the_content(); ?> 
            <!-- Acordeón -->
            <div class="panel-group Acordeon" id="accordion" role="tablist" aria-multiselectable="true">
                
                <?php if( have_rows('bloquesAcordeon') ): ?>
                    <?php $bloques = 1; ?> 
                    <?php while( have_rows('bloquesAcordeon') ): the_row(); ?>
                        <?php  $bloques++ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headin<?php print $bloques; ?>">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $bloques; ?>" aria-expanded="false" aria-controls="collapse<?php print $bloques; ?>">
                                            <i class="fa fa-circle-o"></i> <?php the_sub_field('titulo'); ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php print $bloques; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php print $bloques; ?>">
                                <div class="panel-body">
                                    <?php the_sub_field('contenido'); ?>
                                    <a class="collapsed arriba" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $bloques; ?>" aria-expanded="false" aria-controls="collapse<?php print $bloques; ?>">
                                        cerrar <span></span>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- Compartir en redes sociales -->
            <?php anliSocialShare(); ?>
       
        </article>
    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>