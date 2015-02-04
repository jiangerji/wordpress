<?php get_header();?>
<div class="container row">
    <div class="main">
      		<div class="content" id="lastest">
			<div class="content-wrapper">
				<div class="category-header cf">
						<div class="category-header__info cf">
							<h2 class="category-header__title left"><?php single_cat_title(); ?></h2>
							<div class="category-header__status right cf">
								<span class="week"><?php  echo get_this_week_post_count_by_category($cat); ?><i>Weekly</i></span>
								<span class="total"><?php  echo get_category($cat)->count; ?><i>Total</i></span>
							</div>
						</div>
						
				</div>
				<?php weekly_focus(); ?>
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
	
<?php get_footer();?>