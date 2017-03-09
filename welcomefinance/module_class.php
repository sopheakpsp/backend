<?php
include_once("main_class.php");
class module_class extends main_class{
	
	
/*VIDEO WITH SCREENSHORT*/	
	
function video_with_screenshot($lang,$condi,$screen_confi){
$sql="SELECT * FROM tblarticle WHERE ".$condi[0]." ORDER BY ".$condi[1]." ".$condi[2]."";
$result=mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($result)>0){
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
$a_id=$row['a_id'];
$width=$row['mwidth'];
$height=$row['mheight'];
$screen=$row['screenshot'];
$title=$this->get_translate($lang,"tblarticle","title","a_id",$a_id);
$media_type=$row['media_type'];
$media=$row['media'];

if(!empty($media) || $media!='none'){
$light_box="<script type='text/javascript'>window.addEvent('domready', function(){var box = new multiBox('".$a_id."', {overlay: new overlay()});});</script>";
if($media_type=='customize'){
$type=strtolower($this->get_extension($media));
if($type=='flv' || $type=='mp4'){
$light_w=$width+30;
$light_h=$height+18;
$light_box_link='<a href="view_video_local.php?fpath='.$media.'&width='.$width.'&height='.$height.'" class="'.$a_id.'" title="'.$title.'"​​ rel="width:'.$light_w.',height:'.$light_h.'">';
}
}elseif($media_type=="youtube"){
$light_box_link='<a href="http://www.youtube.com/v/'.$media.'" class="'.$a_id.'" title="'.stripcslashes($row["title_".$lang]).'" rel="width:'.$width.',height:'.$height.'">';
}else{
$type="jpg";
$filename="_media.jpg";
$image=$this->view_media($type,"imgs/",$media,true,200,149,"","border:0px;");
//$image=$this->view_media($type,"imgs/",$filename,true,$w,$h,$media_style,$media_class);
}


$video_bg="<div class='$screen_confi[0]'>";
//$image=$this->view_media($type,"imgs/",$media,true,204,180,"","border:0px;");
$video_bg.="<div class='border_radius' style='float:left;width:200px;height:149px;background:url(imgs/".$screen.") no-repeat top center;'></div>";
$video_bg.="</div>";
$show_video=$light_box_link.$video_bg."</a>";
//$show_video="<a href='?page=vall_video&lg=$lang'>".$video_bg."</a>";

}//end while
return $light_box.$show_video;
}//end has media

}//end if
else{
return "no reocrd list";
}
}//end function

/*-------------function document---------------*/
function document_list($langauge, $condition, $orderby, $limit) {
        $sql = "select * from tbldocument as t1 inner join tbltranslate as t2 on t1.d_id=t2.id_ref where " . $condition . " order by " . $orderby . " " . $limit;
        //echo $sql;
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result)) {
                $doc_id = $row["d_id"];
                //$title = $this->get_translate($langauge, "tbldocument", "title", "d_id", $doc_id);
                $file_download = $this->get_translate($langauge, "tbldocument", "file_name", "d_id", $doc_id);
                if (is_file("imgs/documents/" . $row['d_id'] . "/" . $row['screenshot'])) {
                    $cover = "imgs/documents/" . $row['d_id'] . "/" . $this->thumb_document[0] . "_" . $row['screenshot'];
                     if (is_file("imgs/documents/" . $row['d_id'] . "/" . $file_download)) {
                        $part_doc = $this->encrypt("imgs/documents/".$doc_id."/", "abc");
                        $link_view = "http://docs.google.com/viewer?url=http%3A%2F%2Fwww.greencmf.com%2Fimgs%2Fdocuments/$doc_id%2F$file_download";
                     }
                    else{
                        $part_doc = $this->encrypt("imgs/documents/", "abc");
                        $link_view = "http://docs.google.com/viewer?url=http%3A%2F%2Fwww.greencmf.com%2Fimgs%2Fdocuments/$file_download";
                    }
                } else {
                    $cover = "imgs/documents/pdf.jpg";
                    $part_doc = $this->encrypt("imgs/documents/", "abc");
                    $link_view = "http://docs.google.com/viewer?url=http%3A%2F%2Fwww.greencmf.com%2Fimgs%2Fdocuments/$file_download";
                }
                
                //$part_doc = $this->encrypt("items/", "abc");
                $download = "href='download.php?file=" . $this->encrypt($doc_id, "abc") . "&amp;field_name=" . $this->encrypt($file_download, "abc") . "&amp;place=" . $part_doc . "'";
                ?>
                <div style="float: left;padding:5px; margin-left:12px;">
                    <div onmouseover="style.borderColor = '#3f65b3'" onmouseout="style.borderColor = '#ccc'" style="float: left;width:142px;height: 205px; padding:1px; border:1px solid #ccc">
                        <div onclick="location = '?page=doc&did=<?php echo $row['d_id']; ?>&lg=<?php echo $langauge; ?>'" style="cursor: pointer;position: relative;float: left;width: 100%;height: 150px;">
                        <a href="?page=doc&did=<?php echo $row['d_id']; ?>&lg=<?php echo $langauge; ?>"><img src="<?php echo $cover; ?>" height="155" width="142" /></a>
                            <?php
                            if ($row['print_year'] != "") {
                                ?>
                                <div class="size11_en" style="position: absolute;bottom: 0px;right:0px;padding:3px;background: #e6e7e8;">
                                    Code: <?php echo $row['print_year']; ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div style="float: left;width: 100%;height: 50px;overflow: hidden;border-top: 1px solid #ccc;">
                            <div style="padding: 5px;">
                                <div style="float: left;width: 100%;height: 25px;line-height: 25px;overflow: hidden;color: #3b5998;">
                                     <?php
                                            echo "<a href='$link_view' target='_blink' class='m2''>" . stripcslashes(stripcslashes($row['translate'])) . "</a>";
                                            //echo stripcslashes(stripcslashes($row['translate']));
                                            ?>
                                </div>
                                <div class="en size11_en" style="color:#89919c;float: left;width: 100%;height: 25px;">
                                    <div style="float: left; background:#50adff; border-radius:3px; ">
                                        <a class="m1" href="?page=doc&did=<?php echo $row['d_id']; ?>&lg=<?php echo $langauge; ?>">View more<?php //echo stripcslashes(stripcslashes($this->get_translate($langauge, "tblarticle", "title", "a_id", 233)));  ?></a>
                                    </div>  
                                    <div style="float: right; background:#df7200; border-radius:3px;">
                                        <a class="m1" <?php echo $download; ?>>Download<?php // echo stripcslashes(stripcslashes($this->get_translate($langauge, "tblarticle", "title", "a_id", 185)));  ?></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
             <div class="en size15_en" style="width:97%;margin-left:20px;">
                Your search - <b><?php echo $_REQUEST['q']; ?></b> - did not match any documents.
                <br /><br />
                Suggestions:
                <br /><br />
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
            </div>
            <?php
        }
    }//end fuction
	
	function document_detail($language, $condition) {
        $sql = "select * from tbldocument as t1 inner join tbltranslate as t2 on t1.d_id=t2.id_ref where t2.language_code='" . mysql_real_escape_string($language) . "' and t2.table_ref='tbldocument' and t2.field_ref='title' and t1.display='yes' and t1.recycle<>'yes' " . $condition;
        //echo $sql;
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result)) {
                 $doc_id = $row["d_id"];
                $file_download = $this->get_translate($language, "tbldocument", "file_name", "d_id", $doc_id);
                
                if (is_file("imgs/documents/" . $row['d_id'] . "/" . $row['screenshot'])) {
                    $cover = "imgs/documents/" . $row['d_id'] . "/" . $this->thumb_document[0] . "_" . $row['screenshot'];
                     if (is_file("imgs/documents/" . $row['d_id'] . "/" . $file_download)) {
                        $part_doc = $this->encrypt("imgs/documents/".$doc_id."/", "abc");
                        $link_view = "http://docs.google.com/viewer?url=http%3A%2F%2Fwww.greencmf.com%2Fimgs%2Fdocuments/$doc_id%2F$file_download";
                     }
                    else{
                        $part_doc = $this->encrypt("imgs/documents/", "abc");
                        $link_view = "http://docs.google.com/viewer?url=http%3A%2F%2Fwww.greencmf.com%2Fimgs%2Fdocuments/$file_download";
                    }
                } else {
                    $cover = "imgs/documents/pdf.jpg";
                    $part_doc = $this->encrypt("imgs/documents/", "abc");
                    $link_view = "http://docs.google.com/viewer?url=http%3A%2F%2Fwww.greencmf.com%2Fimgs%2Fdocuments/$file_download";
                }
               $download = "href='download.php?file=" . $this->encrypt($doc_id, "abc") . "&amp;field_name=" . $this->encrypt($file_download, "abc") . "&amp;place=" . $part_doc . "'";
                ?>
                <div class="size13_en bold" style="float: left;width: 100%;border-bottom: 1px solid #ccc;line-height: 25px;">
                    <a href="?page=publication&lg=<?php echo $language; ?>" class="m2"><?php echo stripcslashes(stripcslashes($this->get_translate($language, "tblarticle", "title", "a_id", 59))); ?></a> / <a href="?page=publication&cid=<?php echo $row['c_id']; ?>&lg=<?php echo $language; ?>" class="m2"><?php echo stripcslashes(stripcslashes($this->get_translate($language, "tblcategory", "title", "c_id", $row['c_id']))) . "</a> / " . $row['translate']; ?>   
                </div>
                <div style="float: left;width: 100%;margin-top: 10px;">
                    <table>
                        <tr>
                            <td valign="top">
                                <a href="<?php echo $link_view; ?>" target="_black"><img border="0" src="<?php echo $cover; ?>" style="border:1px solid #e5e5e5; padding:2px; width:200px; height:200px;" /></a>
<!--                                <a href="<?php //echo $cover; ?>" rel="lightbox[plants]"><img border="0" src="thumb.php?file=<?php //echo $cover; ?>&size=200" /></a>-->
                            </td>
                            <td valign="top">
                                <div style="float: left;padding-left: 10px;">
                                    <div class="size14_en" style="float: left;width: 100%;">
                                        <span class="bold" style="line-height: 25px;">
                                            <?php
                                            echo "<a href='$link_view' target='_blink' class='m2'>" . stripcslashes(stripcslashes($row['translate'])) . "</a>";
                                            //echo stripcslashes(stripcslashes($row['translate']));
                                            ?>
                                        </span>
                                        <br />
                                        <span class="size11_en" style="color: #8b8c8e;"><?php echo $row['add_date']; ?></span>
                                        <br />
                                        <?php
                                        $description = stripcslashes(stripcslashes($this->get_translate($language, "tbldocument", "description", "d_id", $row['d_id'])));

                                        echo str_replace("---", "", $description);
                                        ?>
                                    </div>
                                    <div style="float: left;width: 100%;margin-top: 10px;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="btn2">
                                                        <a <?php echo $download; ?>>
                                                            <div style="float: left;background:#ee7000 url(bgimgs/icon_download.png) center left no-repeat;padding:5px; padding-left:20px; border-radius:5px; color:#fff;">
                                                                Download <?php
                                                                //cho stripcslashes(stripcslashes($this->get_translate($language, "tblarticle", "title", "a_id", 185)));
                                                                ?>  
                                                            </div>
                                                        </a>  
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="size11_en" style="float: left;margin-left:5px; font-family:Arial, Helvetica, sans-serif;">
                                                        <?php echo number_format($row['num_download']); ?> 
                                                        Downloaded<?php
                                                        //echo stripcslashes(stripcslashes($this->get_translate($language, "tblarticle", "title", "a_id", 279)));
                                                        ?> 
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="en size15_en" style="width:97%;margin-left:20px;">
                Your search - <b><?php echo $_REQUEST['q']; ?></b> - did not match any documents.
                <br /><br />
                Suggestions:
                <br /><br />
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
            </div> 
            <?php
        }
    }//end fuction
	
	
/*slideshow*/	
 function front_imag_slide($lang,$condition,$orderby,$limit,$full_container){
	$sql="SELECT * FROM tblarticle where $condition ORDER BY $orderby $limit";
	$result=mysql_query($sql)or die(mysql_error());
	if(mysql_num_rows($result)>0){
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){//different form myslq_fetch_row
	
	$gid=$row['a_id'];
	//$title=$this->get_translate($lang,"tblarticle","title","a_id",$gid);
	$filename=stripcslashes($row['media']);
	$original_extension_4_use=$this->get_extension($filename);
	
	$image=$this->view_media($original_extension_4_use,"imgs/",$filename,false,717,270,"border:0px;","");
	//$image=$this->view_media($original_extension_4_use,"gl/",$filename,false,542,251,"border:0px;","");//
	
	//$return_value.="<div style='float:left;width:270px; height:329px; padding:26px 24px 0px 23px;border:0px solid red;'>";
	//$return_value.="<div style='float:left;width:270px; margin:0px;'>";
	
	
	//$return_value.="<div style='float:left;width:270px; height:300px; margin:0px; background:url(bgimgs/top_slideshow_pro.png) no-repeat 0px 0px;' class='round_conner1'>";
	
	//$a.="<div style='float:left; width:722px; height:274px;background:url(imgs/$image) no-repeat center;' class='$full_container'>";
	$return_value.=$image;
	
	//$return_value="</div>";
	
	
	
	
	//$return_value.="</div>";
	//$return_value.="</div>";
	
	}//end while
	return $return_value;
	}//end if
	else {echo 'no record';}
	
}//end function

//translate
function translate($lang,$en,$kh){
		return $lang=='en'?$en:$kh;
	}//end function



/*==============Playlist==============*/
	function play_list($lang,$sql_arr,$container_class,$image_config,$tolltip_config,$controller){
		  //ratingconfig (num_view show, rating read only, rating style, rating id)
		  
		  $sql = "SELECT * FROM tblarticle  WHERE ".$sql_arr[0]." ORDER BY ".$sql_arr[1]." ".$sql_arr[2];
		  $result=mysql_query($sql);
		  $num_row=mysql_num_rows($result);
		  if($result && $num_row>0){
			  $rowrun=1;
			  while($row=mysql_fetch_array($result)){
				$article_id=$row["a_id"];
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$title_full=trim($this->get_info($title,2,"no"));
				
				$screenshot="<img src='bgimgs/mp3icon.png' style='$image_config[1]' />";
				  
				if($rowrun==$num_row){
					$last="_last";
				}

			   	if(!empty($media) && $media!="none"){
					$return_value.="<div id='$rowrun' class='record_list".$last."' media_id='".$row[0]."' track='imgs/".$row['a_id']."/".$media."' screenshot='".$screenshot_path.$sc."' onclick='playMedia(\"$lang\",$(\"#playlist #currentPlay\").val(),this.id,\"".$row[0]."\",\"".implode(',',$controller)."\")' onmouseover='playlistOver(this.id)' onmouseout='playlistOut(this.id)'>"; // Full Container
					      //screenshot
					 	  $return_value.=!empty($container_class[0])?"<div class='".$container_class[0]."'>":"";
						  $return_value.=$screenshot;
						  $return_value.=!empty($container_class[0])?"</div>":"";
					      //end screenshot
						  
						  $return_value.="<div class='$container_class[1]-info_ctn'>";//info cotainer
						  
						  	  $return_value.="<div class='$container_class[1]-info_record'>";//song
							  $return_value.="<font class='$lang playlist_title_$lang'>$title</font>";
							  $return_value.="</div>";//e nd song
							  
							  $return_value.="<div class='playlist-download_record'>";//song
							  $return_value.="<span class='downloadmp3_link en size11_en'><a href='imgs/$media' target='_new'>Download</a></span>";
							  $return_value.="</div>";//e nd song
							  
						  $return_value.="</div>";//end info container
						  
					  $return_value.="</div>"; // end Full Container
					  
					  
				  $rowrun++;
			   	}// if media_file != empty
			  }//end while
			  
			  return $return_value;
			  //for rating
			  
		  }//end if 
	}//end function
	
	
	// FUNCTION PLAYLIST
	function location_list($lang,$page,$array_sql,$container,$ul_style){
		//$sql="SELECT a_id,title_$lang,link_to,m_id,date_format(add_date, '%e %b, %Y') as d FROM tblarticle  WHERE ".$condition." ORDER BY ".$order." $limit";	
		$sql="SELECT l_id FROM tbllocation  WHERE ".$array_sql[0]." ORDER BY ".$array_sql[1];			
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$total_record=mysql_num_rows($result);
			$rowrun=0;
			$sub_menu_ul='';
			$sub_menu_li='';
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$location_id=$row["l_id"];
				//creat title
				$title=$this->get_translate($lang,"tbllocation","title","l_id",$location_id);
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				//creat link
				$where_link_to="href='?page=$page&amp;location=$location_id'";
				//end create link
				
				//create current link
				$link_current="";
				if($location_id==$_REQUEST['location']){
					$link_current="current";
				}
				
				if($rowrun==$total_record-1){
					$link_style=$ul_style[2];
				}else{
					$link_style=$ul_style[4];
					
				}
				$sub_menu_li.="<li class='".$ul_style[1]."'><span class='".$link_style.$link_current."'><font class='".$ul_style[3]."'><a $where_link_to>".$title."</a></font></span></li>";
				$rowrun++;
			
			}//end while
			$sub_menu_ul="<div class='margin_zero ".$container."'><ul class='".$ul_style[0]."'>".$sub_menu_li."</ul></div>";
			return $sub_menu_ul;
		}//end has record
		else{
			return "<font class=''>&nbsp;&nbsp;Not available at this moment </font>";
		}
	}//end function

	

	

	
	

/*+++++ Language Using +++++++++++++++++*/
	function language_using($request_language,$multi_language){
		if(empty($request_language)){
			$language=$multi_language[0][0];
		}
		else{
			for($i=0;$i<count($multi_language);$i++){
				if(strtolower($request_language)==strtolower($multi_language[$i][0])){
					$language=trim(strtolower($request_language));
					break;	
				}
				else{$language=$multi_language[0][0];}
			}//end for
		}
		return $language;
	} //end fun
/*+++++ GENERAT META KEY  ++++++++++++++*/
	function generat_meta_key($atc){
		$key1=$this->Record_DLookup("title_en","tblarticle","a_id='".$atc."'");
		return $key1;
	}//end fun
/*+++++ GENERATE EMAIL TO IMAGE +++++++++++*/	
	function generate_email_to_image($str){
		$emails = $this->get_emails ($str);
		if(is_array($emails)){
			foreach ($emails as $email) {
				$str=str_ireplace($email,"<img src='txt2img.php?txt=".$this->encrypt($email,"a")."' align='absmiddle' border='0'>",$str);
			}
		}
		return $str;
	}//end function
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*																GET FUNCTION                                                                                        */
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
	
/*+++++ GET TRANSLATE +++++++++++*/
	function get_translate($lang,$table_ref,$field_ref,$primarykey_field,$primarykey_value){
		return $this->Record_DLookup("t2.translate",$table_ref." as t1 inner join tbltranslate as t2 on t1.".$primarykey_field."=t2.id_ref","t2.language_code='".$lang."' and t2.table_ref='".$table_ref."' and t2.field_ref='".$field_ref."' and t1.".$primarykey_field."=".$primarykey_value);
	}//END FUN
/*+++++ GET Email +++++++++++*/	
	function get_emails ($str){
		$emails = array();
		preg_match_all("/[A-Za-z0-9_.-]+@[A-Za-z0-9_-]+\.([A-Za-z0-9_-][A-Za-z0-9_]+)/", $str, $output);
		foreach($output[0] as $email) array_push ($emails, strtolower($email));
		if (count ($emails) >= 1) return $emails;
		else return "";
	}//end function
/*+++++ Get SHORT INFO ++++++++++++++*/
	function get_info($string,$get_type,$email_to_img){
		//get_type: 0=short, 1=full, 2=short_and_full
		list($sdec,$fdec)=explode('---',$string);
		if((int)$get_type==0){
			$info=$sdec;
		}
		elseif((int)$get_type==1){
			$info=!empty($fdec)?$fdec:$sdec;
		}
		else{
			$info=$sdec.$fdec;
		}
		if(strcasecmp($email_to_img,"yes")==0)$info=$this->generate_email_to_image($info);
		return $info;
	}//end func
	
	
	
