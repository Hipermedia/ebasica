<?php
	//Obtengo el usuario y contraseña que viene del formulario de login
	$usuario = $_POST['log'];
	$contrasena	= $_POST['pwd'];

	//Guardo en una variable el string con los primeros 5 caracteres del usuario
	$usuarioString = substr($usuario, 0, 5);

	//Extraigo y guardo los primeros dos caracteres del string anterior; si es un '30', entonces es un usuario CCT, 
	//si es cualquier otra cosa entonces es un usuario normal de WP.
	$usuarioTipo = substr($usuarioString, 0, 2);

	//Extraigo y guardo los siguientes tres caracteres de la cadena del usuario para asignar el usuario WP según
	//el Tipo de Centro de Trabajo
	$usuarioTCT = substr($usuarioString, 2, 5);

	if($usuarioTCT == 'ADG')  {
		$usuarioTCT = $usuario;
	}

	//Construimos un array por cada CCT con todas sus literales para mostrar las noticias que le corresponden
	//en la plantilla de escritorio
	//--Dirección General de Educación Inicial y Preescolar
	$DGEIP = array('FLS', '30ADG2312Z', '30ADG2317U');
	//--Subdirección de Educación Inicial y Preescolar Federalizada
	$SEIPF = array('DJN', 'DDI', 'FLS', 'PJN', 'NJN', 'PDI', 'NDI', 'FEI');
	//--Subdirección de Educación Preescolar Estatal
	$SEPE = array('EJN', 'UDI', 'EDI', 'PJN');
	//--Dirección General de Educación Primaria Federalizada
	$DGEPF = array('DPR', 'PPR', 'DZC', '30ADG0075Z');
	//--Dirección General de Educación Primaria Estatal
	$DGEPE = array('EPR', 'EBA', 'PPR');
	//--Subdirección de Escuelas Secundarias Generales 
	$SESG = array('DES', 'PES', 'DSN');
	//--Subdirección de Escuelas Secundarias Técnicas
	$SEST = array('DST', 'PST');
	//--Subdirección de Escuelas Telesecundarias
	$SET = array('DTV', 'PTV');
	//--Subdirección de Escuelas Secundarias Estatales 
	$SESE = array('EES', 'EST', 'ETV');
	//--Departamento de Educación Especial Estatal
	$DEEE = array('EML', 'FUA');
	//--Departamento de Educación Especial Federalizada
	$DEEF = array('DML');
	//--Dirección de Educación Indígena
	$DEI = array('DCC', 'DPB', 'DIN', 'DCI', 'TAI'); 
	//--Dirección General de Educación Secundaria
	$DGES = array('30ADG0901Z', '30ADG0904X', '30ADG0907U', '30ADG0910H');
	//--Coordinación Estatal Actualización Magisterial
	$CEAM = array('30ADG2310A', '30ADG2316V', '30ADG0800B', '30ADG0900A', '30ADG2352Z', '30ADG2348N', '30ADG2713U', '30ADG2324D');

	//Pregunto si se le dio click al submit del formulario
	if(isset($_POST['wp-submit'])) {
		
		//Pregunto si es usuario "30"
		if($usuarioTipo == 30 || $usuario == 'CTBasica') {
			
			//Si sí es usuario "30" entonces...

			//Inicio array auxiliar para los TCT repetidos (por si acaso ingresan con una TCT duplicada)
			$tct_repetidos = array('FLS', 'PJN', 'PPR');

			// //INICIO DEL WEB SERVICE 
			// //Cargamos el webservice
			define('WSDL', 'http://scasecws3.sev.gob.mx/Scasec.asmx?WSDL');

			// // Se genera el acceso al servicio
			// // Se define que la version de SOAP a emplear es la 1.2
			$Services= new SoapClient( WSDL, array( 'soap_version' => SOAP_1_2, 'location' => 'http://scasecws3.sev.gob.mx/Scasec.asmx' ) );

			//Asigno valores a los parámetros de los métodos
			//--Parámetros método validar acceso
			$User = $usuario;
			$Password = $contrasena;
			
			// //Invocamos los métodos del servicio
			// //--Método ValidaAcceso, en el array le paso los valores a los parámetros del método
			$Acceso =  $Services->ValidaAcceso( array( 'Usuario' => $User, 'Contraseña' => $Password ) );
			
			// //--Método Sostenimiento, en el array le paso los valores a los parámetros del método
			//Si el TCT está en el array de duplicados, entonces corremos el método sostenimiento
			if(in_array($usuarioTCT, $tct_repetidos)){
				$Clave = $usuario;
				$Sostenimiento =  $Services->Sostenimiento( array( 'CveCt' => $Clave ) );
				// //Guardo en una variable la respuesta del método Sostenimiento
				$resSostenimiento = $Sostenimiento->SostenimientoResult->any;
				$usuarioTCTWS = $usuarioTCT.$resSostenimiento;
			}
			// //Guardo en una variable la respuesta del método ValidaAcceso
			$resAcceso = $Acceso->ValidaAccesoResult;

			// // FIN DE WEB SERVICE

			if($resAcceso == TRUE && $usuario == 'CTBasica') {

				$wp_redirect = get_option('home');

				header("Location: ".$wp_redirect."/escritorio/");

			} else {

				$login_error = "<strong>ERROR:</strong> Datos incorrectos, por favor verifique su información";

				$wp_redirect = get_option('home');

				header("Location: ".$wp_redirect."?login-error=".urlencode($login_error));
			}

			if($resAcceso == TRUE && $usuarioTipo == 30) {

				$creds = array();

				if(in_array($usuarioTCT, $DGEIP)) {
					$creds['user_login'] = '6';

				} elseif (in_array($usuarioTCT, $SEIPF) || $usuarioTCTWS) {
					$creds['user_login'] = '7';

				} elseif (in_array($usuarioTCT, $SEPE) || $usuarioTCTWS) {
					$creds['user_login'] = '8';

				} elseif (in_array($usuarioTCT, $DGEPF) || $usuarioTCTWS) {
					$creds['user_login'] = '12';
				
				} elseif (in_array($usuarioTCT, $DGEPE) || $usuarioTCTWS) {
					$creds['user_login'] = '42';

				} elseif (in_array($usuarioTCT, $SESG)) {
					$creds['user_login'] = '15';

				} elseif (in_array($usuarioTCT, $SEST)) {
					$creds['user_login'] = '38';

				} elseif (in_array($usuarioTCT, $SET)) {
					$creds['user_login'] = '41';

				} elseif (in_array($usuarioTCT, $SESE)) {
					$creds['user_login'] = '39';

				} elseif (in_array($usuarioTCT, $DEEE)) {
					$creds['user_login'] = '10';

				} elseif (in_array($usuarioTCT, $DEEF)) {
					$creds['user_login'] = '11';

				} elseif (in_array($usuarioTCT, $DEI)) {
					$creds['user_login'] = '20';

				} elseif (in_array($usuarioTCT, $DGES)) {
					$creds['user_login'] = '14';

				} elseif (in_array($usuarioTCT, $CEAM)) {
					$creds['user_login'] = '21';

				} else {
					$creds['user_login'] = 0;
				}

				if($creds['user_login'] == 0) {

					$login_error = "<strong>ERROR:</strong> Datos incorrectos, por favor verifique su información";

					$wp_redirect = get_option('home');

					header("Location: ".$wp_redirect."?login-error=".urlencode($login_error));

				} else {

					$creds['user_password'] = 'acceso01';

					$user = wp_signon( $creds, false );

					if ( is_wp_error($user) ) {

						echo $user->get_error_message();
					} else {

						$wp_redirect = get_option('home');

						header("Location: ".$wp_redirect."/escritorio/");	
					}
				}
			}

		} else /*si no es usuario 30*/ {

			$creds = array();
			$creds['user_login'] = $usuario;
			$creds['user_password'] = $contrasena;
			$user = wp_signon( $creds, false );

			if ( is_wp_error($user) ) {

				$login_error = $user->get_error_message();

				//header("Location: http://localhost/ebasica?login-error=".urlencode($login_error));
				
			} else {
				$WP_admin = get_option('home');
				header("Location: ".$WP_admin."/wp-admin/");
			}
		}
	}
?>

