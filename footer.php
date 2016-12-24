		<footer class="hidden-xs hidden-sm">
			<p><?php echo get_option('twitterid') ?></p>
			<img src="<?php bloginfo('template_url');?>/images/imSam.png" alt="Developer">
		</footer>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_url');?>/js/tiltfx.js"></script>
		<script type="text/javascript">
			
		function samfade() {
			$('.contact').removeClass('animated fadeOutDown');
				$('.contact-button').removeClass('animated manydown hideanimate');
				$('.contact').addClass('animated fadeInUp');
				$('.contact-button').addClass('animated manyup hideanimate');
		}
			
		function contactclose() {
			$('.contact').addClass('animated fadeOutDown');
			$('.contact-button').addClass('animated manydown');
			$('.contact-button').removeClass('hideanimate');
		}
			
		</script>
		
	 <?php wp_footer();?> 
	</body>
</html>