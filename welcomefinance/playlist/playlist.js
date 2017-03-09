				function generatePlaylist(lang,controller){
					var num_list=$("#playlist").children().length;
					var first_track_id=$("#playlist :first-child").attr('media_id');
					var first_track=$("#playlist :first-child").attr('track');
					var first_screenshot=$("#playlist :first-child").attr('screenshot');
					var current_track=0;
					var next_track_id=0;
					var next_track="";
					var next_screenshot="";
					var shuffle_status=0;
					var do_shuffle=false;
					jwplayer_view('470','20','angkorPlayer',first_track,'playlist/materialImage66.gif');
					$('#playlist #1').attr('class', 'current_play');
					$('#playlist').append("<input id='currentPlay' type='hidden' value='1'/>");
					$('#playlist').append("<input id='totallist' type='hidden' value='"+num_list+"'/>");
					
					
					//jwplayer('angkorPlayer').onError(
							//jwplayer_view('650','355','angkorPlayer','items/Ankorsong-songha-doch-knea.mp3','imgs/CD-background.jpg')
							//function(event) {
						 //function() { alert('aaaa') }
							//}
					//);
						 
					jwplayer('angkorPlayer').onComplete(
						
						 function(event) {
							 current_track=$('#playlist #currentPlay').val();
							 shuffle_status=parseInt($('#shuffle').attr('status'));
							 if(current_track!=num_list) $('#playlist #'+current_track).attr('class', 'record_list');
							 else $('#playlist #'+current_track).attr('class', 'record_list_last');
							 
							 if($('#repeat').attr('status')=='1'){
								  current_track=parseInt(current_track);
								  //alert('bb');
							 }
							 else if(shuffle_status==1){ 
								 current_track=shuffle(1,parseInt(num_list),parseInt(current_track));
								 do_shuffle=true;
							}else{
								 current_track=parseInt(current_track)+1;
								 if(current_track>num_list)current_track=1;
							}
							 //appy class
							 if(current_track!=num_list) $('#playlist #'+current_track).attr('class', 'current_play');
							 else $('#playlist #'+current_track).attr('class', 'current_play_last');
							 //end apply class
							 
							 $('#playlist #currentPlay').val(current_track);
							 next_track_id=$("#playlist #"+current_track).attr('media_id');
							 next_track=$("#playlist #"+current_track).attr('track');
							 next_screenshot=$("#playlist #"+current_track).attr('screenshot');
							 
							jwplayer('angkorPlayer').load({file:next_track, image:next_screenshot});
							if(do_shuffle==false)jwplayer('angkorPlayer').load({file:next_track, image:next_screenshot});
							
							getPlayingInfo('playing_info',lang,next_track_id,controller,rating,'playlist/ajax_get_playing.php');
							getDedicationInfo(lang,next_track_id,true);
						 }
					);
				}//end function
				
				
				
				function playMedia(lang,current_track,mediaIndex,mediaID,controller){	
				    if(current_track==mediaIndex)return;
					$('#playlist #'+current_track).attr('class', 'record_list');
					$('#playlist #currentPlay').val(mediaIndex);
					//apply class
					var current_class=$('#'+mediaIndex).attr('class');
					if(current_class=="current_play_over" || current_class=="current_play") $('#playlist #'+mediaIndex).attr('class', 'current_play');
					else $('#playlist #'+mediaIndex).attr('class', 'current_play_last');
					
					//end applay class
					
					next_track=$("#playlist #"+mediaIndex).attr('track');
					next_screenshot=$("#playlist #"+mediaIndex).attr('screenshot');
					jwplayer('angkorPlayer').load({file:next_track, image:next_screenshot});
					
					
				}
				
				function playlistOver(listID){
					var current_class=$('#'+listID).attr('class');
					if (current_class=='record_list') $('#'+listID).attr('class','current_play_over');
					else if(current_class=='current_play')  return;
					else if(current_class=='record_list_last')$('#'+listID).attr('class','current_play_last_over');
					else return;
				}
				
				function playlistOut(listID){
					var current_class=$('#'+listID).attr('class');
					if (current_class=='current_play_over') $('#'+listID).attr('class','record_list');
					else if(current_class=='current_play')  return;
					else if(current_class=='current_play_last_over')$('#'+listID).attr('class','record_list_last');
					else return;
				}//end fun
				
				