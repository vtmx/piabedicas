		</main>

		<footer role="contentinfo">
			<div class="container">
				<div class="author">Desenvolvido por <a href="<?php echo esc_url( 'http://vitormelo.com.br' );?>" target="_blank">Vitor Melo</a>
			</div>
		</footer>

		<!-- Script -->
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dest/js/script.js"></script>

		<!-- WordPress -->
		<?php wp_footer(); ?>

		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-56519521-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>