/*+++++ Get SHORT INFO ++++++++++++++*/
	function get_info_short_detail($string,$get_type,$email_to_img){
		//get_type: 0=short, 1=full, 2=short_and_full
		list($sdec,$fdec)=explode('---',$string);
		if((int)$get_type==0){
			$info=$sdec;
		}
		elseif((int)$get_type==1){
			$info=!empty($fdec)?$fdec:$sdec;
		}
		else{
			$info=$sdec.$fdec;
		}
		if(strcasecmp($email_to_img,"yes")==0)$info=$this->generate_email_to_image($info);
		return $info;
	}//end func
	
	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*														    END GET FUNCTION                                                                                        */
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
	
/*+++++ Language Menu ++++++++++++++*/
	function language_menu($lang,$url,$link_class,$flag_image_name,$flag_image_style,$label,$label_class){
		$target=$this->catch_url($url,"&lg=","lg");
		$check_qm=strpos($target,"?");
		if(is_bool($check_qm) && $check_qm==false) $target.="?page=";
		echo '<span class="'.$link_class.'"><a href="'.$target.'&lg='.$lang.'">';
		echo '<img src="bgimgs/'.$flag_image_name.'" border="0" style="'.$flag_image_style.'" />';
		echo "<font style='float:left; height:27px; margin-right:3px; line-height:27px;' class='$label_class'> $label </font>";
		echo '</a></span>';              
	}//end function
/*+++++ Generate Language Menu ++++++++++++++*/	
	function generate_language_menu($lang,$url,$link_class,$link_class_current,$flag_image_style,$label_class,$menu_seperate_style,$language_array){
		$total_element_array=count($language_array);
		for($i=0;$i<$total_element_array;$i++){
			$link_menu_class=$link_class;
			if(strcasecmp($language_array[$i][0],$lang)==0)$link_menu_class=$link_class_current;
			$this->language_menu($language_array[$i][0],$url,$link_menu_class,$language_array[$i][3],$flag_image_style,$language_array[$i][2],$label_class);
			if($i<$total_element_array){
				echo "<div style='$menu_seperate_style'>&nbsp;</div>";	
			}
		}//end for
	}//end function	
	
	
	
	
	
	
/*++++++++++++++ show only one menu ++++++++++++++++++++++*/
	
	function language_menu_switch($lang,$url,$image1,$image2){
		$target=$this->catch_url($url,"&lg=","lg");
		$check_qm=strpos($target,"?");
		if(is_bool($check_qm) && $check_qm==false) $target.="?page=";
					if($lang=='en'){
						echo '<span class="lang_menu"><a href="'.$target.'&amp;lg=kh">';
                		echo '<img src="bgimgs/'.$image1.'" border="0" style=" padding-top:3px" />';
                		echo '</a></span>';
					}
					else{
						echo '<span class="lang_menu"><a href="'.$target.'&amp;lg=en">';
                		echo '<img src="bgimgs/'.$image2.'" border="0" style=" padding-top:3px" />';
                		echo '</a></span>';
					}                
		}//end function
	
	
	
	
/*+++++ Image Link ++++++++++++++*/	
	function image_link1($lang,$sql,$container_class,$image_config,$tolltip_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//title_view_type could be 0 or 1 or 2
		//$image_config("thumbnail Yes/No","thumbnial size -> size=100 || sizex=100&amp;sizey=100","style_for_image","link_style");
		//$tolltip_config("yes/no","font_class");
		$sql="SELECT a_id,media_type,media,screenshot,linkto_type,link_to FROM tblarticle  WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				//creat link
				
				//creat image
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$media_extension=$this->get_extension($media);
				$extension_type=$this->media_extension[strtolower($media_extension)];
				if($extension_type=="image"){
					if(strcasecmp($image_config[0],"yes")==0)
						$image="<img src='imgs/".$row['a_id']."/".$media."'&amp;$image_config[1]' style='$image_config[2]' />";
					else
						$image="<img src='imgs/".$row['a_id']."/".$media."' style='$image_config[2]' />";
				}
				else{
					if(strcasecmp($image_config[0],"yes")==0)
						$image="<img src='thumb.php?file=imgs/$screenshot&amp;$image_config[1]' style='".$image_config[2]."' />";
					else
						$image="<img src='imgs/$screenshot' style='".$image_config[2]."' />";
				}
				//end create image
				//creat image
				
				$where_link_to=$this->where_link_to1($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");
				//end create link
				// creat Tooltip
				$tool_tip="";
				if(strcasecmp($tolltip_config[0],"yes")==0){
					$tool_tip="title='cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tolltip_config[1]\">$title_full</font>]'";
				}
				//end create Tooltip
                
                $total_pledge = $this->record_dlookup("COUNT(*)","tblpledge","pledge_id<>0");
                $pledge_title = ($lang=="kh")?" នាក់":" pledge mades";
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."' style='position:relative;'>":"";
				//$return_value.="<span class='$image_config[3]'>$image</span>";//If customer want to put link, please put below code 
				$return_value.="<span class='$image_config[3]'>$image</span>";
                if($article_id==403){
                    $return_value.= '<div style="float:left; background:#004FA2; position: absolute;left:45px; bottom:23px; line-height:18px; z-index:1; font-size:18px; color:#fff;">'.$total_pledge.'<span id="pledge_title"> '.$pledge_title.'</span></div>';
                }
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function
	
	
	
	
/*+++++ Image Link ++++++++++++++*/	
	function image_link_title($lang,$sql,$container_class,$image_config,$tolltip_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//title_view_type could be 0 or 1 or 2
		//$image_config("thumbnail Yes/No","thumbnial size -> size=100 || sizex=100&amp;sizey=100","style_for_image","link_style");
		//$tolltip_config("yes/no","font_class");
		$sql="SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$row['translate'];
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				//creat link
				
				//creat image
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$media_extension=$this->get_extension($media);
				$extension_type=$this->media_extension[strtolower($media_extension)];
				if($extension_type=="image"){
					if(strcasecmp($image_config[0],"yes")==0)
						$image="<img src='imgs/".$row['a_id']."/".$media."'&amp;$image_config[1]' style='$image_config[2]' />";
					else
						$image="<img src='imgs/".$row['a_id']."/".$media."' style='$image_config[2]' />";
				}
				else{
					if(strcasecmp($image_config[0],"yes")==0)
						$image="<img src='thumb.php?file=imgs/$screenshot&amp;$image_config[1]' style='".$image_config[2]."' />";
					else
						$image="<img src='imgs/$screenshot' style='".$image_config[2]."' />";
				}
				//end create image
				//creat image
				
				$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");
				//end create link
				// creat Tooltip
				$tool_tip="";
				if(strcasecmp($tolltip_config[0],"yes")==0){
					$tool_tip="title='cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tolltip_config[1]\">$title_full</font>]'";
				}
				//end create Tooltip
				
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."'>":"";
				$return_value.="<span class='$image_config[3]'><a $class_current $where_link_to $tool_tip>$image</a></span>";
				$return_value.="<span class='$lang size11_$lang share_link' style='float:left; width:70px; margin-top:4px;'><a $where_link_to>$title_full</a></span>";
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function
	
	
	
	
	
	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*																START Build FUNCTION for ARTICLE                                                                    */
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*+++++++ IS LINKTO */
	function is_linkto($field,$article_id){
		$c=$this->Record_DLookup($field,"tblarticle","a_id=".$article_id);
		if($c=='' or empty($c) or $c==NULL){
			return false;
		}else {return true;}
	}//end function
/*+++++++ WHERE LINK TO */
	function where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$other_href){
		//ctype stand for content type//
		if($this->is_linkto("link_to",$article_id)){
			if(strcasecmp($linkto_type_value,"customize")==0){
				//$href="href='".stripcslashes($linkto_field_vlaue).$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
				$href="href='".stripcslashes($linkto_field_vlaue)."&amp;lg=".$lang."'";
			}
			elseif(strcasecmp($linkto_type_value,"http://")==0 || strcasecmp($linkto_type_value,"https://")==0 || strcasecmp($linkto_type_value,"mailto:")==0){
				$href="href='".stripcslashes($linkto_type_value).stripcslashes($linkto_field_vlaue)."' target='_new'";
		    }
			else{
				$href="href='?page=".strtolower(stripcslashes($linkto_type_value)).$other_href."&amp;ref_id=".$linkto_field_vlaue."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
			}
		}//end if is _linkto
		else{
			$href="href='?page=detail".$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
		}//end if
		return $href;
	}
/*+++++++ WHERE LINK TO */
	function where_link_to1($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$other_href){
		//ctype stand for content type//
		if($this->is_linkto("link_to",$article_id)){
			if(strcasecmp($linkto_type_value,"customize")==0){
				$href="href='".stripcslashes($linkto_field_vlaue).$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
			}
			elseif(strcasecmp($linkto_type_value,"http://")==0 || strcasecmp($linkto_type_value,"https://")==0 || strcasecmp($linkto_type_value,"mailto:")==0){
				$href="href='".stripcslashes($linkto_type_value).stripcslashes($linkto_field_vlaue)."' target='_new'";
		    }
			else{
				$href="href='?page=".strtolower(stripcslashes($linkto_type_value)).$other_href."&amp;ref_id=".$linkto_field_vlaue."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
			}
		}//end if is _linkto
		else{
			$href="href='.?page=detail".$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."' target='_parent'";
		}//end if
		return $href;
	}
	
/*++++++ Main Menu ++++++++++++++*/
	function menu($lang, $sql, $current_page, $title_view_type, $title_class,$submenu_title_class,$tolltip_config){
        //$sql = "SELECT a_id,linkto_type,link_to from tblarticle where ".$sql[0]." order by ".$sql[1]." ".$sql[2];
		$sql = "SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." order by ".$sql[1]." ".$sql[2];
        $result = mysql_query($sql) or die(mysql_error());
		$num_row=mysql_num_rows($result);
        if ($num_row > 0) {
            $level_id = 1;
            $last = "";
            $i = 1;
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$row['translate'];
				//$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$title_4_use=trim($this->get_info($title,$title_view_type,"no"));
				
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
               
                $level_txt = "&menu$level_id=" . $article_id;
				
                //make current
                if (strcasecmp($_REQUEST['menu'.$level_id],$article_id)==0 || (($current_page=="" || strcasecmp($current_page,"front")==0) && $i==1))
                    $class_current = "class='current'"; else
                    $class_current = "";
                //end make current
				
				//Make No Seperate
		  		if ($num_row==$i)
                    $class_noseperate = "class='noseperate'"; else
                    $class_noseperate = "";
				//End Make No Seperate

                //creat link
				$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$level_txt);
				//end create link
				
				// creat Tooltip
				$tool_tip="";
				if(strcasecmp($tolltip_config[0],"yes")==0){
					if($title_view_type==0 && count(explode("---",$title))>1){
						if(strcasecmp($title_full,$title_4_use)==0)
							$tool_tip="";
						else $tool_tip="title='cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tolltip_config[1]\">$title_full</font>]'";
					}
				}
				//end create Tooltip
				
				$pos = strpos($title_4_use, "<br>");
				
				if($pos===false){
					$div_style="<div style='float:left;background:none;height:36px;line-height:36px !important;'>";
					$end_div_style="</div>";
					$span_style ="style='display:block; height:36px; line-height:36px;'";
				}else{
					$div_style="";
					$end_div_style="";
					$span_style ="style='display:block; line-height:16px;'";
				}
					
                echo "<ul>";
                echo "<li $class_noseperate>".$div_style."<a $class_current $where_link_to $tool_tip><span class='left'></span><span class='middle' ".$span_style." ><font class='$title_class'>" . $title_4_use. "</font></span><span class='right'></span></a>";
                echo $this->submenu($lang,array("(sub_value=$article_id and (sub_of='menu' or sub_of='both')) and (display='yes' and recycle='no')"," ordering asc, a_id asc",""), $level_id, $level_txt, $submenu_title_class);
                echo $end_div_style."</li>";
                echo "</ul>";
                $i++;
				
            }//end while
        }
    }//end function menu
	
    /*+++++++SUB MENU OF VERTICAL MENU */
	function submenu($lang,$sql,$level,$level_txt,$title_class){
        $subcategory=mysql_query("SELECT a_id,linkto_type,link_to from tblarticle where ".$sql[0]." order by ".$sql[1]." ".$sql[2]);
        if(mysql_num_rows($subcategory)>0){
			$sublevel_id=$level+1;
			echo "<ul>";
            while($row=mysql_fetch_array($subcategory)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$title=$this->get_info($title,0,"no");
				//end create title
				$sublevel_txt=$level_txt."&amp;menu$sublevel_id=".$article_id;
				//make current 
					if($_REQUEST['menu'.$sublevel_id]==$article_id) $class_current="class='current'"; else $class_current="";
				//end make current
				
				//creat link
				$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$sublevel_txt);
				//end create link
				
                echo "<li><a $class_current $where_link_to><font class='$title_class'>" . $title . "</font></a>";
				echo $this->submenu($lang,array("(sub_value=$article_id and (sub_of='menu' or sub_of='both')) and (display='yes' and recycle='no')"," ordering asc, a_id asc",""),$sublevel_id,$sublevel_txt,$title_class);
				echo "</li>";
            }
			echo "</ul>";
        }
    }//end function	
    
    
    /*++++++ MENU LEFT ++++++++++++++*/
	function menu_left($lang,$parent_aid,$table,$condition,$ordering,$limit,$current_page){
	    //echo "<br />===========<br />";   
        $result_submenu = $this->select_table($table,$condition,$ordering,"");
        //echo "<br />===========<br />";
        $num_row=mysql_num_rows($result_submenu);
        if ($num_row > 0) {
            $level_id = 1;
            $last = "";
            $i = 1;
            echo "<ul class='left_submenu'>";
            while($row_submenu=mysql_fetch_array($result_submenu)){
                $article_id=stripcslashes(stripslashes($row_submenu["a_id"]));
                $linkto_type_value=stripcslashes(stripslashes($row_submenu["linkto_type"]));
                $linkto_field_vlaue=stripcslashes(stripslashes($row_submenu["link_to"]));
                $where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"&parent=".$parent_aid."&menu1=".$parent_aid);
                //echo $where_link_to;
                
                //Make No Seperate
			    if ($num_row==$i) $class_noseperate = "noseperate"; 
                else $class_noseperate = "";
                
                //make current
                $top_id = $this->record_dlookup("sub_value","tblarticle","a_id=".$article_id);
                while(trim($top_id)!=""){
                    $top_id = $this->record_dlookup("sub_value","tblarticle","a_id=".$top_id);
                }
                echo $top_id; 
                
                if (strcasecmp($_REQUEST['id'],$article_id)==0)
                    $class_current = "current"; 
                else $class_current = "";
                
                    echo "<li class='list_submenu ".$class_noseperate."'>
                        <a class='".$class_current." size14_".$lang."' ".$where_link_to.">
                            <span class='left'></span>
      						<span class='middle'><font class='khsystem_$lang size14_$lang'>".$row_submenu['title']."</font></span>
                            <span class='right'></span>
                        </a>";
                        $this->submenu_left($lang,$parent_aid,$table,"sub_value=".$article_id,"title ASC","",""); 
                    echo "</li>";
                $i++;                                
            }
            echo "</ul>";
        }               
    }//end function menu
    
    /*+++++++ SUB MENU OF VERTICAL MENU LEFT */
    function submenu_left($lang,$parent_aid,$table,$condition,$ordering,$limit,$current_page){
        //echo "<br />----------<br />";
        $result_submenu = $this->select_table($table,$condition,$ordering,"");
        //echo "<br />----------<br />";
        
        $num_row=mysql_num_rows($result_submenu);
        if ($num_row > 0) {
            $level_id = 1;
            $last = "";
            $i = 1;
            echo "<ul class='left_submenu'>";
            while($row_submenu=mysql_fetch_array($result_submenu)){
                $article_id=stripcslashes(stripslashes($row_submenu["a_id"]));
                $linkto_type_value=stripcslashes(stripslashes($row_submenu["linkto_type"]));
                $linkto_field_vlaue=stripcslashes(stripslashes($row_submenu["link_to"]));
                $where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"&parent=".$parent_aid."&menu1=".$parent_aid);
                //echo $where_link_to;
                
                //Make No Seperate
			    if ($num_row==$i)
                    $class_noseperate = "noseperate"; else
                $class_noseperate = "";
                
                //make current
                if (strcasecmp($_REQUEST['id'],$article_id)==0)
                    $class_current = "current"; else
                    $class_current = "";
                    echo "<li class='list_submenu ".$class_noseperate."'>
                        <a class='".$class_current." size14_".$lang."' ".$where_link_to.">
                            <span class='left'></span>
      						<span class='middle'><font class='khsystem_en size14_en'>".$row_submenu['title']."</font></span>
                            <span class='right'></span>
                        </a>"; 
                    echo "</li>";
                $i++;                                
            }
            echo "</ul>";
        } 
        /* 
        $subcategory=mysql_query("SELECT a_id,linkto_type,link_to from tblarticle where ".$sql[0]." order by ".$sql[1]." ".$sql[2]);
        if(mysql_num_rows($subcategory)>0){
			$sublevel_id=$level+1;
			echo "<ul>";
            while($row=mysql_fetch_array($subcategory)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$title=$this->get_info($title,0,"no");
				//end create title
				$sublevel_txt=$level_txt."&amp;menu$sublevel_id=".$article_id;
				//make current 
					if($_REQUEST['menu'.$sublevel_id]==$article_id) $class_current="class='current'"; else $class_current="";
				//end make current
				
				//creat link
				$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$sublevel_txt);
				//end create link
				
                echo "<li><a $class_current $where_link_to><font class='$title_class'>" . $title . "</font></a>";
				echo $this->submenu($lang,array("(sub_value=$article_id and (sub_of='menu' or sub_of='both')) and (display='yes' and recycle='no')"," ordering asc, a_id asc",""),$sublevel_id,$sublevel_txt,$title_class);
				echo "</li>";
            }
			echo "</ul>";
        }
        */
    }//end function
    
/*+++++ Title Link ++++++++++++++*/	
	function title_link($lang,$sql,$container_class,$title_view_type,$title_class,$tolltip_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//title_view_type could be 0 or 1 or 2
		//$title_class("Link_Class","font_class");
		//$tolltip_config("yes/no","font_class");
		$sql="SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$row['translate'];
				$title_4_use=trim($this->get_info($title,$title_view_type,"no"));
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				//creat link
				$level_txt = "&menu1=" . $article_id;
				
				$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$level_txt);
				//end create link
				// creat Tooltip
				$tool_tip="";
				if(strcasecmp($tolltip_config[0],"yes")==0){
					if($title_view_type==0 && count(explode("---",$title))>1){
						if(strcasecmp($title_full,$title_4_use)==0)
							$tool_tip="";
						else $tool_tip="title='cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tolltip_config[1]\">$title_full</font>]'";
					}
				}
				//end create Tooltip
				
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				
				if($rowrun==mysql_num_rows($result)){
					$last="_last";
				}
				
				//$title_4_use=str_replace("<br>",chr(13),$title_4_use);
				$pos = strpos($title_4_use, "<br>");
				if($pos===false){
					$div_style="<div style='float:left;background:none;height:30px;line-height:30px !important; border:0px solid red;'>";
					$end_div_style="</div>";
					$span_style ="style='display:block; height:30px;line-height:30px !important; '";
				}else{
					$div_style="";
					$end_div_style="";
					$span_style ="style='display:block; line-height:16px;'";
				}
				
				if($_GET['menu1']==$row['a_id'] or $_GET['id']==$row['a_id']){
					$class_current="footer_menu_link_current";	
				}else{
					if (($_GET['page']=="" or $_GET['page']=="front") and $rowrun==1){
                    	$class_current = "footer_menu_link_current"; 
					}else{
						$class_current = $title_class[0].$last;				
					}
					//$class_current=$title_class[0].$last;
				}
				
				
				
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."'>":"";
				$return_value.="<span class='".$class_current."'><div style='float:left; text-align:center; margin:6px 10px 0px 0px;'>".$div_style."<a $class_current $where_link_to $tool_tip><font class='$title_class[1]' ".$span_style.">$title_4_use</font></a>".$end_div_style."</div></span>";
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function


