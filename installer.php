<?php
function hdwtube_db_install(){
	global $wpdb;
	$tablename = $wpdb->prefix."youtube_settings";
	      `hdw_sitename` varchar(500) NOT NULL,
	      `show_uploadbtn` varchar(10) NOT NULL,
          `youtube` varchar(10) DEFAULT NULL,
          `urlvideo` varchar(10) DEFAULT NULL,
          `videoperlist` int(10) DEFAULT NULL,
          `videoperrecommended` int(10) DEFAULT NULL,
          `sh_popularvideo` varchar(20) DEFAULT NULL,
          `sh_recommended` varchar(20) DEFAULT NULL,
          `sh_subscriptionlist` varchar(20) DEFAULT NULL,
          `sh_movies` varchar(20) DEFAULT NULL,
          `sh_music` varchar(20) DEFAULT NULL,
          `sh_sports` varchar(20) DEFAULT NULL,
          `sh_gaming` varchar(20) DEFAULT NULL,
	      `premium_ids` varchar(500) NOT NULL,
	      `widget_channel` varchar(500) NOT NULL,
	      `categoryids` varchar(500) NOT NULL,
          `sh_subscription` varchar(20) DEFAULT NULL,
          `sh_like` varchar(20) DEFAULT NULL,
          `sh_dislike` varchar(20) DEFAULT NULL,
          `sh_menu_about` int(10) DEFAULT NULL,
          `sh_menu_share` int(10) DEFAULT NULL,
          `sh_menu_addto` int(10) DEFAULT NULL,
          `sh_menu_statistics` int(10) DEFAULT NULL,
          `sh_menu_report` int(10) DEFAULT NULL,
          `sh_comments` varchar(20) DEFAULT NULL,
          `noofrelatedvid` int(10) DEFAULT NULL,
          `sh_cmenu_home` int(10) DEFAULT NULL,
          `sh_cmenu_videos` int(10) DEFAULT NULL,
          `sh_cmenu_playlists` int(10) DEFAULT NULL,
          `sh_cmenu_channel` int(10) DEFAULT NULL,
          `sh_cmenu_discussion` int(10) DEFAULT NULL,
          `sh_cmenu_about` int(10) DEFAULT NULL,
          `sh_featuredchannels` varchar(20) DEFAULT NULL,
          `sh_popularchannels` varchar(20) DEFAULT NULL,
          `noofhomemenuvid` int(10) DEFAULT NULL,
          `noofvidmenuvid` int(10) DEFAULT NULL,
          `sh_relateddvid` varchar(20) DEFAULT NULL,	
	$tablename = $wpdb->prefix."youtube_add_channel";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (
         `id` int(11) NOT NULL AUTO_INCREMENT,
         `userid` int(11) NOT NULL,
         `channelid` int(11) NOT NULL,
         `channelname` varchar(100) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_category";
	
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (	
         `id` int(11) NOT NULL AUTO_INCREMENT,	
         `category` varchar(250) NOT NULL,	
         `value` varchar(250) NOT NULL,	        
          PRIMARY KEY (`id`));";	
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_channeltags";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (        
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `Tags` longtext NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_likedplaylist";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (
         `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `lk_playlist` int(11) NOT NULL,
          `date` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_recommended";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (
	      `id` int(11) NOT NULL AUTO_INCREMENT,
          `r_channelid` int(11) NOT NULL,
          `date` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_iconbanner";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (        
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `imageurl` varchar(500) NOT NULL,
          `status` int(11) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_addchannellist";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (	
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `add_channelid` int(11) NOT NULL,
          `channelurl` varchar(100) NOT NULL,
          `channelname` varchar(100) NOT NULL,
          `channelthumb` varchar(100) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_channel_comment";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `user_channel_id` int(11) NOT NULL,
          `message` varchar(500) NOT NULL,
          `channel_icon` varchar(500) NOT NULL,
          `channel_name` varchar(500) NOT NULL,
          `like` int(11) NOT NULL,
          `dislike` int(11) NOT NULL,
          `message_time` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_likevideo";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `lk_dlk_videoid` int(11) NOT NULL,
          `lk_dlk_channelid` int(11) NOT NULL,
          `status` int(11) NOT NULL,
          `currentime` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_playlist";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
         `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `playlistid` int(11) NOT NULL,
          `videoid` int(11) NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	$tablename = $wpdb->prefix."youtube_playlistname";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userid` int(11) NOT NULL,
          `channelid` int(11) NOT NULL,
          `playlistname` varchar(500) NOT NULL,
          `thumbnail` varchar(500) NOT NULL,
          `description` varchar(500) NOT NULL,
          `pdate` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	 
	
	$tablename = $wpdb->prefix."youtube_channel";
	$sql="CREATE TABLE IF NOT EXISTS ". $tablename." (
          `channel_id` int(10) NOT NULL AUTO_INCREMENT,
          `userid` varchar(100) NOT NULL,
          `channel_name` varchar(100) NOT NULL,
          `channel_banner` varchar(150) NOT NULL,
          `channel_icon` varchar(100) NOT NULL,
          `channel_category` varchar(100) NOT NULL,
          `channel_view` int(11) NOT NULL,
          `channel_subscribers` int(10) NOT NULL,
          `Description` varchar(500) NOT NULL,
          `datetime` datetime NOT NULL,
          PRIMARY KEY (`channel_id`));";
	 $wpdb->query($sql);
	
	
	$tablename = $wpdb->prefix."youtube_comments";
	$sql="CREATE TABLE IF NOT EXISTS ".$tablename." (		 
          `id` int(10) NOT NULL AUTO_INCREMENT,
          `video_id` int(10) NOT NULL,
          `user_id` int(10) NOT NULL,
          `channel_id` int(11) NOT NULL,
          `message` varchar(500) NOT NULL,
          `channel_icon` varchar(500) NOT NULL,
          `channel_name` varchar(100) NOT NULL,
          `comments_time` datetime NOT NULL,
          PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	
	$tablename = $wpdb->prefix."youtube_watchlater";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
        	`id` int(11) NOT NULL AUTO_INCREMENT,
            `videoid` int(11) NOT NULL,
            `userid` int(11) NOT NULL,
            `channelid` int(11) NOT NULL,
            PRIMARY KEY (`id`));";
	$wpdb->query($sql);
				
	$tablename = $wpdb->prefix."youtube_video";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			 `video_id` int(10) NOT NULL AUTO_INCREMENT,
              `user_id` int(10) NOT NULL,
              `channel_id` int(10) NOT NULL,
              `video_title` varchar(100) NOT NULL,
              `video_url` varchar(100) NOT NULL,
              `video_type` varchar(100) NOT NULL,
              `video_description` varchar(500) NOT NULL,
              `video_tags` varchar(100) NOT NULL,
              `video_thumpnails` varchar(100) NOT NULL,
              `video_category` varchar(100) NOT NULL,
              `video_like` int(10) NOT NULL,
              `video_dislike` int(10) NOT NULL,
              `video_view` int(10) NOT NULL,
              `video_status` int(10) NOT NULL,
              `video_upload_time` datetime NOT NULL,
              PRIMARY KEY (`video_id`));";
	$wpdb->query($sql);	
	$tablename = $wpdb->prefix."youtube_subscriptions";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			 `id` int(100) NOT NULL AUTO_INCREMENT,
              `user_id` int(100) NOT NULL,
              `channel_id` int(100) NOT NULL,
              `subsc_channel_id` int(50) NOT NULL,
              `subsc_channel_name` varchar(100) NOT NULL,
              `current_time` datetime NOT NULL,
              PRIMARY KEY (`id`));";
	$wpdb->query($sql);	
	$tablename = $wpdb->prefix."youtube_watchhistory";
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(
	        `id` int(11) NOT NULL AUTO_INCREMENT,
            `videoid` int(11) NOT NULL,
            `u_channelid` int(11) NOT NULL,
            `currenttime` datetime NOT NULL,
            PRIMARY KEY (`id`));";
	$wpdb->query($sql);
	$tablename = $wpdb->prefix."youtube_report";
	
	$sql = "CREATE TABLE IF NOT EXISTS ".$tablename."(	
			 `id` int(11) NOT NULL AUTO_INCREMENT,	
              `userid` int(11) NOT NULL,	
              `videoid` int(11) NOT NULL,	
              `reason` varchar(250) NOT NULL,	
              `message` longtext NOT NULL,	
              `date` datetime NOT NULL,	
              PRIMARY KEY (`id`));";	
	$wpdb->query($sql);	
	
	$tablename = $wpdb->prefix."youtube_hdwplayer";
	$sql =  "CREATE TABLE IF NOT EXISTS ".$tablename." (
			  `id` int(5) NOT NULL AUTO_INCREMENT,
			  `width` int(5) NOT NULL,
			  `height` int(5) NOT NULL,
	        
			  `skinmode` varchar(20) NOT NULL,
			  `stretchtype` varchar(20) NOT NULL,
			  `buffertime` int(3) NOT NULL,
			  `volumelevel` int(3) NOT NULL,
			  `autoplay` tinyint(4) NOT NULL,
			  `playlistautoplay` tinyint(4) NOT NULL,
			  `playlistopen` tinyint(4) NOT NULL,
			  `playlistrandom` tinyint(4) NOT NULL,
			  `controlbar` tinyint(4) NOT NULL,
			  `playpause` tinyint(4) NOT NULL,
			  `progressbar` tinyint(4) NOT NULL,
			  `timer` tinyint(4) NOT NULL,
			  `share` tinyint(4) NOT NULL,
			  `volume` tinyint(4) NOT NULL,
			  `fullscreen` tinyint(4) NOT NULL,
			  `playdock` tinyint(4) NOT NULL,
			  `playlist` tinyint(4) NOT NULL,
			  `token` varchar(20) NOT NULL,
			  UNIQUE KEY `id` (`id`));";
	$wpdb->query($sql);
}

function hdwtube_db_install_data() {
	global $wpdb;	
	$widget_folder_path        = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/widget_icon/';
	
	$table_name = $wpdb->prefix."youtube_settings";
	$sql = "INSERT INTO $table_name VALUES ('1', 'HDW Tube', 'yes', 'yes', 'yes', '10', '10', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '2,3,4,5', '2,4,10', 'yes', 'yes', 'yes', '1', '1', '1', '1', '1', 'yes', '10', '1', '1', '1', '1', '1', '1', 'yes', 'yes', '20', '10', 'yes');";
	$wpdb->query($sql);
	$table_name = $wpdb->prefix."youtube_channel";
	$wpdb->insert($table_name, array(
		'channel_id'           => 1,
	    'userid'               => 1,
	    'channel_name'         => 'Popular on HDW Tube',
	    'channel_banner'       => $widget_folder_path.'banner_youtube.png',
	    'channel_icon'         => $widget_folder_path.'youtube.png',
	    'channel_category'     => 'others',
	    'channel_view'         => 0,
	    'channel_subscribers'  => 0,
	    'Description'          => '',
	    'datetime'             => date ( 'Y-m-d H:i:s')      
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 2,
	        'userid'               => 1,
	        'channel_name'         => 'Sports',
	        'channel_banner'       => $widget_folder_path.'banner_sports.png',
	        'channel_icon'         => $widget_folder_path.'sports.png',
	        'channel_category'     => 'Sports',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'Sport is all forms of usually competitive physical activity which, through casual or organised participation, aim to use, maintain or improve physical ability and skills while providing entertainment to participants, and in some cases, spectators. Hundreds of sports exist, from those requiring only ',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 3,
	        'userid'               => 1,
	        'channel_name'         => 'Music',
	        'channel_banner'       => $widget_folder_path.'banner_music.png',
	        'channel_icon'         => $widget_folder_path.'music.png',
	        'channel_category'     => 'Music',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'YouTube\'s music destination featuring top tracks and popular hits from a variety of genres. This channel was generated automatically by YouTube\'s video discovery system ',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 4,
	        'userid'               => 1,
	        'channel_name'         => 'Gaming',
	        'channel_banner'       => $widget_folder_path.'banner_gaming.png',
	        'channel_icon'         => $widget_folder_path.'gaming.png',
	        'channel_category'     => 'Gaming',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'Video game culture is a form of new media culture that has been influenced by video games. As computer and video games have increased exponentially in popularity over time, they have caused a significant influence upon popular culture. This form of entertainment has spawned many fads ',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name, array(
	        'channel_id'           => 5,
	        'userid'               => 1,
	        'channel_name'         => 'Movies',
	        'channel_banner'       => $widget_folder_path.'banner_movie.png',
	        'channel_icon'         => $widget_folder_path.'movies.png',
	        'channel_category'     => 'Movie',
	        'channel_view'         => 0,
	        'channel_subscribers'  => 0,
	        'Description'          => 'Movies',
	        'datetime'             => date ( 'Y-m-d H:i:s')
	));
	
	$table_name = $wpdb->prefix."youtube_add_channel";
	$wpdb->insert($table_name, array(
	        'id'          => 1,
	        'userid'      => 1,
	        'channelid'   => 1,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 2,
	        'userid'      => 1,
	        'channelid'   => 2,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 3,
	        'userid'      => 1,
	        'channelid'   => 3,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 4,
	        'userid'      => 1,
	        'channelid'   => 4,
	        'channelname' =>'Featured Channels'
	));
	
	$wpdb->insert($table_name, array(
	        'id'          => 5,
	        'userid'      => 1,
	        'channelid'   => 5,
	        'channelname' =>'Featured Channels'
	));
	
	$table_name = $wpdb->prefix . "youtube_channeltags";
	$wpdb->insert($table_name,array(
	        'id'          => 1,
	        'userid'      => 1,
	        'channelid'   => 1,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 2,
	        'userid'      => 1,
	        'channelid'   => 2,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 3,
	        'userid'      => 1,
	        'channelid'   => 3,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 4,
	        'userid'      => 1,
	        'channelid'   => 4,
	        'Tags'        =>''
	));
	
	$wpdb->insert($table_name,array(
	        'id'          => 5,
	        'userid'      => 1,
	        'channelid'   => 5,
	        'Tags'        =>''
	));
	
	$table_name = $wpdb->prefix . "youtube_recommended";
	$wpdb->insert($table_name,array(
	        'id'           => 1,
	        'r_channelid'  => 1,
	        'date'         => date ( 'Y-m-d H:i:s')      
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 2,
	        'r_channelid'  => 2,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 3,
	        'r_channelid'  => 3,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 4,
	        'r_channelid'  => 4,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	$wpdb->insert($table_name,array(
	        'id'           => 5,
	        'r_channelid'  => 5,
	        'date'         => date ( 'Y-m-d H:i:s')
	));
	
	
	$table_name = $wpdb->prefix . "youtube_hdwplayer";
	$wpdb->insert($table_name, array(
			'id'               => 1,
			'width'            => 640,
			'height'           => 360,	        
	        'skinmode'         => 'static',
			'stretchtype'      => 'fill',
			'buffertime'       => 3,
			'volumelevel'      => 50,
			'autoplay'         => 1,
			'playlistautoplay' => 1,
			'playlistopen'     => 0,
			'playlistrandom'   => 0,
			'controlbar'       => 1,
			'playpause'        => 1,
			'progressbar'      => 1,
			'timer'            => 1,
			'share'            => 1,
			'volume'           => 1,
			'fullscreen'       => 1,
			'playdock'         => 1,
			'playlist'         => 1,
			'token' 		   => null
	));
	global $current_user;
	
	$table_name = $wpdb->prefix."youtube_category";	
	$wpdb->insert($table_name, array(
	        'id'           => 1,
	        'category'     => 'Film & Animation',
	        'value'        => 'FilmandAnimation'
	));
	
	$wpdb->insert($table_name, array(
	        'id'           => 2,
	        'category'     => 'Gaming',
	        'value'        => 'Gaming'
	));
	
	$wpdb->insert($table_name, array(
	        'id'           => 3,
	        'category'     => 'Howto & Style',
	        'value'        => 'HowtoandStyle'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 4,
	        'category'     => 'Music',
	        'value'        => 'Music'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 5,
	        'category'     => 'News & Politics',
	        'value'        => 'NewsandPolitics'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 6,
	        'category'     => 'Nonprofits & Activism',
	        'value'        => 'NonprofitsandActivism'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 7,
	        'category'     => 'People & Blogs',
	        'value'        => 'PeopleandBlogs'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 8,
	        'category'     => 'Pets & Animals',
	        'value'        => 'PetsandAnimals'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 9,
	        'category'     => 'Science & Technology',
	        'value'        => 'ScienceandTechnology'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 10,
	        'category'     => 'Sports',
	        'value'        => 'Sports'
	));
	$wpdb->insert($table_name, array(
	        'id'           => 11,
	        'category'     => 'Travel & Events',
	        'value'        => 'TravelandEvents'
	));
}

function hdwtube_update_db_check() {
}
?>