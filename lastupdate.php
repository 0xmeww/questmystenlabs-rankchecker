<?php 
function lastUpdate(){

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://quests.mystenlabs.com/api/trpc/user,leaderboard,system?batch=1&input=%7B%220%22%3A%7B%7D%7D');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

//curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: quests.mystenlabs.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Baggage: sentry-environment=vercel-production,sentry-release=6e7dee78ec60e140bcf559bc9f712bf95191dc95,sentry-transaction=%2F,sentry-public_key=58a7fc4d0ec54f6b97ceca5f7be28ccd,sentry-trace_id=65521273526341ae8d66781e050aaf77,sentry-sample_rate=0';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: AMP_MKTG_1fc9817a04=JTdCJTdE; _ga=GA1.1.527589644.1689042395; _ga_69VEXYR7BC=GS1.1.1689325113.5.0.1689325113.0.0.0; AMP_1fc9817a04=JTdCJTIyZGV2aWNlSWQlMjIlM0ElMjI3MWJhNjMxOC0xYmE5LTQzNzMtODhmNC00YjVlN2JjZmI5MDQlMjIlMkMlMjJzZXNzaW9uSWQlMjIlM0ExNjg5MzI2NDkyMTIzJTJDJTIyb3B0T3V0JTIyJTNBZmFsc2UlMkMlMjJsYXN0RXZlbnRUaW1lJTIyJTNBMTY4OTMyNjc3NzE3OSUyQyUyMmxhc3RFdmVudElkJTIyJTNBMTM5JTdE';
$headers[] = 'Referer: https://quests.mystenlabs.com/';
$headers[] = 'Sec-Ch-Ua: \"Not.A/Brand\";v=\"8\", \"Chromium\";v=\"114\", \"Google Chrome\";v=\"114\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sentry-Trace: 65521273526341ae8d66781e050aaf77-8ccbcf7b2693dfa3-0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$res = json_decode($result,true);
$a = $res[2]['result']['data']['lastUpdated'];
return $a;
curl_close($ch);
}


?>