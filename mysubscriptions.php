<style>.subsc_page {	background-color: #ffffff;	padding: 10px;	border: 1px solid #B8B8B8;}.watch_later_property1{    margin: 0px 2px 2px 0px;    border-radius: 3px;    right: 0;    bottom: 0;    height:15px;    position: absolute;    padding: 3px;    border: 1px solid #333;    background: rgba(255, 255, 255, 0.5);    cursor:pointer;}.channel_name_sub{    color: #555;     font-weight: bold;     font-size: 12px;    cursor:pointer;}.channel_name_sub:hover{    text-decoration:underline;    color:#1b7fcc;}.cls_manage_subscr{       font-size: 12px;     font-weight: bold;    cursor:pointer;}.cls_manage_subscr:hover{    text-decoration:underline;    color:#1b7fcc;}.video_title_subscr{    color: #2793e6;     font-weight: bold;     font-size: 14px;    cursor:pointer;}.video_title_subscr:hover{    text-decoration:underline;    color:#1b7fcc;s}.recomd_channel_title1{    color: #333;     font-weight: bold;     font-size: 12px;     cursor:pointer;}.recomd_channel_title1:hover{    color:#2793e6; }.subscribtion_channel_btn{  display:inline-block;  border: 1px solid #999;  cursor: pointer;  border-radius: 2px;  padding: 0px 5px 0px 5px;  background-color: rgb(245, 245, 245);  font-size: 11px;  }@media screen and (max-width: 850px) {.subsc_page, .subsc_list{	clear: left;	width: calc(100% - 30px) !important;}}@media screen and (max-width: 480px) {	#my_sub_v_det{	width : 100% !important;	}}</style><script>$hdwt(document).ready(function (){	$hdwt('.subscr_video_class').mouseover(function(){		var getid = (this.id).split('vp_')[1];		$hdwt('#wv_'+getid).show();		  	}).mouseout(function(){		var getid = (this.id).split('vp_')[1];		$hdwt('#wv_'+getid).hide();	});		$hdwt('.watch_later_property1').click(function(){		var getid = (this.id).split('wv_')[1]; 	    $hdwt.post(location.href,{watchlater:getid}, function( data ) 	    {		    location.reload();		    	    });			    return false;	    	});	$hdwt('.subscribtion_channel_btn').click(function(){		var get_channelname = (this.id).split('yv_')[1]; 		var get_videoid     = (this.id).split('_yv_')[0];		$hdwt.post(location.href,{subscribechannel:get_videoid,subsc_channel_name:get_channelname}, function( data ) 	    {		   location.reload();				    		});			});	});</script><?php require_once 'search.php';$mysubscrptions .=$topmenu;$get_noofsubscr = $wpdb->get_results($wpdb->prepare("SELECT * FROM $subscribtion_table_name WHERE channel_id=%d",$_SESSION['your_current_channel']));$mysubscrptions .= '<div id="my_subscriptons_page" style="font-family: calibri; background: #D8D8D8; padding: 15px;">';$mysubscrptions .= '<div class="subsc_page" style="float: left; width: 70%;">';$mysubscrptions .= '<div style="border-bottom: 1px solid #B0B0B0;">';$mysubscrptions .= '<div style="float: left; cursor:pointer; font-size: 13px; border-bottom: 3px solid red; color: #333;"><b>Uploads Only</b></div>';$mysubscrptions .= '<div style="float: right;" class="cls_manage_subscr" onclick="location.href=\''.$pluginurl.'subscription_manager='.$_SESSION['your_current_channel'].'\'">Manage '.count($get_noofsubscr).' Subscription</div>';$mysubscrptions .= '<div style="clear: both;"></div></div>';$mysubscrptions .= '<div id="subsc_list" style="padding-top: 10px;">';$get_subscribtions = $wpdb->get_results($wpdb->prepare("SELECT * FROM $video_table_name WHERE channel_id IN (SELECT subsc_channel_id FROM $subscribtion_table_name WHERE channel_id =%d AND user_id=%d)",$_SESSION['your_current_channel'],$current_user->ID));if($get_subscribtions){        for($i=0;$i<count($get_subscribtions);$i++)    {         $get_channel_prof = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$get_subscribtions[$i]->channel_id);                $n = date('Y-m-d H:i:s');        $video_upload_time = date_diff(                date_create($get_subscribtions[$i]->video_upload_time),                date_create($n));                $up_ago = "";        if ($video_upload_time->y > 0) {            $up_ago = $video_upload_time->y . " years ago";        } else        if ($video_upload_time->m > 0) {            $up_ago = $video_upload_time->m . " months ago";        } else        if ($video_upload_time->d > 0) {            $up_ago = $video_upload_time->d . " days ago";        } else        if ($video_upload_time->h > 0) {            $up_ago = $video_upload_time->h . " hours ago";        } else        if ($video_upload_time->m > 0) {            $up_ago = $video_upload_time->m . " mins ago";        } else        if ($video_upload_time->s > 0) {            $up_ago = "Just now";        }                        $mysubscrptions .= '<div style="float: left;"><img src="'.$get_channel_prof->channel_icon.'" style="width: 30px; height: 30px;" /></div>';        $mysubscrptions .= '<div style="margin-left: 10px; float: left; width:90%;">';        $mysubscrptions .= '<div><span class="channel_name_sub">'.$get_channel_prof->channel_name.' </span><span>uploaded a video </span></div>';        $mysubscrptions .= '<div class="subscr_video_class" id="vp_'.$get_subscribtions[$i]->video_id.'" style="margin-top: 10px; position:relative; float: left; cursor:pointer; width:175px; height:80px; background-size: 100% 80px; background-image:url('.$get_subscribtions[$i]->video_thumpnails.');" onclick="location.href=\''.$pluginurl.'v='.$get_subscribtions[$i]->video_id.'\'">';        $check_watclater = $wpdb->get_row($wpdb->prepare("SELECT * FROM $watchlater_table_name WHERE userid=".$current_user->ID." AND channelid=%d AND videoid=%d",$_SESSION['your_current_channel'],$get_subscribtions[$i]->video_id));                if($check_watclater)           {                $mysubscrptions .= '<div class="watch_later_property1" style="display:none;" id="wv_'.$get_subscribtions[$i]->video_id.'" title="Added"><img src="'.$img_folder_path.'right.png" style="width: 15px; height: 15px;" /></div>';        }        else        {            $mysubscrptions .= '<div class="watch_later_property1" style="display:none;" id="wv_'.$get_subscribtions[$i]->video_id.'" title="watch Later"><img src="'.$img_folder_path.'watch_later.png" style="width: 15px; height: 15px;" /></div>';        }                   $mysubscrptions .= '</div>';        $mysubscrptions .= '<div id="my_sub_v_det" style="float: left; padding-top: 5px; padding-left: 10px; width:50%;">';        $mysubscrptions .= '<span class="video_title_subscr" onclick="location.href=\''.$pluginurl.'v='.$get_subscribtions[$i]->video_id.'\'">'.$get_subscribtions[$i]->video_title.'</span><br>';        $mysubscrptions .= '<span style="font-size: 12px; color: #999;">'.$up_ago.'- '.$get_subscribtions[$i]->video_view.' views</span><br>';        $mysubscrptions .= '<span style="font-size: 12px; color: #999;">'.$get_subscribtions[$i]->video_description.'</span></div><div style="clear: both;"></div></div>';        $mysubscrptions .= '<div style="clear: both;"></div>';        $mysubscrptions .= '<hr style="height:1px;border:none; background-color:#E6E6E6;">';    }}else{    $mysubscrptions .= '<div style=" padding:20px;  height:500px;">You haven\'t added any subscriptions yet.</div>';}$mysubscrptions .= '</div></div><div class="subsc_page" style="margin-left: 10px; float: left; width: calc(30% - 54px);"><b>Recommended Channels</b>';$get_tags = $wpdb->get_row($wpdb->prepare("SELECT * FROM $channeltags_table_name WHERE userid=%d AND channelid=%d",$current_user->ID,$_SESSION['your_current_channel']));$all_tags = explode(',', $get_tags->Tags);for($k=1;$k<count($all_tags);$k++){    if($k!=1){        $video_query .= ' OR ';    }    $video_query .= 'video_title LIKE "%'.$all_tags[$k].'%" OR video_tags LIKE "%'.$all_tags[$k].'%" ';}$query ="SELECT channel_id FROM $video_table_name WHERE ".$video_query." AND channel_id NOT IN(SELECT subsc_channel_id FROM $subscribtion_table_name WHERE channel_id =%d) GROUP BY channel_id";$getrecomdchannel = $wpdb->get_results($wpdb->prepare($query,$_SESSION['your_current_channel']));for($i=0;$i<count($getrecomdchannel);$i++){    $get_channel = $wpdb->get_row("SELECT * FROM $channel_table_name WHERE channel_id=".$getrecomdchannel[$i]->channel_id);    $check_t = $wpdb->get_row("SELECT * FROM $subscribtion_table_name WHERE subsc_channel_id=".$getrecomdchannel[$i]->channel_id);                 $mysubscrptions .= '<div style="margin-top:10px;"><div style="float:left; cursor:pointer;"><img src="'.$get_channel->channel_icon.'" style="width: 30px; height: 30px;" /></div>';        $mysubscrptions .= '<div style=" margin-left:10px;float:left;">';        $mysubscrptions .= '<span class="recomd_channel_title1" onclick="location.href=\''.$pluginurl.'channel='.$get_channel->channel_id.'\'">'.$get_channel->channel_name.'</span><br>';        $mysubscrptions .= '<div class="subscribtion_channel_btn" id="'.$get_channel->channel_id.'_yv_'.$get_channel->channel_name.'" title="'.count($count_subscriptions).' subscribers">subscribe</div></div>';        $mysubscrptions .= '<div style="clear: both;"></div></div>';  }$mysubscrptions .= '</div><div style="clear: both"></div></div>';?>