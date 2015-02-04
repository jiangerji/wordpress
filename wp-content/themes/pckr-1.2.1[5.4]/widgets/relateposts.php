<section class="single-post-relate">
				<ul class="cf">
					<?php
						$post_num = 3;
						$exclude_id = $post->ID;
						$posttags = get_the_tags(); $i = 0;
						if ( $posttags ) {
							$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ',';
							$args = array(
							'post_status' => 'publish',
							'tag__in' => explode(',', $tags),
							'post__not_in' => explode(',', $exclude_id),
							'caller_get_posts' => 1,
							'orderby' => 'comment_date',
							'posts_per_page' => $post_num,
							);
						query_posts($args);
					while( have_posts() ) { the_post(); ?>
					<li>
							<a href="<?php the_permalink(); ?>">
								<div class="single-post-relate__image"><img alt="Blank" class="image" src="<?php echo mmimg(get_the_ID()) ?>"></div>
								</a>
								<div class="single-post-relate__title"><a href="<?php the_permalink(); ?>"></a><h3><a href="<?php the_permalink(); ?>"></a><a href="<?php the_permalink(); ?>" rel="twipsy" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3></div>
					</li>
					<?php
					$exclude_id .= ',' . $post->ID; $i ++;
					} wp_reset_query();
					}
					if ( $i < $post_num ) {
						$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
						$args = array(
						'category__in' => explode(',', $cats),
						'post__not_in' => explode(',', $exclude_id),
						'caller_get_posts' => 1,
						'orderby' => 'comment_date',
						'posts_per_page' => $post_num - $i
						);
					query_posts($args);
				while( have_posts() ) { the_post(); ?>
				<li>
							<a href="<?php the_permalink(); ?>">
								<div class="single-post-relate__image"><img alt="Blank" class="image" src="<?php echo mmimg(get_the_ID()) ?>"></div>
								</a>
								<div class="single-post-relate__title"><a href="<?php the_permalink(); ?>"></a><h3><a href="<?php the_permalink(); ?>"></a><a href="<?php the_permalink(); ?>" rel="twipsy" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3></div>
				</li>
				<?php $i++;
				} wp_reset_query();
				}
				if ( $i  == 0 ) {
				?>
					<?php query_posts('showposts=3'); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li>
							<a href="<?php the_permalink(); ?>">
								<div class="single-post-relate__image"><img alt="Blank" class="image" src="<?php echo mmimg(get_the_ID()) ?>"></div>
								</a>
								<div class="single-post-relate__title"><a href="<?php the_permalink(); ?>"></a><h3><a href="<?php the_permalink(); ?>"></a><a href="<?php the_permalink(); ?>" rel="twipsy" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3></div>
					</li>
					<?php endwhile; endif; wp_reset_query(); } ?>
				</ul>
</section>