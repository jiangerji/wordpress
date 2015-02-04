<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href='<?php bloginfo('template_directory'); ?>/style.css' type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
	<?php if(pckr_option('two-column') == 'on') { ?>
	<link rel='stylesheet' id='krstyle-advanced-css'  href='<?php bloginfo('template_directory'); ?>/theme-two-column-css.php' type='text/css' media='all' />
	<?php } else { ?>
	<link rel='stylesheet' id='krstyle-advanced-css'  href='<?php bloginfo('template_directory'); ?>/theme-css.php' type='text/css' media='all' />
	<?php } ?>
	<!--[if IE 7]>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome-ie7.min.css">
	<![endif]-->
	<!--[if lte IE 8]><script>window.location.href='http://www.mywpku.com/upgrade-your-browser.html?referrer='+location.href;</script><![endif]-->
	<link rel="shortcut icon" href="<?php echo pckr_option('favicon'); ?>">
	<title><?php if (is_single() || is_page() || is_archive() || is_search()) { ?><?php wp_title('',true); ?> - <?php } bloginfo('name'); ?><?php if ( is_home() ){ ?> - <?php bloginfo('description'); ?><?php } ?><?php if ( is_paged() ){ ?> - <?php printf( __('Page %1$s of %2$s', ''), intval( get_query_var('paged')), $wp_query->max_num_pages); ?><?php } ?></title>
	<!--[if lt IE 9]>
    <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
	<![endif]-->
	<?php if ( is_single() ) { ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/share/share.css" />
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/share/share_roll.js"></script>
	<?php } ?>
	<script src="http://cdn.staticfile.org/jquery/2.0.3/jquery.min.js"></script>	
	<?php 
	if (is_home()){
		$description =  pckr_option('desc', 'no entry' );
		$keywords =  pckr_option('keywords', 'no entry' );
	} elseif (is_single() || is_page()){    
		$description1 =  $post->post_excerpt ;
		$description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "…");
		$description = $description1 ? $description1 : $description2;
		$keywords = "";        
		$tags = wp_get_post_tags($post->ID);
		foreach ($tags as $tag ) {
			$keywords = $keywords . $tag->name . ", ";
		}
	} elseif(is_category()){
		$description     = strip_tags(category_description());
		$current_category = single_cat_title("", false);
		$keywords =  $current_category;
	}
	?>
	<meta name="keywords" content="<?php echo $keywords ?>" />
	<meta name="description" content="<?php echo $description ?>" />
	<?php wp_head(); ?>
	<style>
	.logo span {
	width: 80px;
	height: 80px;
	display: block;
	background-image: url(<?php echo pckr_option('uploadlogo'); ?>)
	}
	@media screen and (max-width: 48em) {
	.header-normal .logo span {
		top: -10px;
 		position: absolute;
		background-image: url(<?php echo pckr_option('uploadlogo1'); ?>)!important;
	}
	}
	@media screen and (min-width: 48.0625em) {
	.header.scrolled h1 span {
	width: 80px;
	height: 60px;
	display: block;
	background: url(<?php echo pckr_option('uploadlogo1'); ?>) no-repeat;
	} }
	@media screen and (min-width: 30.0625em) {
	.content .posts .left-col .feature-img {
		width: <?php echo pckr_option('thumb_width', '180px' ); ?>;
		height: <?php echo pckr_option('thumb_height', '120px' ); ?>;
		overflow:hidden;
	}
	}
	</style>
	</head>
	<body id="home" class="js" itemtype="http://schema.org/WebPage" itemscope>
    <header class="header header-normal" id="header">
    <div class="inner row">
      <h1 class="logo"><a href="<?php bloginfo('url');?>"><span><?php bloginfo('title');?></span></a></h1>
      <nav class="toggle-nav cf">
        <ul class="left">
          <li><a href="javascript:void(0)" class="toggle__main icon-reorder"><span>导航</span></a></li>
          <li><a href="javascript:void(0)" class="toggle__search icon-search"><span>搜索</span></a></li>
        </ul>
        <a href="<?php echo pckr_option('mobilemenurl'); ?>" class="toggle__submit right external" target="_blank"><?php echo pckr_option('mobilemenu'); ?></a>
      </nav>
      <nav class="main-nav left">
        <ul>
          <li class="drop-1 drop">
	    <?php if (pckr_option('header-first')) { ?>  
	    <a href="<?php echo pckr_option('header-first-url') ?>" class="hasdropdown main-nav__item"><?php echo pckr_option('header-first') ?></a>
	    <?php } ?> 
            <div class="dropdown">
              <div class="dropdown-list dropdown__list">
                <section>
                  <h2>常用分类</h2>
                  <ul class="dropdown__category cf">
                   <?php wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'category-nav')); ?>
                  </ul>
                </section>
                <section>
                  <h2>极力推荐</h2>
		 
                  <ul class="dropdown__topic cf"><!--修改下行-->
			<?php $get = pckr_option('topic'); for($i=1;$i<=$get;$i++) { ?>
			<li><span><a href="<?php echo pckr_option('topic'.$i.'-url'); ?>" class="<?php echo pckr_option('topic'.$i.'-type'); ?>"><?php echo pckr_option('topic'.$i); ?></a> / <?php echo pckr_option('topic'.$i.'-slug'); ?></span></li>
			<?php } ?>
                  </ul>
                </section>
                <section class="more">
                  <a href="<?php echo pckr_option('dropdown-button-url') ?>"><?php echo pckr_option('dropdown-button') ?></a> <!--修改此行-->
                </section>
              </div>
            </div>
          </li>
		<?php if (pckr_option('activity','') != "") { ?>
		  <li class="drop-2 drop">
            <a href="<?php bloginfo('url');?>" class="hasdropdown main-nav__item"><?php echo pckr_option('activity-title','') ?></a>
              <div class="dropdown dropdown-normal">
                <div class="dropdown-list dropdown__list">
		<?php $act = pckr_option('activity'); for($i=1;$i<=$act;$i++) { ?>
                <section class="dropdown__events cf">
                    <div class="date <?php if(pckr_option('activity'.$i.'-check') == "1") { echo "upcoming"; } ?> left">
                      <span class="month"><?php echo pckr_option('activity'.$i.'-month'); ?></span>
                      <span class="day"><?php echo pckr_option('activity'.$i.'-day'); ?></span>
                    </div>
                    <div class="intro">
                      <h3><a href="<?php echo pckr_option('activity'.$i.'-url'); ?>"><?php echo pckr_option('activity'.$i); ?></a></h3>
                      <span class="address"><?php echo pckr_option('activity'.$i.'-address'); ?></span>
                      <span class="status"><?php echo pckr_option('activity'.$i.'-status'); ?></span>
                    </div>
                  </section>
		 <?php } ?>
				<section class="more">
                 		  <a href="<?php echo pckr_option('dropdown-activity-button-url'); ?>"><?php echo pckr_option('dropdown-activity-button'); ?></a>
                  		</section>
                </div>

              </div>
          </li>
		<?php } ?>
		<?php if (pckr_option('header-second')) { ?>  
		<li><a href="<?php echo pckr_option('header-second-url') ?>" class="main-nav__item"><?php echo pckr_option('header-second') ?></a></li>
		<?php } ?> 
		<?php if (pckr_option('header-third')) { ?>  
		<li><a href="<?php echo pckr_option('header-third-url') ?>" class="main-nav__item"><?php echo pckr_option('header-third') ?></a></li>
		<?php } ?> 
		<?php if (pckr_option('header-fourth')) { ?>  
		<li><a href="<?php echo pckr_option('header-fourth-url') ?>" class="main-nav__item"><?php echo pckr_option('header-fourth') ?></a></li>
		<?php } ?> 
		<?php if (pckr_option('header-fifth')) { ?>  
		<li><a href="<?php echo pckr_option('header-fifth-url') ?>" class="main-nav__item"><?php echo pckr_option('header-fifth') ?></a></li>
		<?php } ?> 
        </ul>
      </nav>
      <div class="search">
		<form method="get" action="<?php bloginfo('url'); ?>/">
			<input type="search" name="s" id="search" placeholder="搜索...">
		</form>
      </div>
      <nav class="second-nav">
        <ul>
          <li><a href="<?php echo pckr_option('header-last-button-1-url') ?>" class="second-nav__submit"><?php echo pckr_option('header-last-button-1') ?></a></li>
          <li><a href="<?php echo pckr_option('header-last-button-url') ?>" class="second-nav__login"><?php echo pckr_option('header-last-button') ?></a></li>
        </ul>
      </nav>
    </div>
  </header>