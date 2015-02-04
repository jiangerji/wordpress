<?php $count = 0; ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $count = $count+1;?>
<?php if ( has_post_format('video' )): $get = true; ?>
<article class="posts post-1 cf">
      <div class="image feature-img">
        <a href="<?php the_permalink() ?>" class="center-post"><img src="<?php echo get_youku_images(get_post_meta(get_the_ID(), "video_value", true));?>" alt="">
        <div class="image-overlay small"></div>
        <h1><?php the_title(); ?></h1>
        </a>
      </div>
</article>
<?php endif; ?>
<?php if ( has_post_format('status' )): $get = true; ?>
<article class="posts post-ad cf">
    <div class="info cf">
      <div class="topic left">
        <span><a href="<?php $category = get_the_category(); echo get_category_link($category[0]->term_id ) ?>" class="<?php echo random_color(); ?>"><?php echo $category[0]->cat_name ?></a><span class="slug"> / <?php echo $category[0]->slug; ?></span>
        </span>
      </div>
      <div class="postmeta right"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID' ) ); ?>" class="uname user_Springfield" data-name="<?php the_author();?>" ><?php the_author();?></a> · <?php the_time('n/d G:i'); ?></div>
    </div>
  <div class="right">
    <div class="image thumb-100" style="margin-left: 30px;"><?php echo get_avatar( get_the_author_meta('user_email'), 120 );?></div>
  </div>
  <div class="left-col cf">
    <h1><a href="<?php the_permalink();?>" target="_blank" title="<?php the_title(); ?>" class="external"><?php the_title(); ?></a></h1>
	<p>
   <?php if(get_post_meta(get_the_ID(), "excerpt_value", true) != "") echo get_post_meta(get_the_ID(), "excerpt_value", true); else if(preg_match('/<!--more.*?-->/',$post->post_content))the_content(''); else{echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0,180,"...");}?>
	</p>
  </div>
</article>
<?php endif; ?>
<?php if ( has_post_format('image' )): $get = true; ?>
<article class="posts post-1 cf">
    <div class="info cf">
  <div class="topic left">
        <span><a href="<?php $category = get_the_category(); echo get_category_link($category[0]->term_id ) ?>" class="<?php echo random_color(); ?>"><?php echo $category[0]->cat_name ?></a><span class="slug"> / <?php echo $category[0]->slug; ?></span>
        </span>
      </div>
       <div class="postmeta right"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID' ) ); ?>" class="uname user_Springfield" data-name="<?php the_author();?>" ><?php the_author();?></a> · <?php the_time('n/d G:i'); ?></div>
    </div>
  <div class="left left-col" style="margin-bottom: 20px;">
    <div class="meta"><a title="回应人数" href="<?php the_permalink(); ?>" target="_blank"><i class="icon icon-share"></i> <?php if ( comments_open() ) echo get_comments_number('0', '1', '%');?></a></div>
    <div class="image image-img"><a href="<?php the_permalink();?>" target="_blank"><img class='image lazyload' src="http://static.mywpku.com/blank.gif" data-src="<?php echo mmimg(get_the_ID()) ?>" ></a></div>
  </div>
  <div class="right-col" style="clear: both;margin-left: 0!important;">
    <h1 class="center"><a href="<?php the_permalink(); ?>" target="_blank" data-no-turbolink="true"  title="<?php the_title(); ?>" itemprop="headline"><?php the_title();?></a></h1>
    <p>
     <?php if(get_post_meta(get_the_ID(), "excerpt_value", true) != "") echo get_post_meta(get_the_ID(), "excerpt_value", true); else if(preg_match('/<!--more.*?-->/',$post->post_content))the_content(''); else{echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0,180,"...");}?>
  </p>
  </div>
