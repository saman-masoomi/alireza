<?php

function blogtheme_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.6' );
    wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/css/bootstrap-rtl.css', array(), '3.3.6' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
//    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'blogtheme_scripts' );

if (function_exists('add_theme_support')) {
add_theme_support( 'post-thumbnails' );
}

// Theme Setting

add_action('admin_menu', 'add_global_custom_options');
function add_global_custom_options()
{
    add_options_page('Global Custom Options', 'تنظیمات قالب', 'manage_options', 'functions','global_custom_options');
}

function global_custom_options()
{
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
?>
   
    <div class="wrap">
        <h2>تنظیمات قالب</h2>
        <form method="post" action="options.php">
           
            <?php wp_nonce_field('update-options') ?>
            
        <div class="theme-setting-group1">
           <h2>صفحه اصلی :</h2>
            <p><span>متن 1 صفحه اصلی :</span><br>
                <input type="text" name="index-title-1" size="45" value="<?php echo get_option('index-title-1'); ?>" />
            </p> 
		   <p><span>متن 2 صفحه اصلی :</span><br>
                <input type="text" name="index-title-2" size="45" value="<?php echo get_option('index-title-2'); ?>" />
            </p>
            <p><span>لینک عکس اصلی :</span><br>
                <input type="text" name="index-image" size="45" value="<?php echo get_option('index-image'); ?>" />
            </p>
            <p><span>متن دکمه صفحه اصلی :</span><br>
                <input type="text" name="button-text" size="45" value="<?php echo get_option('button-text'); ?>" />
            </p>
           <p><span>متن دکمه تماس با من :</span><br>
                <input type="text" name="contact-text" size="45" value="<?php echo get_option('contact-text'); ?>" />
            </p>
        </div>
        <div class="theme-setting-group1">
           <h2>تماس با ما :</h2>
            <p><span>شماره تماس :</span><br>
                <input type="text" name="phone-number" size="45" value="<?php echo get_option('phone-number'); ?>" />
            </p>
            <p><span>شماره تماس بخش موبایل :</span><br>
                <input type="text" name="phone-number1" size="45" value="<?php echo get_option('phone-number1'); ?>" />
            </p>
            <p><span>ایمیل :</span><br>
                <input type="text" name="email" size="45" value="<?php echo get_option('email'); ?>" />
            </p>
            <p><span>تلگرام :</span><br>
                <input type="text" name="social_telegram" size="45" value="<?php echo get_option('social_telegram'); ?>" />
            </p>
            <p><span>فیس بوک :</span><br>
                <input type="text" name="social_facebook" size="45" value="<?php echo get_option('social_facebook'); ?>" />
            </p>
            <p><span>لاین :</span><br>
                <input type="text" name="social_line" size="45" value="<?php echo get_option('social_line'); ?>" />
            </p>
            <p><span>اینستاگرام :</span><br>
                <input type="text" name="social_instagram" size="45" value="<?php echo get_option('social_instagram'); ?>" />
            </p>
            <p><span>لینک تصویر بارکد :</span><br>
                <input type="text" name="barcode-pic" size="45" value="<?php echo get_option('barcode-pic'); ?>" />
            </p>
        </div>
       <div class="theme-setting-group1">
           <h2>فوتر :</h2>
            <p><span>متن کپی رایت :</span><br>
                <input type="text" name="twitterid" size="45" value="<?php echo get_option('twitterid'); ?>" />
            </p><br>
         </div>
		<p><input type="submit" name="Submit" value="ذخیره تنظیمات" /></p>
		
		
		<input type="hidden" name="action" value="update" />
		
		
<input type="hidden" name="page_options" value="index-title-1,index-title-2,index-image,button-text,contact-text,phone-number,phone-number1,email,social_telegram,social_facebook,social_line,social_instagram,barcode-pic,twitterid" />

  
		</form>
    </div>
<?php
}

?>