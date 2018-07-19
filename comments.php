<?php 
if (comments_open()) :
?>
<section id="comment-wrap">
  <div id="respond" class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="10" data-width="100%"></div>
</section>
<?php endif; ?>