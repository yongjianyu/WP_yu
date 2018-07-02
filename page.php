<?php 
    get_header('page');
    the_post();
 ?>

</div>
    <div id="wrapper">
       
        <div class="single_entry page_entry">
            <div class="entry">
                <h2 style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 22px; vertical-align: baseline; font-family: 'Microsoft Yahei', 'Trebuchet MS', Arial, Tahoma, Helvetica, sans-serif; line-height: 26px; color: rgb(51, 51, 51);"><?php the_title(); ?></h2>
                <?php the_content();?>

                <div class="clear">
                </div>
            </div>
    </div>

    </div>
<?php get_footer(); ?>
