<?php get_header(); ?>
    <div id="xh_wrapper">
       
<input type="hidden" id="hdUrlFocus" />
    <div class="xh_h_show">
        <div class="xh_h_show_in">
        
        <!---轮播图--->
        <div id="zSlider" >
            <div id="picshow">
    <div id="picshow_img">
        <ul>
<li style="display: list-item;"><a href="" target="_blank">
                <img style="" src="<?php  echo get_option('nav1_link');?>" alt="<?php  echo get_option('nav1_title');?>"></a></li>
<li style="display: list-item;"><a href="" target="_blank">
                <img src="<?php  echo get_option('nav2_link');?>" alt="<?php  echo get_option('nav2_title');?>"></a></li>
<li style="display: list-item;"><a href="" target="_blank">
                <img src="<?php  echo get_option('nav3_link');?>" alt="<?php  echo get_option('nav3_title');?>"></a></li>
<li style="display: list-item;"><a href="" target="_blank">
                <img src="<?php  echo get_option('nav4_link');?>" alt="<?php  echo get_option('nav4_title');?>"></a></li>



        </ul>
    </div>
</div>
<div id="select_btn">
    <ul>
        <li class="current"></li><li class=""></li><li class=""></li><li class=""></li>
    </ul>
</div>
            <div class="focus-bg-title"><div id="focus-left" class="arrow-left" onmouseover="IFocuse(this,true)" onmouseout="IFocuse(this,false)"></div>
            <div id="focus-center" class="focus-title">
            <div style="float:left;width:580px;padding-left:10px;font-size:18px;" id="focus-tl-s"></div>
            <div style="float:right;width:200px;"></div>
            </div>
            <div id="focus-right" class="arrow-right"></div></div>
            </div>

            
            <div id="picshow_right">
      <a href="/life/416.html" target="_blank">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/1-140206160415Y6.jpg" alt="COACH再度携手王力宏 踩单车演" width="255px" height="420px"></a>
   
            <div id="picshow_right_cover" onclick="goanewurl()" style="cursor:pointer;position:absolute;top:495px;font-size:14px;width:213px;height:45px;line-height:45px;padding-left:42px;color:#ffffff;zoom:1;background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/focus-left-bg.png); background-repeat:no-repeat; background-color:#01A1ED;"></div>
            </div>
        </div>
    </div>
    <div id="xh_container">
    <a name="new"></a>
        <div id="xh_content" style="padding-right:10px;">
            <div class="xh_area_h_3">
                <br>
                
                
   <?php 
        if(function_exists('dynamic_sidebar'))
            dynamic_sidebar('home_left');
    ?>


     
  
            </div>
            <div id="pagination"><div class='wp-pagenavi'> <a href="/lookbike/" style='float:right;'><img src='/blog4<?php bloginfo('stylesheet_directory'); ?>/style/images/next01.png' id='next-page'></a></div></div>
        </div>
       

<?php if(function_exists('dynamic_sidebar')) dynamic_sidebar('home_right'); ?>
                </div>
            
            <div class="widget portrait">
    <!-- <div>
        <div class="textwidget">
            <a href="/tougao.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/style/img/tg.jpg" alt="投稿"></a><br><br>          
        </div>
    </div> -->
</div>
            <!-- <div class="widget links">
                <h3>
                    友情链接</h3>
                
                <div>
                    <?php echo get_option('my_link'); ?>
                </div>
                <div class="clear">
                </div>
            </div> -->
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>
    <input type="hidden" id="hdBoxbor" />
    <script type="text/javascript">

        $("#next-page").hover(function () { $(this).attr("src", "<?php bloginfo('stylesheet_directory'); ?>/style/images/next02.png"); }, function () { $(this).attr("src", "<?php bloginfo('stylesheet_directory'); ?>/style/images/next01.png"); });
        $("#last-page").hover(function () { $(this).attr("src", "<?php bloginfo('stylesheet_directory'); ?>/style/images/last02.png"); }, function () { $(this).attr("src", "<?php bloginfo('stylesheet_directory'); ?>/style/images/last01.png"); });

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
<?php get_footer(); ?>