<?php
/* Footer
 ----------------------------------*/
?>
		</main>
		<?php get_sidebar(); ?>
		<footer class="Footer">	
		    <p class="Footer-contacto">
		    	<strong>Subsecretaría de Educación Básica</strong><br>
		    	<i class="fa fa-phone"></i> +52 (228) 8417700 <br>
		    	<i class="fa fa-map-marker"></i> Km. 4.5 Carretera Federal Xalapa-Veracruz Col. SAHOP<br>
				91190, Xalapa Veracruz México.
		    </p>
		    <!-- <section class="u-contenedor">
		    	
		    	<aside class="Footer-creditos">
		    		<a class="Footer-firmaSH" href="http://www.solucioneshipermedia.com/"></a>
		    	</aside>

		    </section>   -->   
		</footer>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67484621-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- JS personalizados del tema -->
<?php waypoints(); // Librería que detecta puntos en el scroll de pantalla ?>
<?php bootstrap(); // framework Bootsrap ?>
<?php flexslider(); // Flexslider ?>
<?php themejs(); // Los scripts personalizados del tema ?>
<?php simplePagination(); ?>

<?php wp_footer(); ?>
</body>
</html>