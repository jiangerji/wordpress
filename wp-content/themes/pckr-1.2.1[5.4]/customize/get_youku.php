<?php
function get_youku_images($url) {
// 这段正则是来获取优酷的id，出处在 /wp-content/languages/zh_CN.php，同样56网、土豆都可以找到   
preg_match("#https?://v.youku.com/v_show/id_(?<video_id>[a-z0-9_=-]+)#i", $url, $matches);   
$cnt = count($matches);   
if ($cnt>0){   
    $link = "http://v.youku.com/player/getPlayList/VideoIDS/{$matches['video_id']}/timezone/+08/version/5/source/out?password=&ran=2513&n=3";   
}else{   
    return false;   
}   
  
// 这一段是用来解析json数据，如果想跨域用js来取，这个表示压力好大   
$ch=@curl_init($link);   
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
$cexecute=@curl_exec($ch);   
@curl_close($ch);   
  
  
if ($cexecute) {   
    $result = json_decode($cexecute,true);   
    $json = $result['data'][0];   
       
    $data['img'] = $json['logo']; // 视频缩略图   
    $data['title'] = $json['title']; //标题啦   
    $data['url'] = $url;    
    $data['swf'] = "http://player.youku.com/player.php/sid/{$matches['video_id']}/v.swf"; // 视频地址   
  
    return get_bloginfo('template_directory').'/modules/timthumb.php?src='.$data['img'].'&h=260px&w=620px&zc=1';;   
} else {   
    return false;   
}  
}