/*====================================SUB MENU LIST====================================*/
	function submenu_list($lang,$array_sql,$container,$ul_style){
		//$sql="SELECT a_id,title_$lang,link_to,m_id,date_format(add_date, '%e %b, %Y') as d FROM tblarticle  WHERE ".$condition." ORDER BY ".$order." $limit";	
		$sql="SELECT a_id,linkto_type,link_to FROM tblarticle  WHERE ".$array_sql[0]." ORDER BY ".$array_sql[1];			
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$total_record=mysql_num_rows($result);
			$rowrun=0;
			$sub_menu_ul='';
			$sub_menu_li='';
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				//creat link
				$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");
				//end create link
				
				//create current link
				
				if($row['a_id']==$_REQUEST['article']){
					$link_current=$title_link_current;
				}
				
				if($rowrun==$total_record-1){
					$link_style=$ul_style[2];
				}else{
					$link_style=$ul_style[4];
					$rowrun++;
				}
				$sub_menu_li.="<li class='".$ul_style[1]."'><span class='".$link_style."'><font class='".$ul_style[3]."'><a $where_link_to>".$title."</a></font></span></li>";
			
			
			}//end while
			$sub_menu_ul="<div class='margin_zero ".$container."'><ul class='".$ul_style[0]."'>".$sub_menu_li."</ul></div>";
			return $sub_menu_ul;
		}//end has record
		else{
			return "<font class=''>&nbsp;&nbsp;Not available at this moment </font>";
		}






	}//end function
	


/*+++++ Image Link ++++++++++++++*/	
/*+++++ Image Link ++++++++++++++*/	
	function image_link($lang,$sql,$container_class,$image_config,$tolltip_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//title_view_type could be 0 or 1 or 2
		//$image_config("thumbnail Yes/No","thumbnial size -> size=100 || sizex=100&amp;sizey=100","style_for_image","link_style");
		//$tolltip_config("yes/no","font_class");
		$sql="SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$row['translate'];
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				//creat link
				
				//creat image
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$media_extension=$this->get_extension($media);
				$extension_type=$this->media_extension[strtolower($media_extension)];
				if($extension_type=="image"){
					if(strcasecmp($image_config[0],"yes")==0)
						$image="<img src='imgs/".$row['a_id']."/".$media."'&amp;$image_config[1]' style='$image_config[2]' />";
					else
						$image="<img src='imgs/".$row['a_id']."/".$media."' style='$image_config[2]' />";
				}
				else{
					if(strcasecmp($image_config[0],"yes")==0)
						$image="<img src='thumb.php?file=imgs/$screenshot&amp;$image_config[1]' style='".$image_config[2]."' />";
					else
						$image="<img src='imgs/$screenshot' style='".$image_config[2]."' />";
				}
				//end create image
				//creat image
				
				$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");
				//end create link
				// creat Tooltip
				$tool_tip="";
				if(strcasecmp($tolltip_config[0],"yes")==0){
					$tool_tip="title='cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tolltip_config[1]\">$title_full</font>]'";
				}
				//end create Tooltip
				
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."'>":"";
				$return_value.="<span class='$image_config[3]'><a $class_current $where_link_to $tool_tip>$image</a></span>";
				//$return_value.="<span class='$lang size11_$lang share_link' style='float:left; width:70px;'><a $where_link_to>$title_full</a></span>";
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function
	
	
	
	
	function where_link_to_config($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$other_href){
		//ctype stand for content type//
		if($this->is_linkto("link_to",$article_id)){
			if(strcasecmp($linkto_type_value,"customize")==0){
				$href="href=\'".stripcslashes($linkto_field_vlaue).$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."\'";
			}
			elseif(strcasecmp($linkto_type_value,"http://")==0 || strcasecmp($linkto_type_value,"https://")==0 || strcasecmp($linkto_type_value,"mailto:")==0){
				$href="href=\'".stripcslashes($linkto_type_value).stripcslashes($linkto_field_vlaue)."\' target=\'_new\'";
		    }
			else{
				$href="href=\'?page=".strtolower(stripcslashes($linkto_type_value)).$other_href."&amp;ref_id=".$linkto_field_vlaue."&amp;ctype=article&id=".$article_id."&amp;lg=".$lang."\'";
			}
		}//end if is _linkto
		else{
			$href="href=\'?page=detail".$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."\'";
		}//end if
		return $href;
	}
	
	
	
	
	function image_link_slide($lang,$sql,$container_class,$image_config,$tolltip_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//title_view_type could be 0 or 1 or 2
		//$image_config("thumbnail Yes/No","thumbnial size -> size=100 || sizex=100&amp;sizey=100","style_for_image","link_style");
		//$tolltip_config("yes/no","font_class");
		$sql="SELECT a_id,media_type,media,screenshot,linkto_type,link_to FROM tblarticle  WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				//creat title
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				//creat link
				
				//creat image
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$media_extension=$this->get_extension($media);
				$extension_type=$this->media_extension[strtolower($media_extension)];
				if($extension_type=="image"){
					if(strcasecmp($image_config[0],"yes")==0){
						
						$image="<img src=\'thumb.php?file=gl/$media&amp;$image_config[1]\' style=\'".$image_config[2]."\' />";
					}else{
						$image="<img src=\'imgs/$media\' style=\'$image_config[2]\' />";
					}
				
				}
				else{
					if(strcasecmp($image_config[0],"yes")==0)
						$image="<img src='thumb.php?file=imgs/$screenshot&amp;$image_config[1]' style='".$image_config[2]."' />";
					else
						$image="<img src='imgs/$screenshot' style='".$image_config[2]."' />";
				}
				
				
				//end create image
				//creat image
				
				$where_link_to=$this->where_link_to_config($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");
				
				//end create link
				// creat Tooltip
				$tool_tip="";
				if(strcasecmp($tolltip_config[0],"yes")==0){
					$tool_tip="title=\'cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tolltip_config[1]\">$title_full</font>]\'";
				}
				
				//end create Tooltip
				
				//$return_value.="<div class=".$container_class[2].">";
				//$return_value.="<span class=".$image_config[3]."><a $where_link_to $tool_tip>$image</a></span>";
				//$return_value.=!empty($container_class[2])?"</div>":"";
				$b="<div class=".$container_class[2]."><span class=".$image_config[3]."><a $where_link_to $tool_tip>$image</a></span></div>";
			
			
			
			 $item[]="'".$b."'";
			$rowrun++;
			}//end while
				$a=implode(",",$item);
				return $a;
		}//end if $row>0
	}// end function
	
	
	
	
	function gallery_slide($lang,$sql,$container_class,$image_config,$tolltip_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//title_view_type could be 0 or 1 or 2
		//$image_config("thumbnail Yes/No","thumbnial size -> size=100 || sizex=100&amp;sizey=100","style_for_image","link_style");
		//$tolltip_config("yes/no","font_class");
		$sql="SELECT g_id,media_type,media FROM tblgallery  WHERE ".$sql[0];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["g_id"];
				//creat link
				
				//creat image
				$media_type=$row["media_type"];
				$media=$row["media"];
				$media_extension=$this->get_extension($media);
				$extension_type=$this->media_extension[strtolower($media_extension)];
				if($extension_type=="image"){
					if(strcasecmp($image_config[0],"yes")==0){
						
						$image="<img src=\'thumb.php?file=gl/$media&amp;$image_config[1]\' style=\'".$image_config[2]."\' />";
					}else{
						$image="<img src=\'imgs/$media\' style=\'$image_config[2]\' />";
					}
				
				}
				
				
				//end create image
				
				//end create Tooltip
				
				//$return_value.="<div class=".$container_class[2].">";
				//$return_value.="<span class=".$image_config[3]."><a $where_link_to $tool_tip>$image</a></span>";
				//$return_value.=!empty($container_class[2])?"</div>":"";
				$b="<div class=".$container_class[2]."><span class=".$image_config[3].">$image</span></div>";
			
			
			
			 $item[]="'".$b."'";
			$rowrun++;
			}//end while
				$a=implode(",",$item);
				return $a;
		}//end if $row>0
	}// end function
	
	
	
	
	
/*+++++ CREATE TITLE ++++++++++++++++*/
	function create_title($title,$where_link_to,$title_config,$tooltip_config){
		
		$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
		$title_full=trim($this->get_info($title,1,"no"));
		$top_title="";
		$insite_tilte="";
		$bottom_title="";
		
		// creat Tooltip
			$tool_tip="";
			if(strcasecmp($tooltip_config[0],"yes")==0){
				if((int)$title_config[1]==0 && count(explode("---",$title))>1){
					if(strcasecmp($title_full,$title_4_use)==0)
						$tool_tip="";
					else $tool_tip="title='cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tooltip_config[1]\">$title_full</font>]'";
				}
			}
		//end create Tooltip
		
		if(strcasecmp($title_config[0],"yes")==0){
			if(strcasecmp($title_config[2],"top")==0){
				$top_title=!empty($title_config[3])?"<div class='".$title_config[3]."'>":"";
				$top_title.="<span class='$tooltip_config[2]'><a $where_link_to $tool_tip><font class='$title_config[4]'>".$title_4_use."</font></a></span>";
				$top_title.=!empty($title_config[3])?"</div>":"";
				$insite_tilte="";
				$bottom_title="";
			}
			elseif(strcasecmp($title_config[2],"bottom")==0){
				$top_title="";
				$insite_tilte="";
				$bottom_title=!empty($title_config[3])?"<div class='".$title_config[3]."'>":"";
				$bottom_title.="<span class='$tooltip_config[2]'><a $where_link_to><font class='$title_config[4]'>".$title_4_use."</font></a></span>";
				$bottom_title.=!empty($title_config[3])?"</div>":"";
			}
			else{
				$top_title="";
				$insite_tilte=!empty($title_config[3])?"<div class='".$title_config[3]."'>":"";
				$insite_tilte.="<span class='$tooltip_config[2]'><a $where_link_to><font class='$title_config[4]'>".$title_4_use."</font></a></span>";
				$insite_tilte.=!empty($title_config[3])?"</div>":"";
				$bottom_title="";
			}
		}//end if title view =yes
		return array($top_title,$insite_tilte,$bottom_title);
	}//end fun
	



	
	
/*+++++ CREATE MEDIA +++++++++++++++++*/
function create_media($title_4_use,$path,$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$image_config,$size){
	//$image_config("0 media style","1 image_container_class","2 click view thumbnail yes|no", "3 lightbox_id","4 javascript_for_lightbox");
	$media_extension=$this->get_extension($media);
	$screenshot_extension=$this->get_extension($screenshot);
	$media_extension_type=$this->media_extension[strtolower($media_extension)];
	$original_media_4_use="";
	$original_extension_4_use="";
	$thumbnail_media_4_use="";
	$thumbnail_extension_4_use="";
	$light_box_link="";
	if(!empty($media) && $media!="none"){
		if(strcasecmp($media_type,"customize")==0){
			if($media_extension_type=="image"){
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$media;
				$thumbnail_extension_4_use=$media_extension;
				$light_box_link='<a href="'.$path."800x600_".$media.'" rel="lightbox[plants_$media]" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'">';
				
			}//end if image
			else{
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$screenshot;
				$thumbnail_extension_4_use=$screenshot_extension;
				$light_box_link='<a href="'.$path.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
			}
		}// end if customize
		else{
			$original_media_4_use=$media;
			$original_extension_4_use="youtube";
			$thumbnail_media_4_use=$screenshot;
			$thumbnail_extension_4_use=$screenshot_extension;
			$light_box_link='<a href="http://www.youtube.com/v/'.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
		}// end else of if customize
		
		$image="";
		if(strcasecmp($thumbnail,"yes")==0 && (!empty($thumbnail_media_4_use) && $thumbnail_media_4_use!="none")){
			if(strcasecmp($image_config[2],'yes')==0 && strcasecmp($image_config[4],'yes')==0){
				//for lightbox
				$image= "<script type='text/javascript'> $(function() { $('#$image_config[3] a').lightBox();});</script>";
			}
			if(strcasecmp($image_config[2],'yes')==0)
			//for lightbox
				$image.="<div id='$image_config[3]'>".$light_box_link.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_".$malign,$size)."</a></div>";
			else
				//$image="";
				$image.="<div id='$image_config[3]'>".$where_link_to.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_".$malign,$size)."</a></div>";
				//$image.=$where_link_to;
		}//end thumbnail=yes
		else{
			$image=$this->view_media($original_extension_4_use,$path,$original_media_4_use,false,$mwidth,$mheight,$image_config[0],$image_config[1]." img_".$malign,$size);
		} //end else of if thumbnial=yes
	}//if(!empty($media) || $media!="none")
	return $image;
} //end fun


/*+++++ CREATE MEDIA +++++++++++++++++*/
function create_media_contact($title_4_use,$path,$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$image_config,$size){
	//$image_config("0 media style","1 image_container_class","2 click view thumbnail yes|no", "3 lightbox_id","4 javascript_for_lightbox");
	$media_extension=$this->get_extension($media);
	$screenshot_extension=$this->get_extension($screenshot);
	$media_extension_type=$this->media_extension[strtolower($media_extension)];
	$original_media_4_use="";
	$original_extension_4_use="";
	$thumbnail_media_4_use="";
	$thumbnail_extension_4_use="";
	$light_box_link="";
	if(!empty($media) && $media!="none"){
		if(strcasecmp($media_type,"customize")==0){
			if($media_extension_type=="image"){
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$media;
				$thumbnail_extension_4_use=$media_extension;
				$light_box_link='<a href="'.$path."800x600_".$media.'" rel="lightbox[plants_1]" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'">';
				
			}//end if image
			else{
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$screenshot;
				$thumbnail_extension_4_use=$screenshot_extension;
				$light_box_link='<a href="'.$path.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
			}
		}// end if customize
		else{
			$original_media_4_use=$media;
			$original_extension_4_use="youtube";
			$thumbnail_media_4_use=$screenshot;
			$thumbnail_extension_4_use=$screenshot_extension;
			$light_box_link='<a href="http://www.youtube.com/v/'.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
		}// end else of if customize
		
		$image="";
		if(strcasecmp($thumbnail,"yes")==0 && (!empty($thumbnail_media_4_use) && $thumbnail_media_4_use!="none")){
			if(strcasecmp($image_config[2],'yes')==0 && strcasecmp($image_config[4],'yes')==0){
				//for lightbox
				$image= "<script type='text/javascript'> $(function() { $('#$image_config[3] a').lightBox();});</script>";
			}
			if(strcasecmp($image_config[2],'yes')==0)
			//for lightbox
				$image.="<div id='$image_config[3]'>".$light_box_link.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_".$malign,$size)."</a></div>";
			else
				//$image="";
				$image.="<div id='$image_config[3]'>".$where_link_to.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_".$malign,$size)."</a></div>";
				//$image.=$where_link_to;
		}//end thumbnail=yes
		else{
			$image=$this->view_media($original_extension_4_use,$path,$original_media_4_use,false,$mwidth,$mheight,$image_config[0],$image_config[1]." img_contact_".$malign,$size);
		} //end else of if thumbnial=yes
	}//if(!empty($media) || $media!="none")
	return $image;
} //end fun


//video gallery
function create_video_gallery($title_4_use,$path,$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$image_config,$size,$bigsize){
	//$image_config("0 media style","1 image_container_class","2 click view thumbnail yes|no", "3 lightbox_id","4 javascript_for_lightbox");
	$media_extension=$this->get_extension($media);
	$screenshot_extension=$this->get_extension($screenshot);
	$media_extension_type=$this->media_extension[strtolower($media_extension)];
	$original_media_4_use="";
	$original_extension_4_use="";
	$thumbnail_media_4_use="";
	$thumbnail_extension_4_use="";
	$light_box_link="";
	if(!empty($media) && $media!="none"){
		if(strcasecmp($media_type,"customize")==0){
			if($media_extension_type=="image"){
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$media;
				$thumbnail_extension_4_use=$media_extension;
				$light_box_link='<a href="'.$path.$bigsize.'_'.$media.'" rel="lightbox[plants_gl]" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'">';
			}//end if image
			else{
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$screenshot;
				$thumbnail_extension_4_use=$screenshot_extension;
				$light_box_link='<a href="'.$path.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
			}
		}// end if customize
		else{
			$original_media_4_use=$media;
			$original_extension_4_use="youtube";
			$thumbnail_media_4_use=$screenshot;
			$thumbnail_extension_4_use=$screenshot_extension;
			$light_box_link='<a href="http://www.youtube.com/v/'.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
		}// end else of if customize
		
		$image="";
		if(strcasecmp($thumbnail,"yes")==0 && (!empty($thumbnail_media_4_use) && $thumbnail_media_4_use!="none")){
			if(strcasecmp($image_config[2],'yes')==0 && strcasecmp($image_config[4],'yes')==0){
				//for lightbox
				$image= "<script type='text/javascript'> $(function() { $('#$image_config[3] a').lightBox();});</script>";
			}
			if(strcasecmp($image_config[2],'yes')==0)
			//for lightbox
				$image.="<div id='$image_config[3]'>".$light_box_link.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_".$malign,$size)."</a></div>";
			else
				//$image="";
				$image.="<div id='$image_config[3]'>".$where_link_to.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_".$malign,$size)."</a></div>";
				//$image.=$where_link_to;
		}//end thumbnail=yes
		else{
			$image=$this->view_media($original_extension_4_use,$path,$original_media_4_use,false,$mwidth,$mheight,$image_config[0],$image_config[1]." img_".$malign,$size);
		} //end else of if thumbnial=yes
	}//if(!empty($media) || $media!="none")
	return $image;
} //end fun




function create_media_gallery($title_4_use,$path,$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$image_config,$size,$bigsize){
	//$image_config("0 media style","1 image_container_class","2 click view thumbnail yes|no", "3 lightbox_id","4 javascript_for_lightbox");
	$media_extension=$this->get_extension($media);
	$screenshot_extension=$this->get_extension($screenshot);
	$media_extension_type=$this->media_extension[strtolower($media_extension)];
	$original_media_4_use="";
	$original_extension_4_use="";
	$thumbnail_media_4_use="";
	$thumbnail_extension_4_use="";
	$light_box_link="";
	if(!empty($media) && $media!="none"){
		if(strcasecmp($media_type,"customize")==0){
			if($media_extension_type=="image"){
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$media;
				$thumbnail_extension_4_use=$media_extension;
				
				#echo "a";
				
				$light_box_link='<a href="'.$path.$bigsize.'_'.$media.'" rel="lightbox[plants_gl]" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'">';
			}//end if image
			else{
				
				#echo "b";
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$screenshot;
				$thumbnail_extension_4_use=$screenshot_extension;
				$light_box_link='<a href="'.$path.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
			}
		}// end if customize
		else{
			
			#echo "d";
			$original_media_4_use=$media;
			$original_extension_4_use="youtube";
			$thumbnail_media_4_use=$screenshot;
			$thumbnail_extension_4_use=$screenshot_extension;
			$light_box_link='<a href="http://www.youtube.com/v/'.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
		}// end else of if customize
		
		$image="";
		if(strcasecmp($thumbnail,"yes")==0 && (!empty($thumbnail_media_4_use) && $thumbnail_media_4_use!="none")){
			if(strcasecmp($image_config[2],'yes')==0 && strcasecmp($image_config[4],'yes')==0){
				//for lightbox
				$image= "<script type='text/javascript'> $(function() { $('#$image_config[3] a').lightBox();});</script>";
			}
			if(strcasecmp($image_config[2],'yes')==0)
			//for lightbox
				$image.="<div id='$image_config[3]'>".$light_box_link.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]."".$malign,$size)."</a></div>";
			else
				//$image="";
				$image.="<div id='$image_config[3]'>".$where_link_to.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]."".$malign,$size)."</a></div>";
				//$image.=$where_link_to;
		}//end thumbnail=yes
		else{
			
			#echo "[]" ;
			$image=$light_box_link.$this->view_media($original_extension_4_use,$path,$original_media_4_use,false,$mwidth,$mheight,$image_config[0],$image_config[1]."".$malign,$size)."</a>";
		} //end else of if thumbnial=yes
	}//if(!empty($media) || $media!="none")
	return $image;
} //end fun

