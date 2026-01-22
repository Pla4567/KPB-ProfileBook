<?php
function getRewardFromAPI()
{
    $url = "http://localhost/kpb-profilebook_api/get_userpdx.php";
    $json = file_get_contents($url);
    return json_decode($json, true);
}
?>