<?php get_header() ;?>
	<div class="container row">
    <div class="main">
    <div class="headline cf">
	<?php query_posts('meta_key=focus_image_value&showposts=1&ignore_sticky_posts=1'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="headline__news">
		<a href="<?php the_permalink(); ?>" class="topic-post-big">
			<img class='image lazyload' src="http://static.mywpku.com/blank.gif" data-src="<?php $values = get_post_custom_values("focus_image_value"); echo $values[0]; ?>" alt="hottest">
			<span class="spinner"></span>
			<div class="image-overlay big"></div>
			<h1><?php the_title(); ?></h1>
		</a>	
	</article>
	<?php endwhile; endif; wp_reset_query(); ?>
	<?php $counter = 0; ?>
	<?php query_posts('meta_key=hot&meta_value=1&showposts=4&ignore_sticky_posts=1'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); $counter++?>
	<?php if ($counter == 1) { $class="one"; } ?>
	<?php if ($counter == 2) { $class="two"; } ?>
	<?php if ($counter == 3) { $class="three"; } ?>
	<?php if ($counter == 4) { $class="four"; } ?>
	<article class="headline__news">
	<a href="<?php the_permalink(); ?>" class="topic-post-small <?php echo $class; ?>">
		<div class="image-overlay small"></div>
		<div class="topic-title">
			<h1><?php $get_title = get_the_title(); echo mb_strimwidth($get_title, 0, 69, "..."); ?></h1>
			<span></span>
		</div>
	</a>
	</article>
	<?php endwhile; endif; wp_reset_query();?>
	
	</div>
      		<div class="content" id="lastest">
			<div class="content-wrapper">
				<h2 class="lastest">最新发布</h2>
				<div class="articles" itemtype="http://schema.org/Article" itemscope="itemscope">
				<meta itemprop="inLanguage" content="zh-CN">
				<?php include(TEMPLATEPATH .'/loop.php'); ?>
				</div>
				
				<div class="pagination cf">
					<?php pagination(); ?>
				</div>
			</div>
		</div>
		<?php if(pckr_option('two-column') == 'off') { ?>
		<?php get_sidebar('left'); ?>
		<?php } ?>
	</div>
		<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>