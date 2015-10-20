<?php  
/*
* Template Name: Conmutador
*/


get_header(); ?>

	<article class="Post u-contenido">

		<?php
		// //INICIO DEL WEB SERVICE 
		// //Cargamos el webservice
		// define('WSDL', 'http://scasecws3.sev.gob.mx/Scasec.asmx?WSDL');
		// // Se puede recuperar de $_POST o de $_GET o con $_REQUEST
		// $User= 'CTBasica';
		// $Password= 'f46s81g';
		// $Clave = '30EJN0482W';
		// // Se genera el acceso al servicio
		// // Se define que la version de SOAP a emplear es la 1.2
		// $Services= new SoapClient( WSDL, array( 'soap_version' => SOAP_1_2, 'location' => 'http://scasecws3.sev.gob.mx/Scasec.asmx' ) );
		// //Incovamos los métodos del servicio
		// //--Método ValidaAcceso, en el array le paso los valores a los parámetros del método
		// $Acceso =  $Services->ValidaAcceso( array( 'Usuario'=> $User, 'Contraseña'=> $Password ) );
		// //--Método Sostenimiento, en el array le paso los valores a los parámetros del método
		// $Sostenimiento =  $Services->Sostenimiento( array( 'CveCt'=> $Clave ) );
		// //Guardo en una variable la respuesta del método ValidaAcceso
		// $resAcceso = $Acceso->ValidaAccesoResult;
		// //Guardo en una variable la respuesta del método Sostenimiento
		// $resSostenimiento = $Sostenimiento->SostenimientoResult;
		// // FIN DE WEB SERVICE


		//Obtengo el usuario que viene del formulario de login
		$usuario = $_POST['log'];

		//Extraigo y guardo los primeros dos caracteres del usuario; si es un '30', entonces es un usuario CCT, 
		//si es cualquier otra cosa entonces es un usuario normal de WP.
		$usuarioString = substr($usuario, 0, 5);
		$usuarioTipo = substr($usuarioString, 0, 2);

		//Extraigo y guardo los siguientes tres caracteres de la cadena del usuario para saber el usuario según
		//el Tipo de Centro de Trabajo
		$usuarioTCT = substr($usuarioString, 2, 5); 

		//Construimos un array por cada CCT con todas sus literales para mostrar las noticias que corresponden
		//en la plantilla de escritorio
		//--Dirección General de Educación Inicial y Preescolar
		$DGEIP = array('FLS');

		//--Subdirección de Educación Inicial y Preescolar Federalizada
		$SEIPF = array('DJN', 'DDI', 'FLS', 'PJN', 'NJN', 'PDI', 'NDI', 'FEI');

		//--Subdirección de Educación Preescolar Estatal
		$SEPE = array('EJN', 'UDI', 'EDI', 'PJN');

		//--Dirección General de Educación Primaria Federalizada
		$DGEPF = array('DPR', 'PPR', 'DZC');


		//Pregunto si se le dio click al submit del formulario
		if(isset($_POST['wp-submit'])) {
			
			//Pregunto si es usuario "30"
			if($usuarioTipo == 30) {

				//Si sí es usuario "30" entonces...
				echo "Hola, centro de trabajo <br>";

				if (in_array($usuarioTCT, $SEIPF)) {
					echo "Hola Subdirección de Educación Inicial y Preescolar Federalizada";
				}


			//Si no es usuario "30", entonces lo redirigimos y logeamos con login de WP
			} else {

				header('location: wp-login.php');

			}
		}
		?>
	</article>

<?php get_footer(); ?>
