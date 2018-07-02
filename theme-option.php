<?php

    //注册数据
    add_action('admin_init', 'register_theme_settings');
    function register_theme_settings() {
        register_setting("theme_mods_freshblog","theme_mods_freshblog");
    }
    //添加admin外观菜单
    add_action('admin_menu', 'add_theme_options_menu');
    function add_theme_options_menu() {
        add_theme_page('yu_主题选项','yu_主题选项','edit_theme_options','theme-options', 'theme_settings_admin');
    }

    function theme_settings_admin() {
        //这里写选项页面内容
           ?>
            <style type="text/css">

                /* Style the tab */
                div.tab {
                    overflow: hidden;
                    border-bottom: 1px solid #ccc;
                    background-color: #f1f1f1;
                }

                /* Style the buttons inside the tab */
                div.tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                }

                /* Change background color of buttons on hover */
                div.tab button:hover {
                    background-color: #ddd;
                }

                /* Create an active/current tablink class */
                div.tab button.active {
                    background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border: 1px solid #ccc;
                    border-top: none;
                }

                .box{
                    border-bottom: 1px rgb(188,213,243) solid;
                    padding: 1em;
                }

                iinput[type="text"]{
                    width: 30%;
                }
            </style>


            <h3>主题选项</h3>
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">基本设置</button>
              <button class="tablinks" onclick="openCity(event, 'Paris')">首页设置</button>
              <button class="tablinks" onclick="openCity(event, 'Tokyo')">底部设置</button>
            </div>

            <div id="London" class="tabcontent">
                <form method="POST">
                    <div class="box">
                        <span style="color: rgb(92,155,222);">自定义菜单设置网站的基本内容</span>
                    </div>

                    <div class="box">
                        <label>
                            <span style="font-weight: bolder;font-size: 16px;">网站logo</span>
                            <input style="width: 30%;" class="logo_url" type="text" name="logo_url" value="<?php  echo get_option('logo_url');?>">
                            <input type="button" value="上传图片" class="upload" onclick="upload(this);" />
                            
                            <span>*设置网站LOGO</span>
                        </label>
                        
                        <br>
                        <label>
                            <span style="font-weight: bolder;font-size: 16px;">分类目录文章每页最多文章数</span>
                            <input style="width: 30%;" class="category_num" type="text" name="category_num" value="<?php  echo get_option('category_num');?>">
                        </label>
                    </div>

                    <div class="box">
                        <label>
                            <span style="font-weight: bolder;font-size: 16px;">友情链接</span>
                            <?php
                                $content = get_option('my_link');

                                wp_editor($content,'my_link',$settings = array(textarea_rows=>6,));
                            ?>
                            
                            <span>*友情链接,直接添加带链接的文字即可</span>


                        </label>
                    </div>


                   <input type="submit" name="submit1" value="提交">
                </form>
            </div>

            <div id="Paris" class="tabcontent">
                <form method="POST">
                     <div class="box">
                        <span style="color: rgb(92,155,222);">自定义设置网页首页栏目</span>
                    </div>

                    <div class="box">

                        <label>
                            <h4>幻灯片1</h4>
                            <input type="text" style="width: 30%;" class="nav1_url" name="nav1_link" value="<?php  echo get_option('nav1_link');?>">
                            <input type="button" name="btn" onclick="upload(this)" value="提交">
                            <span>*幻灯片链接</span><br>
                            <input type="text" style="width: 30%;" name="nav1_title" value="<?php  echo get_option('nav1_title');?>">
                            <span>*幻灯片标题</span><br>
                        </label>
                    </div>

                    <div class="box">
                        <label>
                            <h4>幻灯片2</h4>
                            <input type="text" style="width: 30%;" class="nav2_url" name="nav2_link" value="<?php  echo get_option('nav2_link');?>">
                            <input type="button" name="btn" onclick="upload(this)" value="提交">
                            <span>*幻灯片链接</span><br>
                            <input type="text" style="width: 30%;" name="nav2_title" value="<?php  echo get_option('nav2_title');?>">
                            <span>*幻灯片标题</span><br>
                        </label>
                    </div>

                    <div class="box">
                        <label>
                            <h4>幻灯片3</h4>
                            <input type="text" style="width: 30%;" class="nav3_url" name="nav3_link" value="<?php  echo get_option('nav3_link');?>">
                            <input type="button" name="btn" onclick="upload(this)" value="提交">
                            <span>*幻灯片链接</span><br>
                            <input type="text" style="width: 30%;" name="nav3_title" value="<?php  echo get_option('nav3_title');?>">
                            <span>*幻灯片标题</span><br>
                        </label>
                    </div>

                    <div class="box">
                        <label>
                            <h4>幻灯片4</h4>
                            <input type="text" style="width: 30%;" class="nav4_url" name="nav4_link" value="<?php  echo get_option('nav4_link');?>">
                            <input type="button" name="btn" onclick="upload(this)" value="提交">
                            <span>*幻灯片链接</span><br>
                            <input type="text" style="width: 30%;" name="nav4_title" value="<?php  echo get_option('nav4_title');?>">
                            <span>*幻灯片标题</span><br>
                        </label>
                    </div>

                  <input type="submit" name="submit2" value="提交">
                </form> 
            </div>

            <div id="Tokyo" class="tabcontent">
                <form method="POST">
                     <div class="box">
                        <span style="color: rgb(92,155,222);">自定义设置网页底部栏目</span>
                    </div>

                     <div class="box">
                        <label>
                            <h4>友情链接</h4>
                            <select name="friend_link">
                                <option value="1" <?php if(get_option('friend_link')==1) echo "selected"; ?>>显示</option>
                                <option value="0" <?php if(get_option('friend_link')==0) echo "selected"; ?>>不显示</option>
                            </select>
                        </label>
                    </div>

                    <div class="box">
                        <label>
                        <h4>底部内容</h4>
                        <?Php 
                            $content = get_option('my_footer');
                            wp_editor($content, 'my_footer', $settings = array(
                                'media_buttons'=>1,
                                textarea_rows=>0,
                            ) );
                        ?>
                        </label>
                    </div>
                   <input type="submit" name="submit3" value="提交">
                </form>
            </div>


            <script>
                function upload(which){
                    console.log(jQuery(which));
                    var send_attachment_bkp = wp.media.editor.send.attachment;
                    wp.media.editor.send.attachment = function(props, attachment) {
                        // jQuery('.custom_media_image').attr('src', attachment.url);
                        jQuery(which).prev().val(attachment.url);
                        // jQuery('.custom_media_id').html(attachment.id);
                        // jQuery('.logo_url').html(attachment.url);
                        wp.media.editor.send.attachment = send_attachment_bkp;
                    }
                    wp.media.editor.open();
                    return false;       
                }
            </script>


            <script type="text/javascript">
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // 触发 id="defaultOpen" click 事件
            document.getElementById("defaultOpen").click();
            </script>


           <?php
    }

     // if(isset($_POST['submit'])){
     //     update_option('logo', $_POST['logo']);
     //    echo get_option('logo');
     // } 
     // 
     if(isset($_POST['submit1'])){
        update_option('logo_url',$_POST['logo_url']);
        update_option('my_link',$_POST['my_link']);
        update_option('category_num',$_POST['category_num']);
     }else if(isset($_POST['submit2'])){
        update_option('nav1_link',$_POST['nav1_link']);
        update_option('nav1_title',$_POST['nav1_title']);

        update_option('nav2_link',$_POST['nav2_link']);
        update_option('nav2_title',$_POST['nav2_title']);

        update_option('nav3_link',$_POST['nav3_link']);
        update_option('nav3_title',$_POST['nav3_title']);

        update_option('nav4_link',$_POST['nav4_link']);
        update_option('nav4_title',$_POST['nav4_title']);

     }else if(isset($_POST['submit3'])){
         update_option('friend_link',$_POST['friend_link']);
         update_option('my_footer',$_POST['my_footer']);
     }


?>