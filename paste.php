<?php
if($_GET['text'] && $_GET['name'] && $_GET['format']){
$api_dev_key 			= '1a2ef041786f342f9ba7e04c990c35c2'; // your api_developer_key
$api_paste_codes 		= $_GET['text']; // your paste text
$api_paste_private 		= '2'; // 0=public 1=unlisted 2=private
$api_paste_names			= $_GET['name']; // name or title of your paste
$api_paste_expire_date 		= 'N';
$api_paste_format 		= $_GET['format'];
$api_user_key 			= ''; // if an invalid or expired api_user_key is used, an error will spawn. If no api_user_key is used, a guest paste will be created
$api_paste_name			= urlencode($api_paste_names);
$api_paste_code			= urlencode($api_paste_codes);


$url 				= 'https://pastebin.com/api/api_post.php';
$ch 				= curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'api_option=paste&api_user_key='.$api_user_key.'&api_paste_private='.$api_paste_private.'&api_paste_name='.$api_paste_name.'&api_paste_expire_date='.$api_paste_expire_date.'&api_paste_format='.$api_paste_format.'&api_dev_key='.$api_dev_key.'&api_paste_code='.$api_paste_code.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);

$response  			= curl_exec($ch);
$r = array("result" => $response, "kode" => "1");
$s = json_encode($r);
echo  $s;
}else {
    $z = array("result" => "error, parameter harus terpakai", "kode" => "0");
    $s = json_encode($z);
    echo $s;
}
?>