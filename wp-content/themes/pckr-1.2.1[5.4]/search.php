<?php get_header(); ?>
<div class="container row">
    <div class="main">
      		<div class="content" id="lastest">
			<div class="content-wrapper">
				<h2 class="lastest">搜索结果</h2>
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