/*+++++ CREATE FADE SLIDE +++++++++++++++++*/
	function create_fadeslide($title_4_use,$path,$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to){
		//$image_config("0 media style","1 image_container_class" );
		$media_extension=$this->get_extension($media);
		$screenshot_extension=$this->get_extension($screenshot);
		$media_extension_type=$this->media_extension[strtolower($media_extension)];
		$original_media_4_use="";
		$original_extension_4_use="";
		$thumbnail_media_4_use="";
		$thumbnail_extension_4_use="";
		$light_box_link="";
		if(!empty($media) && $media!="none"){
			if(strcasecmp($media_type,"customize")==0){
				if($media_extension_type=="image"){
					$thumbnail_media_4_use=$media;
					$thumbnail_extension_4_use=$media_extension;
				}//end if image
				else{
					$thumbnail_media_4_use=$screenshot;
					$thumbnail_extension_4_use=$screenshot_extension;
				}
			}// end if customize
			else{
				$thumbnail_media_4_use=$screenshot;
				$thumbnail_extension_4_use=$screenshot_extension;
			}// end else of if customize
			if(strcasecmp($thumbnail,"yes")==0 && (!empty($thumbnail_media_4_use) && $thumbnail_media_4_use!="none")){
				$item='["thumb.php?file='.$path.'/'.$thumbnail_media_4_use.'&amp;sizex='.$twidth.'&amp;sizey='.$theight.'", "'.$where_link_to.'", "", "'.$title_4_use.'","",""]';
			}//end thumbnail=yes
			else{
				$item='["'.$path.'/'.$thumbnail_media_4_use.'", "", "'.$title_4_use.'",""]';
			} //end else of if thumbnial=yes
		}//if(!empty($media) || $media!="none")
		return $item;
	} //end fun
/*+++++  CREATE GALLERY +++++++++++++++*/	
	function creat_gallery($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$size_gallery,$bigsize){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		//$image_config("0 image_class_container","1 media style","2 image_container_class","3 thumbnail_width","4 thumbnail_width","5 mwidht_default","6 mheight_default", "7 lightbox_id","8 javascript_for_lightbox");
		$sql="SELECT * FROM tblgallery  WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$gallery_id=$row["g_id"];
				$title=$this->get_translate($lang,"tblgallery","title","g_id",$gallery_id);
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$mwidth=$row["mwidth"];
				$mheight=$row["mheight"];
				$malign=$row["malign"];
				$thumbnail=$row["thumbnail"];
				$twidth=$row["twidth"];
				$theight=$row["theight"];
				$article_id=$row["a_id"];
				//creat title
				$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
				$all_title=$this->create_title($title,"href='javascript:'",$title_config,$tooltip_config);
				$top_title=$all_title[0];
				$insite_tilte=$all_title[1];
				$bottom_title=$all_title[2];
				//end create title

				//creat image
				//for media size
				if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
				elseif($image_config[4]!=0 || $image_config[5]!=0){$mwidth=$image_config[4]; $mheight=$image_config[5];}
				else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
				//for thumbnail size
				
				if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
				elseif($image_config[2]!=0 || $image_config[3]!=0){$twidth=$image_config[2]; $theight=$image_config[3];}
				else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
				//end for thumbnail size
				$img_config=array($image_config[1],$image_config[2],"yes",$image_config[7].$gallery_id.$article_id,$image_config[8]);
				$image=!empty($image_config[0])?"<div class='".$image_config[0].$malign."'>":"";
				$image.=$this->create_media_gallery($title_4_use,"imgs/".$article_id."/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,"",$img_config,$size_gallery,$bigsize);
				

				$image.=!empty($image_config[0])?"</div>":"";
				//end create image
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."'>":"";
				$return_value.=$top_title;
				$return_value.=$image;
				$return_value.=$bottom_title;
				$return_value.=!empty($container_class[3])?"</div>":"";

			$rowrun++;
			}//end while
			$return_value.=!empty($container_class[1])?"</div>":"";
			$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
		}//end if $row>0
		
		return $return_value;
	}// end function
	
	
/*+++++  CREATE GALLERY video +++++++++++++++*/	
	function creat_gallery_video($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$size_gallery,$bigsize){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		//$image_config("0 image_class_container","1 media style","2 image_container_class","3 thumbnail_width","4 thumbnail_width","5 mwidht_default","6 mheight_default", "7 lightbox_id","8 javascript_for_lightbox");
		$sql="SELECT * FROM tblgallery  WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$gallery_id=$row["g_id"];
				$title=$this->get_translate($lang,"tblgallery","title","g_id",$gallery_id);
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$mwidth=$row["mwidth"];
				$mheight=$row["mheight"];
				$malign=$row["malign"];
				$thumbnail=$row["thumbnail"];
				$twidth=$row["twidth"];
				$theight=$row["theight"];
				$article_id=$row["a_id"];
				//creat title
				$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
				$all_title=$this->create_title($title,"href='javascript:'",$title_config,$tooltip_config);
				$top_title=$all_title[0];
				$insite_tilte=$all_title[1];
				$bottom_title=$all_title[2];
				//end create title

				//creat image
				//for media size
				if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
				elseif($image_config[4]!=0 || $image_config[5]!=0){$mwidth=$image_config[4]; $mheight=$image_config[5];}
				else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
				//for thumbnail size
				
				if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
				elseif($image_config[2]!=0 || $image_config[3]!=0){$twidth=$image_config[2]; $theight=$image_config[3];}
				else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
				//end for thumbnail size
				$img_config=array($image_config[1],$image_config[2],"yes",$image_config[7].$gallery_id.$article_id,$image_config[8]);
				$image=!empty($image_config[0])?"<div class='".$image_config[0].$malign."'>":"";
				$image.=$this->create_video_gallery($title_4_use,"imgs/".$article_id."/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,"",$img_config,$size_gallery,$bigsize);
				

				$image.=!empty($image_config[0])?"</div>":"";
				//end create image
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."'>":"";
				$return_value.=$top_title;
				$return_value.=$image;
				$return_value.=$bottom_title;
				$return_value.=!empty($container_class[3])?"</div>":"";

			$rowrun++;
			}//end while
			$return_value.=!empty($container_class[1])?"</div>":"";
			$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
		}//end if $row>0
		
		return $return_value;
	}// end function
	
	
	
	function gallery_page($lang,$condiction,$gallery_ctn,$img_container,$img_class,$title_config,$img_config){
	
		$sql="select * from tblarticle where ".$condiction[0]." ORDER BY ".$condiction[1]." ".$condiction[2];
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0){
		
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
			
				$a_id=$row['a_id'];
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$a_id);
																																						
				$image=$this->creat_gallery($lang,array("a_id=".$row['a_id']." and display='yes' and recycle='no'","ordering asc,g_id asc",""),$img_container,$img_class,$title_config,array("gp_image_","border:0px","132","100","","","","gp_img_lightbox","yes"));
				
				
				$return_value.=!empty($gallery_ctn[0])?"<div class='".$gallery_ctn[0]."'>":"";
				
				//title
				$return_value.=!empty($gallery_ctn[1])?"<div class='".$gallery_ctn[1]."'>":"";
				$return_value.=!empty($gallery_ctn[2])?"<font class='".$gallery_ctn[2]."'>":"";
				$return_value.=$title;
				$return_value.=!empty($gallery_ctn[2])?"</font>":"";
				$return_value.=!empty($gallery_ctn[1])?"</div>":"";
				
				//image
				$return_value.=!empty($gallery_ctn[3])?"<div class=".$gallery_ctn[3].">":"";
				$return_value.=$image;
				$return_value.=!empty($gallery_ctn[3])?"</div>":"";
				
				
				$return_value.=!empty($gallery_ctn[0])?"</div>":"";
			}//end while
			
			return $return_value;
		}//end has record
		
	
	}
	
	
	
	
	
	
	
/*+++++ FULL DETAIL VIEW ++++++++++++++*/	
	function full_detail($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$info_config,$viewcounter_config,$booking_share_config,$size_full){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		//$share_view yes|no
		//$image_config("0 image_class_container","1 media style","2 image_container_class","3 thumbnail_width","4 thumbnail_width","5 mwidht_default","6 mheight_default", "7 lightbox_id","8 javascript_for_lightbox");
		//$viewcounter_config("run_count","conatiner_class","font_class","location_id for Label","date_view")
		//$booking_share_config("conatiner_class","link_class","font_class","location_id for Label","share_view")
		//$sql="SELECT t1.*,t2.description from tblarticle as t1 inner join(select id_ref,translate as description from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.field_ref='description' and t2.table_ref='tblarticle') as t2 on t1.a_id=t2.id_ref WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$sql = "SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." order by ".$sql[1]." ".$sql[2];

		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$title=$row['translate'];
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$mwidth=$row["mwidth"];
				$mheight=$row["mheight"];
				$malign=$row["malign"];
				$thumbnail=$row["thumbnail"];
				$twidth=$row["twidth"];
				$theight=$row["theight"];
				$email_to_image=trim($row["email_to_img"]);
				$description=$this->get_translate($lang,"tblarticle","description","a_id",$article_id);
				$view_type=$row["view_type"];
				$visitor_counter=trim($row["visitor_counter"]);
				$booking_button=trim($row["booking_button"]);
				
				//creat title
				$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
				$all_title=$this->create_title($title,"href='javascript:'",$title_config,$tooltip_config);
				$top_title=$all_title[0];
				$insite_tilte=!empty($all_title[1])?$all_title[1]."<br />":$all_title[1];
				$bottom_title=$all_title[2];
				//end create title

				//creat image
				$image="";
				//for media size
				if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
				elseif($image_config[5]!=0 || $image_config[6]!=0){$mwidth=$image_config[5]; $mheight=$image_config[6];}
				else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
				//for thumbnail size
				
				if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
				elseif($image_config[3]!=0 || $image_config[4]!=0){$twidth=$image_config[3]; $theight=$image_config[4];}
				else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
				//end for thumbnail size
				if(!empty($media) && $media!="none"){
					$img_config=array($image_config[1],$image_config[2],"yes",$image_config[7].$article_id,$image_config[8]);
					$image=!empty($image_config[0])?"<div class='".$image_config[0].$malign."'>":"";
					$image.=$this->create_media($title_4_use,"imgs/".$article_id."/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,"",$img_config,$size_full);
					$image.=!empty($image_config[0])?"</div>":"";
				}
				//end create image
				
				//creat description
				
				$description_4_use=strip_tags(trim($this->get_info($description,2,$email_to_image)),$this->allow_tag);
				//modify a path of Image/Flash in TextEditor
					$find_folder=stripos($this->get_info_from_url(),$this->project_folder);
					if(is_int($find_folder) && $find_folder>-1){
						$description_4_use=$description_4_use;
					}
					else{
						$description_4_use=str_ireplace("/".$this->project_folder."/","/",$description_4_use);
					}
				//end of modify a path of Image/Flash in TextEditor
				
				
				//for view Type column | normal
					$arr_align=array("left"=>"right","right"=>"left");
					$info_ctn="";
					$info_close_div="";
					if(strcasecmp($view_type,"column")==0){
						$info_ctn=!empty($info_config[0])?"<div class='".$info_config[0]."' style='float:".$arr_align[$malign]."'>":"";
						$info_close_div=!empty($info_config[0])?"</div>":"";
					}
				//end for  view Type column | normal
				
				//end create description
				
				//Process counter and create view counter
				if(strcasecmp($viewcounter_config[0],"yes")==0){
					$update_count=mysql_query("update tblarticle set num_view=num_view+1 where a_id=$article_id");
				}
				$view_counter="";
				if(strcasecmp($visitor_counter,"yes")==0 || strcasecmp($viewcounter_config[4],"yes")==0){
					$counter=strcasecmp($visitor_counter,"yes")==0?"[ ".$this->get_translate($lang,"tblarticle","title","a_id",(int)$viewcounter_config[3])." : ".$row["num_view"]." ]":"";
					$add_date=$row["add_date"];
					$veiw_date=date($this->dateformat,strtotime($add_date));
					$date=strcasecmp($viewcounter_config[4],"yes")==0?$veiw_date:"";
					$view_counter.=!empty($viewcounter_config[1])?"<div class='".$viewcounter_config[1]."'>":"";
					$view_counter.="<font class='$viewcounter_config[2]'>$date $counter</font>";
					$view_counter.=!empty($viewcounter_config[1])?"</div><br />":"";
				}
				//end create counter
				
				
				//create booking and share
				$view_booking="";
				if(strcasecmp($booking_button,"yes")==0 || strcasecmp($booking_share_config[4],"yes")==0){
					$booking=strcasecmp($booking_button,"yes")==0?"<span class='$booking_share_config[1]'><a href='?page=contact&amp;ctype=article&amp;id=$article_id'><font class='$booking_share_config[2]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$booking_share_config[3])."</font></a></span>":"";

					$share=strcasecmp($booking_share_config[4],"yes")==0?"<div style='margin-top:10px;'><span class='st_twitter' ></span><span class='st_facebook' ></span><span class='st_yahoo' ></span><span class='st_gbuzz' ></span><span class='st_email' ></span><span class='st_sharethis' ></span></div>":"";
					$view_booking.=!empty($booking_share_config[0])?"<div class='".$booking_share_config[0]."' style='float:".$arr_align[$malign]."; text-align:".$arr_align[$malign]."'>":"";
					$view_booking.="$booking $share";
					$view_booking.=!empty($booking_share_config[0])?"</div>":"";
				}
				//end create booking and share
				
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
				$return_value.=$top_title;
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."'>":"";
				$return_value.=$image;
				$return_value.=$info_ctn;
				$return_value.=$insite_tilte;
				$return_value.=$view_counter;
				$return_value.="<font class='$info_config[1]'>$description_4_use</font>";
				$return_value.=$view_booking;
				$return_value.=$info_close_div;
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=$bottom_title;
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function
	
/*+++++ FULL DETAIL VIEW ++++++++++++++*/	
	function full_detail_contact($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$info_config,$viewcounter_config,$booking_share_config,$size_full){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		//$share_view yes|no
		//$image_config("0 image_class_container","1 media style","2 image_container_class","3 thumbnail_width","4 thumbnail_width","5 mwidht_default","6 mheight_default", "7 lightbox_id","8 javascript_for_lightbox");
		//$viewcounter_config("run_count","conatiner_class","font_class","location_id for Label","date_view")
		//$booking_share_config("conatiner_class","link_class","font_class","location_id for Label","share_view")
		//$sql="SELECT t1.*,t2.description from tblarticle as t1 inner join(select id_ref,translate as description from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.field_ref='description' and t2.table_ref='tblarticle') as t2 on t1.a_id=t2.id_ref WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$sql = "SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." order by ".$sql[1]." ".$sql[2];

		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$title=$row['translate'];
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$mwidth=$row["mwidth"];
				$mheight=$row["mheight"];
				$malign=$row["malign"];
				$thumbnail=$row["thumbnail"];
				$twidth=$row["twidth"];
				$theight=$row["theight"];
				$email_to_image=trim($row["email_to_img"]);
				$description=$this->get_translate($lang,"tblarticle","description","a_id",$article_id);
				$view_type=$row["view_type"];
				$visitor_counter=trim($row["visitor_counter"]);
				$booking_button=trim($row["booking_button"]);
				
				//creat title
				$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
				$all_title=$this->create_title($title,"href='javascript:'",$title_config,$tooltip_config);
				$top_title=$all_title[0];
				$insite_tilte=!empty($all_title[1])?$all_title[1]."<br />":$all_title[1];
				$bottom_title=$all_title[2];
				//end create title

				//creat image
				$image="";
				//for media size
				if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
				elseif($image_config[5]!=0 || $image_config[6]!=0){$mwidth=$image_config[5]; $mheight=$image_config[6];}
				else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
				//for thumbnail size
				
				if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
				elseif($image_config[3]!=0 || $image_config[4]!=0){$twidth=$image_config[3]; $theight=$image_config[4];}
				else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
				//end for thumbnail size
				if(!empty($media) && $media!="none"){
					$img_config=array($image_config[1],$image_config[2],"yes",$image_config[7].$article_id,$image_config[8]);
					$image=!empty($image_config[0])?"<div class='".$image_config[0].$malign."'>":"";
					$image.=$this->create_media_contact($title_4_use,"imgs/".$article_id."/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,"",$img_config,$size_full);
					$image.=!empty($image_config[0])?"</div>":"";
				}
				//end create image
				
				//creat description
				
				$description_4_use=strip_tags(trim($this->get_info($description,2,$email_to_image)),$this->allow_tag);
				//modify a path of Image/Flash in TextEditor
					$find_folder=stripos($this->get_info_from_url(),$this->project_folder);
					if(is_int($find_folder) && $find_folder>-1){
						$description_4_use=$description_4_use;
					}
					else{
						$description_4_use=str_ireplace("/".$this->project_folder."/","/",$description_4_use);
					}
				//end of modify a path of Image/Flash in TextEditor
				
				
				//for view Type column | normal
					$arr_align=array("left"=>"right","right"=>"left");
					$info_ctn="";
					$info_close_div="";
					if(strcasecmp($view_type,"column")==0){
						$info_ctn=!empty($info_config[0])?"<div class='".$info_config[0]."' style='float:".$arr_align[$malign]."'>":"";
						$info_close_div=!empty($info_config[0])?"</div>":"";
					}
				//end for  view Type column | normal
				
				//end create description
				
				//Process counter and create view counter
				if(strcasecmp($viewcounter_config[0],"yes")==0){
					$update_count=mysql_query("update tblarticle set num_view=num_view+1 where a_id=$article_id");
				}
				$view_counter="";
				if(strcasecmp($visitor_counter,"yes")==0 || strcasecmp($viewcounter_config[4],"yes")==0){
					$counter=strcasecmp($visitor_counter,"yes")==0?"[ ".$this->get_translate($lang,"tblarticle","title","a_id",(int)$viewcounter_config[3])." : ".$row["num_view"]." ]":"";
					$add_date=$row["add_date"];
					$veiw_date=date($this->dateformat,strtotime($add_date));
					$date=strcasecmp($viewcounter_config[4],"yes")==0?$veiw_date:"";
					$view_counter.=!empty($viewcounter_config[1])?"<div class='".$viewcounter_config[1]."'>":"";
					$view_counter.="<font class='$viewcounter_config[2]'>$date $counter</font>";
					$view_counter.=!empty($viewcounter_config[1])?"</div><br />":"";
				}
				//end create counter
				
				
				//create booking and share
				$view_booking="";
				if(strcasecmp($booking_button,"yes")==0 || strcasecmp($booking_share_config[4],"yes")==0){
					$booking=strcasecmp($booking_button,"yes")==0?"<span class='$booking_share_config[1]'><a href='?page=contact&amp;ctype=article&amp;id=$article_id'><font class='$booking_share_config[2]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$booking_share_config[3])."</font></a></span>":"";

					$share=strcasecmp($booking_share_config[4],"yes")==0?"<div style='margin-top:10px;'><span class='st_twitter' ></span><span class='st_facebook' ></span><span class='st_yahoo' ></span><span class='st_gbuzz' ></span><span class='st_email' ></span><span class='st_sharethis' ></span></div>":"";
					$view_booking.=!empty($booking_share_config[0])?"<div class='".$booking_share_config[0]."' style='float:".$arr_align[$malign]."; text-align:".$arr_align[$malign]."'>":"";
					$view_booking.="$booking $share";
					$view_booking.=!empty($booking_share_config[0])?"</div>":"";
				}
				//end create booking and share
				
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate."'>":"";
				$return_value.=$top_title;
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate."'>":"";
				$return_value.=$image;
				$return_value.=$info_ctn;
				$return_value.=$insite_tilte;
				$return_value.=$view_counter;
				$return_value.="<font class='$info_config[1]'>$description_4_use</font>";
				$return_value.=$view_booking;
				$return_value.=$info_close_div;
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=$bottom_title;
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function
	
/*+++++ SHORT DETAIL VIEW ++++++++++++++*/	
function short_detail($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$info_config,$viewcounter_config,$readmore_config,$booking_share_config,$thumb_size1){
// $sql and $container must be ARRAY. $sql("condition","order","limit");
//container("header_class","body_class","footer_class","cotainer_class","alternate");
//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
//$tolltip_config("yes/no","font_class","link_class","where_link_to");
//$share_view yes|no
//$image_config("0 image view yes|no","1 image_class_container","2 media style","3 image_container_class","4 thumbnail_width","5 thumbnail_width","6 mwidht_default","7 mheight_default","8 click view thumbnail yes|no", "9 lightbox_id","10 javascript_for_lightbox");
//$viewcounter_config("view yes|no","conatiner_class","font_class","location_id for Label","date_view")
//$readmore_config("view Yes|No","container_class","link_clas","font_class","location_for label")
//$booking_share_config("view yes|no","conatiner_class","link_class","font_class","location_id for Label","share_view")
//$sql="SELECT * FROM tblarticle WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
//$sql="SELECT t1.*,t2.description from tblarticle as t1 inner join(select id_ref,translate as description from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.field_ref='description' and t2.table_ref='tblarticle') as t2 on t1.a_id=t2.id_ref WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
$sql = "SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." order by ".$sql[1]." ".$sql[2];



//echo $sql;
$result=mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($result)>0){
$rowrun=1;
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
$article_id=$row["a_id"];
$title=$row['translate'];
$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));

$media_type=$row["media_type"];
$media=$row["media"];
$screenshot=$row["screenshot"];
$mwidth=$row["mwidth"];
$mheight=$row["mheight"];
$malign=$row["malign"];
$thumbnail=$row["thumbnail"];
$twidth=$row["twidth"];
$theight=$row["theight"];
$email_to_image=trim($row["email_to_img"]);
$description=$this->get_translate($lang,"tblarticle","description","a_id",$article_id);
$view_type=$row["view_type"];
$visitor_counter=trim($row["visitor_counter"]);
$booking_button=trim($row["booking_button"]);
$arr_align=array("left"=>"right","right"=>"left");

//creat link
if(count(explode("---",$description))>1 || !empty($linkto_field_vlaue)){
$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");

//creat read more
$read_more="";
if(strcasecmp($readmore_config[0],"yes")==0){
$read_more=!empty($readmore_config[1])?"<div class='".$readmore_config[1]."' style='float:".$arr_align[$malign]."'>":"";
$read_more.="<span class='$readmore_config[2]'><a $where_link_to><font class='$readmore_config[3]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$readmore_config[4])."</font></a></span>";
$read_more.=!empty($readmore_config[1])?"</div>":"";
}
//end creat read more

}else{
$where_link_to="href='javascript:'";
$read_more="";
}
//end create link

//creat title
$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
$all_title=$this->create_title($title,$where_link_to,$title_config,$tooltip_config);
$top_title=$all_title[0];
$insite_tilte=!empty($all_title[1])?$all_title[1]."<br />":$all_title[1];
$bottom_title=$all_title[2];
//end create title

//creat image
$image="";
//for media size
if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
elseif($image_config[6]!=0 || $image_config[7]!=0){$mwidth=$image_config[6]; $mheight=$image_config[7];}
else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
//for thumbnail size

if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
elseif($image_config[4]!=0 || $image_config[5]!=0){$twidth=$image_config[4]; $theight=$image_config[5];}
else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
//end for thumbnail size
if(strcasecmp($image_config[0],"yes")==0){
if(!empty($media) && $media!="none"){
$img_config=array($image_config[2],$image_config[3],$image_config[8],$image_config[9].$article_id,$image_config[10]);
$image=!empty($image_config[1])?"<div class='".$image_config[1].$malign."'>":"";


$image.=$this->create_media($title_4_use,"imgs/".$article_id."/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$img_config,$thumb_size1);
$image.=!empty($image_config[1])?"</div>":"";
}
}
//end create image

//creat description
$description_4_use="";
$info_ctn="";
$info_close_div="";
if(strcasecmp($info_config[0],"yes")==0){
$description_4_use=strip_tags(trim($this->get_info_short_detail($description,0,$email_to_image)),$this->allow_tag);
//modify a path of Image/Flash in TextEditor
$find_folder=stripos($this->get_info_from_url(),$this->project_folder);
if(is_int($find_folder) && $find_folder>-1){
$description_4_use=$description_4_use;
}
else{
$description_4_use=str_ireplace("/".$this->project_folder."/","/",$description_4_use);
}
//end of modify a path of Image/Flash in TextEditor
//for view Type column | normal
if(strcasecmp($view_type,"column")==0){
$info_ctn=!empty($info_config[1])?"<div class='".$info_config[1]."' style='float:".$arr_align[$malign]."'>":"";
$info_close_div=!empty($info_config[1])?"</div>":"";
}
}//end if view info
//end for view Type column | normal

//end create description

//create view counter
if(strcasecmp($viewcounter_config[0],"yes")==0){
$view_counter="";
if(strcasecmp($visitor_counter,"yes")==0 || strcasecmp($viewcounter_config[4],"yes")==0){
$counter=strcasecmp($visitor_counter,"yes")==0?"[ ".$this->get_translate($lang,"tblarticle","title","a_id",(int)$viewcounter_config[3])." : ".$row["num_view"]." ]":"";
$add_date=$row["add_date"];
$veiw_date=date($this->dateformat,strtotime($add_date));
$date=strcasecmp($viewcounter_config[4],"yes")==0?$veiw_date:"";
$view_counter.=!empty($viewcounter_config[1])?"<div class='".$viewcounter_config[1]."'>":"";
$view_counter.="<font class='$viewcounter_config[2]'>[ $date ]</font>";
$view_counter.=!empty($viewcounter_config[1])?"</div><br />":"";
}
}
//end create counter

//create booking and share
$view_booking="";
if(strcasecmp($booking_share_config[0],"yes")==0){
if(strcasecmp($booking_button,"yes")==0 || strcasecmp($booking_share_config[5],"yes")==0){
$booking=strcasecmp($booking_button,"yes")==0?"<span class='$booking_share_config[3]'><a href='?page=contact&amp;ctype=article&amp;id=$article_id'><font class='$booking_share_config[2]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$booking_share_config[4])."</font></a></span>":"";

$share=strcasecmp($booking_share_config[5],"yes")==0?"<span class='st_facebook_button' displayText='Facebook'></span><span class='st_twitter_button' displayText='Tweet'></span><span class='st_email_button' displayText='Email'></span><span class='st_sharethis_button' displayText='ShareThis'></span>":"";
$view_booking.=!empty($booking_share_config[1])?"<div class='".$booking_share_config[1]."' style='float:".$arr_align[$malign]."; text-align:".$arr_align[$malign]."'>":"";
$view_booking.="$booking $share";
$view_booking.=!empty($booking_share_config[1])?"</div>":"";
}
}
//end create booking and share

if(strcasecmp($container_class[4],"yes")==0){
$alternate=$rowrun%2==0?"1":"2";
}else{$alternate="";}
$last="";
if($rowrun==mysql_num_rows($result)){
$last="_last";
}
$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate.$last."'>":"";
$return_value.=$top_title;
$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate.$last."'>":"";
$return_value.=$image;
$return_value.=$info_ctn;
$return_value.=$insite_tilte;
$return_value.=$view_counter;
$return_value.="<font class='$info_config[2]'>$description_4_use</font>";
$return_value.=$view_booking;
if(strpos($description,"---")==true){
	$return_value.=$read_more;
}
$return_value.=$info_close_div;
$return_value.=!empty($container_class[3])?"</div>":"";
$return_value.=$bottom_title;
$return_value.=!empty($container_class[1])?"</div>":"";
$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
$rowrun++;
}//end while
}//end if $row>0
return $return_value;


}// end function


/*+++++ SHORT DETAIL VIEW ++++++++++++++*/	
function short_detail_welcome($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$info_config,$viewcounter_config,$readmore_config,$booking_share_config,$thumb_size1){
// $sql and $container must be ARRAY. $sql("condition","order","limit");
//container("header_class","body_class","footer_class","cotainer_class","alternate");
//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
//$tolltip_config("yes/no","font_class","link_class","where_link_to");
//$share_view yes|no
//$image_config("0 image view yes|no","1 image_class_container","2 media style","3 image_container_class","4 thumbnail_width","5 thumbnail_width","6 mwidht_default","7 mheight_default","8 click view thumbnail yes|no", "9 lightbox_id","10 javascript_for_lightbox");
//$viewcounter_config("view yes|no","conatiner_class","font_class","location_id for Label","date_view")
//$readmore_config("view Yes|No","container_class","link_clas","font_class","location_for label")
//$booking_share_config("view yes|no","conatiner_class","link_class","font_class","location_id for Label","share_view")
//$sql="SELECT * FROM tblarticle WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
//$sql="SELECT t1.*,t2.description from tblarticle as t1 inner join(select id_ref,translate as description from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.field_ref='description' and t2.table_ref='tblarticle') as t2 on t1.a_id=t2.id_ref WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
$sql = "SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." order by ".$sql[1]." ".$sql[2];



//echo $sql;
$result=mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($result)>0){
$rowrun=1;
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
$article_id=$row["a_id"];
$title=$row['translate'];
$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));

