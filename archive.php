<?php 
    get_header();
    $num = get_option('category_num');    
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style/fenye.css">
</div>
    <div id="wrapper">
       

    <div id="xh_container">
        <div id="xh_content">

        <div class="path"><a href='<?php bloginfo('url'); ?>'>首页</a> > <a href='<?php echo get_category_link($cat_id); ?>'><?php single_cat_title(); ?></a> > </div><div class="clear"></div>
            <div class="xh_area_h_3" style="margin-top: 0px;width: 100%;">

               
 <?php  
    $cat_id = get_query_var('cat');
    $result = get_categories("child_of=".$cat_id."&hide_empty=0");
    if($result){
        foreach ($result as $v) {
            # code...
            $id = $v->term_id;
            $title = $v->name;
            
        ?>
          <div class="box" style="width: 68em; float:left;margin: 2em 1em 4em 1em;">
                <div style="height: 2em;border-bottom:1px grey solid;">
                    <h3 style=""><span style="display: inline;float: left;"><a href='<?php echo get_category_link($id);?>'><?php echo $title; ?></a></span><span style="float: right;"><a href='<?php echo get_category_link($id);?>'>More</a></span></h3>
                </div>

                <div class="link" style="width: 100%;">
                <?php 
                    // $wp_query = new WP_Query( array( 'cat' => array( $category->$id ) ) );
                     $args=array(     
                        'cat' => $id,   // 分类ID     
                        'posts_per_page' =>$num , // 显示篇数     
                    );     
                    query_posts($args);  
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                ?>
                    <label style="float: left;display: block;width: 100%;margin:1em 0 1em 0;">
                        <span > > </span>
                        <span><a href='<?php the_permalink(); ?>' ><?php the_title(); ?></a></span>
                        <span style="float: right;"><?php the_time('Y年n月j日'); ?></span>
                    </label>
                <?php 
                        endwhile;
                    endif;
                    wp_reset_query();
                ?>
                </div>
          </div>  

        <?php
        }   
    }else{
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
        $args = array( 
        'posts_per_page' => $num, 
        'paged' => $paged, 
        'post_status' => 'publish', 
        'cat' => $cat_id, 
        );    
        query_posts($args);
        ?>
          <div class="alone_link" style="width: 100%;height: 30em;">  
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
            ?>   
             <label style="float: left;display: block;width: 100%;margin:1em 0 1em 0;">
                        <span> > </span>
                        <span><a href='<?php the_permalink(); ?>' ><?php the_title(); ?></a></span>
                        <span style="float: right;"><?php the_time('Y年n月j日'); ?></span>
            </label>
            
            <?php
            endwhile;
            ?>
        </div>
        <style type="text/css">
            .disable{background-color: grey !important;}
        </style>
            <?php
            fenye();
        endif;
        wp_reset_query();

    ?>
    

    <?php } ?>
    
    </div>
    <div class="boxBor" style="padding:auto;"></div>

    <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>
    <script type="text/javascript">
        $(function () {
            var imgHoverSetTimeOut = null;
            $('.xh_265x265 img').hover(function () {
                var oPosition = $(this).offset();
                var oThis = $(this);
                $(".boxBor").css({
                    left: oPosition.left,
                    top: oPosition.top,
                    width: oThis.width(),
                    height: oThis.height()
                });
                $(".boxBor").show();
                var urlText = $(this).parent().attr("href");
                $("#hdBoxbor").val(urlText);
            }, function () {
                imgHoverSetTimeOut = setTimeout(function () { $(".boxBor").hide(); }, 500);
            });
            $(".boxBor").hover(
                function () {
                    clearTimeout(imgHoverSetTimeOut);
                }
                , function () {
                    $(".boxBor").hide();
                }
            );
        });
        function IBoxBor() {
            window.open($("#hdBoxbor").val());
        }
        function goanewurl() {
            window.open($("#hdUrlFocus").val());
        }
    </script>

    </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>