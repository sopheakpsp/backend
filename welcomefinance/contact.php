<div class="whole_front"><!--whole front-->
  
    	<div style="float:left; width:970px; height:310px; border:5px solid #29945e; margin:0 auto; margin-top:15px;">
        	<?php //include("front_slide.php"); ?>
            <?php include_once("cached/front_slide_".$language.".html");?>
        </div>
      <div style="float:left; width:980px; height:36px; background:url(bgimgs/shadow_slide.png) no-repeat;"></div><!--shadow slide-->
    
    <div style="margin:0 auto; border:0px solid red; width:980px; height:auto; border-bottom:0px solid #f0e9e5; margin-top:15px; padding-bottom:18px;">

	<div class="l_panel"><!--rpanel-->
            
     
             <div style="float:left; width:616px;">
                 <div class="detail_dp_title_ctn">
                    <?php echo $class_obj->title_location($language,32,0,array("non_underline","moulight_$language size14_$language white"),array("yes","$language size14_$language")); ?>
                 </div>
        
                 <!--detail--><div class="dspblock address_dp_ctn">
                    <?php
                        echo $class_obj->full_detail_contact($language,array("l_id=32 and display='yes' and recycle='no'","ordering asc,a_id asc",""),
                        array("","","","contact_pg_ctn","no"),
                        array("yes","1","inside","contact_pg_title_ctn","$language size14_$language lineheight16_$language black"),
                        array("no","$language size12_$language","non_underline"),
                        array("yes","border:0px solid red","16","16","","0","0","cp_lightbox","yes"),
                        array("contact_pg_info_column_ctn","$language size12_$language lineheight16_$language black"),
                        array("no","contact_pg_counter_ctn","$language size11_$language red","12","no"),
                        array("yes","booking_link","$language size11_$language","12","no"),"16x16");
                    ?>
                <!--end detail--></div>
            </div>



            <div style="float:left;width:616pxpx; margin-top:16px;">
    
                 <div class="detail_dp_title_ctn">
                    <font class="moulight_<?php echo $language; ?> size14_<?php echo $language; ?> white"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id",70); ?></font>
                 </div>
                 <!--Send us email--><div class="dspblock contact_email_ctn">
            
                      <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"  bgcolor="#ffffff" class="round_all">
                      <tr valign="top">
                      <td align="center">
                                <a name="sendmail"></a>
                                <?php include("sendmail.php"); ?>
                                <form name="frm_sendmail" method="post" action="#sendmail">
                                <div style="float:left; width:90%; padding:5px 0px 5px 10px; line-height:16px; text-align:left">
                                     <?php
                                        echo $sending!=''?$sending:'';
                                        echo $frm_err!=''?$frm_err."<br />":'';
                                     ?>
                                    <font class="<?php echo $language; ?> size12_<?php echo $language; ?> red"><font color=red>* </font><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","73"); ?></font>
                                </div>
                                    
                                <!-- draw left form --><div class="form_left_ctn">
                                   <div class="element_left_ctn lineheight16_<?php echo $language; ?>">
                                    <font class="<?php echo $language; ?> size12_<?php echo $language; ?> brown"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","74"); ?> <font color=red>*</font></font><br /><br style="line-height:5px" />
                                    <input name="txt_subject" value="<?php echo $subject; ?>" type="text" class="field_contact_style">
                                   </div>      
                                   
                                   <div class="element_left_ctn lineheight16_<?php echo $language; ?>">
                                    <font class="<?php echo $language; ?> size12_<?php echo $language; ?> brown"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","75"); ?> <font color=red>*</font></font><br /><br style="line-height:5px" />
                                    <input name="txt_fullname" value="<?php echo $fullname; ?>" type="text" class="field_contact_style">
                                   </div>  
                                   
                                   <div class="element_left_ctn lineheight16_<?php echo $language; ?>">
                                    <font class="<?php echo $language; ?> size12_<?php echo $language; ?> brown"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","76"); ?> <font color=red>*</font></font><br /><br style="line-height:5px" />
                                    <input name="txt_email" value="<?php echo $email; ?>" type="text" class="field_contact_style">
                                   </div>  
                                   <div class="element_left_ctn lineheight16_<?php echo $language; ?>">
                                    <font class="<?php echo $language; ?> size12_<?php echo $language; ?> brown"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","77"); ?> </font><br /><br style="line-height:5px" />
                                    <input name="txt_phone" value="<?php echo $phone; ?>" type="text" class="field_contact_style">
                                   </div>  
                                   <div class="element_left_ctn lineheight16_<?php echo $language; ?>">
                                    <font class="<?php echo $language; ?> size12_<?php echo $language; ?> brown"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","78"); ?></font><br /><br style="line-height:5px" />
                                    <input name="txt_address" value="<?php echo $address; ?>" type="text" class="field_contact_style">
                                   </div>        
                                <!-- end draw left form--></div>
                                <!-- draw right form --><div class="form_right_ctn lineheight16_<?php echo $language; ?>">
                                    <font class="<?php echo $language; ?> size12_<?php echo $language; ?> brown"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","79"); ?> <font color=red>*</font></font><br /><br style="line-height:5px" />
                                    <textarea name="txt_message" cols="200" rows="11" class="field_contact_style" style="width:290px; resize:none;"><?php echo $message; ?></textarea>
                                <!-- end draw right form --></div>
                                
                                <!-- security code and submit button --><div style="float:left; width:580px;  margin:15px 0px 10px 10px; border:0px solid #FFF; text-align:left;">
                                        <font class="<?php echo $language; ?> size12_<?php echo $language; ?> brown lineheight16_<?php echo $language; ?>"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","80"); ?> <font color=red>*</font></font>
                                         <img src="CaptchaSecurityImages.php?width=85&height=25&characters=5" align="top" style="border:1px solid #ccc" />
                                         <input id="security_code" name="security_code" type="text" value="" maxlength="5" class="field_contact_style" style="width:100px; height:23px" />
                                         <input class="<?php echo $language; ?> size12_<?php echo $language; ?>" value="<?php echo $class_obj->get_translate($language,"tblarticle","title","a_id","81"); ?>" type="submit" name="send">
                                <!-- security code and submit button --></div>
                                </form>
                                
                            </td>
                            </tr>
                            </table>   
                </div><!--end send us email-->
            </div>



                <div style="float:left; width:616px;">
                     <div class="detail_dp_title_ctn" style="margin-top:16px;">
                        <font class="moulight_<?php echo $language; ?> size14_<?php echo $language; ?> white"><?php echo $class_obj->get_translate($language,"tblarticle","title","a_id",303); ?></font>
                     </div>
                
                     <!--Map--><div class="dspblock contactpag_map_ctn">
                          <table width="100%" align="center"  border="0" cellpadding="0" cellspacing="0" style="background:none; text-align:center !important;">
                          <tr valign="top">
                          <td style="background:none;" align="center">
                                <?php echo $title=stripcslashes($class_obj->get_translate($language,"tblarticle","description","a_id",303));?>
                         </td>
                         </tr>
                         </table>                                
                    <!--end map--></div>
                </div>



            
	</div><!--End lpanel-->

          <div class="r_panel">
		<?php include_once("cached/r_panel_".$language.".html");?>
		<?php
        //include("r_panel.php");
        ?>    
       </div>
	
  </div>
</div><!--End whole front-->