$media_type=$row["media_type"];
$media=$row["media"];
$screenshot=$row["screenshot"];
$mwidth=$row["mwidth"];
$mheight=$row["mheight"];
$malign=$row["malign"];
$thumbnail=$row["thumbnail"];
$twidth=$row["twidth"];
$theight=$row["theight"];
$email_to_image=trim($row["email_to_img"]);
$description=$this->get_translate($lang,"tblarticle","description","a_id",$article_id);
$view_type=$row["view_type"];
$visitor_counter=trim($row["visitor_counter"]);
$booking_button=trim($row["booking_button"]);
$arr_align=array("left"=>"right","right"=>"left");

//creat link
if(count(explode("---",$description))>1 || !empty($linkto_field_vlaue)){
$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");

//creat read more
$read_more="";
if(strcasecmp($readmore_config[0],"yes")==0){
$read_more=!empty($readmore_config[1])?"<div class='".$readmore_config[1]."' style='float:".$arr_align[$malign]."'>":"";
$read_more.="<span class='$readmore_config[2]'><a $where_link_to><font class='$readmore_config[3]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$readmore_config[4])."</font></a></span>";
$read_more.=!empty($readmore_config[1])?"</div>":"";
}
//end creat read more

}else{
$where_link_to="href='javascript:'";
$read_more="";
}
//end create link

//creat title
$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
$all_title=$this->create_title($title,$where_link_to,$title_config,$tooltip_config);
$top_title=$all_title[0];
$insite_tilte=!empty($all_title[1])?$all_title[1]."<br />":$all_title[1];
$bottom_title=$all_title[2];
//end create title

//creat image
$image="";
//for media size
if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
elseif($image_config[6]!=0 || $image_config[7]!=0){$mwidth=$image_config[6]; $mheight=$image_config[7];}
else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
//for thumbnail size

if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
elseif($image_config[4]!=0 || $image_config[5]!=0){$twidth=$image_config[4]; $theight=$image_config[5];}
else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
//end for thumbnail size
if(strcasecmp($image_config[0],"yes")==0){
if(!empty($media) && $media!="none"){
$img_config=array($image_config[2],$image_config[3],$image_config[8],$image_config[9].$article_id,$image_config[10]);
$image=!empty($image_config[1])?"<div class='".$image_config[1].$malign."'>":"";


$image.=$this->create_media($title_4_use,"imgs/".$article_id."/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$img_config,$thumb_size1);
$image.=!empty($image_config[1])?"</div>":"";
}
}
//end create image

//creat description
$description_4_use="";
$info_ctn="";
$info_close_div="";
if(strcasecmp($info_config[0],"yes")==0){
$description_4_use=strip_tags(trim($this->get_info($description,0,$email_to_image)),$this->allow_tag);
//modify a path of Image/Flash in TextEditor
$find_folder=stripos($this->get_info_from_url(),$this->project_folder);
if(is_int($find_folder) && $find_folder>-1){
$description_4_use=$description_4_use;
}
else{
$description_4_use=str_ireplace("/".$this->project_folder."/","/",$description_4_use);
}
//end of modify a path of Image/Flash in TextEditor
//for view Type column | normal
if(strcasecmp($view_type,"column")==0){
$info_ctn=!empty($info_config[1])?"<div class='".$info_config[1]."' style='float:".$arr_align[$malign]."'>":"";
$info_close_div=!empty($info_config[1])?"</div>":"";
}
}//end if view info
//end for view Type column | normal

//end create description

//create view counter
if(strcasecmp($viewcounter_config[0],"yes")==0){
$view_counter="";
if(strcasecmp($visitor_counter,"yes")==0 || strcasecmp($viewcounter_config[4],"yes")==0){
$counter=strcasecmp($visitor_counter,"yes")==0?"[ ".$this->get_translate($lang,"tblarticle","title","a_id",(int)$viewcounter_config[3])." : ".$row["num_view"]." ]":"";
$add_date=$row["add_date"];
$veiw_date=date($this->dateformat,strtotime($add_date));
$date=strcasecmp($viewcounter_config[4],"yes")==0?$veiw_date:"";
$view_counter.=!empty($viewcounter_config[1])?"<div class='".$viewcounter_config[1]."'>":"";
$view_counter.="<font class='$viewcounter_config[2]'>[ $date ]</font>";
$view_counter.=!empty($viewcounter_config[1])?"</div><br />":"";
}
}
//end create counter

//create booking and share
$view_booking="";
if(strcasecmp($booking_share_config[0],"yes")==0){
if(strcasecmp($booking_button,"yes")==0 || strcasecmp($booking_share_config[5],"yes")==0){
$booking=strcasecmp($booking_button,"yes")==0?"<span class='$booking_share_config[3]'><a href='?page=contact&amp;ctype=article&amp;id=$article_id'><font class='$booking_share_config[2]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$booking_share_config[4])."</font></a></span>":"";

$share=strcasecmp($booking_share_config[5],"yes")==0?"<span class='st_facebook_button' displayText='Facebook'></span><span class='st_twitter_button' displayText='Tweet'></span><span class='st_email_button' displayText='Email'></span><span class='st_sharethis_button' displayText='ShareThis'></span>":"";
$view_booking.=!empty($booking_share_config[1])?"<div class='".$booking_share_config[1]."' style='float:".$arr_align[$malign]."; text-align:".$arr_align[$malign]."'>":"";
$view_booking.="$booking $share";
$view_booking.=!empty($booking_share_config[1])?"</div>":"";
}
}
//end create booking and share

if(strcasecmp($container_class[4],"yes")==0){
$alternate=$rowrun%2==0?"1":"2";
}else{$alternate="";}
$last="";
if($rowrun==mysql_num_rows($result)){
$last="_last";
}
$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate.$last."'>":"";
$return_value.=$top_title;
$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate.$last."'>":"";
$return_value.=$image;
$return_value.=$info_ctn;
$return_value.=$insite_tilte;
$return_value.=$view_counter;
$return_value.="<font class='$info_config[2]'>$description_4_use</font>";
$return_value.=$view_booking;
if(strpos($description,"---")==true){
	$return_value.=$read_more;
}
$return_value.=$info_close_div;
$return_value.=!empty($container_class[3])?"</div>":"";
$return_value.=$bottom_title;
$return_value.=!empty($container_class[1])?"</div>":"";
$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
$rowrun++;
}//end while
}//end if $row>0
return $return_value;


}// end function




/*+++++ SHORT DETAIL VIEW ++++++++++++++*/	
function short_detail_news($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$info_config,$viewcounter_config,$readmore_config,$booking_share_config,$thumb_size1){
// $sql and $container must be ARRAY. $sql("condition","order","limit");
//container("header_class","body_class","footer_class","cotainer_class","alternate");
//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
//$tolltip_config("yes/no","font_class","link_class","where_link_to");
//$share_view yes|no
//$image_config("0 image view yes|no","1 image_class_container","2 media style","3 image_container_class","4 thumbnail_width","5 thumbnail_width","6 mwidht_default","7 mheight_default","8 click view thumbnail yes|no", "9 lightbox_id","10 javascript_for_lightbox");
//$viewcounter_config("view yes|no","conatiner_class","font_class","location_id for Label","date_view")
//$readmore_config("view Yes|No","container_class","link_clas","font_class","location_for label")
//$booking_share_config("view yes|no","conatiner_class","link_class","font_class","location_id for Label","share_view")
//$sql="SELECT * FROM tblarticle WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
//$sql="SELECT t1.*,t2.description from tblarticle as t1 inner join(select id_ref,translate as description from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.field_ref='description' and t2.table_ref='tblarticle') as t2 on t1.a_id=t2.id_ref WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
$sql = "SELECT t1.*,translate from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where t2.language_code='$lang' and t2.table_ref='tblarticle' and t2.field_ref='title' and ".$sql[0]." order by ".$sql[1]." ".$sql[2];



//echo $sql;
$result=mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($result)>0){
$rowrun=1;
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
$article_id=$row["a_id"];
$title=$row['translate'];
$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));

$media_type=$row["media_type"];
$media=$row["media"];
$screenshot=$row["screenshot"];
$mwidth=$row["mwidth"];
$mheight=$row["mheight"];
$malign=$row["malign"];
$thumbnail=$row["thumbnail"];
$twidth=$row["twidth"];
$theight=$row["theight"];
$email_to_image=trim($row["email_to_img"]);
$description=$this->get_translate($lang,"tblarticle","description","a_id",$article_id);
$view_type=$row["view_type"];
$visitor_counter=trim($row["visitor_counter"]);
$booking_button=trim($row["booking_button"]);
$arr_align=array("left"=>"right","right"=>"left");

//creat link
if(count(explode("---",$description))>1 || !empty($linkto_field_vlaue)){
$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");

//creat read more
$read_more="";
if(strcasecmp($readmore_config[0],"yes")==0){
$read_more=!empty($readmore_config[1])?"<div class='".$readmore_config[1]."' style='float:".$arr_align[$malign]."'>":"";
$read_more.="<span class='$readmore_config[2]'><a $where_link_to><font class='$readmore_config[3]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$readmore_config[4])."</font></a></span>";
$read_more.=!empty($readmore_config[1])?"</div>":"";
}
//end creat read more

}else{
$where_link_to="href='javascript:'";
$read_more="";
}
//end create link

//creat title
$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
$all_title=$this->create_title($title,$where_link_to,$title_config,$tooltip_config);
$top_title=$all_title[0];
$insite_tilte=!empty($all_title[1])?$all_title[1]."<br />":$all_title[1];
$bottom_title=$all_title[2];
//end create title

//creat image
$image="";
//for media size
if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
elseif($image_config[6]!=0 || $image_config[7]!=0){$mwidth=$image_config[6]; $mheight=$image_config[7];}
else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
//for thumbnail size

