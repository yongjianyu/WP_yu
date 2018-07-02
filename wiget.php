<?php

class My_Widget extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget)  
    function My_Widget() {  
        // 主要内容方法 
        $widget_ops = array(
	            'description' => '根据文章分类进行添加文章'
	        );
        $control_ops = array(
        	'width' =>400,
        	'height' => 300
        );
	     parent::WP_Widget(false,$name='Yu文章分类',$widget_ops,$control_ops);
       	//parent::直接使用父类中的方法  
        //$name 这个小工具的名称,  
        //$widget_ops 可以给小工具进行描述等等。  
        //$control_ops 可以对小工具进行简单的样式定义等等。  
    }  
    function form($instance) {  
         // 给小工具(widget) 添加表单内容
         $instance = wp_parse_args((array)$instance,array('category'=>'请选择','showpost'=>10,));
         $categories = get_categories($args);

         ?>

			<label for="<?php echo $this->get_field_id('category'); ?>">选择分类</label>
			<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>">
				<option value="<?php echo $instance['category']; ?>"><?php echo $instance['category']; ?></option>
				<?php
					foreach ($categories as $cate) {
						# code...
						?>
						
						<option value="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></option>

						<?php
					}
				?>
			</select>

			<br>
			<br>
			<label for="<?php echo $this->get_field_id('showpost'); ?>">文章数量</label>
			<input type="text" name="<?php echo $this->get_field_name('showpost'); ?>" id="<?php echo $this->get_field_id('showpost'); ?>" value="<?php
			echo $instance['showpost']; ?>" />
         <?php


    }  
    function update($new_instance, $old_instance) {  
         // 进行更新保存  
         return $new_instance;  
    }  
    function widget($args, $instance) {  
        // 输出显示在页面上  

        extract( $args );   //将数组展开   
        $category = apply_filters('widget_title', empty($instance['category']) ?__('未分类'): $instance['category']);
        $showpost = empty($instance['showpost'])? 10:$instance['showpost']; 
        $cat_id = get_cat_ID($category);
        $args = array('cat'=>$cat_id,'post_per_page'=>$showpost);
        $posts = get_posts('numberposts='.$showpost.'&category='.$cat_id);
        ?>  
       		<div>
            <style type="text/css">
              li{list-style: none;}
              a{text-decoration: none;}
            </style>
       			<p style="border-bottom:1px grey solid;"><?php echo $category; ?></p>
       			<ul>
       			<?php
       				query_posts($args);
       				if(have_posts()){
       					while(have_posts()){
       						the_post();
       						?>
   							<li class="page">
								<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
							</li>
				
       						<?php

       					}
       				}
       			?>
				</ul>
       		</div> 
             
        <?php  
    }  
}

/*
中图分类文章
 */
class Yu_category extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget)  
    function Yu_category() {  
        // 主要内容方法 
        $widget_ops = array(
              'description' => '根据分类选择中图分类文章'
          );
        $control_ops = array(
          'width' =>400,
          'height' => 300
        );
       parent::WP_Widget(false,$name='Yu_中图片文章',$widget_ops,$control_ops);
        //parent::直接使用父类中的方法  
        //$name 这个小工具的名称,  
        //$widget_ops 可以给小工具进行描述等等。  
        //$control_ops 可以对小工具进行简单的样式定义等等。  
    }

    function form($instance){  
         // 给小工具(widget) 添加表单内容
         
        //  $instance['cat'] = '请选择';
        //  $instance['showpost'] = 10;
        // $cat = $instance['cat'];
        // $showpost = $instance['showpost'];
         $defaults = array( 'cat' =>'请选择', 'showpost' =>10 );
        $instance = wp_parse_args( (array) $instance, $defaults ); 
         // echo "showpost=".$instance['showpost'];
         // echo "default=".$defaults['showpost'];
        // $args=array(
        //   'orderby' => 'name',
        //   'order' => 'ASC'
        // );
        $category = get_categories($args);
        ?>
        <label for="<?php echo $this->get_field_id('cat'); ?>">
            <span>选择文章分类</span>
            <select name="<?php echo $this->get_field_name('cat'); ?>" id="<?php echo $this->get_field_id('cat'); ?>">
              <option value="<?php echo $cat;?>"><?php echo $defaults['cat'];?></option>
              <?php  
              foreach ($category as $v) {
                # code...
                ?>
                  <option value="<?php echo $v->term_id; ?>" <?php if ( $v->term_id == $instance['cat'] ) echo 'selected="selected"'; ?>><?php echo $v->name; ?></option>
                <?php
              }
               ?>
            </select>

            
        </label>

        <br>
        <label for="<?php echo $this->get_field_id('showpost'); ?>">
          <span>文章数量</span>
          <input type="text" name="<?php echo $this->get_field_name('showpost'); ?> " id="<?php echo $this->get_field_id('showpost'); ?>" value="<?php
          echo $instance['showpost']; ?>">
        </label>

        <?php

    }  
    function update($new_instance, $old_instance){  
         // 进行更新保存  
         $instance = $old_instance;
         $instance['cat'] = strip_tags($new_instance['cat']);
         $instance['showpost'] = strip_tags($new_instance['showpost']);
         return $instance;  
    }  
    function widget($args, $instance){  
        // 输出显示在页面上  
        $cat = $instance['cat'];
        $showpost = $instance['showpost'];
        $args=array(  
          'cat' => $cat,   // 分类ID  
          // 'posts_per_page' => $showpost, // 显示篇数  
          'showposts' => $showpost,
          // 'paged' => $paged
        );

        // $cat = get_category($cat_ID);
        // echo $cat;
        
        query_posts($args);  
        if(have_posts()){
            while(have_posts()){
            the_post();
            
                   
        ?>
         <div class="xh_post_h_3 ofh">
              <div class="xh_265x265">
                  <a target="_blank" href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>">

                      <img src="<?php echo catch_that_image();?>" alt="<?php the_title(); ?>" height="240" width="400"></a></div>
              <div class="r ofh">
                  <h2 class="xh_post_h_3_title ofh">
                      <a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                  </h2>
                  <span class="time"><?php the_time('Y年n月j日'); ?></span>
                  <div class="xh_post_h_3_entry ofh">
                    <?php 
                       if(!is_single()) {
 
                              the_excerpt();
                           
                           } else {
                           
                              the_content(__('(more…)'));
                           
                           } 
                                            ?>  
              </div>
                  <div class="b">
                       <span title="2人赞" class="xh_love"><span class="textcontainer"><span>2</span></span> <span class="bartext"></span></span> <span title="119人浏览" class="xh_views">119</span>
                  </div>
              </div>
              <span class="cat"><a href="<?php echo get_category_link($cat); ?>" title="<?php echo get_cat_name($cat); ?>"
                  rel="category tag"><?php echo get_cat_name($cat); ?></a></span>
          </div>


        <?php
      }
    }
    }  
}


