<?php

function custom_infinite_scroll_js() {
    if (pckr_option('ajaxscroll', 'no entry' ) == 'on') { 
    if (!is_singular() ) {
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function(){
            /**
             * Customize the previous navitation menu
             */
            var infinite_scroll = {
                loading: {
                    msgText: '<section class="loop-tags" style="border: 0;border-bottom: 1px solid #e6eaed;"><p align="center">正在加载……一秒钟的时间即可</p></section>',
                    finishedMsg: '<section class="loop-tags" style="border: 0;border-bottom: 1px solid #e6eaed;"><p align="center">所有文章均已加载完成</p></section>'
                },
                nextSelector:".pagination .next_page a",
                navSelector:".pagination",
                itemSelector:".posts",
                contentSelector:".articles"
            };
            jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
        });
        </script>
        <?php
    }
    }
}
add_action('wp_footer', 'custom_infinite_scroll_js', 100);