if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
elseif($image_config[4]!=0 || $image_config[5]!=0){$twidth=$image_config[4]; $theight=$image_config[5];}
else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
//end for thumbnail size
if(strcasecmp($image_config[0],"yes")==0){
if(!empty($media) && $media!="none"){
$img_config=array($image_config[2],$image_config[3],$image_config[8],$image_config[9].$article_id,$image_config[10]);
$image=!empty($image_config[1])?"<div class='".$image_config[1].$malign."'>":"";


$image.=$this->create_media_1($title_4_use,"imgs/".$article_id."/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$img_config,$thumb_size1);
$image.=!empty($image_config[1])?"</div>":"";
}
}
//end create image

//creat description
$description_4_use="";
$info_ctn="";
$info_close_div="";
if(strcasecmp($info_config[0],"yes")==0){
$description_4_use=strip_tags(trim($this->get_info($description,0,$email_to_image)),$this->allow_tag);
//modify a path of Image/Flash in TextEditor
$find_folder=stripos($this->get_info_from_url(),$this->project_folder);
if(is_int($find_folder) && $find_folder>-1){
$description_4_use=$description_4_use;
}
else{
$description_4_use=str_ireplace("/".$this->project_folder."/","/",$description_4_use);
}
//end of modify a path of Image/Flash in TextEditor
//for view Type column | normal
if(strcasecmp($view_type,"column")==0){
$info_ctn=!empty($info_config[1])?"<div class='".$info_config[1]."' style='float:".$arr_align[$malign]."'>":"";
$info_close_div=!empty($info_config[1])?"</div>":"";
}
}//end if view info
//end for view Type column | normal

//end create description

//create view counter
if(strcasecmp($viewcounter_config[0],"yes")==0){
$view_counter="";
if(strcasecmp($visitor_counter,"yes")==0 || strcasecmp($viewcounter_config[4],"yes")==0){
$counter=strcasecmp($visitor_counter,"yes")==0?"[ ".$this->get_translate($lang,"tblarticle","title","a_id",(int)$viewcounter_config[3])." : ".$row["num_view"]." ]":"";
$add_date=$row["add_date"];
$veiw_date=date($this->dateformat,strtotime($add_date));
$date=strcasecmp($viewcounter_config[4],"yes")==0?$veiw_date:"";
$view_counter.=!empty($viewcounter_config[1])?"<div class='".$viewcounter_config[1]."'>":"";
$view_counter.="<font class='$viewcounter_config[2]'>[ $date ]</font>";
$view_counter.=!empty($viewcounter_config[1])?"</div><br />":"";
}
}
//end create counter

//create booking and share
$view_booking="";
if(strcasecmp($booking_share_config[0],"yes")==0){
if(strcasecmp($booking_button,"yes")==0 || strcasecmp($booking_share_config[5],"yes")==0){
$booking=strcasecmp($booking_button,"yes")==0?"<span class='$booking_share_config[3]'><a href='?page=contact&amp;ctype=article&amp;id=$article_id'><font class='$booking_share_config[2]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$booking_share_config[4])."</font></a></span>":"";

$share=strcasecmp($booking_share_config[5],"yes")==0?"<span class='st_facebook_button' displayText='Facebook'></span><span class='st_twitter_button' displayText='Tweet'></span><span class='st_email_button' displayText='Email'></span><span class='st_sharethis_button' displayText='ShareThis'></span>":"";
$view_booking.=!empty($booking_share_config[1])?"<div class='".$booking_share_config[1]."' style='float:".$arr_align[$malign]."; text-align:".$arr_align[$malign]."'>":"";
$view_booking.="$booking $share";
$view_booking.=!empty($booking_share_config[1])?"</div>":"";
}
}
//end create booking and share

if(strcasecmp($container_class[4],"yes")==0){
$alternate=$rowrun%2==0?"1":"2";
}else{$alternate="";}
$last="";
if($rowrun==mysql_num_rows($result)){
$last="_last";
}
$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate.$last."'>":"";
$return_value.=$top_title;
$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate.$last."'>":"";
$return_value.=$image;
$return_value.=$info_ctn;
$return_value.=$insite_tilte;
$return_value.=$view_counter;
$return_value.="<font class='$info_config[2]'>$description_4_use...</font>";
$return_value.=$view_booking;
$return_value.=$read_more;
$return_value.=$info_close_div;
$return_value.=!empty($container_class[3])?"</div>":"";
$return_value.=$bottom_title;
$return_value.=!empty($container_class[1])?"</div>":"";
$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
$rowrun++;
}//end while
}//end if $row>0
return $return_value;


}// end function

/*****************short detail owner***************/

function short_owner($l_id,$limit){
	 $condition = "(t1.l_id=".$l_id." and t1.display<>'no' and t2.language_code='" . $lang . "' and t2.table_ref='tblarticle' and t2.field_ref='title')";
		   $order="ordering asc, t1.a_id desc";
		   $limit="limit $limit";
		  $result = $this->select_table("tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref", $condition, $order, $limit);
            if ($num=mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result)) {
				$a_id=$row['a_id'];
				$media=$row["media"];
				$title=$row["translate"];
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				$image = 'imgs/'.$a_id."/".$this->thumb_article[0]."_" . $media;
				$where_link_to="?page=detail&ctype=article&id=$a_id&lg=$lang";
				echo "<a href='$where_link_to'>";
				echo "<img src='".$image."' width='224' height='205' border='0' style='margin-top:10px;' /></a>"; 
				echo "<a class='m2' href='$where_link_to'>".$title."</a>";
				    $email_to_image=trim($row["email_to_img"]);
				    $description=$this->get_translate($lang,"tblarticle","description","a_id",$a_id);
				    $des=(strip_tags(trim($this->get_info_short_detail($description, 0, $email_to_image)), $this->allow_tag));
					   if(count(explode("---",$description))>1 || !empty($linkto_field_vlaue)){
						 $where_link_to="?page=detail&ctype=article&id=$a_id&lg=$lang";
						  echo  "<div class='size12_$lang' style='width:224px; word-break:break-all; font-family:Arial, Helvetica, sans-serif; margin-top:0px;'>".$des."</div>";
						  echo "<a class='m4' href='$where_link_to'>".
						  $this->get_translate($lang,"tblarticle","title","a_id",599)."
						  </a>";
					   }
					   else{
						 echo $des;
					  }
				 
				
			}
			
	     }
	
	}//end function


function _link_iframe($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,$other_href){
	//ctype stand for content type//
	if($this->is_linkto("link_to",$article_id)){
		if(strcasecmp($linkto_type_value,"customize")==0){
			$href="top.location='index.php".stripcslashes($linkto_field_vlaue).$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
			//onclick=\"top.location='index.php?page=$linkto_field_vlaue".$other_href."&ctype=article&id=".$row['a_id']."&lg=".$lang."'\"
		}
		//.stripcslashes($linkto_field_vlaue).$other_href."&amp;ctype=article&id=".$article_id."&amp;lg=".$lang.
		elseif(strcasecmp($linkto_type_value,"http://")==0 || strcasecmp($linkto_type_value,"https://")==0 || strcasecmp($linkto_type_value,"mailto:")==0){
			$href="top.location='".stripcslashes($linkto_type_value).stripcslashes($linkto_field_vlaue)."'";
			//$href="$link2 target=_new";
		}
		else{
			$href="href=\'?page=".strtolower(stripcslashes($linkto_type_value)).$other_href."&amp;ref_id=".$linkto_field_vlaue."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."\'";
		}
	}//end if is _linkto
	else{
	//$href="onclick=\'parent.location='index.php?page=detail".$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
	
	$href="top.location='index.php?page=slide_comment".$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
	//$href="href=\'$link1\' target=\'_top\'";
	//$link2="parent.location='index.php?page=detail".$other_href."&amp;ctype=article&amp;id=".$article_id."&amp;lg=".$lang."'";
	//$link2="parent.location='.'";
	//$href="";
	
	}//end if
return $href;
}





	/*+++++++For Slideshow partner*/
		function slide_partner($lang,$sql,$container_class,$title_config,$tooltip_config,$image_config,$info_config,$viewcounter_config,$readmore_config,$booking_share_config,$addmargin){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		//$share_view yes|no
		//$image_config("0 image view yes|no","1 image_class_container","2 media style","3 image_container_class","4 thumbnail_width","5 thumbnail_width","6 mwidht_default","7 mheight_default","8 click view thumbnail yes|no", "9 lightbox_id","10 javascript_for_lightbox");
		//$viewcounter_config("view yes|no","conatiner_class","font_class","location_id for Label","date_view")
		//$readmore_config("view Yes|No","container_class","link_clas","font_class","location_for label")
		//$booking_share_config("view yes|no","conatiner_class","link_class","font_class","location_id for Label","share_view")
		$sql="SELECT * FROM tblarticle  WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		//echo $sql;
		
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$mwidth=$row["mwidth"];
				$mheight=$row["mheight"];
				$malign=$row["malign"];
				$thumbnail=$row["thumbnail"];
				$twidth=$row["twidth"];
				$theight=$row["theight"];
				$email_to_image=trim($row["email_to_img"]);
				$description=$this->get_translate($lang,"tblarticle","description","a_id",$article_id);
				$view_type=$row["view_type"];
				$visitor_counter=trim($row["visitor_counter"]);
				$booking_button=trim($row["booking_button"]);
				$arr_align=array("left"=>"right","right"=>"left");
				
				//creat link
				/*if(count(split("---",$description))>1 || !empty($linkto_field_vlaue)){
				 	$where_link_to=$this->_link_iframe($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");
					
					//creat read more
					$read_more="";
					if(strcasecmp($readmore_config[0],"yes")==0){
						$read_more=!empty($readmore_config[1])?"<div class='".$readmore_config[1]."' style='float:".$arr_align[$malign]."'>":"";
						$read_more.="<span class='$readmore_config[2]' style='float:".$arr_align[$malign]."'><a href='".$where_link_to."' target='_parent'><font class='$readmore_config[3]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$readmore_config[4])."</font></a></span>";
						//onclick=\"top.location='index.php?page=$linkto_field_vlaue".$other_href."&ctype=article&id=".$row['a_id']."&lg=".$lang."'\"
						$read_more.=!empty($readmore_config[1])?"</div>":"";
					}
					//end creat read more
					
				}else{
				 	$where_link_to_1="href='javascript:' onclick=\"alert('hi')\"";
					$read_more="fdfdf";
				}*/
				//end create link
				
				//creat title
				$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
				$all_title=$this->create_title($title,$where_link_to_1,$title_config,$tooltip_config);
				$top_title=$all_title[0];
				$insite_tilte=!empty($all_title[1])?$all_title[1]."<br />":$all_title[1];
				$bottom_title=$all_title[2];
				//end create title
				
				//creat image
				$image="";
				//for media size
				if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
				elseif($image_config[6]!=0 || $image_config[7]!=0){$mwidth=$image_config[6]; $mheight=$image_config[7];}
				else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
				//for thumbnail size
				
				if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
				elseif($image_config[4]!=0 || $image_config[5]!=0){$twidth=$image_config[4]; $theight=$image_config[5];}
				else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
				//end for thumbnail size
				if(strcasecmp($image_config[0],"yes")==0){
					if(!empty($media) && $media!="none"){
						$img_config=array($image_config[2],$image_config[3],$image_config[8],$image_config[9].$article_id,$image_config[10]);
						$image=!empty($image_config[1])?"<div class='".$image_config[1].$malign."'>":"";
						$image.=$this->create_media_1($title_4_use,"imgs/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$img_config,$article_id,$lang);
						$image.=!empty($image_config[1])?"</div>":"";
					}
				}
				//end create image
				
				//creat description
				$description_4_use="";
				$info_ctn="";
				$info_close_div="";
				if(strcasecmp($info_config[0],"yes")==0){
					$description_4_use=strip_tags(trim($this->get_info($description,0,$email_to_image)),$this->allow_tag);
					//modify a path of Image/Flash in TextEditor
						$find_folder=stripos($this->get_info_from_url(),$this->project_folder);
						if(is_int($find_folder) && $find_folder>-1){
							$description_4_use=$description_4_use;
						}
						else{
							$description_4_use=str_ireplace("/".$this->project_folder."/","/",$description_4_use);
						}
					//end of modify a path of Image/Flash in TextEditor
					//for view Type column | normal
						if(strcasecmp($view_type,"column")==0){
							$info_ctn=!empty($info_config[1])?"<div class='".$info_config[1]."' style='float:".$arr_align[$malign]."'>":"";
							$info_close_div=!empty($info_config[1])?"</div>":"";
						}
				}//end if view info
				//end for  view Type column | normal
				
				//end create description
				
				//create view counter
				if(strcasecmp($viewcounter_config[0],"yes")==0){
					$view_counter="";
					if(strcasecmp($visitor_counter,"yes")==0 || strcasecmp($viewcounter_config[4],"yes")==0){
						$counter=strcasecmp($visitor_counter,"yes")==0?"[ ".$this->get_translate($lang,"tblarticle","title","a_id",(int)$viewcounter_config[3])." : ".$row["num_view"]." ]":"";
						$add_date=$row["add_date"];
						$veiw_date=date($this->dateformat,strtotime($add_date));
						$date=strcasecmp($viewcounter_config[4],"yes")==0?$veiw_date:"";
						$view_counter.=!empty($viewcounter_config[1])?"<div class='".$viewcounter_config[1]."'>":"";
						$view_counter.="<font class='$viewcounter_config[2]'>$date $counter</font>";
						$view_counter.=!empty($viewcounter_config[1])?"</div>":"";
					}
				}
				//end create counter
				
				//create booking and share
				$view_booking="";
				if(strcasecmp($booking_share_config[0],"yes")==0){
					if(strcasecmp($booking_button,"yes")==0 || strcasecmp($booking_share_config[5],"yes")==0){
						$booking=strcasecmp($booking_button,"yes")==0?"<span class='$booking_share_config[3]'><a href='?page=contact&amp;ctype=article&amp;id=$article_id'><font class='$booking_share_config[2]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$booking_share_config[4])."</font></a></span>":"";
	
						$share=strcasecmp($booking_share_config[5],"yes")==0?"<span  class='st_facebook_button' displayText='Facebook'></span><span  class='st_twitter_button' displayText='Tweet'></span><span  class='st_email_button' displayText='Email'></span><span  class='st_sharethis_button' displayText='ShareThis'></span>":"";
						$view_booking.=!empty($booking_share_config[1])?"<div class='".$booking_share_config[1]."' style='float:".$arr_align[$malign]."; text-align:".$arr_align[$malign]."'>":"";
						$view_booking.="$booking $share";
						$view_booking.=!empty($booking_share_config[1])?"</div>":"";
					}
				}
				//end create booking and share
				
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				$last="";
				if($rowrun==mysql_num_rows($result)){
					$last="_last";
				}
				
				$rowrun==mysql_num_rows($result);
				if($rowrun%2!=0){
					$add_style=$addmargin;
				}else{
					$add_style='';
				}
				
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate.$last."' style=margin-right:".$add_style."px;>":"";
				//$return_value.=$top_title;
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate.$last."'>":"";
				//$return_value.=$image;
				$return_value.=$info_ctn;
				//$return_value.=$insite_tilte;
				$return_value.=$view_counter;
				/*$return_value.=$read_more;
				$return_value.="<div class='$info_config[2]' style='position:absolute;z-index:9999; width:980px; height:244px;'>
					<div style='float:right; padding:4px 10px 4px 10px; width:960px; height:53px; margin-right:0px; margin-top:190px; line-height:14px; background:url(bgimgs/bg_slide_transperency.png) repeat-x;'>
						$insite_tilte $description_4_use
					</div>
				</div>";*/
				$return_value.=$image;
				$return_value.=$view_booking;
				
				$return_value.=$info_close_div;
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=$bottom_title;
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function





function create_media_1($title_4_use,$path,$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to,$image_config,$thumb_size1){
	//print_r ($image_config);
	//$image_config("0 media style","1 image_container_class","2 click view thumbnail yes|no", "3 lightbox_id","4 javascript_for_lightbox");
	$media_extension=$this->get_extension($media);
	$screenshot_extension=$this->get_extension($screenshot);
	$media_extension_type=$this->media_extension[strtolower($media_extension)];
	$original_media_4_use="";
	$original_extension_4_use="";
	$thumbnail_media_4_use="";
	$thumbnail_extension_4_use="";
	$light_box_link="";
	if(!empty($media) && $media!="none"){
		if(strcasecmp($media_type,"customize")==0){
			if($media_extension_type=="image"){
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$media;
				$thumbnail_extension_4_use=$media_extension;
				
				$light_box_link="<a href='javascript:' onclick=\"$where_link_to\" title='".stripcslashes($title_4_use)."'>";
				//$light_box_link="<a href='javascript:' onclick=\"top.location='index.php?page=detail&id=".$article_id."&lang=".$lang."'\" title='".stripcslashes($title_4_use)."'>";
				//<a href='javascript:' onclick=\"$where_link_to\"><font class='$readmore_config[3]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$readmore_config[4])."</font></a></span>";

			}//end if image
			else{
				$original_media_4_use=$media;
				$original_extension_4_use=$media_extension;
				$thumbnail_media_4_use=$screenshot;
				$thumbnail_extension_4_use=$screenshot_extension;
				$light_box_link='<a href="'.$path.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
			}
		}// end if customize
		else{
			$original_media_4_use=$media;
			$original_extension_4_use="youtube";
			$thumbnail_media_4_use=$screenshot;
			$thumbnail_extension_4_use=$screenshot_extension;
			$light_box_link='<a href="http://www.youtube.com/v/'.$media.'" class="'.$image_config[3].'" title="'.stripcslashes($title_4_use).'" rel="width:'.$mwidth.',height:'.$mheight.'">';
		}// end else of if customize
		
		$image="";
		if(strcasecmp($thumbnail,"yes")==0 && (!empty($thumbnail_media_4_use) && $thumbnail_media_4_use!="none")){
			if(strcasecmp($image_config[2],'yes')==0 && strcasecmp($image_config[4],'yes')==0){
				$image= "<script type='text/javascript'>window.addEvent('domready', function(){var box = new multiBox('".$image_config[3]."', {overlay: new overlay()});});</script>";
			}
			if(strcasecmp($image_config[2],'yes')==0)
				$image.=$light_box_link.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_event_".$malign,$thumb_size1)."</a>";
			else
				$image.=$where_link_to.$this->view_media($thumbnail_extension_4_use,$path,$thumbnail_media_4_use,true,$twidth,$theight,$image_config[0],$image_config[1]." img_event_".$malign,$thumb_size1)."</a>";
		}//end thumbnail=yes
		else{
			$image=$this->view_media($original_extension_4_use,$path,$original_media_4_use,false,$mwidth,$mheight,$image_config[0],$image_config[1]." img_event_".$malign,$thumb_size1);
		} //end else of if thumbnial=yes
	}//if(!empty($media) || $media!="none")
	return $image;
} //end fun


/*+++++ SEARCH CONTENT ++++++++++++++*/	
	function search_content($lang,$sql,$container_class,$title_config,$tooltip_config,$info_config,$readmore_config,$keyword,$found_color,$draw_result_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//container("header_class","body_class","footer_class","cotainer_class","alternate");
		//$title_config("0 title_view yes|no","1 title_view_type","2 title_locate->top|insite|bottom","3 title_container_class","4 title_font_class");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		//$readmore_config("view Yes|No","container_class","link_clas","font_class","location_for label")
		$sql="SELECT * FROM tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref  WHERE ".$sql[0]." group by t1.a_id ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		$total_record=mysql_num_rows($result);
		if($total_record>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$article_id=$row["a_id"];
				$title=$this->get_translate($lang,"tblarticle","title","a_id",$article_id);
				$linkto_type_value=stripcslashes(stripslashes($row["linkto_type"]));
				$linkto_field_vlaue=stripcslashes(stripslashes($row["link_to"]));
				$email_to_image=trim($row["email_to_img"]);
				$description=$this->get_translate($lang,"tblarticle","description","a_id",$article_id);
				
				//creat link
				if(count(explode("---",$description))>1){
				 	$where_link_to=$this->where_link_to($lang,$article_id,$linkto_type_value,$linkto_field_vlaue,"");
					
					//creat read more
					$read_more="";
					if(strcasecmp($readmore_config[0],"yes")==0){
						$read_more=!empty($readmore_config[1])?"<div class='".$readmore_config[1]."' style='float:right'>":"";
						$read_more.="<span class='$readmore_config[2]' style='float:right'><a $where_link_to><font class='$readmore_config[3]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$readmore_config[4])."</font></a></span>";
						$read_more.=!empty($readmore_config[1])?"</div>":"";
					}
					//end creat read more
					
				}else{
				 	$where_link_to="href='javascript:'";
					$read_more="";
				}
				//end create link
				
				//creat title
				$check_tile=stripos($title,$keyword);
				if($check_tile>=0 && is_int($check_tile)){
					$str=substr($title,$check_tile,strlen($keyword));
					$title=str_ireplace($str,"<font style='color:$found_color'>$str</font>",$title);
				}
				$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
				$all_title=$this->create_title($title,$where_link_to,$title_config,$tooltip_config);
				$top_title=$all_title[0];
				$insite_tilte=!empty($all_title[1])?$all_title[1]."<br />":$all_title[1];
				$bottom_title=$all_title[2];
				//end create title
				
				//creat description
				$description_4_use="";
				if(strcasecmp($info_config[0],"yes")==0){
					$description_4_use=strip_tags((trim($this->get_info($description,0,$email_to_image))));
				}//end if view info
				$check_detail=stripos($description_4_use,$keyword);
					if($check_detail>=0 && is_int($check_detail)){
						//for hili color
						if($check_detail>175) $description_4_use=substr($description_4_use,$check_detail-175,350);
						elseif($check_detail<175) $description_4_use=substr($description_4_use,0,350);
						elseif($check_detail>(strlen($description_4_use)-350)) $description_4_use=substr($description_4_use,$check_detail-175,350);
						
						$str=substr($description_4_use,$check_detail,strlen($keyword));
						$description_4_use=str_ireplace($str,"<font style='color:$found_color;'>$str</font>",$description_4_use);
					}
					else{
						$description_4_use=substr($description_4_use,0,350);
					}
					$description_4_use= iconv("UTF-8","UTF-8" ,$description_4_use);
				
				//end create description
				
				
				if(strcasecmp($container_class[4],"yes")==0){
					$alternate=$rowrun%2==0?"1":"2";
				}else{$alternate="";}
				$last="";
				if($rowrun==mysql_num_rows($result)){
					$last="_last";
				}
				
				$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
				$return_value.=!empty($container_class[1])?"<div class='".$container_class[1].$alternate.$last."'>":"";
				$return_value.=$top_title;
				$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$alternate.$last."'>":"";
				$return_value.=$insite_tilte;
				$return_value.="<font class='$info_config[2]'>$description_4_use</font>";
				$return_value.=$read_more;
				$return_value.=!empty($container_class[3])?"</div>":"";
				$return_value.=$bottom_title;
				$return_value.=!empty($container_class[1])?"</div>":"";
				$return_value.=!empty($container_class[2])?"<div class='".$container_class[2].$alternate.$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$rowrun++;
			}//end while
		}//end if $row>0
		return $return_value;
	}// end function
/*+++++  CREATE GALLERY +++++++++++++++*/	
	function gallery_fadeslede($lang,$sql,$title_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//$title_config("0 title_view yes|no","1 title_view_type");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		$sql="SELECT * FROM tblgallery  WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$gallery_id=$row["g_id"];
				$title=$this->get_translate($lang,"tblgallery","title","g_id",$gallery_id);
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$mwidth=$row["mwidth"];
				$mheight=$row["mheight"];
				$malign=$row["malign"];
				$thumbnail=$row["thumbnail"];
				$twidth=$row["twidth"];
				$theight=$row["theight"];
				$article_id=$row["a_id"];
				//creat title
				if(strcasecmp($title_config[1],"yes")==0)
					$title_4_use=trim($this->get_info($title,(int)$title_config[1],"no"));
				else 
					$title_4_use="";
				//end create title
				//creat image
				//for media size
				if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
				elseif($image_config[4]!=0 || $image_config[5]!=0){$mwidth=$image_config[4]; $mheight=$image_config[5];}
				else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
				//for thumbnail size
				
				if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
				elseif($image_config[2]!=0 || $image_config[3]!=0){$twidth=$image_config[2]; $theight=$image_config[3];}
				else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
				//end for thumbnail size
				$items[]=$this->create_fadeslide($title_4_use,"gl/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,"");
				//end create image

			$rowrun++;
			}//end while
		}//end if $row>0
		
		$lists = implode(' , ', $items);
		return $lists;
	}// end function




	function frong_gallery_slide($lang,$sql,$title_config){
		// $sql and $container must be ARRAY. $sql("condition","order","limit");
		//$title_config("0 title_view yes|no","1 title_view_type");
		//$tolltip_config("yes/no","font_class","link_class","where_link_to");
		$sql="SELECT * FROM tblgallery  WHERE ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];	
		$result=mysql_query($sql)or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				$gallery_id=$row["g_id"];
				$title=$this->get_translate($lang,"tblgallery","title","g_id",$gallery_id);
				$media_type=$row["media_type"];
				$media=$row["media"];
				$screenshot=$row["screenshot"];
				$mwidth=$row["mwidth"];
				$mheight=$row["mheight"];
				$malign=$row["malign"];
				$thumbnail=$row["thumbnail"];
				$twidth=$row["twidth"];
				$theight=$row["theight"];
				$article_id=$row["a_id"];
				//creat title
				$title_4_use="<font class='".$title_config[2]."'>".$title."</font>";				
				//end create title
				//creat image
				//for media size
				if($mwidth!=0 || $mheight!=0){$mwidth=$mwidth; $mheight=$mheight;}
				elseif($image_config[4]!=0 || $image_config[5]!=0){$mwidth=$image_config[4]; $mheight=$image_config[5];}
				else{$mwidth=$this->mwidht_default; $mheight=$this->mheight_default;}
				//for thumbnail size
				
				if($twidth!=0 || $theight!=0){$twidth=$twidth; $theight=$theight;}
				elseif($image_config[2]!=0 || $image_config[3]!=0){$twidth=$image_config[2]; $theight=$image_config[3];}
				else{$twidth=$this->twidht_default; $theight=$this->theight_default;}
				//end for thumbnail size
				$items[]=$this->create_new_fadeslide($title_4_use,"gl/",$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,"");
				//end create image

			$rowrun++;
			}//end while
		}//end if $row>0
		
		$lists = implode(' , ', $items);
		return $lists;
	}// end function



	function create_new_fadeslide($title_4_use,$path,$media_type,$media,$screenshot,$mwidth,$mheight,$malign,$thumbnail,$twidth,$theight,$where_link_to){
		//$image_config("0 media style","1 image_container_class" );
		$media_extension=$this->get_extension($media);
		$screenshot_extension=$this->get_extension($screenshot);
		$media_extension_type=$this->media_extension[strtolower($media_extension)];
		$original_media_4_use="";
		$original_extension_4_use="";
		$thumbnail_media_4_use="";
		$thumbnail_extension_4_use="";
		$light_box_link="";
		if(!empty($media) && $media!="none"){
			if(strcasecmp($media_type,"customize")==0){
				if($media_extension_type=="image"){
					$thumbnail_media_4_use=$media;
					$thumbnail_extension_4_use=$media_extension;
				}//end if image
				else{
					$thumbnail_media_4_use=$screenshot;
					$thumbnail_extension_4_use=$screenshot_extension;
				}
			}// end if customize
			else{
				$thumbnail_media_4_use=$screenshot;
				$thumbnail_extension_4_use=$screenshot_extension;
			}// end else of if customize
			if(strcasecmp($thumbnail,"yes")==0 && (!empty($thumbnail_media_4_use) && $thumbnail_media_4_use!="none")){
				$item='["thumb.php?file='.$path.'/'.$thumbnail_media_4_use.'&amp;sizex='.$twidth.'&amp;sizey='.$theight.'", "'.$where_link_to.'", "", "'.$title_4_use.'"]';
			}//end thumbnail=yes
			else{
				$item='["'.$path.'/'.$thumbnail_media_4_use.'", "", "","'.$title_4_use.'"]';
			} //end else of if thumbnial=yes
		}//if(!empty($media) || $media!="none")
		return $item;
	} //end fun





