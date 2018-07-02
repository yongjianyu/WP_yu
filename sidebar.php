<div id="xh_sidebar" style="text-align: left;margin-top:28px; ">        
  <div class="widget">
    <div style="background: url('./style/img/hots_bg.png') no-repeat scroll 0 0 transparent;width:250px;height:52px;margin-bottom:15px;">
    </div>
    <ul id="ulHot"  style="width: 24em;">
      <?php
      $post_query =  new WP_Query(array(
        'post__not_in' => get_option('sticky_posts'),
        'showposts' => 5,
      ));
      while ($post_query->have_posts()) : $post_query->the_post();
        $do_not_duplicate = $post->ID;
        ?>

        <li style=" border-bottom:dashed 1px #ccc;height:70px; margin-bottom:15px;">
          <div style="float:left;width:85px;height:55px; overflow:hidden;"><a href="<?php the_permalink(); ?>" target="_blank"><img src="<?php echo catch_that_image();?>" width="83"  /></a></div>
          <div style="float:right;width:145px;height:52px; overflow:hidden;"><a href="<?php the_permalink($postid); ?>" target="_blank" title="<?php the_title();?>"><?php the_title();?></a></div>
        </li>
        <?php
      endwhile;
      ?>
    </ul>
  </div>
</div>


 