<?php get_header(); ?>
<div class="container row">
    <div class="main">
      		<div class="content">
			<div class="content-wrapper">
				<div id="map"><div class="position">
				当前位置：<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
					><?php
						if( is_single() ){
						$categorys = get_the_category();
					$category = $categorys[0];
						echo( get_category_parents($category->term_id,true,' >') );echo $s.' <a href="#">查看文章</a>';
						} elseif ( is_page() ){
						echo '<a href="#">'.get_the_title().'</a>';
						} elseif ( is_category() ){
						echo '<a href="#">'.single_cat_title('',false).'</a>';
						} elseif ( is_tag() ){
						echo '<a href="#">'.single_tag_title('',false).'</a>';
						} elseif ( is_day() ){
						the_time('Y年Fj日');
						} elseif ( is_month() ){
						the_time('Y年F');
						} elseif ( is_year() ){
						the_time('Y年');
						} elseif ( is_search() ){
						echo '<a href="#">'.$s.' 的搜索结果</a>';
						}
				?>
			</div></div>
				<article class="single-post" itemscope="itemscope" itemtype="http://schema.org/Article">
				
				 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<section class="single-post-header">
					<?php if (pckr_option('openthumbnails', 'no entry' ) == 'on') { ?>
						<img class='image lazyload' src="http://static.mywpku.com/blank.gif" data-src="<?php echo get_post_meta($postID, "edtrl_value", true); ?>">
					<?php } else {the_meta_box(get_the_ID());} ?>
						<header class="single-post-header__meta">
							<div class="single-post__postmeta"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID' ) ); ?>" class="uname user_Springfield" data-name="<?php the_author();?>" target="_blank"><?php the_author();?></a> · <?php the_time('n/d/Y g:H'); ?> <?php echo ' - ';edit_post_link("编辑文章"); ?></div>
							<h1 class="single-post__title" itemprop="headline"><?php the_title();?></h1>
						</header>
					</section>
					<section class="article" itemprop="articleBody" >
					<meta itemprop="inLanguage" content="zh-CN">
					<?php include(TEMPLATEPATH . '/share/share.php'); ?>
					<p style="text-align: center"><img src="http://qr.liantu.com/api.php?text=<?php the_permalink(); ?>&w=200&h=200" /></p><p style="text-align: center">打开微信“扫一扫”，打开网页后点击屏幕右上角分享按钮</p>
					<hr />
					<?php the_content(); ?>
					
					<section class="single-post-share cf">
					<div class="single-post-share-social">
						<?php fancyratings(get_the_ID());?>
					</div>
				</section>
				
					</section>
				<?php if(count(wp_get_post_tags($post->ID)) != 0) { ?>
				<section class="article-tags">
       				<i class="icon-tags"></i>
				<?php kr_the_tag_list($id); ?>
				</section>
				<?php } ?>
				</article>
						<section class="single-post-author-social instapaper_ignore">
				<div class="single-post-author cf">
					<div class="single-post-author__avatar left">
						<div class="avatar"><a class="ulink" target="_blank" title="<?php the_author(); ?>" href="/author/<?php the_author_meta('user_login'); ?>"><?php  echo get_avatar( get_the_author_email(), 48 ); ?> </a></div>
					</div>
					<div class="single-post-author__info">
						<h3 class="single-post-author__name"><a href="/author/<?php the_author_meta('user_login'); ?>" class="uname user_Springfield" rel="nofollow" data-name="<?php the_author();?>" target="_blank"><?php the_author();?></a></h3>
						<span class="single-post-author__label"><span class="label label-success role">作者</span></span>
						<p class="single-post-author__bio"><?php the_author_description(); ?>
						
						</p>
					</div>
				</div>
			</section>
			<?php include( TEMPLATEPATH.'/widgets/relateposts.php'); ?>
			<?php endwhile; endif; ?>
			<section class="single-post-comment" id="replies">
				 	<?php comments_template(); ?>
			</section>
			</div>
		</div>
		<?php if(pckr_option('two-column') == 'off') { ?>
		<?php get_sidebar('left'); ?>
		<?php } ?>
   </div>  
      	<?php get_sidebar();?>
  </div>

	
<?php get_footer(); ?>