/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*															END START Build FUNCTION for ARTICLE                                                                    */
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*																START Build FUNCTION for LOCATION                                                                   */
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*+++++ Title Link ++++++++++++++*/	
	function title_location($lang,$location_id,$title_view_type,$title_class,$tolltip_config){
		//$location_id id of location need to show
		//title_view_type could be 0 or 1 or 2
		//$title_class("Link_Class","font_class");
		//$tolltip_config("yes/no","font_class");
				$title=$this->get_translate($lang,"tbllocation","title","l_id",$location_id);
				$title_4_use=trim($this->get_info($title,$title_view_type,"no"));
				$title_full=trim($this->get_info($title,1,"no"));
				//end create title
				
				// creat Tooltip
				$tool_tip="";
				if(strcasecmp($tolltip_config[0],"yes")==0){
					if($title_view_type==0 && count(explode("---",$title))>1){
						if(strcasecmp($title_full,$title_4_use)==0)
							$tool_tip="";
						else $tool_tip="title='cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<font class=\"$tolltip_config[1]\">$title_full</font>]'";
					}
				}
				//end create Tooltip
				if(!empty($tool_tip))
					return "<span class='$title_class[0]'><a href='javascript:' $tool_tip><font class='$title_class[1]'>$title_4_use</font></a></span>";
				else
					return "<font class='$title_class[1]'>$title_4_use</font>";
	}// end function

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*																END Build FUNCTION for LOCATION                                                                     */
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*+++++++ Counter Format*/
	function counter_format($source,$num){
			$zero_len=$num-strlen($source);
			for($i=1;$i<=$zero_len;$i++){
				$zero.="<img src='bgimgs/num0.gif' />";
			}//end file
			for($j=0;$j<strlen($source);$j++){
				$number.="<img src='bgimgs/num".substr($source,$j,1).".gif' />";			
			}
			return $zero.$number;
	}//end function
	 function format_number_leng($leng,$num){

       $fn=sprintf("%0".$leng."d",$num);

       return $fn;

    }
		function total_visitor(){

    $total_visitor=mysql_query("select * from tbl_dialy_visitor");

    if(mysql_num_rows($total_visitor)>0){

        while($row=mysql_fetch_array($total_visitor)){

            $total_v=$total_v+$row['v_count'];

        }

        return $total_v;

    }

}
/*++++++ PAGINATION ++++++++++++++++++++++++*/	
	function pagination($total_record,$perpage,$current,$hidden,$targetpage,$cssstyle){
		if($total_record<=$perpage){return "";}
		if ($current == 0){$current = 1;}
		$rowrun=1;
		if(empty($current) || $current=='' || $current=='1') $startnum=0;
		else $startnum=$perpage*((int)$current-1);
		$startnum+=1;
		
		$prev = $current - 1;	
		$next = $current + 1;							
		$lastpage = ceil($total_record/$perpage);		
		$LastPagem1 = $lastpage - 1;					
		$paginate .= "<div class='".$cssstyle."'>";
		/*combo perpage
			//7777777777777 create target
			$pp_link=$this->catch_url($targetpage,"&perpage=","perpage");
			//777777777777 end create target
			
			
			$paginate .= "Diplay #";
			$paginate .='<select name="num_display" class="en label_en" onchange="setPerpage(\''.$pp_link.'\','.$startnum.',this.value,\''.$total_record.'\')">';
			$paginate .=$this->combo_select(6,10,15,25,30,50,100,"all",$perpage);
			$paginate .="</select>&nbsp;&nbsp;&nbsp;";
			//end combo */
			
		if($lastpage > 1){	

			// Previous
			if ($current > 1){
				$paginate.= "<a href='$targetpage&amp;paginate=$prev'>prev</a>";
			}else{$paginate.= "<span class='disabled'>prev</span>";	}
			// Pages	
			if ($lastpage < 7 + ($hidden * 2)){	// Not enough pages to breaking it up
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $current){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage&amp;paginate=$counter'>$counter</a>";}					
				}
			}
			elseif($lastpage > 5 + ($hidden * 2))	// Enough pages to hide a few?
				{
					// Beginning only hide later pages
					if($current < 1 + ($hidden * 2))		
					{
						for ($counter = 1; $counter < 4 + ($hidden * 2); $counter++)
						{
							if ($counter == $current){
								$paginate.= "<span class='current'>$counter</span>";
							}else{
								$paginate.= "<a href='$targetpage&amp;paginate=$counter'>$counter</a>";}					
						}
						$paginate.= "...";
						$paginate.= "<a href='$targetpage&amp;paginate=$LastPagem1'>$LastPagem1</a>";
						$paginate.= "<a href='$targetpage&amp;paginate=$lastpage'>$lastpage</a>";		
					}
			// Middle hide some front and some back
			elseif($lastpage - ($hidden * 2) > $current && $current > ($hidden * 2))
			{
				$paginate.= "<a href='$targetpage&amp;paginate=1'>1</a>";
				$paginate.= "<a href='$targetpage&amp;paginate=2'>2</a>";
				$paginate.= "...";
				for ($counter = $current - $hidden; $counter <= $current + $hidden; $counter++)
				{
					if ($counter == $current){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage&amp;paginate=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage&amp;paginate=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage&amp;paginate=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage&amp;paginate=1'>1</a>";
				$paginate.= "<a href='$targetpage&amp;paginate=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($hidden * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $current){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage&amp;paginate=$counter'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($current < $counter - 1){ 
			$paginate.= "<a href='$targetpage&amp;paginate=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
			
		}
		$paginate.= "</div>";	
				 return $paginate;
	}//end FUN
	
	/*===========================Document Function===============================*/
	function latest_doc($lang,$sql,$container_class,$title_config,$tooltip_config,$author_config,$publish_config,$image_config,$readmore_config,$date_config,$download_config,$user_session){
		
		//$sql="select * from tbldocument where ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
		$sql="select * from tbldocument as t1 inner join tbltranslate as t2 on t1.d_id=t2.id_ref where ".$sql[0]." ORDER BY ".$sql[1]." ".$sql[2];
		
		//echo $sql;
		
		$result=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$rowrun=1;
			while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				
				$doc_id=$row["d_id"];
				$c_id=$row['c_id'];
				//echo $doc_id;
				$title=$this->get_translate($lang,"tbldocument","title","d_id",$doc_id);
				$file_download=$this->get_translate($lang,"tbldocument","file_name","d_id",$doc_id);
				$sreenshot=$row["screenshot"];
				$description=$this->get_translate($lang,"tbldocument","description","d_id",$doc_id);
				$author=$this->get_translate($lang,"tbldocument","author","d_id",$doc_id);
				$publisher=$this->get_translate($lang,"tbldocument","publisher","d_id",$doc_id);
				$print_year=stripcslashes($row["print_year"]);
				$add_date=date("D, d M Y H:i:s O",strtotime($row["add_date"]));
				$doc_permision=$row['pm_id'];
				
				//creat description
				$description_4_use="";
					$description_4_use=strip_tags(trim($this->get_info($description,0,$email_to_image)),$this->allow_tag);
					//modify a path of Image/Flash in TextEditor
						$find_folder=stripos($this->get_info_from_url(),$this->project_folder);
						if(is_int($find_folder) && $find_folder>-1){
							$description_4_use=$description_4_use;
						}
						else{
							$description_4_use=str_ireplace("/".$this->project_folder."/","/",$description_4_use);
						}
					//end of modify a path of Image/Flash in TextEditor
				
				//end create description





				//create date
				if(strcasecmp($date_config[0],"yes")==0){
					$date_conf=date("D, d M Y ",strtotime($row["add_date"]));
					$view_date="";
					$view_date.=!empty($date_config[1])?"<div class='".$date_config[1]."'>":"";
					$view_date.="<font class='$date_config[2]'>$date_conf</font>";
					$view_date.=!empty($date_config[1])?"</div><br>":"";
				}
				
				//create autor show
				if(strcasecmp($author_config[0],"yes")==0){
					$view_author="";
					$view_author.=!empty($author_config[1])?"<div class='".$author_config[1]."'>":"";
					$view_author.="<font class='$author_config[4]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$author_config[3])."</font><font class='$author_config[2]'>".$author."</font>";
					$view_author.=!empty($author_config[1])?"</div><br>":"";
				}
				//publisher
				if(strcasecmp($publish_config[0],"yes")==0){
					$view_publisher="";
					$view_publisher.=!empty($publish_config[1])?"<div class='".$publish_config[1]."'>":"";
					$view_publisher.="<font class='$publish_config[4]'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$publish_config[3])."</font><font class='$author_config[2]'>".$publisher."</font>";
					$view_publisher.=!empty($publish_config[1])?"</div><br>":"";
				}
				
				//create downlaod
				if(strcasecmp($download_config[0],"yes")==0){
					$view_download="";
					$part_doc=$this->encrypt("items/","abc");
					$view_download.=!empty($download_config[1])?"<div class='".$download_config[1]."'>":"";
					
							
							$view_download.="<span class='$download_config[2]'>ft<font class='$download_config[4]'><a href='download.php?file=".$this->encrypt($doc_id,"abc")."&amp;field_name=".$this->encrypt($file_download,"abc")."&amp;place=".$part_doc."'>".$this->get_translate($lang,"tblarticle","title","a_id",(int)$download_config[3])."</a></font></span>";
							//$view_download.="<a href='download.php?file=".$this->encrypt($doc_id,"abc")."&amp;field_name=".$this->encrypt($file_download,"abc")."&amp;place=".$part_doc."'>ddd</a>";
							$where_link_to="href='download.php?file=".$this->encrypt($doc_id,"abc")."&amp;field_name=".$this->encrypt($file_download,"abc")."&amp;place=".$part_doc."'";
							//member_download($file_id,$file_name,$parth);
						//}
					
					//}
					$view_download.=!empty($download_config[1])?"</div>":"";
				}
				
				
				
				
				//createtitle
				$title_4_use=trim($this->get_info($title,0,"no"));
				$title_full=trim($this->get_info($title,2,"no"));
				

				// creat Tooltip
				$tool_tip="";
				
				if(strcasecmp($tooltip_config[0],"yes")==0){
					$tool_tip="title='$title_full'";
				}
				if($row['tag']=="yes"){
					$title_download=$this->get_translate($lang,"tblarticle","title","a_id",246);
					}else{$title_download="";}
								
				//$insite_tilte="<div style='float:left; width:20px; height:10px; margin-top:4px; background:url(bgimgs/document_symbol.png) no-repeat left;'></div><div class='".$title_config[4]." ".$tooltip_config[2]." ".$title_config[3]."'><a href='?page=doc_view&dc_id=$doc_id&c_id=$c_id&lg=$lang' $tool_tip>".$title."</a></div>";//for view document
				$insite_tilte="<div style='float:left; width:10px; height:10px; margin-top:4px; background:url(bgimgs/symbol_readmore.png) no-repeat left;'></div><div class='".$title_config[4]." ".$tooltip_config[2]." ".$title_config[3]."'>".$title."</div>";
				//$view_or_download="<a style='color:#0600ff; text-decoration:underline;' ".$where_link_to."><font class='size12_$lang'>".$this->get_translate($lang,"tblarticle","title","a_id",247)."</font></a><font class='size12_$lang'> </font><a style='color:#0600ff; text-decoration:underline;' ".$where_link_to."><font class='size12_$lang'>".$this->get_translate($lang,"tblarticle","title","a_id",246)."<img src='bgimgs/".$icon."' width='31' height='33' align='left' style='float:left; margin:4px 10px 10px 0px;'></font></a>";
				$view_or_download="<div class='".$download_config[1]." ".$download_config[2]." ".$download_config[4]."'><a style='float:left;' ".$where_link_to."><font class='$lang size10_$lang'>".$title_download."</font></a><img src='items/screenshot/".$sreenshot."' width='22' height='24' style='float:right; margin-left:6px;'></div>";
				//end create title
				
				

				
				
				
			$rowrun++;
			//$return_value.=!empty($container_class[0])?"<div class='".$container_class[0].$last."'><img src='bgimgs/_blank.gif'></img></div>":"";
			$return_value.=!empty($container_class[1])?"<div class='".$container_class[1]."'>":"";	
			//$return_value.=$top_title;
			$return_value.=!empty($container_class[2])?"<div class='".$container_class[2]."'>":"";
			
			//$return_value.=$image;
			//$return_value.=!empty($container_class[3])?"<div class='".$container_class[3].$last."'>":"";
			//$return_value.=$view_date;
			$return_value.=$insite_tilte;
			//$return_value.=$view_date;
			$return_value.=$view_or_download;
			
			//$return_value.=$view_date;
			//$return_value.=$view_author;
			//$return_value.=$view_publisher;
			//$return_value.="<font class='$container_class[5]'>$description_4_use</font>";
			
			//$return_value.=$read_more;
			//$return_value.=!empty($container_class[3])?"</div>":"";
			//$return_value.=$view_download;
			$return_value.=!empty($container_class[2])?"</div>":"";
			$return_value.=!empty($container_class[1])?"</div>":"";
			}//end while
		}//end if has record
		return $return_value;	
			
	}//end function


	/*----------Cate gory and subcategory menu for ddmenu-v--------------*/	
	function category_menu($lang,$sql,$icon_confi){
	$sql="SELECT * from tblcategory where ".$sql[0]." ORDER BY ".$sql[1]."";
			$result=mysql_query($sql)or die(mysql_error());
			if(mysql_num_rows($result)>0){	
				$level_id=1;
				$media_extension="";
				$media_extension_type="";
				while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				
				$c_id=$row['c_id'];
				$icon=$row['_icon'];
				$media_extension=$this->get_extension($icon);
				$media_extension_type=$this->media_extension[strtolower($media_extension)];
				//function view_media($type,$path,$filename,$thumb,$w,$h,$style,$class){	
				$icon_img=$this->view_media($media_extension,"items/caticon/",$icon,false,24,29,$icon_confi[1],"");
				$title="<font class='".$lang." size12_".$lang."'>".$this->get_translate($lang,"tblcategory","title","c_id",$c_id)."</font>";
				//$title=$this->get_translate($lang,"tblcategory","title","c_id",$c_id);
				//formake link. exam ?page=&menu1=1 and sub menu will continue with this text
				$level_txt="&amp;cat$level_id=".$row['c_id'];
				//make current 
					if($_REQUEST['cat'.$level_id]==$row['c_id']) $class_current="class='current'"; else $class_current="";
				//end make current
				
				
				$show_icon="<span class='icon'>".$icon_img."</span>";
				/*create link to type*/
					$link_txt="<a $class_current href='?page=document".$level_txt."&amp;fsearch=c_id&amp;vsearch=".$row['c_id']."&amp;lg=".$lang."'>".$show_icon.$title."</a>";
				/*end link to*/
				

				echo "<ul>";
				echo "<li>".$link_txt;
				echo $this->category_submenu($lang,$row['c_id'],$level_id,$level_txt,"c_id",$icon_confi[1]);
				echo "</li>";
				echo "</ul>";
				}//end while
				}
			
}//end function menu category
	/*----------Cate gory and subcategory menu for ddmenu-v--------------*/	
	function sub_content_menu($lang,$sql,$icon_confi){
	$sql="SELECT * from tblarticle where ".$sql[0]." ORDER BY ".$sql[1]."";
	//echo $sql;
			$result=mysql_query($sql)or die(mysql_error());
			if(mysql_num_rows($result)>0){	
				$level_id=1;
				$media_extension="";
				$media_extension_type="";
				while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				
				$a_id=$row['a_id'];
				//$main_id=$this->record_dlookup("sub_value","tblarticle","a_id='".$row['a_id']."'");
				//echo $main_id;
				//$icon=$row['_icon'];
				$media_extension=$this->get_extension($icon);
				$media_extension_type=$this->media_extension[strtolower($media_extension)];
				//function view_media($type,$path,$filename,$thumb,$w,$h,$style,$class){	
				//$icon_img=$this->view_media($media_extension,"items/caticon/",$icon,false,24,29,$icon_confi[1],"");
				$title="<font class='".$lang." size13_".$lang." socola bold'>".$this->get_translate($lang,"tblarticle","title","a_id",$a_id)."</font>";
				//$title=$this->get_translate($lang,"tblcategory","title","c_id",$c_id);
				//formake link. exam ?page=&menu1=1 and sub menu will continue with this text
				$level_txt="&menu1=".$this->record_dlookup("sub_value","tblarticle","a_id='".$row['a_id']."'");
				//$level_txt="&level$level_id=".$row['a_id'];
				//make current 
					if($_REQUEST['level'.$level_id]==$row['a_id']) $class_current="class='current'"; else $class_current="";
				//end make current
				
				
				$show_icon="<span class='icon'>".$icon_img."</span>";
				/*create link to type*/
					$link_txt="<a $class_current href='?page=detail".$level_txt."&amp;fsearch=submenu&amp;id=".$row['a_id']."&lg=".$lang."'>".$show_icon.$title."</a>";
				/*end link to*/
				

				echo "<ul>";
				echo "<li>".$link_txt;
				echo $this->category_submenu($lang,$row['a_id'],$level_id,$level_txt,"submenu",$icon_confi[1]);
				echo "</li>";
				echo "</ul>";
				
				
				
				}//end while
			}
				
			
}//end function menu category
	
