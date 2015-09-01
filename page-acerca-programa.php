<?php
/**
 * Template Name: Acerca del programa
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
       
        <article class="Page u-contenido">  
            
            <!-- Título del artículo -->
            <img src="<?php bloginfo('template_directory'); ?>/images/titulo-acercade.png" alt="">
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
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $bloques; ?>" aria-expanded="false" aria-controls="collapse<?php print $bloques; ?>">
                                        Cerrar
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