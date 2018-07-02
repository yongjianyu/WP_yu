<?php get_header(); ?>
    <div id="wrapper">

    <div id="wrapper">
        <div id="container">
            <div id="content">
                <div class="post" id="post-19563" style="border-right: solid 1px #000000; min-height: 1000px;
                    margin-top: 10px;">
                    <?php 
                        $cate = get_the_category();
                        the_post();

                     ?>
                    <div class="path"><a href='<?php bloginfo('url');?>'>首页</a> > <a href='<?php echo get_category_link($cate[0]->cat_ID); ?>'><?php echo $cate[0]->name; ?></a> > </div>
                    <div class="single_entry single2_entry">
                        <div class="entry fewcomment">
                            <div class="title_container">
                                <h2 class="title single_title">
                                    <span><?php the_title(); ?></span><span class="title_date"></span></h2>
                                <p class="single_info">时间：<?php the_time('Y年n月j日'); ?>&nbsp;&nbsp;&nbsp;编辑：<?php the_author(); ?></p>
                            </div>
                            <div class="div-content">
                               <?php  the_content(); ?>
                               </p><p></p><p class="pagepage"></p>
                                
                                <center id="pagenav" style="margin:3em 0 10em 0;">
                                    <span class="prev" style="float:left;">上一页：<?php next_post_link('%link') ?></span>  
                                    <span class="next" style="float:right;">下一页：<?php previous_post_link('%link') ?></span>  
                                </center>
                                <div id="BottomNavOver" style="height: 80px;">
                                    <div style="float: left; font-size: 12px;">
                                        
                                    </div>
                                    <div style="float: right; padding-right: 20px; width: 120px;" class="div">
                                        <table cellpadding="0" cellspacing="0" border="0" style="background-color: transparent;
                                            border: 0px solid #EEEEEE; border-collapse: collapse; margin: 5px 0 10px;">
                                            <tr>
                                                <td style="border-width: 0px; padding: 0px; padding-right: 4px;">

                                                </td>
                                                <td style="border-width: 0px; padding: 0px;">
                                                    <!-- JiaThis Button BEGIN -->
                                                    <div class="jiathis_style">
                                                        <a class="jiathis_button_qzone"></a><a class="jiathis_button_tqq"></a><a class="jiathis_button_renren">
                                                        </a><a class="jiathis_button_kaixin001"></a><a href="http://www.jiathis.com/share"
                                                            class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                                                    </div>
                                                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1365565447348652"
                                                        charset="utf-8"></script>
                                                    <!-- JiaThis Button END -->
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                        <div id="share">
                                        <?php include(TEMPLATEPATH."/shareto.php");?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="clear">
                            </div>
                            <div id="ctl00_ctl00_ContentPlaceHolder1_contentPlace_divRead">
                                <div style="text-align: left; width: 100%; border-bottom: solid 1px #e0e0e0; padding-bottom: 4px;
                                    color: Black; vertical-align: middle; font-weight: bold;">
                                    &nbsp;&nbsp;猜您喜欢的文章
                                </div>
                                <ul class="read" style="list-style-type: none; margin-top: 10px; width: 780px;">
                                <?php query_posts('showposts=6&cat=-111'); ?>   
                                <?php while (have_posts()) : the_post(); ?>  
                                <li style="margin:1em 0 1em 0; list-style:inside url('images/circle.png'); "><a href="<?php the_permalink() ?>" style="color: rgb(43,129,206);font-size: 14px;"><?php the_title(); ?></a>
                                </li>  
                                <?php endwhile;?>  
                                </ul>
                            </div>
                        
          <!-- Duoshuo Comment BEGIN -->
          <div class="ds-thread" data-thread-key="" 
    data-title="" data-author-key="" data-url=""></div>
          <script type="text/javascript">
    var duoshuoQuery = {short_name:"dede58"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = 'http://static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] 
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script> 
          <!-- Duoshuo Comment END --> 
                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php get_sidebar(); ?>
            <div class="clear">
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./style/z700bike_global.js"></script>
    <script type="text/javascript" src="./style/z700bike_single.js"></script>
  
    <script type='text/javascript' src='/blog4./style/jquery.colorbox-min.js?ver=1.3.17.2'></script>


    </div>

    
 <?php get_footer(); ?>
