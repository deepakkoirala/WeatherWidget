<?php
$BASE_URL = "http://query.yahooapis.com/v1/public/yql";

$yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="kathmandu") and u=\'c\'';
$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

$json_string = file_get_contents($yql_query_url);
$arr = json_decode($json_string,true);

//print_r($arr);
//var_dump($arr);
$ayo =  $arr['query']['results']['channel']['item']['description'];
echo "$ayo<br><br><br>";
$ayo = explode("Forecast",$ayo);
echo current($ayo);
$sunrise = $arr['query']['results']['channel']['astronomy']['sunrise'];
$sunset = $arr['query']['results']['channel']['astronomy']['sunset'];
$high = $arr['query']['results']['channel']['item']['forecast'][0]['high'];
$low = $arr['query']['results']['channel']['item']['forecast'][1]['low'];
echo "<p>Max Temp: $high `C<br>Min Temp: $low `C</p>";
echo "<p>Sunrise: $sunrise<br>Sunset: $sunset</p>";
?>
