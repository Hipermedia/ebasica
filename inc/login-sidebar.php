<div class="Login">

    <?php  
    // //Obtengo el usuario que viene del formulario de login
    // $usuario = $_POST['log'];

    // //Extraigo y guardo los primeros dos caracteres del usuario; si es un '30', entonces es un usuario CCT, 
    // //si es cualquier otra cosa entonces es un usuario normal de WP.
    // $usuarioString = substr($usuario, 0, 5);

    // $usuarioTipo = substr($usuarioString, 0, 2);
    // //Extraigo y guardo los siguientes tres caracteres de la cadena del usuario para saber el usuario según
    // //el Tipo de Centro de Trabajo
    // $usuarioTCT = substr($usuarioString, 2, 5);

    // //--Subdirección de Educación Inicial y Preescolar Federalizada
    // $SEIPF = array('DJN', 'DDI', 'FLS', 'PJN', 'NJN', 'PDI', 'NDI', 'FEI');

    // //Pregunto si se le dio click al submit del formulario
    // if(isset($_POST['wp-submit'])) {
        
    //     //Pregunto si es usuario "30"
    //     if($usuarioTipo == 30) {

    //         //Si sí es usuario "30" entonces...
    //         echo "Hola, centro de trabajo <br>";
    //         // echo $usuarioTipo;

    //         if (in_array($usuarioTCT, $SEIPF)) {

    //         }

    //     //Si no es usuario "30", entonces lo redirigimos y logeamos con login de WP
    //     } else {
            
    //     }
    // } 
    ?>

	<!-- Botón deingreso -->
	<img id="loginButton" class="Login-image" src="<?php bloginfo('template_directory'); ?>/images/btn_login.png" alt="">
    <?php //wp_login_form( $form_args ); ?>
    
    <!-- <?php //echo get_option('home'); ?>/wp-login.php -->
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