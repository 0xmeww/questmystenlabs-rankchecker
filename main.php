<?php 
$wallet = "0xYourWallet"; // change with your sui wallet !
$body = "%7B%220%22%3A%7B%22address%22%3A%22$wallet%22%7D%2C%221%22%3A%7B%22address%22%3A%22$wallet%22%7D%7D";
check($body);
function check($body){
    global $wallet;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://quests.mystenlabs.com/api/trpc/warnings,user?batch=1&input=$body");
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
$headers[] = 'Cookie: AMP_MKTG_1fc9817a04=JTdCJTdE; _ga=GA1.1.772274181.1688695256; _ga_69VEXYR7BC=GS1.1.1688709530.2.1.1688709531.0.0.0; AMP_1fc9817a04=JTdCJTIyZGV2aWNlSWQlMjIlM0ElMjI5ZDkzZmIxZC04ODgzLTRiYzMtYjhkZC03NDVmNzMxZGVjZTYlMjIlMkMlMjJzZXNzaW9uSWQlMjIlM0ExNjg4NzA5MjMyODM0JTJDJTIyb3B0T3V0JTIyJTNBZmFsc2UlMkMlMjJsYXN0RXZlbnRUaW1lJTIyJTNBMTY4ODcwOTU1MTczMiUyQyUyMmxhc3RFdmVudElkJTIyJTNBMTQ2JTdE';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$res = json_decode($result,true);
$myScore = $res[1]['result']['data']['entry']['score'];
$myRank = $res[1]['result']['data']['position'];
$totalFlip = $res[1]['result']['data']['entry']['numCommandsDeSuiFlip'];
$totalEthos8192 = $res[1]['result']['data']['entry']['numCommandsEthos8192'];
$totalCompletedJourney = $res[1]['result']['data']['entry']['numCommandsJourneyToMountSogol'];
$totalAbsenMiniMiner = $res[1]['result']['data']['entry']['numCommandsMiniMiners'];

print_r("
- MY WALLET : $wallet
- TOTAL BERMAIN FLIP : $totalFlip ( di kali 10 )
- TOTAL SCORE ETHOS8192 : $totalEthos8192 ( di kali 1 )
- TOTAL COMPLETED QUEST JOURNEY : $totalCompletedJourney ( di kali 1000 )
- TOTAL ABSEN MINI MINER : $totalAbsenMiniMiner ( di kali 100 )
- MY RANK : $myRank
- MY SCORE : $myScore
");
// kalo print nya rusak bisa benerin sendiri yah! :p
curl_close($ch);
}

?>
