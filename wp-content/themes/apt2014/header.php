<!doctype html>
<html>
<head>
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>">	
	<meta name="viewport" content="width=device-width, user-scalable=yes" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	
	<?php putRevSlider( "slider1" ) ?>
	
	<div id="wrappernav">
		<div id="nav">

			<?php wp_nav_menu(array(
				'theme_location'  => 'main_nav',
				'container' 	  => '',
				'menu_id'         => 'nav',
				'menu_class'      => 'navcopy',
			)); ?> 
		</div>
	</div>