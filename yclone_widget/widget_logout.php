<style>.yclone_widget_home_menu{    font-size:12px;    color:#222;    cursor:pointer;    padding:5px;}.yclone_widget_home_menu:hover{    background:#484848;    color:white;}.ylcone_menu_headding_h1{    color: #cc181e;	text-decoration: none;	font-family: calibri;	font-size: 13px;	font-weight: bold;	padding-bottom: 10px;	cursor:pointer;}</style><div style="width:200px; font-family: arial,sans-serif;"><div id="yclone_logo_part" style="border-bottom:1px solid #B0B0B0;"><div style="float:left; width:150px; height:50px; text-align:center;" onclick="location.href='<?php echo $yclone_yrl;?>'"><img src="<?php echo $yclone_logo_url;?>" style="height:100%;"/></div><div style="float:right; margin-top:15px; cursor:pointer; padding:5px 10px;" id="yclone_widget_shower"><img src="<?php echo $widget_folder_path;?>menu_playlist.png" style="width:25px; height:15px;"/></div><div style="clear:both;"></div></div><div id="yclone_widget_open_menu"><div id="yclone_menu1_part" style="border-bottom:1px solid #B0B0B0; padding:10px;"><div class="yclone_widget_home_menu" onclick="location.href='<?php echo $yclone_yrl;?>'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>whattowatch.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">What to Watch</div><div style="clear:both;"></div></div></div><div id="yclone_playlist_part" style="border-bottom:1px solid #B0B0B0; padding:10px;"><div class="ylcone_menu_headding_h1">BEST OF <?php echo $get_settings->hdw_sitename;?></div><div class="yclone_widget_home_menu" onclick="location.href='<?php echo $yclone_yrl.'channel=1';?>'"><div style="float:left;"><img src="<?php echo $widget_folder_path;?>youtube.png" style="width:20px; height:20px;"/></div><div style="float:left; padding:2px 0 0 5px;">Popular on <?php echo $get_settings->hdw_sitename;?></div><div style="clear:both;"></div></div><?php if($get_settings->widget_channel != ""){    $ifpremium =explode(",", $get_settings->widget_channel);    if($ifpremium)    {        for($j=0;$j<count($ifpremium);$j++)         {            $get_channel_info = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $ifpremium[$j]);            if(isset($get_channel_info->channel_id))            {                ?><div class="yclone_widget_home_menu" onclick="location.href='<?php echo $yclone_yrl.'channel='.$ifpremium[$j];?>'"><div style="float:left;"><img src="<?php echo $get_channel_info->channel_icon;?>" style="width:20px; height:20px;"/></div><div style="float:left; padding:2px 0 0 5px;"><?php echo $get_channel_info->channel_name; ?></div><div style="clear:both;"></div></div><?php             }         }    }}?></div><div id="yclone_config_part" style="padding:10px;"><div class="yclone_widget_home_menu" onclick="location.href='<?php echo $yclone_yrl;?>browse_channels'"><div style="float:left; opacity:.5;"><img src="<?php echo $widget_folder_path;?>browsechannel.png" style="width:15px; height:15px;"/></div><div style="float:left; padding:0px 0 0 5px;">Browse channels</div><div style="clear:both;"></div></div></div></div></div>