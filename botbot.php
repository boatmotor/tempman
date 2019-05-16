<?php

// require "vendor/autoload.php";
// require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'NRx+ZH4aSDHP/6Bv6ODrdoo1tiwkoJ0xoE+ef/X21LRkTLtPTmqqmfDlN8MfoPcNchiDjTzHScRU2cgtTd0Y0cCaoT3PKqipYvAfEvbq1vW2XkYKZH22pY+WayMVFpSmKn3S8g75FSycOEYnZECOdwdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '9fe460c4068f06035400d7d73032cba9';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array



if ( sizeof($request_array['events']) > 0 ) {

    foreach ($request_array['events'] as $event) {

		
        $reply_message = '';
        $reply_token = $event['replyToken'];
        // $text = 'kittinan' ;
        //$inputt = '';
        $inputt = $event['message']['text'] ;
        $idid = $event['source']['userId'];
        // if($event['message']['text'] == 'hi'){
        // if($inputt == 'hi'){
		$text3 = 56.1 ;
        //$sum = 'สวัสดีครับ'. "\nผมชื่อ ".$text ."\n"."น้ำหนัก = " .$text3 ;
        $sum = 'Your ID is '. $idid . "\n" . 'Your say is ' . $inputt ;
        //$text = $event['message']['text'];
        $data = [
            'replyToken' => $reply_token,
            // 'messages' => [['type' => 'text', 'text' => json_encode($request_array) ]]  Debug Detail message
            'messages' => [['type' => 'text', 'text' => $sum]]
        ];
		// $data2 = [
        //     'replyToken' => $reply_token,
        //     // 'messages' => [['type' => 'text', 'text' => json_encode($request_array) ]]  Debug Detail message
        //     'messages' => [['type' => 'text', 'text' => $text2 ]],
        // ];
        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
		// echo "Result: ".$send_result."\r\n";
		
		// $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
        // $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
        
        // }
        echo "Result: ".$send_result."\r\n";
        //$inputt = $event['message']['text'] ;
        // if($inputt == 'bye'){
        //     $a = 'ยินดีที่ได้รับใช้จ้า' ;
        //     $b = 'นายท่าน ' . $text ;
        //     $c = 9.9999999999999;
        //     $sum = $a."\n".$b."\n".$c."\ntesting byeeeeeeeeeeee" ;
        //     $data = [
        //         'replyToken' => $reply_token,
        //         'messages' => [['type' => 'text', 'text' => $sum ]]
        //     ];
        //     $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
        //     $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
        //     echo "Result: ".$send_result."\r\n";
        // }

        // if($inputt == 'id'){
        //     $a = 'ยินดีที่ได้รับใช้จ้า' ;
        //     $b = 'นายท่าน ' . $text ;
        //     $c = $idid;
        //     $sum = $a."\n".$b."\n".$c ;
        //     $data = [
        //         'replyToken' => $reply_token,
        //         'messages' => [['type' => 'text', 'text' => $sum ]]
        //     ];
        //     $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
        //     $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
        //     echo "Result: ".$send_result."\r\n";
        // }

		}
    }

echo "OK";



function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>