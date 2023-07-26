<?php 
include "config.php";

$wallet = "0xYourWallet"; // change with your sui wallet !
$body = "%7B%220%22%3A%7B%22address%22%3A%22$wallet%22%7D%7D";

check($body,$formattedDateTime);

function check($body,$formattedDateTime){
    global $wallet;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://quests.mystenlabs.com/api/trpc/user?batch=1&input=$body");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Host: quests.mystenlabs.com';
$headers[] = 'Connection: close';
$headers[] = 'Sec-Ch-Ua: \"Not.A/Brand\";v=\"8\", \"Chromium\";v=\"114\", \"Google Chrome\";v=\"114\"';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: */*';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://quests.mystenlabs.com/';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$res = json_decode($result,true);

// Config Response
$myScore = $res[0]['result']['data']['score'];
$suspectedBot = $res[0]['result']['data']['bot'];
$myRank = $res[0]['result']['data']['rank'];
$totalFlip = $res[0]['result']['data']['numCommandsDeSuiFlip'];
$totalEthos8192 = $res[0]['result']['data']['numCommandsEthos8192'];
$totalCompletedJourney = $res[0]['result']['data']['numCommandsJourneyToMountSogol'];
$totalAbsentMiniMiner = $res[0]['result']['data']['numCommandsMiniMiners'];
$fee = floor($totalEthos8192 * 0.000832844);
$ban = true;

// Color Text
$red = "\033[0;31m";
$green = "\033[0;32m";
$yellow = "\033[0;33m";
$magenta = "\033[0;35m";
$cyan = "\033[0;36m";
$reset = "\033[0m";

if($suspectedBot == $ban) {
    $suspectedBot = 'YES';
} else {
    $suspectedBot = 'NO';
}
curl_close($ch);

print_r("
==============================================================
- MY WALLET :$cyan $wallet $reset
- MY RANK :$cyan $myRank $reset
- MY SCORE :$cyan $myScore $reset
- SUSPECTED BOT :$red $suspectedBot $reset
============================= 
- FLIP :$cyan $totalFlip $reset
- ETHOS8192 :$cyan $totalEthos8192 $reset

* TOTAL YOU USE SUI :$cyan $fee $reset($magenta NOT INCLUDE MINTING GAME.$reset )
=============================
        LAST TIME UPDATE :$green $formattedDateTime $reset
    $yellow( YOUR DATA WILL GET UPDATE EVERY 10 MINUTE ! )$reset
============================================================
");
}
?>