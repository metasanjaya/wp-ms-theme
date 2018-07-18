<?php

function ms_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'ms_theme_enqueue_styles' );

function ms_theme_wp_head() {
    ?>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

    <?php
}
add_action( 'wp_head' , 'ms_theme_wp_head' );

function ms_theme_wp_footer() {
    ?>
    <div id="fb-root"></div>
    <?php
}
add_action( 'wp_footer', 'ms_theme_wp_footer' );