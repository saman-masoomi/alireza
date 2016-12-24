<?php get_header();?> 
			<div class="container">
			<div class="row index">
				<div class="index-image">
					<img src="<?php echo get_option('index-image') ?>" class="tilt-effect visible-md visible-lg" alt="">
					<img src="<?php echo get_option('index-image') ?>" class="visible-xs visible-sm" alt="">
				</div>
				<div class="index-content">
					<div id="logo" class="play visible-xs visible-sm"></div>
					<h1 class="animation"><?php echo get_option('index-title-1') ?></h1>
					
					<h2><?php echo get_option('index-title-2') ?></h2>

					<button class="work-button"><span><?php echo get_option('button-text') ?></span></button>
					<div id="logo" class="play hidden-sm hidden-xs"></div>
				</div>
				
				<div class="contact-button" id="contact-button" onclick="samfade()">
					<img src="<?php bloginfo('template_url');?>/images/contact-me.png" alt="Contact Button">
					<p><?php echo get_option('contact-text') ?></p>
				</div>
				
				<div class="contact">
					<div class="contact-button-in"></div>
					<div class="contact-info">
						<div class="contact-img visible-xs visible-sm">
							<a href="tel:<?php echo get_option('phone-number1') ?>"><img src="<?php bloginfo('template_url');?>/images/call.png" alt="call me"></a>
							<a href="sms:<?php echo get_option('phone-number1') ?>"><img src="<?php bloginfo('template_url');?>/images/sms.png" alt="Text to me"></a>
							<a href="mailto:<?php echo get_option('email') ?>"><img src="<?php bloginfo('template_url');?>/images/email.png" alt="Mail me"></a>
						</div>
						<div class="mobile hidden-xs hidden-sm">
							<img src="<?php bloginfo('template_url');?>/images/Mobile_Icon.jpg" alt="Mobile">
							<p><?php echo get_option('phone-number') ?></p>
						</div>
						<div class="email hidden-xs hidden-sm">
							<img src="<?php bloginfo('template_url');?>/images/Email_Icon.jpg" alt="Email">
							<p><?php echo get_option('email') ?></p>
						</div><br>
						<div class="share">
							<ul>
								<li><a href="<?php echo get_option('social_telegram') ?>" target="_blank"><img src="<?php bloginfo('template_url');?>/images/Telegram-logo.png" alt="Telegram"></a></li>
								<li><a href="<?php echo get_option('social_facebook') ?>" target="_blank"><img src="<?php bloginfo('template_url');?>/images/Facebook_icon.png" alt="Facebook"></a></li>
								<li><a href="<?php echo get_option('social_line') ?>" target="_blank"><img src="<?php bloginfo('template_url');?>/images/Line_icon.png" alt="Line"></a></li>
								<li><a href="<?php echo get_option('social_instagram') ?>" target="_blank"><img src="<?php bloginfo('template_url');?>/images/Instagram-icon.png" alt="Instagram"></a></li>
							</ul>
						</div>
					</div>
					
					<div class="contact-barcode">
						<img src="<?php echo get_option('barcode-pic') ?>" alt="QR Code">
					</div>
					
					<img src="<?php bloginfo('template_url');?>/images/aroow.png" alt="Close Contact" onclick="contactclose()" class="close-contact animated infinite rubberBand hidden-xs hidden-sm">
					
					<img src="<?php bloginfo('template_url');?>/images/Close-contact.png" alt="Close Contact" onclick="contactclose()" class="close-contact-xs rubberBand visible-xs visible-sm">
				</div>
			</div>
		</div>
 <?php get_footer();?> 