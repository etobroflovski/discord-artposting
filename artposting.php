<?php

/*

discord-artposting

post random image taken from behance using discord webhook.
you need cronjob to create schedule for the bot.
cron-job.org offers free service.

by etobroflovski, 2019.


*/


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
include "./config.php";



/* functions list */

function array_random($arr, $num = 1) {
    shuffle($arr);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}


/* get data from behance */
// filter by color
//$ch = curl_init("https://api.behance.net/v2/projects?field=$fields&color_hex=$warna&sort=views&client_id=$behance_key");
$ch = curl_init("https://api.behance.net/v2/projects?field=$fields&sort=featured_date&time=week&client_id=$behance_key");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$json = json_decode($response, true);
curl_close($ch);

header ("Content-type: text/plain");
$gambarnya = $json['projects'][$post]['covers']['original'];
$authornya = $json['projects'][$post]['owners']['0']['username'];
$link_author = $json['projects'][$post]['url'];
//echo "$gambarnya $authornya $link_author";



/* send data to webhook */
$message = urldecode($fields) . " by $authornya | $link_author";
    $data =  ['embeds' => [0 => [ 'image' =>  [ 'url' => $gambarnya]]], 'username' => $botusername, 'content' => $message, 'avatar_url' => $botavatarurl, ];
	

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($webhookURL, false, $context);
?>