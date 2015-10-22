<?php $error = $_GET["login-error"]; ?>
<?php echo $error; ?>

<div class="Login">

	<!-- Botón deingreso -->
	<img id="loginButton" class="Login-image" src="<?php bloginfo('template_directory'); ?>/images/btn_login.png" alt="">

    <!-- formulario login WP a patín -->
    <form name="loginform" id="loginform-home" action="<?php echo get_option('home'); ?>/conmutador" method="POST">
    	<p>
    		<input type="text" name="log" id="user_login" value=""/>
    	</p>
    	<p>
    		<input type="password" name="pwd" id="user_pass" value=""/>
    	</p>
    	<p class="submit">
    		<input type="submit" name="wp-submit" id="wp-submit" value="Ingresar"/>
    		<input type="hidden" name="redirect_to" value="<?php echo get_option('home'); ?>/" />
    	</p>
    </form>
	<!-- <h4 class="recuperar-password"><a href="<?php //echo wp_lostpassword_url(); ?>">¿perdiste tu contraseña?</a></h4> -->
</div>