<?php if(count(wp_get_post_tags($post->ID)) != 0) { ?>
<section class="loop-tags">
        <i class="icon-tags"></i>
  <?php kr_the_tag_list($id); ?>
</section>
<?php } ?>
</article>
<?php endif; ?>
<?php if ( $get != true ):  ?>
<article class="posts post-1 cf">
    <div class="info cf">
	<div class="topic left">
        <span><a href="<?php $category = get_the_category(); echo get_category_link($category[0]->term_id ) ?>" class="<?php echo random_color(); ?>"><?php echo $category[0]->cat_name ?></a><span class="slug"> / <?php echo $category[0]->slug; ?></span>
        </span>
      </div>
       <div class="postmeta right"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID' ) ); ?>" class="uname user_Springfield" data-name="<?php the_author();?>" ><?php the_author();?></a> · <?php the_time('n/d G:i'); ?></div>
    </div>
  <div class="left left-col">
    <div class="meta"><a title="回应人数" href="<?php the_permalink(); ?>" target="_blank"><i class="icon icon-share"></i> <?php if ( comments_open() ) echo get_comments_number('0', '1', '%');?></a></div>
    <div class="image feature-img"><a href="<?php the_permalink();?>" target="_blank"><img class='image lazyload' src="http://static.mywpku.com/blank.gif" data-src="<?php echo mmimg(get_the_ID()) ?>" ></a></div>
  </div>
  <div class="right-col">
    <h1><a href="<?php the_permalink(); ?>" target="_blank" data-no-turbolink="true"  title="<?php the_title(); ?>" itemprop="headline"><?php the_title();?></a></h1>
    <span class="post-meta"><?php fancyratings(get_the_ID());?><span class="post-view"><i class="icon-eye-open" style="font-size: 16px;margin-right: 5px;"></i><?php if ( function_exists('custom_the_views') ) custom_the_views($post->ID); ?></span></span>
	<p><?php if(get_post_meta(get_the_ID(), "excerpt_value", true) != "") echo get_post_meta(get_the_ID(), "excerpt_value", true); else if(preg_match('/<!--more.*?-->/',$post->post_content))the_content(''); else{echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0,180,"...");}?></p>
  </div>
<?php if(count(wp_get_post_tags($post->ID)) != 0) { ?>
<section class="loop-tags">
        <i class="icon-tags"></i>
	<?php kr_the_tag_list($id); ?>
</section>
<?php } ?>
</article>
<?php endif; ?>
<?php if ($count == pckr_option('imgtextnext', 'no entry' )) { ?>
<article class="posts post-ad cf">
    <div class="info cf">
      <div class="topic left"><span><p><a target="_blank" class="external" href="<?php echo pckr_option('imgtexturl', 'no entry' ); ?>"><?php echo pckr_option('imgtextitle', 'no entry' ); ?> </a> / <?php echo pckr_option('imgtextsurl', 'no entry' ); ?></p></span></div>
      <!-- <div class="postmeta right"><a href="http://www.mywpku.com/contact" target="_blank">投放广告？</a>　<a href="http://www.mywpku.com/blog-host" target="_blank">查看更多优秀主机 &raquo;</a></div> -->
    </div>
  <div class="right">
    <div class="image feature-img thumb-100"><a class="external" href="<?php echo pckr_option('imgtexturl', 'no entry' ); ?>" target="_blank" title="<?php echo pckr_option('imgtextitle', 'no entry' ); ?>"><img alt="<?php echo pckr_option('imgtextitle', 'no entry' ); ?>" class='image lazyload' src="http://static.mywpku.com/blank.gif" data-src="<?php echo pckr_option('uploadimg', 'no entry' ); ?>" height="100" ></a>
</div>
  </div>
  <div class="left-col cf">
    <p><a target="_blank" class="external" href="<?php echo pckr_option('imgtexturl', 'no entry' ); ?>"><?php echo pckr_option('imgtextdesc', 'no entry' ); ?></a></p>
  </div>
</article>
<?php  } ?>
<?php if (pckr_option('focus', 'no entry' ) == 'on') { ?>
<?php if ($count == pckr_option('focusnext', 'no entry' )) { ?>
<article class="posts post-1 cf">
      <div class="image feature-img">
        <a href="<?php echo pckr_option('focusurl', 'no entry'); ?>" class="center-post" target="_blank"><img class='image lazyload' src="http://static.mywpku.com/blank.gif" data-src="<?php echo pckr_option('uploadfocus', 'no entry'); ?>" alt="">
        <div class="image-overlay small"></div>
        <h1><?php echo pckr_option('focustitle', 'no entry'); ?></h1>
        </a>
      </div>
</article>
<?php } ?>
<?php } ?>
<?php unset($get); ?>
<?php endwhile; endif; ?>
				