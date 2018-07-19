<?php

function ms_theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'ms_theme_enqueue_styles');

function ms_theme_wp_head()
{
    ?>
    <meta property="fb:admins" content="metasanjaya"/>
    <?php

}
add_action('wp_head', 'ms_theme_wp_head');

function ms_theme_wp_footer()
{
    ?>
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/<?= get_locale(); ?>/sdk.js#xfbml=1&version=v3.0';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php

}
add_action('wp_footer', 'ms_theme_wp_footer', 999);

if (!function_exists('et_pb_get_comments_popup_link')) :
    function et_pb_get_comments_popup_link($zero = false, $one = false, $more = false)
{
    $url = "https://graph.facebook.com/v2.4/?fields=share{comment_count}&amp;id=" . urlencode(get_permalink());
    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0
      ]);

    $count = curl_exec($ch);

    file_put_contents( dirname(__FILE__) . '/graph_comment_count_' . time() . '.txt', "$url\n$count");

    if(curl_errno($ch)) {
        $count = '0';
    }

    return '<a class="comments-number" href="#respond"><span class="fb-comments-count" data-href="'.get_permalink().'">0</span> '.__('Comment', 'ms').'</a>';
}
endif;