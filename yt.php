<?php
if($_GET['video'] && $_GET['quality']){
    $s = $_GET['video'];
    $trans = array("https://www.youtube.com/watch?v=" => "", "https://youtu.be/" => "");
    $result = strtr($s, $trans);
    $f = file_get_contents("http://youtubetoany.com/@api/json/videos/".$result);
    $js = json_decode($f);
    $title = $js->{'vidTitle'};
    if($_GET['quality'] == '720'){
    $_720 = $js->{'vidInfo'}->{'0'}->{'dloadUrl'};
    $_720size = $js->{'vidInfo'}->{'0'}->{'rSize'};
    $quality = $js->{'vidInfo'}->{'0'}->{'quality'};
    $vidId = $js->{'vidID'};
    $str720 = str_replace("//", "http://", $_720);
    $array = array (
            "title" => $title,
            "result" => array (
            "vidId"=> $vidId,
            "url" => $str720,
            "quality" => $quality,
            "size" => $_720size
                )
            );
        $encode = json_encode($array);
    echo $encode;        
    }
    elseif($_GET['quality'] == '360'){
    $_360 = $js->{'vidInfo'}->{'1'}->{'dloadUrl'};
    $_360size = $js->{'vidInfo'}->{'1'}->{'rSize'};
    $quality = $js->{'vidInfo'}->{'1'}->{'quality'};
    $vidId = $js->{'vidID'};
    $str360 = str_replace("//", "http://", $_360);
    $array = array (
            "title" => $title,
            "result" => array (
            "vidId"=> $vidId,
            "url" => $str360,
            "quality" => $quality,
            "size" => $_360size
                )
            );
        $encode = json_encode($array);
    echo $encode;    
    }
    elseif($_GET['quality'] == '240'){
    $_240 = $js->{'vidInfo'}->{'2'}->{'dloadUrl'};
    $_240size = $js->{'vidInfo'}->{'2'}->{'rSize'};
    $quality = $js->{'vidInfo'}->{'2'}->{'quality'};
    $vidId = $js->{'vidID'};
    $str240 = str_replace("//", "http://", $_240);
    $array = array (
            "title" => $title,
            "result" => array (
            "vidId"=> $vidId,
            "url" => $str240,
            "quality" => $quality,
            "size" => $_240size
                )
            );
        $encode = json_encode($array);
    echo $encode;
    }
    elseif($_GET['quality'] == '144'){
    $_144 = $js->{'vidInfo'}->{'4'}->{'dloadUrl'};
    $_144size = $js->{'vidInfo'}->{'4'}->{'rSize'};
    $quality = $js->{'vidInfo'}->{'4'}->{'quality'};
    $vidId = $js->{'vidID'};
    $str144 = str_replace("//", "http://", $_144);
    $array = array (
            "title" => $title,
            "result" => array (
            "vidId"=> $vidId,
            "url" => $str144,
            "quality" => $quality,
            "size" => $_144size
                )
            );
        $encode = json_encode($array);
    echo $encode;
    }
}elseif($_GET['mp3']){
    $s = $_GET['mp3'];
    $trans = array("https://www.youtube.com/watch?v=" => "", "https://youtu.be/" => "");
    $result = strtr($s, $trans);
    $f = file_get_contents("http://youtubetoany.com/@api/json/mp3/".$result);
    $js = json_decode($f);
    $title = $js->{'vidTitle'};
    $mp3 = $js->{'vidInfo'}->{'0'}->{'dloadUrl'};
    $mp3size = $js->{'vidInfo'}->{'0'}->{'mp3size'};
    $vidId = $js->{'vidID'};
    $strmp3 = str_replace("//", "http://", $mp3);
    $array = array (
             "title" => $title,
             "result" => array (
                 "vidId" => $vidId,
                 "url" => $strmp3,
                 "size" => $mp3size
                 )    
                );
    echo json_encode($array);
}
else {
    echo "<pre> 
            How To Use ?
            Use Get Method and Parameter.
            Video Get ->
                The Parameter Are :
                - video = the youtube link 
                - quality = the quality of video like : 720, 360, 240, 144
            Mp3 Get ->
                The Parameter is :
                - mp3 = the youtube link
            and Enjoy It!
                                                 Regards, Izzeldin Addarda
          </pre>";
}
?>