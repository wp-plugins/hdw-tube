<style>.btn_create_channel:hover{	color: #fff;	border: 1px solid #1b7fcc;	font-size: 13px;	background: #2764E6;	font-family: calibri;	display: inline-block;	padding: 3px;	border-radius: 2px;	cursor:pointer;	font-weight:bold;}.btn_create_channel{	color: #fff;	border: 1px solid #1b7fcc;	font-weight:bold;	font-size: 13px;	background: #2793e6;	font-family: calibri;	display: inline-block;	padding: 3px;	border-radius: 2px;	cursor:pointer;}.btn_create_channel:active{    position:relative;    top:1px;}.btn_channel_select{    cursor:pointer;}.btn_channel_select:hover{    box-shadow: 0px 0px 1px 1px rgba(41, 36, 36, 0.19);}.btn_channel_select:active{    position:relative;    top:1px;}</style><?php $get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");$all_channel = $wpdb->get_results("SELECT * FROM $channel_table_name WHERE userid=".$current_user->ID);$channel_view .='<div style="font-family: calibri; height:100%; border:1px solid #D8D8D8; background:rgba(0, 0, 0, 0.1);">';$channel_view .='<div style="padding:20px 10px; border-bottom:1px solid #a1a1a1;">';$channel_view .='<div style="float:left; font-weight:bold; color:black; font-size: 20px;">Use '.$get_settings->hdw_sitename.' as...</div>';$channel_view .='<div style="float:right;"   class="btn_create_channel" onclick="location.href=\''.$pluginurl.'new\'" >Create a new channel</div>';$channel_view .='<div style="clear:both;"></div>';$channel_view .='</div>';$channel_view .='<div style="padding:15px 0px;text-decoration: underline; color:black; font-weight:bold; font-size: 18px;">My Channels</div>';$channel_view .='<div style="padding:10px;">';for($j=0;$j<count($all_channel);$j++){    if(filter_var($all_channel[$j]->channel_icon,FILTER_VALIDATE_EMAIL))    {        $channel_list_icon="http://www.gravatar.com/avatar/" . md5(strtolower($all_channel[$j]->channel_icon)) . "?d=" . urlencode($default) . "&s=40";    }    else     {        $channel_list_icon = $all_channel[$j]->channel_icon;    }$number_of_videos = $wpdb->get_results("SELECT * FROM $video_table_name WHERE user_id=".$current_user->ID." AND channel_id=".$all_channel[$j]->channel_id);    $channel_view .='<div class="btn_channel_select" style="margin-bottom:15px; background:white; border:1px solid #c6c6c6; padding:10px; width:250px;" onclick="location.href=\''.$pluginurl.'channel='.$all_channel[$j]->channel_id.'\'">';$channel_view .='<div style="float:left;"><img src="'.$channel_list_icon.'" style="width:48px; height:48px;"/></div>';$channel_view .='<div style="margin-left:10px; float:left"><div style="color: #333; font-weight: bold; font-size:17px;">'.$all_channel[$j]->channel_name.'</div><div style="font-size:11px; color:#999;">'.count($number_of_videos).' videos<br>'.$all_channel[$j]->channel_subscribers.' subscribers</div></div>';$channel_view .='<div style="clear:both;"></div>';$channel_view .='</div>';}$channel_view .='</div></div>';?>