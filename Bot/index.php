<?php
require_once __DIR__ . "/config.php";
////////BENCHAMIN LOUIS//////
//CHANNEL:- T.ME/INDUSBOTS////
error_reporting(0);

set_time_limit(0);

flush();
##------------------------------##
define('API_KEY',$BOT_TOKEN);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
//==============BENCHAM======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$name = $from_id = $message->from->first_name;
$from_id = $message->from->id;
$text = $message->text;
//===============BENCHAM=============//
if($text == "/start") 

            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"$START_MESSAGE",
 'parse_mode'=>'HTML',
]);
if($text !== '/start'){

$get = json_decode(file_get_contents("https://gplinks.in/api?api=$GP_API_KEY&url=$text"),true);
$short = $get['shortenedUrl'];

if($get['shortenedUrl']){
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text'=>"<b>ശെരി എന്നാ 😹

YOUR SHORTEN URL: </b> <code>$short</code>

<b>LONG URL:</b> <code>$text</code>",
   'parse_mode'=>"HTML",
]);
   
}else {
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"<b>വർക്ക്‌ ആവുന്ന ഏതേലും ലിങ്ക് താടാ മണ്ടാ</b>",
                'parse_mode'=>"HTML",
               
]);
}
}
?>
