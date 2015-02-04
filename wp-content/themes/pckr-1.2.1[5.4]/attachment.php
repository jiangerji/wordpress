<?php get_header(); ?>
<div class="container row">
    <div class="main">
      		<div class="content">
			<div class="content-wrapper">
				<article class="single-post" itemscope="itemscope" itemtype="http://schema.org/Article">
				
				 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<section class="single-post-header">
						<header class="single-post-header__meta">
							<div class="single-post__postmeta"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID' ) ); ?>" class="uname user_Springfield" data-name="<?php the_author();?>" target="_blank"><?php the_author();?></a> · <?php the_time('n/d/Y g:H'); ?> <?php echo ' - ';edit_post_link("编辑文章"); ?></div>
							<h1 class="single-post__title" itemprop="headline"><?php the_title();?></h1>
						</header>
					</section>
					<section class="article" itemprop="articleBody" >
					<?php if ( wp_attachment_is_image() ) : $attachments = array_values( get_children( array('post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
                                        foreach ( $attachments as $k => $attachment ) {
                                        if ( $attachment->ID == $post->ID )
                                        break;
                                }
        $k++;
        if ( count( $attachments ) > 1 ) {
                if ( isset( $attachments[ $k ] ) )
                        $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                else
                        $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
        } else {
                $next_attachment_url = wp_get_attachment_url();
        }
?>

                        <p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
                        $attachment_width  = apply_filters('tanhaibonet_attachment_size', 900 );
                        $attachment_height = apply_filters('tanhaibonet_attachment_height', 900 );
                        echo wp_get_attachment_image( $post->ID, array( $attachment_width, $attachment_height ) );
                                                ?></a></p>

                                <?php else : ?>
                                        <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
						<?php endif; ?>
                </div><!-- .entry-attachment -->
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