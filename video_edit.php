<style>.lable_channel_title{    color:#333;    font-size: 18px;    font-weight: bold;    cursor:pointer;}.lable_channel_title:hover{    color: #1b7fcc;    text-decoration:underline;}.vedit_table_info tr{      border:none !important;      }.vedit_table_info tr td{    color: #666;    font-size: 11px;    font-weight: normal;    border:none !important;     padding:4px 20px !important;}.save_changes_btn{    border-color: #1b7fcc;    background: #1b7fcc;    color: #fff;    display: inline-block;    border: solid 1px transparent;    padding: 5px 10px;    font-weight: bold;    font-size: 11px;    border-radius:2px;    cursor:pointer;}</style><script>
$hdwt(document).ready(function(){    $hdwt('.save_changes_btn').click(function(){        var title       = $hdwt('#edit_video_title').val();        var description = $hdwt('#edit_video_description').val();        var tags        = $hdwt('#edit_video_tags').val();        var privacy     = $hdwt('#edit_video_privacy').val();        var category    = $hdwt('#edit_video_category').val();        var videoid     = '<?php echo $_GET['video_edit'];?>';         var thumb  = $hdwt('#edit_video_thumbnail').val();        $hdwt.post(location.href,{after_upload_video_title:title,after_upload_video_description:description,after_upload_video_tags:tags,after_upload_video_privacy:privacy,after_upload_video_category:category,after_upload_video_id:videoid,after_upload_video_thumb:thumb}, function( data ) {			alert('Video has been updated');		});             });    });</script><?php$get_category   = $wpdb->get_results("SELECT * FROM $category_table_name");$data = $wpdb->get_row ($wpdb->prepare("SELECT * FROM $video_table_name WHERE channel_id=%d AND video_id=%d",$_SESSION['your_current_channel'],$_GET ['video_edit'] ));$data1 = $wpdb->get_row ( "SELECT * FROM $channel_table_name WHERE channel_id=" . $data->channel_id );$data2 = $wpdb->get_results ($wpdb->prepare("SELECT * FORM $comment_table_name WHERE video_id=%d" ,$_GET ['video_edit']));$flashvars = 'baseW=' . $siteurl . '&id=' . encrypt_decrypt ( 'encrypt', 1 );$flashvars .= "&vid=" . $_GET ['video_edit'];if($data){$channel_view .= '<div style="padding:10px; font-family:arial,sans-serif;">';$channel_view .= '<div style="border-bottom: 1px solid #e2e2e2; padding:5px 0;"><div class="lable_channel_title" onclick="location.href=\''.$pluginurl.'v='.$data->video_id.'\'">'.$data->video_title.'</div></div>';$channel_view .= '<div style="padding:5px 0"></div>';$channel_view .= '<div style="float:left; margin-right:10px; width:40%;"><object id="rtmp_live" style="height:200px; width:320px;">';$channel_view .= '<param name="movie"value="' . $player_url . '">';$channel_view .= '<param name="flashvars">';$channel_view .= '<param name="allowFullScreen" value="true">';$channel_view .= '<param name="allowScriptAccess" value="always">';$channel_view .= '<embed src="' . $player_url . '" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="100%" height="100%"></embed>';$channel_view .= '<param name="flashvars" value="' . $flashvars . '"/>';$channel_view .= '</object></div>';$channel_view .= '<div style="float:left; margin-right:10px;"><img src="'.$data->video_thumpnails.'" style="width:150px; height:80px;"/></div>';$channel_view .= '<div style="float:right;">';$get_likes    = $wpdb->get_results("SELECT * FROM $likedislike_table_name WHERE lk_dlk_videoid=".$data->video_id." AND status=1");$get_dislikes = $wpdb->get_results("SELECT * FROM $likedislike_table_name WHERE lk_dlk_videoid=".$data->video_id." AND status=0");$get_comment  = $wpdb->get_results("SELECT * FROM $comment_table_name WHERE video_id=".$data->video_id);$channel_view .= '<div style="color:#666; font-size:9px; font-weight: bold; text-transform: uppercase;">VIDEO INFORMATION</div>';$channel_view .= '<table class="vedit_table_info" style="width:100%;">';$channel_view .= '<tr>    <td>Channel     </td>   <td>'.$data1->channel_name.'</td>   </tr>';$channel_view .= '<tr>    <td>Upload time </td>   <td>'.$data->video_upload_time.'</td>  </tr>';$channel_view .= '<tr>    <td>Views       </td>   <td><img src="'.$img_folder_path.'chart_bar.png" style="width:15px; height:15px;"/>'.$data->video_view.'</td>   </tr>';$channel_view .= '<tr>    <td>Likes       </td>   <td><img src="'.$img_folder_path.'like.png" style="width:15px; height:15px;"/>'.count($get_likes).'</td>   </tr>';$channel_view .= '<tr>    <td>Dislikes    </td>   <td><img src="'.$img_folder_path.'dislike.png" style="width:15px; height:15px;"/>'.count($get_dislikes).'</td>   </tr>';$channel_view .= '<tr>    <td>Comments    </td>   <td><img src="'.$img_folder_path.'comment.png" style="width:15px; height:15px;"/>'.count($get_comment).'</td>   </tr>';$channel_view .= '<tr>    <td>Video URL   </td>   <td><input type="text" style="width:100%;" readonly name="" value="'.$pluginurl.'v='.$data->video_id.'"/>     </td>   </tr>';$channel_view .= '</table>';$channel_view .= '</div><div style="clear:both;"></div>';$channel_view .= '<div style="margin-top:10px; width:100%; border-bottom: 1px solid #e2e2e2;"><div style=" display:inline-block; border-bottom:3px solid #cc181e; color:#333; font-size:11px; font-weight:bold">Basic info</div></div>';$channel_view .= '<div style="padding:10px 0;">';$channel_view .= '<div style="float:left; width:40%;">';$channel_view .= '<div style="margin-bottom:10px;"><input type="text" id="edit_video_title" placeholder="Title:" value="'.$data->video_title.'" style="width:100%;"/></div>';$channel_view .= '<div style="margin-bottom:10px;" ><textarea  placeholder="Description:" id="edit_video_description" style="width:100%; resize:none; height:50px;">'.$data->video_description.'</textarea></div>';$channel_view .= '<div><input type="text" id="edit_video_tags" placeholder="Tags:"  value="'.$data->video_tags.'" style="width:100%;"/></div>';$channel_view .= '</div>';$channel_view .= '<div style=" margin-left:10%; float:left; width:40%;">';$channel_view .= '<div><input type="text" id="edit_video_thumbnail" placeholder="Thumbnail:" value="'.$data->video_thumpnails.'" /></div>';$channel_view .= '<div style="margin-bottom:10px;"><select id="edit_video_privacy" style="width: 50%;">';$channel_view .= '<option id="privacy_0" value="0">Public</option>';$channel_view .= '<option id="privacy_1" value="1">Private</option>';$channel_view .= '</select><script>document.getElementById("privacy_'.$data->video_status.'").selected="selected";</script></div>';$channel_view .= '<div>';$channel_view .= '<select id="edit_video_category" >';for($k = 0 ; $k < count($get_category) ; $k++){    $channel_view .= '<option value="'.$get_category[$k]->value.'" id="'.$get_category[$k]->value.'">'.$get_category[$k]->category.'</option>';}$channel_view .= '</select><script>document.getElementById("'.$data->video_category.'").selected="selected"</script>';$channel_view .= '</div>';$channel_view .= '</div>';$channel_view .= '<div style="clear:both;"></div>';$channel_view .= '</div>';$channel_view .= '<div style="float:right;"><div class="save_changes_btn">Save Changes</div></div><div style="clear:both;"></div>';$channel_view .= '</div>';}else{	$channel_view .= "<script>location.href = '$pluginurl1'</script>";}?>