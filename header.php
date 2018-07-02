<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<?php if ( is_home() ) { ?><title><?php bloginfo('name'); ?>-<?php bloginfo('description'); ?></title><?php } ?>
<?php if ( is_search() ) { ?><title>搜索结果-Search Results-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_single() ) { ?><title><?php echo trim(wp_title('',0)); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_page() ) { ?><title><?php echo trim(wp_title('',0)); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_category() ) { ?><title><?php single_cat_title(); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_month() ) { ?><title><?php the_time('F'); ?>-<?php bloginfo('name'); ?></title><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><title><?php single_tag_title("", true); ?>-<?php bloginfo('name'); ?></title><?php }?> <?php } ?>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="<?php bloginfo('description');?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/style/style2.css" />
   <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/style/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/style/jquery.js"></script>
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
<script type="text/javascript">
    function IFocuse(th, o) {
        var t = $(th);
        var c = t.attr("class");
        if (o) {
            t.removeClass(c).addClass(c+"-over");
        }
        else {
            t.removeClass(c).addClass(c.replace("-over",""));
        }
    }
</script>
</head>
<body class="xh_body">
<script src="<?php bloginfo('stylesheet_directory'); ?>/style/common.js" type="text/javascript"></script>
 <script>
 function subForm()
 {

 formsearch.submit();
 //form1为form的id
 }
 </script>
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


            <div style="clear: both;">
            </div>           
        </div>
    </div>
</div>

</div>