/*
小图随机文章
 */
class Yu_randomA extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget)  
    function Yu_randomA() {  
        // 主要内容方法 
        $widget_ops = array(
              'description' => '小图随机文章'
          );
        $control_ops = array(
          'width' =>400,
          'height' => 300
        );
       parent::WP_Widget(false,$name='Yu小图随机文章',$widget_ops,$control_ops);
        //parent::直接使用父类中的方法  
        //$name 这个小工具的名称,  
        //$widget_ops 可以给小工具进行描述等等。  
        //$control_ops 可以对小工具进行简单的样式定义等等。  
    }  
    function form($instance) {  
         // 给小工具(widget) 添加表单内容
        $defaults = array( 'title' =>'小图片最新文章', 'showpost'=>10 );
        $instance = wp_parse_args((array) $instance, $defaults );


        ?>
        <label for="<?php  echo $this->get_field_id('showpost');?>">
          <h4>小图片随机文章</h4>
          <span>文章数量</span>
          <input type="text" name="<?php  echo $this->get_field_name('showpost');?>" id="<?php  echo $this->get_field_id('showpost');?>" value="<?php echo $instance['showpost']; ?>">
        </label>

        <?php


    }  
    function update($new_instance, $old_instance) {  
         // 进行更新保存  
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['showpost'] = strip_tags($new_instance['showpost']);
         return $instance; 
    }  
    function widget($args, $instance) {  
        // 输出显示在页面上  
        
        // $result = $wpdb->get_results("SELECT ID,post_title FROM $wpdb->posts where post_status=’publish’ and post_type=’post’ ORDER BY ID DESC LIMIT 0 , ".$instance['showpost']);
        // query_posts("showposts=".$instance['showpost']."&cat=-111");
        ?>
        <div id="xh_sidebar" style="text-align: left;margin-top:28px; ">        
        <div class="widget">
          <div style="background: url('./style/img/hots_bg.png') no-repeat scroll 0 0 transparent;width:250px;height:52px;margin-bottom:15px;">
          </div> 
          <ul id="ulHot">
        <?php
        // foreach ($result as $post) {
          # code...
          // setup_postdata($post);
          // $postid = $post->ID;
          // $title = $post->post_title;
          // while (have_posts()) : the_post();
          // echo $instance['showpost'];
          // $post_query = new WP_Query('showposts='.$instance['showpost']);
          $post_query =  new WP_Query(array(
            'post__not_in' => get_option('sticky_posts'),
            'showposts' => $instance['showpost'],
          ));
          while ($post_query->have_posts()) : $post_query->the_post();
          $do_not_duplicate = $post->ID;
        ?>

          <li style="border-bottom:dashed 1px #ccc;height:70px; margin-bottom:15px;">
          <div style="float:left;width:85px;height:55px; overflow:hidden;"><a href="<?php the_permalink(); ?>" target="_blank"><img src="<?php echo catch_that_image();?>" width="83"  /></a></div>
          <div style="float:right;width:145px;height:52px; overflow:hidden;"><a href="<?php the_permalink($postid); ?>" target="_blank" title="<?php the_title();?>"><?php the_title();?></a></div>
          </li>
        <?php
        
       endwhile;
        echo '</ul>';
        echo ' </div></div>';
    }  
}


function yu_widget(){
  register_widget('My_Widget');
  register_widget('Yu_category');
  register_widget('Yu_randomA');
}
add_action('widgets_init','yu_widget');



?>

