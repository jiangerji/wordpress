<?php get_header(); ?>
<div class="container row">
    <div class="main">
      		<div class="content">
			<div class="content-wrapper">
				<article class="single-post">
				
				 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<section class="single-post-header">
						<?php the_meta_box(get_the_ID()); ?>
						<header class="single-post-header__meta">
							<div class="single-post__postmeta"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID' ) ); ?>" class="uname user_Springfield" data-name="<?php the_author();?>" target="_blank"><?php the_author();?></a> · <?php the_time('n/d g:H'); ?></div>
							<h1 class="single-post__title"><?php the_title();?></h1>
						</header>
					</section>
					<section class="article">
					<?php the_content(); ?>
					</section>
				<section class="single-post-share cf">
					
				</section>
				</article>
						<section class="single-post-author-social instapaper_ignore">
				<div class="single-post-author cf">
					<div class="single-post-author__avatar left">
						<div class="avatar"><a class="ulink" target="_blank" title="<?php the_author(); ?>" href="/author/<?php the_author_meta('user_login'); ?>"><?php  echo get_avatar( get_the_author_email(), 48 ); ?> </a></div>
					</div>
					<div class="single-post-author__info">
						<h3 class="single-post-author__name"><a href="http://www.36kr.com/springfield" class="uname user_Springfield" data-name="<?php the_author();?>" target="_blank"><?php the_author();?></a></h3>
						<span class="single-post-author__label"><span class="label label-success role">作者</span></span>
						<p class="single-post-author__bio"><?php the_author_description(); ?></p>
					</div>
				</div>
			</section>
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
	<?php get_sidebar(); ?>
	
		</div>
  
	
<?php get_footer(); ?>