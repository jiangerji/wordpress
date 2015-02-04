<?php
define('FANCYRATINGS_ADMIN_URL', admin_url());
######### Add Rating Custom Fields #########
add_action('publish_post', 'fancyratings_add_ratings_fields');
add_action('publish_page', 'fancyratings_add_ratings_fields');
function fancyratings_add_ratings_fields($post_ID) {
    global $wpdb;
    if(!wp_is_post_revision($post_ID)) {
        add_post_meta($post_ID, '_rating_raters', 0, true);
        add_post_meta($post_ID, '_rating_average', 0, true);
    }
}


######### Delete Rating Custom Fields #########
add_action('delete_post', 'fancyratings_delete_ratings_fields');
add_action('delete_page', 'fancyratings_delete_ratings_fields');
function fancyratings_delete_ratings_fields($post_ID) {
    global $wpdb;
    if(!wp_is_post_revision($post_ID)) {
        delete_post_meta($post_ID, '_rating_raters');
        delete_post_meta($post_ID, '_rating_average');
    }
}

######### Default rating #########
function fancyratings_rating($post_id = null) {
    global $wpdb, $post;
    $out_put = '';
    if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
    $out_put .= fancyratings_rating_custom($post_id);
    return $out_put;
}

function add_ratings_display($post_id = 0){

    return '<div class="rating-combo" data-post-id="'.$post_id.'"><a class="rating-toggle" href="javascript:;" rel="nofollow">+Add</a><ul><li><a data-rating="5" rel="nofollow"><span class="rating-star"><i class="star-5-0"></i></span></a></li><li><a data-rating="4" rel="nofollow"><span class="rating-star"><i class="star-4-0"></i></span></a></li><li><a data-rating="3" rel="nofollow"><span class="rating-star"><i class="star-3-0"></i></span></a></li><li><a data-rating="2" rel="nofollow"><span class="rating-star"><i class="star-2-0"></i></span></a></li><li><a data-rating="1" rel="nofollow"><span class="rating-star"><i class="star-1-0"></i></span></a></li></ul></div><meta content="5" itemprop="bestRating"><meta content="1" itemprop="worstRating">';


}

function widget_rating_custom($post_id= null){

    global $wpdb;
    $out_put = '';
    $get_rating_info = fancyratings_get_rating_info($post_id);

    $out_put .= '<div class="rate-holder clearfix"><div class="post-rate"><div class="rating-stars" title="评分 '.$get_rating_info['average'].', 满分 5 星" style="width:'.$get_rating_info['percent'].'%">评分 '.$get_rating_info['average'].', 满分 5 星</div></div><div class="piao">'.$get_rating_info['raters'].' 票</div></div>';


    return $out_put;



}

function fancyratings_rating_custom($post_id= null){
    global $wpdb;
    $out_put = '';
    $get_rating_info = fancyratings_get_rating_info($post_id);
    if(is_singular()){
        $out_put .= '<div class="rate-holder clearfix" itemtype="http://schema.org/AggregateRating" itemscope="" itemprop="aggregateRating"><div class="post-rate"><div class="rating-stars" title="评分 '.$get_rating_info['average'].', 满分 5 星" style="width:'.$get_rating_info['percent'].'%">评分 <span class="average" itemprop="ratingValue">'.$get_rating_info['average'].'</span>, 满分 <span>5 星</span></div></div><div class="piao"><span itemprop="ratingCount">'.$get_rating_info['raters'].'</span> 票</div>';}
    else{
        $out_put .= '<div class="rate-holder clearfix"><div class="post-rate"><div class="rating-stars" title="评分 '.$get_rating_info['average'].', 满分 5 星" style="width:'.$get_rating_info['percent'].'%">评分 '.$get_rating_info['average'].', 满分 5 星</div></div><div class="piao">'.$get_rating_info['raters'].' 票</div>';
    }

    if(!isset($_COOKIE['fancyratings_'.$post_id]) && is_singular())
    {
        $out_put .= add_ratings_display($post_id);
    }


    $out_put .= '</div>';
    return $out_put;

}

function fancyratings($post_id = null){
	 if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
    echo fancyratings_rating_custom($post_id);

}


function fancyratings_get_rating_info($post_id = null) {
    if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
    global $wpdb,$post;
    $_rating_raters = get_post_meta($post_id,'_rating_raters',true);
    $_rating_average = get_post_meta($post_id,'_rating_average',true);
    $out_put = array();
    if (!$_rating_raters || $_rating_raters == '' || $_rating_raters == 0 || !is_numeric($_rating_raters) || !$_rating_average || $_rating_average == '' || !is_numeric($_rating_average) ) {
        $out_put['raters'] = 0;
        $out_put['average'] = 0;
        $out_put['percent'] = 0;
    } else {
        $out_put['raters'] = $_rating_raters;
        $out_put['average'] = number_format_i18n(round($_rating_average, 2),2);
        $rating_per = $out_put['average'] * 20;
        $out_put['percent'] = round($rating_per, 2);
    }
    $out_put['max_rates'] = 5;
    return($out_put);
}

add_action('wp_ajax_nopriv_bigfa_rate', 'bigfa_rate');
add_action('wp_ajax_bigfa_rate', 'bigfa_rate');
function bigfa_rate(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $scores = $_POST["um_score"];
    $expire = time() + 99999999;
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
    setcookie('fancyratings_'.$id,$id,$expire,'/',$domain,false);
    $_rating_raters = get_post_meta($id,'_rating_raters',true);
    $_rating_average = get_post_meta($id,'_rating_average',true);
    if (!$_rating_raters || $_rating_raters == '' || !is_numeric($_rating_raters)) {
        update_post_meta($id, '_rating_raters', 1);
        update_post_meta($id, '_rating_average', $scores);
    } else {
        if (!$_rating_average || $_rating_average == '' || !is_numeric($_rating_average)) {
            update_post_meta($id, '_rating_raters', 1);
            update_post_meta($id, '_rating_average', $scores);
        } else {
            update_post_meta($id, '_rating_raters', ($_rating_raters + 1));
            $new_average = round((($_rating_raters * $_rating_average + $scores)/($_rating_raters + 1)),3);
            update_post_meta($id, '_rating_average', $new_average);
        }

    }
    $get_rating_info = fancyratings_get_rating_info($id);
    $data = array();
    $average = $get_rating_info['average'];
    $percent = $get_rating_info['percent'];
    $raters = $get_rating_info['raters'];

    $data = array("status"=>200,"data"=>array("average"=>$average,"percent"=>$percent,"raters"=>$raters));
    echo json_encode($data);

    die;
}

function fancyratings_css_url($css_url){
    return get_bloginfo('template_directory'). "/{$css_url}.css";
}

function fancyratings_js_url($js_url){
    return get_bloginfo('template_directory'). "/js/{$js_url}.js";
}

function fancyratings_scripts(){
    wp_enqueue_style('fancyratings', fancyratings_css_url('ratings'), array(), 'Beta' );
    wp_enqueue_script('fancyratings',  fancyratings_js_url('ratings'), array(), 'Beta' );
    wp_localize_script('fancyratings', 'fancyratings_ajax_url', FANCYRATINGS_ADMIN_URL . "admin-ajax.php");
}
add_action('wp_enqueue_scripts', 'fancyratings_scripts', 20, 1);
