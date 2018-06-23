<?php
/* Created By 0xCor3 | Security Ghost */
/* Change the Copyright didn't make you a coder */
function curl_get($url){
	$curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
    $cx = curl_exec($curl);
    curl_close($curl);
    return($cx);
}
?>
<h1 class="h1">Youtube Mass Downloader</h1>
<form method="POST" action="">
    <div class="panel panel-default">
                <div class="panel-heading paneltitle"><b>Youtube Downloader</b></div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <textarea class="form-control" type="url" name="link" rows="6" placeholder="https://www.youtube.com/watch?v=Sa0c1VGoiy" required=""><?php echo $_POST['link']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Type :</span>
                            <select class="custom-select form-control" name="quality">
                                <option selected disabled>Select Quality</option>
                                <option value="720">720p</option>
                                <option value="360">360p</option>
                                <option value="240">240p</option>
                                <option value="144">144p</option>
                                <option value="mp3">mp3</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="dl" class="btn btn-primary btn-md form-control">Download</button>
                    <?php
                        if(isset($_POST['dl'])){
                            echo "<hr>";
                            $ytlink = $_POST['link'];
                            $quality = $_POST['quality'];
                            $e = explode("\r\n", $ytlink);
                            echo '<div class="form-group">
                                <ul class="list-group">';
                            foreach($e as $l){
                                $c = curl_get("https://api.zeldin.xyz/v1/yt.php?link=".$l."&key=37bc2f75bf1bcfe8450a1a41c200364c&quality=".$quality);
                                $s = explode("<br>", $c);
                                $title = $s[0];
                                $dlink = $s[1];
                                $size = $s[2];
                                $no = 1;
                                if($dlink){ ?>
                                     <li class="list-group-item"><?php echo $title;?> [ <?php echo $size; ?> ]<a href="<?php echo $dlink; ?>" class="btn btn-danger btn-xs pull-right">Download</a></li>
                               <?php }else{
                                    echo "Failed Lel <br>";
                                }
                                }
                            echo '</ul>
                            </div>';
                        }
                    ?>
                </div>
    </div>
</form>
