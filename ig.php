<?php
if($_GET['mid']){
$api = file_get_contents("http://api.instagram.com/oembed?url=".$_GET['mid']);  
$apiObj = json_decode($api,true);      
$media_id = $apiObj['media_id'];
echo $media_id;
}
?>
