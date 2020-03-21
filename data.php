<?php



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



//$Phonemodel = mhp();
//$Phonemodel = generateRandomString(5);
$XUniqueid = generateRandomString(16);

function request($url, $token = null, $data = null, $pin = null, $otpsetpin = null, $uuid = null){

$filel = "lokasi.txt";
$blokasi = file_get_contents($filel);
$clokasi = fetch_value($blokasi, 'Lokasi:', ';');
	
if ($clokasi == "1" ){
$xlocation = 'X-Location: 3.610'.rand(2500,3500).',98.63'.rand(60000,75000);
}else if ($clokasi == "2" ){
$xlocation = 'X-Location: -6.1999'.rand(500,900).',106.84'.rand(30000,36000);
}else if ($clokasi == "3" ){
$xlocation = 'X-Location: -6.913'.rand(4000,6500).',107.617'.rand(5000,8000);
}else if ($clokasi == "4" ){
$xlocation = 'X-Location: -7.2600'.rand(100,999).',112.744'.rand(1000,55000);
}else if ($clokasi == "5" ){
$xlocation = 'X-Location: -8.12'.rand(30000,45000).',115.11'.rand(10000,25000);
}else if ($clokasi == "6" ){
$xlocation = 'X-Location: -7.9700'.rand(599,999).',112.63'.rand(10000,25000);
}else{
$xlocation = 'X-Location: -6.'.rand(111,222).'9016,106.'.rand(111,444).'7473';
}
	
$type = array(
    'G530H',
    'G920F',
    'G920P',
    'G920P',
    'G925F',
    'N9208',
    'N920C',
    'G935T',
    'G935V',
    'G955F',
    'G955FD',
    'G930F',
    'J510G',
);
$modelhp = array_rand($type);
$model = $type[$modelhp];
$Phonemodel = $model;

$header[] = "Host: api.gojekapi.com";
$header[] = "User-Agent: okhttp/4.3.0";
$header[] = "Accept: application/json";
$header[] = "Accept-Language: id-ID";
$header[] = "Content-Type: application/json; charset=UTF-8";
//$header[] = 'X-Uniqueid: '.$XUniqueid.'';
$header[] = "X-Platform: Android";
$header[] = "X-Appid: com.gojek.app";
$header[] = 'X-Phonemodel: Samsung,SM-'.$Phonemodel.'';
$header[] = "X-Deviceos: Android,7.0";
$header[] = "X-AppVersion: 3.48.2";
$header[] = 'X-UniqueId: '.time().'57'.mt_rand(1000,9999);
$header[] = "Connection: keep-alive";
$header[] = "X-User-Locale: id_ID";
$header[] = 'X-Forwarded-For: 114.'.rand(1,15).'.'.rand(0,255).'.'.rand(0,255);
$header[] = $xlocation;
//$header[] = 'X-Location: -6.913'.rand(4000,6500).',107.617'.rand(5000,8000);
//$header[] = "X-Location: 3.585511,98.653126";
$header[] = "X-Location-Accuracy: 3.0";
if ($pin):
$header[] = "pin: $pin";
    endif;
if ($token):
$header[] = "Authorization: Bearer $token";
endif;
if ($otpsetpin):
$header[] = "otp: $otpsetpin";
endif;
if ($uuid):
$header[] = "User-uuid: $uuid";
endif;
$c = curl_init("https://api.gojekapi.com".$url);
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    if ($data):
    curl_setopt($c, CURLOPT_POSTFIELDS, $data);
    curl_setopt($c, CURLOPT_POST, true);
    endif;
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_HEADER, true);
    curl_setopt($c, CURLOPT_HTTPHEADER, $header);
    $response = curl_exec($c);
    $httpcode = curl_getinfo($c);
    if (!$httpcode)
        return false;
    else {
        $header = substr($response, 0, curl_getinfo($c, CURLINFO_HEADER_SIZE));
        $body   = substr($response, curl_getinfo($c, CURLINFO_HEADER_SIZE));
    }
    $json = json_decode($body, true);
    return $body;
}
function save($filename, $content)
{
    $save = fopen($filename, "a");
    fputs($save, "$content\r\n");
    fclose($save);
}
function nama()
    {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ex = curl_exec($ch);
    // $rand = json_decode($rnd_get, true);
    preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
    return $name[2][mt_rand(0, 14) ];
    }
function getStr($a,$b,$c){
	$a = @explode($a,$c)[1];
	return @explode($b,$a)[0];
}
function getStr1($a,$b,$c,$d){
        $a = @explode($a,$c)[$d];
        return @explode($b,$a)[0];
}
function color($color = "default" , $text)
    {
        $arrayColor = array(
            'grey'      => '1;90',
            'red'       => '1;91',
            'green'     => '1;92',
            'yellow'    => '1;93',
            'blue'      => '1;94',
            'purple'    => '1;95',
            'nevy'      => '1;96',
            'white'     => '1;97',
	    //'cyan'      => '1;36'
        );  
        return "\033[".$arrayColor[$color]."m".$text."\033[0m";
    }

function color2($color = "default" , $text)
    {
        $arrayColor = array(
            'grey'      => '1;90',
            'red'       => '1;91',
            'green'     => '1;92',
            'yellow'    => '1;93',
            'blue'      => '1;94',
            'purple'    => '1;95',
            'nevy'      => '1;96',
            'white'     => '1;97',
	    //'cyan'      => '1;36'
        );  
        return "\033[".$arrayColor[$color]."m".$text."\033[0m";
    }


function fetch_value($str,$find_start,$find_end) {
	$start = @strpos($str,$find_start);
	if ($start === false) {
		return "";
	}
	$length = strlen($find_start);
	$end    = strpos(substr($str,$start +$length),$find_end);
	return trim(substr($str,$start +$length,$end));
}
?>
