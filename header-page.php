<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if ( is_home() ) { ?><title><?php bloginfo('name'); ?>-<?php bloginfo('description'); ?></title><?php } ?>
<?php if ( is_search() ) { ?><title>搜索结果-Search Results-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_single() ) { ?><title><?php echo trim(wp_title('',0)); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_page() ) { ?><title><?php echo trim(wp_title('',0)); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_category() ) { ?><title><?php single_cat_title(); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_month() ) { ?><title><?php the_time('F'); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><title><?php single_tag_title("", true); ?>-<?php bloginfo('name'); ?></title><?php }?> <?php } ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/style/style2.css" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/style/jquery-1.4.1.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/style/jquery.js" type="text/javascript"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/style/jquery.error.js" type="text/javascript"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/style/jtemplates.js" type="text/javascript"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/style/jquery.form.js" type="text/javascript"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/style/lazy.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/style/wp-sns-share.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/style/voterajax.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/style/userregister.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style/pagenavi-css.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style/votestyles.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style/voteitup.css" type="text/css" />
    <style type="text/css">
        #wrapper
        {
            background-color: #ffffff;
        }
        .single_entry{margin-top:30px;}
    </style>
</head>
<body class="single2">

<script type="text/javascript">
    function showMask() {
        $("#mask").css("height", $(document).height());
        $("#mask").css("width", $(document).width());
        $("#mask").show();
    }  
</script>
<div id="mask" class="mask" onclick="CloseMask()"></div> 
<div id="header_wrap">
    <div id="header">
        <div style="float: left; width: 310px;">
            <h1>
                <a style="background: url(<?php  echo get_option('logo_url');?>) no-repeat 0 0;"
                href="/" title="<?php bloginfo('description'); ?>"><?php bloginfo('description'); ?></a>
                <div class="" id="logo-sub-class">
                </div>
            </h1>
        </div>
        <div id="navi">

<?php 
    if(function_exists('wp_nav_menu')){
        
         wp_nav_menu( $args );
    }
?>
<!-- <ul id="jsddm">
<li><a class="navi_home" href="/">首页</a></li>
<li><a class="navi_home" target="_blank" href="http://www.chuanke.com/s2260700.html">ThinkPHP5视频教程</a></li>
<li><a href="/plus/list.php?tid=1">单车分类</a>
<ul>

<li><a href="/plus/list.php?tid=5">死飞车</a></li>

<li><a href="/plus/list.php?tid=6">复古骑行</a></li>

<li><a href="/plus/list.php?tid=7">公路车</a></li>

<li><a href="/plus/list.php?tid=8">山地车</a></li>

<li><a href="/plus/list.php?tid=9">折叠/小径车</a></li>

<li><a href="/plus/list.php?tid=10">BMX</a></li>

<li><a href="/plus/list.php?tid=11">城市车及其他</a></li>


</ul>

 </li2><li><a href="/plus/list.php?tid=2">骑行装备</a>
<ul>

<li><a href="/plus/list.php?tid=12">车身装备</a></li>

<li><a href="/plus/list.php?tid=13">人身装备</a></li>


</ul>

 </li2><li><a href="/plus/list.php?tid=3">单车生活</a>





 </li2><li><a href="/plus/list.php?tid=4">行业资讯</a>





 </li2>

</ul> -->

            <div style="clear: both;">
            </div>

            
        </div>
       <!--  <div style="float: right; width: 209px;">
            <div class="widget" style="height: 30px; padding-top: 20px;">
                <div style="float: left;">
      <form  name="formsearch" action="/plus/search.php"><input type="hidden" name="kwtype" value="0" />                
<input name="q" type="text" style="background-color: #000000;padding-left: 10px; font-size: 12px;font-family: 'Microsoft Yahei'; color: #999999;height: 29px; width: 160px; border: solid 1px #666666; line-height: 28px;" id="go" value="在这里搜索..." onfocus="if(this.value=='在这里搜索...'){this.value='';}"  onblur="if(this.value==''){this.value='在这里搜索...';}" />
        </form>
                        </div>
                <div style="float: left;">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>images/search-new.png" id="imgSearch" style="cursor: pointer; margin: 0px;
                        padding: 0px;" onclick="ISearch()" /></div>
                <div style="clear: both;">
                </div>
            </div>
        </div> -->
        
    </div>
</div>