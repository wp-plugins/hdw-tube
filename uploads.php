<style>
<script>
$hdwt(document).ready(function(){
$data           = $wpdb->get_row ( $wpdb->prepare("SELECT * FROM $video_table_name WHERE user_id=%d AND channel_id=%d AND  video_id = %d LIMIT 1",$current_user->ID,$_SESSION ['your_current_channel'] ,$_GET['uploads']));
    $channel_view .= '<option value="'.$get_category[$k]->value.'">'.$get_category[$k]->category.'</option>';
$channel_view .= '</select>';
?>