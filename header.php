<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="<?php if ( is_single() )  { single_post_title('', true); } else {bloginfo('name'); echo " - ";  bloginfo('description');} ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="format-detection" content="telephone=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?php if (is_home () ) { bloginfo('name'); }  elseif ( is_category() ) { single_cat_title(); echo ' - ' ;  bloginfo('name'); } elseif (is_single() ) { single_post_title(); echo ' -  '; bloginfo('name'); } elseif (is_page() ) { bloginfo('name'); echo ':  '; single_post_title(); } else { wp_title('',true); }  ?></title>
		<!-- Bootstrap -->
<!--
		<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">
		<link href="<?php bloginfo('template_url');?>/css/bootstrap-rtl.css" rel="stylesheet">
		<link href="<?php bloginfo('template_url');?>/style.css" rel="stylesheet">
-->
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	 <?php wp_head();?> 
	</head>
	<body>