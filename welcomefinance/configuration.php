<?php
//include_once("index_absolute.php");
//$indexabsolute=new index_absolute;
class configuration{
public $multi_language=array(array("en","English","English:","en_lg.png"), array("kh","Khmer","ខ្មែរ:","kh_lg.png")); //*** store multi-language as Array. The first element is Defualt Language ***//	//public $multi_language=array(array("en","English","English","en.png"),array("th","Thai","ไทย","th.png")); //*** store multi-language as Array. The first element is Defualt Language ***//
	public $dateformat="M-d-Y"; //*** http://php.net/manual/en/function.date.php  ***//
	public $timezone="Asia/Phnom_Penh";   //***   http://php.net/manual/en/timezones.php   ***///
	public $allowable_server=array("localhost","www.greencmf.com","greencmf.com", "welcomeleasing.com.kh","www.welcomeleasing.com.kh", "welcomefinance.com.kh","www.welcomefinance.com.kh", "welcomecapital.com.kh", "www.welcomecapital.com.kh", "welcomebank.com.kh","www.welcomebank.com.kh");
	/*For LOCALHOST Data base's Properties */
	public $local_Hostname="localhost";
	public $local_Username="root";
	public $local_Password="";
	public $local_DB_name="green_db";
	/*For Server Database's Properties*/
    
    public $server_Hostname="localhost";
	public $server_Username="greencmf_finance";
	public $server_Password="Jbk{z)fn1S$*";
	public $server_DB_name="greencmf_db";
	
	
	//*=== ftp account for set folder permission===*// 
    public $ftp_user="angkor_research@layout.servingweb.com";
    public $ftp_pass="angkor-research_pass*&^%13";
    //*=== ftp account for set folder permission===*//
     
     
    /*==== article thumb config ====*/   
	public $document_folder = "../imgs/documents/";
    public $document_folder_front = "imgs/documents/";
    public $thumb_document = array("223x193");
 
    public $article_folder="../imgs/";
	public $article_folder_front="imgs/";
    public $thumb_article=array("326x174","156x90","980x310","228x120","800x600","97x52");
	//Sise of array for use above(1 slide,2 screenshort);
    /*==== article thumb config ====*/
	
	
	/*Generate Object in our CMS*/
	public $object_list=array("Article"=>"article","Gallery"=>"gallery","Site Info"=>"siteinfo","Location"=>"location","My Account"=>"account","Password"=>"password");
	
	public $project_name="Green Microfinance";
	public $project_folder="green";
	public $website_address="http://www.greencmf.com"; //needs http://
	public $backend_titlebar="Green Microfinance";
	
	public $session_admin="mor_seslog";
	public $encrypt_decrypt_key="mor_endcoder";
	public $login_expire=60; // in minute
	
	/*FORM MEMBER*/
	public $session_member="green";
	public $allow_file_upload = "jpg,png,gif,bmp,jpeg,mp3,mp4,flv,avi";
	
	public $session_member_id="canada_seslog_uid";
	public $session_member_username="canada_seslog_member_username";
	public $session_member_session_id="canada_seslog_member_session_id";

	public $encrypt_decrypt_key_member="abc";
	public $member_login_status=false;
	
	public $record_tracking="no"; // yes | no
	public $set_permission="no"; // yes | no
	
	public $media_extension=array("jpg"=>"image","gif"=>"image","png"=>"image","ico"=>"image","swf"=>"flash","flv"=>"flasvideo","mov"=>"quicktime","wmv"=>"wmedia","youtube"=>"youtube","mp3"=>"sound");
	/*for article object*/
	public $article_linkto=array("Customize","http://","https://","mailto:","gallery","article","Location","category");//array("Customize","HTTP","HTTPs","FTP","Email","Gallery","Category");
	public $article_order;
	public $mwidht_default=160;
	public $mheight_default=160;
	public $twidht_default=155;
	public $theight_default=155;
	
	/*for location object*/
	public $location_btn_delete_view="yes"; // Yes-view|No-hide
	public $lock_location_id=36; //all Article within this Location ID Could not Delete and Change Location, set it to Zero (0) to Unlock.
	
	public $record_per_page=15; // how many dose Record view per page? (Back-End)
	public $col_odd="#f7f6f6";
	public $col_event="#ffffff";
	public $col_over="#ffffdd";
	
	public $allow_tag="<a><table><tr><td><th><iframe><img><embed><ul><ol><li><span><b><i><u><font><hr><strike><sub><sup><br>";
	
	public $wrong_server_message='<span style="font-size: 20pt; color: red;">&nbsp;</span></p>
  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 20pt; color: red;">Sorry, Your website is run under no
  permission <br>
  script licensed by <b>SERVING WEB SOLUTION</b></span></p>
  <p class="MsoNormal" style="text-align: center;" align="center"><b><span style="font-size: 20pt; color: red;">[ <a href="http://www.servingweb.com" target="_blank">www.servingweb.com</a>
  ]</span></b></p>

  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 18pt; color: rgb(31, 73, 125);">Please contact Us for further
  information</span></p>
  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 18pt; color: rgb(31, 73, 125);">&nbsp;</span></p>
  <p class="MsoNormal" style="text-align: center;" align="center"><a href="http://servingweb.com/" target="_blank"><span style="font-size: 20pt; color: red; text-decoration: none;"><img src="http://layout.servingweb.com/nopermission.png" alt="Power by Serving WEb Solution" width="420" border="0" height="260"></span></a><span style="font-size: 20pt; color: red;"></span></p>
  <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 20pt; color: red;">&nbsp;</span></p>
  <p class="MsoNormal">&nbsp;</p>';
	
}//end class
?>