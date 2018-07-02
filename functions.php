<?php
	 include('wiget.php');
	 include('theme-option.php');
	 // include('theme.php');
	 if ( function_exists('register_sidebar') ){
		    register_sidebar(
                array(
                    'name'          => '首页左栏',
                    'id'            => 'home_left',
                    'description'   => '这是首页左边的框架',
                    'class'         => 'home_left',
                    'before_widget' => "<div class='home_left' id='home_left'>",
                    'after_widget'  => '</div>'
                    
                )
		    );

            register_sidebar(
                 array(
                    'name'          => '首页右栏',
                    'id'            => 'home_right',
                    'description'   => '这是首页右边的框架',
                    'class'         => 'home_right',
                    'before_widget' => "<div class='home_right' id='home_right'>",
                    'after_widget'  => '</div>'
                    
                )
            );

    	}

		


	  

/*
    获取文章的简图
 */
function catch_that_image() {
      global $post, $posts;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
      $first_img = $matches [1] [0];
      if(empty($first_img)){ //Defines a default image
        $first_img = "/images/default.jpg";
      }
      return $first_img;
    }

function catch_that_image_id($post) {
      // global $post, $posts;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
      $first_img = $matches [1] [0];
      if(empty($first_img)){ //Defines a default image
        $first_img = "/images/default.jpg";
      }
      return $first_img;
    }

/*
这是根据评论数来判定最热
 */
function most_comm_posts($days=7, $nums=4) { //$days参数限制时间值，单位为‘天’，默认是7天；$nums是要显示文章数量
  global $wpdb;
  $today = date("Y-m-d H:i:s"); //获取今天日期时间
  $daysago = date( "Y-m-d H:i:s", strtotime($today) - ($days * 24 * 60 * 60) );  //Today - $days
  $result = $wpdb->get_results("SELECT comment_count, ID, post_title, post_date FROM $wpdb->posts WHERE post_date BETWEEN '$daysago' AND '$today' ORDER BY comment_count DESC LIMIT 0 , $nums");
  $output = '';
  if(empty($result)) {
    $output = '<li>None data.</li>';
  } else {
    foreach ($result as $topten) {
      $postid = $topten->ID;
      $title = $topten->post_title;
      $commentcount = $topten->comment_count;
      if ($commentcount != 0) {
        // $output .= '<li><a href="'.get_permalink($postid).'" title="'.$title.'">'.$title.'</a> ('.$commentcount.')</li>';
        $output .= "<li style='margin-left: -10px; margin-right: 16px; margin-top: 20px; height: 180px;'> <a href='".get_permalink($postid)."' target='_blank'><img src='". catch_that_image_id($topten)."' style='width: 250px; height: 150px; margin-bottom: 0px;' />
          <span style='margin: 0px; padding: 0px; margin-top: -5px;'>".$title."</span></a></li>";
      }
    }
  }
  echo $output;
}


function lingfeng_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<div class='fenye'>"; 
        if( !$paged ){
            $paged = 1;
        }
        if( $paged != 1 ) {
            echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";
        }
        previous_posts_link('上一页');
        if ( $max_page >$range ) {
            if( $paged <$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<a href='".get_pagenum_link($i) ."'";
                if($i==$paged) echo " class='current'";echo ">$i</a>";
                }
            }elseif($paged >= ($max_page -ceil(($range/2)))){
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }
            }else{
                for($i = 1;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                }
            }
        next_posts_link('下一页');
        if($paged != $max_page){
            echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";
        }
        echo '<span>共['.$max_page.']页</span>';
        echo "</div>\n";  
    }
}


function fenye(){
  global $paged,$wp_query;
  if(!$max_page){
    $max_page = $wp_query->max_num_pages;
  }
  echo '<div class="fenye">';
  if($paged == 1){
    echo '<div class="fenye"><a href="'.get_pagenum_link(1).'">首页</a><a class="disable">上一页</a><a href="'.get_pagenum_link($paged+1).'">下一页</a><a href="'.get_pagenum_link($max_page).'">尾页</a>';
  }else if($paged > 1 && $paged < $max_page){
    echo '<div class="fenye"><a href="'.get_pagenum_link(1).'">首页</a><a href
    ="'.get_pagenum_link($paged-1).'">上一页</a><a href="'.get_pagenum_link($paged+1).'">下一页</a><a href="'.get_pagenum_link($max_page).'">尾页</a>';
  }else if($paged == $max_page){
    echo '<div class="fenye"><a href="'.get_pagenum_link(1).'">首页</a><a href
    ="'.get_pagenum_link($paged-1).'">上一页</a><a class="disable">下一页</a><a href="'.get_pagenum_link($max_page).'">尾页</a>';
  }

  echo '<a>'.$paged.'/'.$max_page.'</a>';
  echo '</div>';


}


?>