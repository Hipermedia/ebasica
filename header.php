<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<!-- Basic Page Needs
 ================================================== -->  
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
    <?php /*Print the <title> tag based on what is being viewed.*/
    	global $page, $paged;
    	wp_title( '|', true, 'right' );
    	// Add the blog name.
    	bloginfo( 'name' );
    	// Add the blog description for the home/front page.
    	$site_description = get_bloginfo( 'description', 'display' );
    	if ( $site_description && ( is_home() || is_front_page() ) )
    		echo " | $site_description";
    	// Add a page number if necessary:
    	if ( $paged >= 2 || $page >= 2 )
    		echo ' | ' . sprintf( __( 'Page %s', 'shbase' ), max( $paged, $page ) );
	?>
</title>
<meta name="author" content="<?php echo bloginfo( 'name' ); ?>" />
<meta name="robots" content="all">
<!-- Mobile Specific Metas
 ================================================== --> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- CSS
  ================================================== -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!-- Favicon
  ================================================== -->
<link href="<?php the_field('favicon', 'option'); ?>" rel="icon" type="image/x-icon" />
<!-- pingback
  ================================================== -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper u-contenedor">

    <header id="header" class="Header" role="banner" >
            
        <aside class="Header-inicioMapa">
              <ul>
                  <li><a href="<?php inicio_url(); ?>/mapa/">Mapa</a></li>
                  <li><a href="<?php inicio_url(); ?>">Inicio</a></li>
              </ul>
        </aside>
        
        <!-- Logo SEB-->
        <a href="<?php inicio_url(); ?>" id="header-logo" class="Header-logoSEB  animated flipInX">
            <!-- <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>"> -->
            <img src="<?php bloginfo('template_directory'); ?>/images/logo-seb.png" alt="<?php bloginfo('name'); ?>">
        </a>
        <!-- Logo SEV-->
        <a href="http://www.sev.gob.mx/" id="header-logo" class="Header-logoSEV  animated flipInX">
            <!-- <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>"> -->
            <img src="<?php bloginfo('template_directory'); ?>/images/logo-sev.png" alt="<?php bloginfo('name'); ?>">
        </a>
            
        <!-- Menú principal -->  
        <?php mainNav(); ?>
            
    </header>

    <main class="Main">