/*--------------end Cate gory and subcategory menu for ddmenu-v-----------------------*/		

	function category_submenu($lang,$a_id,$level,$level_txt,$field_search,$iconstyle){
		$sql="select * from tblarticle where sub_of='content' and sub_value=$a_id ORDER BY a_id ASC, ordering DESC";
        $subcategory=mysql_query($sql) or die(mysql_error());
        if(mysql_num_rows($subcategory)>0){
			$sublevel_id=$level+1;
			echo "<ul>";
            while($row=mysql_fetch_array($subcategory)){
				$a_id=$row['a_id'];
				
				/*$icon=$row['_icon'];
				$show_icon='';
				$media_extension=$this->get_extension($icon);
				$media_extension_type=$this->media_extension[strtolower($media_extension)];

				$icon_img=$this->view_media($media_extension,"items/caticon/",$icon,false,24,29,$iconstyle,"");
				$show_icon="<span class='icon'>".$icon_img."</span>";
				*/
				
				$title="<font class='".$lang." size13_".$lang."'>".$this->get_translate($lang,"tblarticle","title","a_id",$a_id)."</font>";
				//$title=$this->get_translate($lang,"tblcategory","title","c_id",$c_id);
				//$sublevel_txt=$level_txt."&cat$sublevel_id=".$row['c_id'];
				$main=$this->record_dlookup("sub_value","tblarticle","a_id='".$row['a_id']."'");
				$sublevel_txt="&menu1=".$this->record_dlookup("sub_value","tblarticle","a_id='".$main."'");
				//$sublevel_txt="&menu1$sublevel_id=".$this->record_dlookup("sub_value","tblarticle","a_id='".$row['a_id']."'");
				//make current 
					if($_REQUEST['level'.$sublevel_id]==$row['a_id']) $class_current="class='current'"; else $class_current="";
				//end make current
				
				/*create link to type*/
					$link_txt="<a $class_current href='?page=detail".$sublevel_txt."&amp;fsearch=$field_search&amp;id=".$row['a_id']."&amp;lg=".$lang."'>".$title."</a>";
				/*end link to*/
				
                echo "<li>".$link_txt;
				echo $this->category_submenu($lang,$row['a_id'],$sublevel_id,$sublevel_txt,"a_id",$iconstyle);
				echo "</li>";
            }
			echo "</ul>";
        }
    }//end function category submenu
	
/*--------------end Cate gory and subcategory menu for ddmenu-v-----------------------*/		

/*=============================================IS CATEGORY HAS PARENT=====================================*/
	function Isparent($c_id,$lang){
		$sql="select * from tblcategory where c_id='".$c_id."'";
		$result=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)>0){
			
			$row=mysql_fetch_array($result,MYSQL_ASSOC);
			//$parent=$row['cparent'];
			$a='';
			$return_value='';
			$has_parentid=$this->record_dlookup("cparent","tblcategory","c_id='".$row['c_id']."'");
			if($has_parentid!=0){
				$return_value.=($this->getparent($row['c_id'],$lang));
				$a.=$row['c_id'];//has parent;
				$title.=$this->seperate();
				$title.=$this->get_translate($lang,"tblcategory","title","c_id",$a);
			}else{
				$a.=$row['c_id']; //'no parent';
				$title.=$this->get_translate($lang,"tblcategory","title","c_id",$a);
				
			}
			$return_value.=$title;
			return $return_value;
		}
	}
	
	function getparent($chid_id,$lang){
		$sql="select cparent from tblcategory where c_id='".$chid_id."'";
		$result=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$b='';
			$a='';
			$row=mysql_fetch_array($result,MYSQL_ASSOC);
			$b.=$row['cparent'];
			
			//get parent name
			$return_value='';
			$title=$this->get_translate($lang,"tblcategory","title","c_id",$b);
			
			
			$has_grand=$this->record_dlookup("cparent","tblcategory","c_id='".$row['cparent']."'");
			if($has_grand!=0){
				$a.=$this->getparent($row['cparent'],$lang);
				$a.=$this->seperate();
			}else{
				$a.='';
			}
			
			$return_value.=$a.$title;
			//$return_value.=$a.$b.$title;
			
			return $return_value;
		}
	
	}

	function seperate(){
		return "<img src='bgimgs/seperate.gif' hspace='7' />&nbsp;";
	}

	function order_menu($lang,$caption,$orderby,$current_orderby,$linkto,$mdefault,$method){
		if($orderby==$current_orderby){ //for make current
			if($method=="asc"){
				echo '<span class="order_current"><a href="'.$linkto.'&orderby='.$orderby.'&rmethod=desc">';
				echo "<font class='".$lang." normal_".$lang."'>".$caption."</font>";
				echo "<img src='bgimgs/asc.gif' border='0' align='absmiddle'>";
				echo '</a></span>';
			}//end if method
			else{
				echo '<span class="order_current"><a href="'.$linkto.'&orderby='.$orderby.'&rmethod=asc">';
				echo "<font class='".$lang." normal_".$lang."'>".$caption."</font>";
				echo "<img src='bgimgs/desc.gif' border='0' align='absmiddle'>";
				echo '</a></span>';
			}
		}//end  if $name
		else{
				echo '<span class="order"><a href="'.$linkto.'&orderby='.$orderby.'&rmethod='.$mdefault.'">';
				echo "<font class='".$lang." normal_".$lang."'>".$caption."</font>";
				echo '</a></span>';
		}             
	}//end function


		/*+++++ MAKE SHORT DETAIL ++++++++++++++*/
		function make_sdec($string){
			list($sdec,$fdec)=explode('---',$string);
			return $sdec;
		}//end func
		
		/*+++++ MAKE FULL DETAIL ++++++++++++++*/
		function make_fdec($string){
			list($sdec,$fdec)=explode('---',$string);
			return $sdec.$fdec;
		}

		function siteMap($lang, $table, $sql, $linkstyle, $sub_con, $id_ref) {
		$sql = "SELECT * FROM $table WHERE " . $sql[0] . " ORDER BY " . $sql[1] . " " . $sql[2];
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) > 0) {
		echo "<ul>";
		while ($row = mysql_fetch_array($result)) {
		$id = $row[0];
		$title_menu = $this->get_translate($lang, $table, "title", $id_ref, $id);
		$title=str_replace("<br>",' ',$title_menu);
		
		$linkto_type_value = stripcslashes(stripslashes($row["linkto_type"]));
		$linkto_field_vlaue = stripcslashes(stripslashes($row["link_to"]));
		$where_link_to = $this->where_link_to($lang, $id, $linkto_type_value, $linkto_field_vlaue, "");
		echo "<li><span class='$linkstyle'><a $where_link_to>$title</a></span></li>";
		$this->subSiteMap($lang, $table, "$sub_con=" . $id, $linkstyle, $sub_con, $id_ref);
		}//end while
		echo "</ul>";
		}//end if $row>0
		}
		
		function subSiteMap($lang, $table, $condtion, $linkstyle, $sub_con, $id_ref) {
		$sql = "SELECT * FROM $table WHERE " . $condtion . " and recycle='no' ORDER BY ordering ASC";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) > 0) {
		echo "<ul>";
		while ($row = mysql_fetch_array($result)) {
		$id = $row[0];
		$title = $this->get_translate($lang, $table, "title", $id_ref, $id);
		$linkto_type_value = stripcslashes(stripslashes($row["linkto_type"]));
		$linkto_field_vlaue = stripcslashes(stripslashes($row["link_to"]));
		$where_link_to = $this->where_link_to($lang, $id, $linkto_type_value, $linkto_field_vlaue, "");
		echo "<li><span class='$linkstyle'><a $where_link_to>$title</a></span></li>";
		$this->subSiteMap($lang, $table, "$sub_con=" . $id, $linkstyle, $sub_con, $id_ref);
		}//end while
		echo "</ul>";
		}//end if $row>0
		}
		 
		 
		//Function for Questionaire
		function last_question($lang,$lid){
			$sql="select * from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where FIND_IN_SET('".$lid."', CONCAT(t1.l_id, ',')) and t1.display='yes' and t1.recycle<>'yes' and t2.language_code='".$lang."' and t2.table_ref='tblarticle' and t2.field_ref='description' order by t1.a_id desc limit 0,1";
			$result=mysql_query($sql);
			if(mysql_num_rows($result)>0){
				echo "<form action='ajax_answer.php' method='post' id='frm_answer' name='frm_answer' target='target_answer' enctype='multipart/form-data'>";
				if($row=mysql_fetch_array($result)){
					$media_question=$row['media'];
					$question=stripcslashes(stripcslashes($row['translate']));
					echo "<input type='hidden' name='a_id' value='".$row['a_id']."' />";
						echo "<div style='float:left; width:628px; height:585px; background:url(thumb.php?file=imgs/".$row['a_id']."/".$media_question."&sizex=628&sizey=585) center no-repeat;'>";//image background
							echo "<div class='$lang size16_$lang' style='float:left; width:370px; text-align:center; line-height:26px; color:#3a3a3a; margin:54px 0px 0px 194px;'>".$question."</div>";//question
							echo "<div style='float:left; width:350px; text-align:left; line-height:30px; color:#3a3a3a; margin:126px 0px 0px 240px;'>";//list checkbox
							$sql_answer="select * from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where sub_value='".$row['a_id']."' and t1.display='yes' and t1.recycle<>'yes' and t2.language_code='".$lang."' and t2.table_ref='tblarticle' and t2.field_ref='title' order by t1.a_id desc";
							$result_answer=mysql_query($sql_answer);
							if(mysql_num_rows($result_answer)>0){
								while($row_answer=mysql_fetch_array($result_answer)){
									echo "<div class='$lang size16_$lang' style='float:left; width:150px;'><input type='checkbox' name='answer[]' value='".$row_answer['a_id']."' />". stripcslashes(stripcslashes($row_answer['translate']))."</div>";
								}
							}
							echo "</div>";
							echo "<div class='$lang size15_$lang' style='float:left; text-align:left; color:#ff7e00; line-height:26px; width:300px; margin:60px 0px 0px 258px;'>".$this->get_translate($lang,"tblarticle","title","a_id",414)."</div>";
							echo "<div class='$lang size15_$lang' style='float:left; text-align:left;  width:300px; margin:20px 0px 0px 258px;'>
								  <input style='float:left; width:84px; height:26px; line-height:26px; color:#fff; background:url(bgimgs/bg_submit.png) no-repeat; border:none; cursor:pointer;' type='button' value='".$this->get_translate($lang,"tblarticle","title","a_id",309)."' onclick=\"document.forms['frm_answer'].submit()\" />
								  </div>";
							echo "<div class='$lang size15_$lang' style='float:left; text-align:left; position:absolute; width:628px; line-height:26px; height:26px; margin:545px 0px 0px 0px;'>
								 <span class='$lang size18_$lang white' style='float:left; margin-left:24px; line-height:10px;'>***</span>
								 <span class='$lang size14_$lang white' style='float:left; width:604px; margin-left:24px; line-height:26px;'>".$this->get_translate($lang,"tblarticle","description","a_id",414)."</span>
								 </div>";
							echo "<iframe id='target_answer' name='target_answer' style='display:none'></iframe>";
						echo "</div>";//end image background
				}
				echo "</form>";
			}
		}
		
	
		//Function for Test your knowledge
		function test_question($lang,$lid){
			$sql="select * from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where FIND_IN_SET('".$lid."', CONCAT(t1.l_id, ',')) and t1.display='yes' and t1.recycle<>'yes' and t2.language_code='".$lang."' and t2.table_ref='tblarticle' and t2.field_ref='description' order by t1.a_id desc";
			$result=mysql_query($sql);
			if(mysql_num_rows($result)>0){
				echo "<form action='ajax_answer_multi.php' method='post' id='frm_answer' name='frm_answer' target='target_answer' enctype='multipart/form-data'>";
				$num_record=mysql_num_rows($result);
				$num=1;
				while($row=mysql_fetch_array($result)){
					$media_question=$row['media'];
					$question=stripcslashes(stripcslashes($row['translate']));
								
						$question_id=$row['a_id'];
						//echo $question_id.",";
						echo "<input type='hidden' name='a_id' value='".$question_id."' />";
			
					//$question_article_id=explode(",",$question_id);
					//echo $a_id_array=$question_id.",";
					//echo substr($question_id,0,-1);
					
							
							echo "<div class='$lang size14_$lang' style='float:left; width:628px; text-align:left; line-height:22px; color:#3a3a3a; margin:10px 0px 0px 0px;'>".$num."&nbsp;.&nbsp;".$question."</div>";//question
							
							
							echo "<div style='float:left; width:618px; text-align:left; line-height:30px; color:#3a3a3a; margin:0px 0px 0px 10px;'>";//list checkbox
							$sql_answer="select * from tblarticle as t1 inner join tbltranslate as t2 on t1.a_id=t2.id_ref where sub_value='".$row['a_id']."' and t1.display='yes' and t1.recycle<>'yes' and t2.language_code='".$lang."' and t2.table_ref='tblarticle' and t2.field_ref='title' order by t1.a_id desc";
							$result_answer=mysql_query($sql_answer);
							if(mysql_num_rows($result_answer)>0){
								//echo "<input type='checkbox' checked='checked' name='question_".$question_id."[]' value='".$question_id."' style='display:none;' />";
								
								//echo "<input type='hidden' name='a_id' value='".$row['a_id']."' />";
								echo "<div class='$lang size14_$lang dark_blue' style='float:left; text-align:left; width:590px; padding-left:28px; line-height:20px; height:20px; background:url(bgimgs/tich_icon.png) no-repeat left center;'>".$this->get_translate($lang,"tblarticle","title","a_id",178)."&nbsp;:</div>";
								while($row_answer=mysql_fetch_array($result_answer)){
									echo "<div class='$lang size14_$lang' style='float:left; width:150px; line-height:20px;'><input type='checkbox' name='answer[]' value='".$row_answer['a_id']."' />". stripcslashes(stripcslashes($row_answer['translate']))."</div>";
								}
							}
							echo "</div>";//End list checkbox
				$num=$num+1;								
				}//end if whiile
				
							echo "<div class='$lang size15_$lang' style='float:left; text-align:left; color:#ff7e00; line-height:26px; width:628px; margin:0px 0px 10px 0px;'>".$this->get_translate($lang,"tblarticle","title","a_id",414)."</div>";
							//echo '<div class="btn_save"><a href="javascript:" onclick=\"document.forms[frm_answer].submit()\">'.$this->get_translate($lang,"tblarticle","title","a_id",309).'</a></div>';
							echo "<div class='$lang size15_$lang' style='float:left; text-align:left;  width:628px; margin:0px 0px 0px 0px;'>
								  <input style='float:left; width:84px; height:26px; line-height:26px; color:#fff; background:url(bgimgs/bg_submit.png) no-repeat; border:none; cursor:pointer;' type='button' value='".$this->get_translate($lang,"tblarticle","title","a_id",309)."' onclick=\"document.forms['frm_answer'].submit()\" />
								  </div>";
							echo "<iframe id='target_answer' name='target_answer' style='display:none'></iframe>";
				echo "</form>";
			}//end if num row>0
		}
		
	
	
	
	
/*end class */
}/*end class*/
/*end calss*/
?>