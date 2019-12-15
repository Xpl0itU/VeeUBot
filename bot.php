<?php
@system("clear");
//warna
$biru="\033[1;34m";
$turkis="\033[1;36m";
$ijo="\033[92m";
$putih="\033[1;37m";
$pink="\033[1;35m";
$red="\033[1;31m";
$kuning="\033[1;33m";

//flag
print"$ijo
======================================================\n__     _______ _____ _   _ 
\ \   / / ____| ____| | | | Author : Xpl0itU
 \ \ / /|  _| |  _| | | | | 
  \ V / | |___| |___| |_| | Invite Code : 37KSAZ
   \_/  |_____|_____|\___/\n ======================================================\n$putih";
//link
$link = "https://www.veeuapp.com/v1.0/incentive/tasks?access_token=".$access_token;
//body
$video = array(
   'locale' => 'in_ID',
	  'task_extra_info' => '',
	  'task_name' => 'vip_watch_video_ball_01',
	  'timezone' => 'GMT+01:00');
//encode
$body0 = json_encode($video,true);
//header
$head = array();
$head[] = "Host: www.veeuapp.com";
          "Connection: Keep-Alive";
          "Accept-Encoding: gzip";
          "User-Agent: okhttp/3.10.0";
$header = array();
$header[] = "Content-Type: application/json";              
             "charset=UTF-8";
             "Content-Length: 96";
             "Host: www.veeuapp.com";
             "Connection: Keep-Alive";
             "Accept-Encoding: gzip";
             "User-Agent: okhttp/3.10.0";
//config
include('config.php');

//intro
echo "$kuning [>] $putih Logging In.....\n";
sleep(1);

//get info
while (true) :
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.veeuapp.com/v1.0/me?access_token=".$access_token,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTPHEADER => $head,
    CURLOPT_SSL_VERIFYPEER => 0,
      ));
$result = curl_exec($curl);                                   curl_close($curl);
$jres = json_decode($result,true);
echo "$ijo [*]  Success !!!\n";
echo "$putih|user: $biru".$jres['user']['nickname']."\n";
echo "$putih|email: $biru".$jres['user']['email']."\n";
break;
endwhile;

//konfirmasi
$konfir =readline("$putih [?] $turkis Continue? (y/n): ");
       if($konfir == 'y' OR $konfir == 'Y'){
        @system("clear");
        }
        else{
        echo "$red [!] ".$putih."Logging In\n";
        exit;
        }

//intro2

echo "$kuning [>] $putih Starting Bot......\n";
sleep(1);
//include
include('modules');


//bot_nonton
while (true) :
sleep(1);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $link,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $body0,
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_SSL_VERIFYPEER => 0,
      ));
$result_video = curl_exec($curl);                                   curl_close($curl);
$jvid = json_decode($result_video,true);

if($jvid['code'] == '4040') {
echo "$red [!] $putih nonton video:$red ".$jvid['message']."$putih\n";
sleep(1);
//info user
echo "$putih|user: $biru".$jres['user']['nickname']."\n";
echo "$putih|email: $biru".$jres['user']['email']."\n";

exit;
}
else{
echo "$kuning [>] $ijo Details $putih| User: $biru".$jres['user']['nickname']."$ijo
[!] $turkis Reward Points:$putih ".$jvid['task']['reward_point']."$ijo
[!] $turkis Total Points:$putih ".$jvid['point']['current_point']."$ijo
=======================================================\r\n";}
endwhile;
?>
