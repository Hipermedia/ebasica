<div class="Login">
	<?php // Argumentos necesarios para la consulta del login
				$args = array(
				       'echo'           => true,
				       'redirect'       => site_url( '/escritorio' ), 
				       'form_id'        => 'loginform',
				       'label_username' => __( 'Email' ),
				       'label_password' => __( 'Password' ),
				       'label_remember' => __( 'Remember Me' ),
				       'label_log_in'   => __( 'Log In' ),
				       'id_username'    => 'user_login',
				       'id_password'    => 'user_pass',
				       'id_remember'    => 'rememberme',
				       'id_submit'      => 'wp-submit',
				       
				       'remember'       => false,
				       'value_username' => NULL,
				       'value_remember' => false
				   	);  
		    	$args = array(
		    	            'form_id'        => 'loginform-home',
		    	            'label_username' => __( 'nombre de usuario:' ),
		    	            'label_password' => __( 'contraseña:' ),
		    	            'label_remember' => __( 'Recuérdame' ),
		    	            'label_log_in'   => __( 'Ingresar' )
		    	    );
    ?>
	<!-- Botón deingreso -->
	<img id="loginButton" class="Login-image" src="<?php bloginfo('template_directory'); ?>/images/btn_login.png" alt="">
    <?php wp_login_form( $args ); ?>
	<!-- <h4 class="recuperar-password"><a href="<?php echo wp_lostpassword_url(); ?>">¿perdiste tu contraseña?</a></h4> -->
	

</div>