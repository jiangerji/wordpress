<?php if(pckr_option('footer_option', 'on' ) == "on"): ?>
<footer>
  <div class="foot clearfix">
  <?php if(pckr_option('about_option', 'on' ) == "on"): ?>
    <div class="<?php echo howmanycols(); ?>" >
      <div><h2>关于本站</h2></div>
      <p><?php echo pckr_option('about', '请至主题后台设置' ); ?></p>
    </div>
  <?php endif; ?>
  <?php if(pckr_option('joinus_option', 'on' ) == "on"): ?>
    <div class="<?php echo howmanycols(); ?>" >
      <div><h2>加入我们</h2></div>
     <p><?php echo pckr_option('joinus', '请至主题后台设置' ); ?></p>
     <div><h2>联系我们</h2><a target="_blank" href="<?php echo pckr_option('moreinfo', '请至主题后台设置' ); ?>" style="color: <?php echo pckr_option('colorpicker', '#51aded' ); ?>;">详细信息»</a><p><?php echo pckr_option('contact', '请至主题后台设置' ); ?></p></div>
      <p></p>
    </div>
  <?php endif; ?>
  <?php if(pckr_option('partner_option', 'on' ) == "on"): ?>
    <!--wp-html-compression no compression-->
    <div class="<?php echo howmanycols(false); ?> last" >
      <h2><?php if(is_home()) { ?>合作伙伴<?php } else { ?>其他说明<?php } ?></h2>
      <ul class="links clearfix">
      <?php if(is_home()) { get_links('', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE);} else { ?><p><?php  echo pckr_option('otherinfo', '请至主题后台设置' ); ?></p><?php } ?></ul>
    </div>
    <!--wp-html-compression no compression-->
  <?php endif;?>
  </div>
  <div class="foot clearfix"></div>
</footer>
<?php endif; ?>
<div class="footer_footer">
  <div class="f_right">
      <p class="copyright"><?php echo pckr_option('copyright', '请至主题后台设置' ) ?></p>
  </div>
<div style="clear: both"></div>
</div>

  <script src="<?php bloginfo('template_directory'); ?>/js/topics.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
  <?php if (pckr_option('ajaxscroll', 'no entry' ) == 'on') { ?>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.infinitescroll.min.js"></script>
  <?php } ?>
  <?php if (pckr_option('fancybox', 'no entry' ) == 'on') { ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox.css" />
	<script src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript">
	$(function() {
	jQuery("a:has(img)").attr({rel: "fancybox"});
	jQuery("a[rel=fancybox]").fancybox();
	});
	</script>
  <?php } ?>
  <script src="<?php bloginfo('template_directory'); ?>/js/allinone.js"></script>
  <div id="tinywidgets">
	<?php if( is_single() || is_page() && comments_open() ){ ?>
		<a id="pinglun" href="javascript:void(0)"></a>
	<?php } ?>
	<a id="gotop" href="javascript:void(0)"></a> 
  </div>
  <?php echo stripslashes(pckr_option('analy')); ?>
	
<?php wp_footer(); ?>
</body>
</html>