<?php
/**
 * Template Name: 分类浏览
 *
 **/ 
?>
<?php get_header(); ?>
<div class="container row">
    <div class="main">
      		<div class="content">
			<div class="content-wrapper">
				<div class="category">
					<section class="category-header cf">
						<h2 class="category-header__title left"><?php the_title(); ?></h2>
					</section>
					

					<section class="category-topic cf">
					<?php
                        $args=array(
                              'orderby' => 'name',
                              'order' => 'ASC',
			      'exclude' => '85,20'
                        );
                    $categories=get_categories($args);
                    foreach($categories as $category) {
                    ?>
							<div class="category-topic__topics">
							<div class="category-topic__title cf">
								<div class="topic left"><span><a href="#" class="<?php echo random_color(); ?>"><?php echo $category->cat_name; ?> </a> / <?php echo $category->slug; ?></span></div>
								<div class="viewall right"><a href="<?php echo get_category_link( $category->term_id ); ?>">查看更多</a></div>
							</div>
							<ul class="category-topic__list">
							<?php query_posts('cat='.$category->term_id.'&showposts=10'); ?>
                        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<li>
									<h1><a href="<?php the_permalink(); ?>" rel="twipsy" title="<?php the_title(); ?>"><?php $str = get_the_title(); echo mb_strimwidth($str, 0,32,"..."); ?></a></h1>
								</li>
							<?php endwhile; endif; wp_reset_query(); ?>
							</ul>
							</div>
						<?php } ?>
					</section>
					<!--
					<section class="category-tag">
					<h3>热门标签</h3>
						<div class="category-tag__tags cf">
                            <div class="left">
                                <div class="topic left"><span><a href="#" class="startups">WISE</a> / wise</span></div>
                            </div>
                            <ul class="category-tag__list cf">
                            </ul>
                       </div>
					</section>
                    -->
				</div>
			</div>
		</div>
		<?php if(pckr_option('two-column') == 'off') { ?>
		<?php get_sidebar('left'); ?>
		<?php } ?>
   </div>  
      	<?php get_sidebar();?>
  </div>
<?php get_footer(); ?>