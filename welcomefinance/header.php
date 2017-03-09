<script type="text/javascript">

function en_date(){
    var arr_day=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    var arr_month=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
    var date=new Date();
    dd=date.getDate();
    if(dd<10)dd="0"+dd;
    ddd=date.getDay();
    var hour = date.getHours();
    if(hour>12){
         shift = "PM";
    }else{
        shift = "AM";
    }
    var time = hour + ":" + date.getMinutes() +" "+ shift;   
    month=date.getMonth();
    year=date.getUTCFullYear();
    document.write(arr_day[ddd]+", "+ num_abbrev_str(dd+'') +" "+arr_month[month] + ", " + year);
    
}
</script>


<div class="whole_header"><!--whole header-->
    <div style="margin:0; height:32px; width:980px; position:fixed; background: url(bgimgs/top_bg.png) repeat-x top; z-index:20;"><!--top-->
        <div style="float:left; width:180px; height:32px; line-height:30px; font-family:Arial, Helvetica, sans-serif; color:#fff;"><!--time and date-->
            <font class="date_color<?php echo $language . " size13_" . $language; ?>">
                <?php echo '<script type="text/javascript">en_date();</script>'; ?>
            </font>
        </div><!--end time and date-->

        <div style="float:left; width:800px; height:32px; line-height:30px;">
            <div style="width:160px; height:30px; line-height:30px; float:left; border:0px solid; margin-left:470px;">
                <div style="text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff;"><!--follow us-->
                    <div style="float:left;">Follow Us:</div>
                    <div style="float:left; margin-top:3px; width:90px; height:30px; line-height:30px;">
                        <?php
                        $condition="l_id = '96' AND recycle!='yes' AND display = 'yes' and language_code='$language' and t2.field_ref='title' and t2.table_ref='tblarticle'";
                        $orderby="ordering asc, t1.a_id desc";
                        $limit="limit 0,5";
                        $sql=$class_obj->select_table_innerjoin($language,"tblarticle","$condition","$orderby","$limit");
                        if(mysql_num_rows($sql) > 0){
                            while($row=mysql_fetch_assoc($sql)){
                                $a_id = $row['a_id'];
                                $email_to_image = trim($row["email_to_img"]);
                                $linkto_type_value = stripcslashes(stripslashes($row["linkto_type"]));
                                $linkto_field_vlaue = stripcslashes(stripslashes($row["link_to"]));
                                $where_link_to = $class_obj->where_link_to($language, $a_id, $linkto_type_value, $linkto_field_vlaue, "");
                                $image = 'imgs/'.$row['a_id']."/" . $row["media"];
                                $div="<div class='shered'><a $where_link_to target='_blank'><img src='$image' alt='' class='imagenews_share' /></a></div>";
                                echo $div;
                            }
                        }
                        ?>
                    </div>
                </div><!--End follow us-->
            </div>
            <div style="float:left; width:165px; height:34px; border:0px solid red;">
                <?php
                $class_obj->generate_language_menu($language,$class_obj->get_info_from_url(),"language_menu","language_menu_current","border:0px solid red; margin-right:0px;","$language size12_$language","float:left;",$class_obj->multi_language);
                ?>
            </div>
        </div>

    </div>  <!--End top-->

    <div style="float:left;width:980px; height:150px; border:0px solid red; margin-top:30px;"><!--whole head-->
        <div style="float:left; width:980px; height:150px; background:url(imgs/537/<?php echo $class_obj->record_dlookup("media","tblarticle","a_id=537","")?>) no-repeat right;">
            <div style="float:left; width:57px; height:56px; background:url(bgimgs/kbach_left.png) no-repeat left; margin-top:91px; margin-left:4px; position:absolute;"></div><!--kbach left-->
            <div style="float:left; margin-left:40px; margin-top:15px; width:121px;"><!--logo logo_ctn-->
                <a href="?page=front&amp;lg=<?php echo $language; ?>">
                    <?php
                    $filename=$class_obj->record_dlookup("media","tblarticle","l_id=1");//header.swf
                    $type=$class_obj->get_extension($filename);
                    $aid=$class_obj->record_dlookup("a_id","tblarticle","l_id=1");
                    $w=$class_obj->record_dlookup("mwidth","tblarticle","l_id=1");
                    $h=$class_obj->record_dlookup("mheight","tblarticle","l_id=1");
                    echo $class_obj->view_media_nothumbnail($type,"imgs/".$aid."/",$filename,false,$w,$h,"border:0px","");
                    ?>
                </a>
            </div><!--End logo-->

            <div style="float:left; margin-left:50px; margin-top:15px; width:121px;"><!--title company-->
                <a href="?page=front&amp;lg=<?php echo $language; ?>">
                    <?php
                    $filename=$class_obj->record_dlookup("media","tblarticle","a_id=566");//header.swf
                    $type=$class_obj->get_extension($filename);
                    $aid=$class_obj->record_dlookup("a_id","tblarticle","a_id=566");
                    $w=$class_obj->record_dlookup("mwidth","tblarticle","a_id=566");
                    $h=$class_obj->record_dlookup("mheight","tblarticle","a_id=566");
                    echo $class_obj->view_media_nothumbnail($type,"imgs/".$aid."/",$filename,false,$w,$h,"border:0px","");
                    ?>
                </a>
            </div><!--end title company-->

            <div class="search_ctn" style="margin-right:12px; margin-left:760px; position:absolute; z-index:20;"><!--search ctn-->
                <?php
                $f_search=mysql_real_escape_string($_GET['txt_asearch']);
                if($f_search!=""){
                    $key_word_search=stripslashes($_REQUEST["txt_asearch"]);
                }
                else{
                    $key_word_search=$class_obj->get_translate($language,"tblarticle","title","a_id",149);
                }
                ?>
                <form name="asearch" action="" method="get">
                    <input type="hidden" name="page" value="search" />
                    <input type="text" style="float:left; width:170px; height:27px; margin-left:10px; margin-top:0px; outline:none; line-height:27px; border:none; background:none; color:#535353; font-family:arial; font-size:12px;" name="txt_asearch" value="<?php echo $key_word_search ?>" onkeydown="if (event.keyCode == 13)searchContentOnly('<?php echo $language;  ?>;','<?php echo $class_obj->get_translate($language,"tblarticle","title","a_id",148); ?>','<?php echo $class_obj->get_translate($language,"tblarticle","title","l_id",149);  ?>');" onfocus="this.value='';" />
                    <div style="float:left; width:12px; height:12px; margin-top:5px;">
                        <a href="javascript:searchContentOnly('<?php echo $language;  ?>','<?php echo $key_word_search; ?>','<?php echo $class_obj->get_translate($language,"tblarticle","title","a_id",148);  ?>');">
                            <img src="bgimgs/search_icon.png" style="border:none;"/>
                        </a>
                    </div>
                </form>
            </div><!--End search ctn-->
            <div style="float:right; width:57px; height:56px; background:url(bgimgs/kbach_right.png) no-repeat right; margin-top:91px; margin-right:4px; "></div><!--kbach right-->
        </div>
    </div><!--whole head-->

    <div style="float:left; width:980px; height:41px; line-height:40px; border:0px solid red;"><!--whole menu-->
        <div style="float:left; width:11px; height:53px; background:url(bgimgs/menu_left.png) no-repeat left; margin-top:-12px;"></div><!--left conner menu-->
        <div style="float:left; width:958px; height:41px; line-height:40px; background: url(bgimgs/bg_menu.png) repeat-x;">
            <div id="smoothmenu" class="ddsmoothmenu" style="position:relative; z-index:1;"><!--menu-->
                <?php
                $class_obj->menu($language,array("l_id=2 and display='yes' and recycle='no'","ordering ASC, a_id ASC",""),$_REQUEST["page"],0, "$language size14_$language", "$language size14_$language",array("yes","$language size14_$language"));
                ?>
            </div>
        </div>
        <div style="float:left; width:11px; height:53px; background:url(bgimgs/menu_right.png) no-repeat left; margin-top:-12px;"></div><!--right conner menu-->
    </div><!--end whole menu-->

</div><!--End whole header-->