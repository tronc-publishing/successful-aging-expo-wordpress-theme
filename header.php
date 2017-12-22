<?php
	$showFavicon = get_option('toggle-favicon');
	$favicon = get_option('favicon-image');
	$showLogo = get_option('toggle-logo');
	$logo = get_option('logo-image');

  $gAnalytics = get_option('google-analytics');

  $menu = is_page('b2b') ? 'main-menu-b2b' : 'main-menu-b2c';
  $args_mobile = array(
		'theme_location' => $menu,
		'items_wrap' => '<ul>%3$s</ul>',
		'container' => ''
	);
  $args_desktop = array(
    'theme_location' => $menu,
    'items_wrap' => '<ul>%3$s</ul>',
		'container' => ''
  );

	global $expoDate, $expoTime, $expoVenue, $expoAddress, $expoMap;
	$expoDate = get_option('expo-date');
  $expoTime = get_option('expo-time');
  $expoVenue = nl2br(get_option('expo-venue'));
  $expoAddress = nl2br(get_option('expo-address'));
	$expoMap = urlencode(get_option('expo-address'));

	global $heroTitle, $heroSubtitle;
	if (have_posts()) :
    while (have_posts()) : the_post();
      $heroTitle = get_post_meta($post->ID, 'hero-title', true);
      $heroSubtitle = nl2br(get_post_meta($post->ID, 'hero-subtitle', true));
    endwhile;
  endif;
  wp_reset_postdata();

	$page = is_page('home') ? 'home' : $pagename;
?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="Tronc">

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <title>
  		<?php
  			if (is_front_page()) echo('Home | ');
				else wp_title(' | ', true, 'right');
  			if (wp_title('', false)) echo ' ';
  			bloginfo('name');
        echo ' - ';
        bloginfo('description');
  		?>
  	</title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php if($showFavicon == 'yes') { ?>
      <link rel="shortcut icon" href="<?php echo $favicon ?>"/>
    <?php } else { ?>
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/theme/images/favicon.ico" />
    <?php } ?>

    <?php wp_head(); ?>

    <script>
      conditionizr.config({
        assets: '<?php echo get_template_directory_uri(); ?>',
        tests: {}
      });
    </script>

		<?php echo $gAnalytics ?>
  </head>

	<body <?php body_class(); ?>>

    <nav id="mobileNav">
      <div class="mobileBox">
        <?php wp_nav_menu($args_mobile); ?>
      </div>
    </nav>

    <div class="theme-wrap">

      <header id="header" class="whtBar">
        <div class="container flex alpha omega clearfix">
          <nav id="mainNav" class="clearfix" role="navigation">
            <div class="logo">
              <!-- NEED TO GET THE ALT TEXT FROM DATABASE? -->
							<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="Successful Aging Expo - Logo"></a>
            </div>
            <div class="subMenu">
              <?php wp_nav_menu($args_desktop); ?>
              <div class="mobileBtn fr">
                <a class="mNavBtn" href="#">
                  <span class="hamNav">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                  </span>
                </a>
              </div>
            </div>
          </nav>
        </div>
      </header>

			<div id="mainContent" role="main">

				<?php if (!is_page('location')) : ?>

				<section id="home" class="home-center" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
			    <div class="container clearfix">
			      <div class="des-column col_12 txtCenter">
				       <div class="<?php echo "{$page}-heroTxt"; ?>">

								<?php if (is_page('home')) : ?>
				          <h3 class="txtCaps mb5"><?php _e($heroTitle); ?></h3>
				          <h1 class="txtCaps mb8"><?php _e($heroSubtitle); ?></h1>
				          <h6 class="heroDateTxt txtCaps mb20"><?php _e($expoDate); ?></h6>
				          <h4 class="mb10">
				            <?php echo _e($expoVenue); ?><br>
				            <?php echo _e($expoAddress); ?>
				          </h4>

								<?php elseif (is_page('schedule') || is_page('entertainment') || is_page('exhibitors')) : ?>
					        <h1 class="txtCaps mb8"><?php _e($heroTitle); ?></h1>
					        <h4 class="txtCaps"><?php _e($expoDate); ?></h4>

								<?php elseif (is_page('contact-us')) : ?>
									<h1 class="txtCaps mb8"><?php _e($heroTitle); ?></h1>

								<?php elseif (is_page('b2b')) : ?>
									<h3 class="txtCaps mb5"><?php _e(wordwrap($heroTitle, 20, "<br>")); ?></h3>
									<h1 class="txtCaps mb8"><?php _e($heroSubtitle); ?></h1>
                  <h6 class="heroDateTxt txtCaps mb0"><?php _e($expoDate); ?></h6>

								<?php else : ?>
								<?php endif; ?>

				<?php else : ?>

				<section id="location" class="location-header" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
					<div class="sectionBlk">
						<div class="container clearfix">
							<div class="des-column col_12 txtCenter">
								<h2 class="colorWHT txtCaps mb12"><?php _e($heroTitle); ?></h2>
								<h3 class="mb3"><strong class="mdBold"><?php _e($expoDate); ?></strong></h3>
								<h5 class="mb15"><strong class="mdBold"><?php _e($expoTime); ?></strong></h5>
								<h3 class="mb4"><strong class="mdBold"><?php _e($expoVenue); ?></strong></h3>
								<h5 class="mb20"><strong class="mdBold"><?php _e($expoAddress); ?></strong></h5>

				<?php endif; ?>

							</div>
						</div>
			    </div>
			  </section>
