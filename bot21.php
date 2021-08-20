<?php 
/*
Code by :- @CoderIq
*/
ob_start();
$API_KEY = "TO";#توكن البوت
define('API_KEY',$API_KEY);
echo "<a href='https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>";
echo file_get_contents("https://api.telegram.org/bot$API_KEY/getme?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{return json_decode($res);}}
#					SAJAD SALAM					#
$update 	= json_decode(file_get_contents('php://input'));
$message 	= $update->message;
$text 	 	= $message->text;
$chat_id 	= $message->chat->id;
$name = $message->from->first_name;
$from_id = $message->from->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
$chs = file_get_contents("ch.txt");
$ad = file_get_contents("ids.txt");
$by = file_get_contents("buy.txt");
$admin = "$ad";
$ch = "@$chs";
$buyy = "@$by";
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
 'text'=>"• اهلا بك ؛ $name !
• لا يمكنك استعمال البوت الى وبعد الاشتراك في قناة البوت اشترك وارسل /start ، 💛
• قناة البوت ؛ @$chs ، 🔱",
]);return false;}
$user 		= $message->from->username;
$message_id = $update->message->message_id;

if (isset($update->channel_post)) {
	$chat_id    = $update->channel_post->chat->id;
	$message_id = $update->channel_post->message_id;
	$message = $update->channel_post;
	$text       = $update->channel_post->text;
	if ($update->channel_post->message->caption) {
		$text = $update->channel_post->message->caption;
	}
}
$s = "$ad";//  ايدي المطور
$us = explode("\n", file_get_contents("us.txt"));
#					SAJAD SALAM					#
$bot = json_decode(file_get_contents("bot.json"),true);
if (!file_exists("bot.json")) {
	$put = [];
	file_put_contents("bot.json", json_encode($put));
}
if(preg_match('/^\/(add)(.*)/',$text) and $chat_id == $s){
    $text = explode(" ",str_replace("/add ","",$text));
    $bot[$text[0]] = $text[1];
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"تمت الاضافه بنجاح"
        ]);
        file_put_contents("bot.json", json_encode($bot));
}
if ($text == '/start' and isset($bot[$chat_id])) {
	
	bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"<b>مرحبا يا ! </b><a href=\"tg://user?id=$chat_id\">$name</a>\n\nصاحب قناة : ".$bot[$chat_id],
		'parse_mode'=>'html',
		'reply_markup'=>json_encode([
			'inline_keyboard'=>[
				[['text'=>"Channel",'url'=>'t.me/$chs']]
			]
		])
	]);
}
if ($text == 'قفل الروابط' ) {
	if ($bot[$bot[$chat_id]]['links'] != true) {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم قفل الروابط فيها"
		]);
		$bot[$bot[$chat_id]]['links'] = true;
	} else {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم قفل الروابط فيها مسبقا"
		]);
	}	
	file_put_contents("bot.json", json_encode($bot));
}
if ($text == 'قفل التوجيه' ) {
	if ($bot[$bot[$chat_id]]['fwd'] != true) {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم قفل التوجيه فيها"
		]);
		$bot[$bot[$chat_id]]['fwd'] = true;
	} else {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم قفل التوجيه فيها مسبقا"
		]);
	}	
	file_put_contents("bot.json", json_encode($bot));
}
if ($text == 'قفل المعرف' ) {
	if ($bot[$bot[$chat_id]]['user'] != true) {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم قفل المعرف فيها"
		]);
		$bot[$bot[$chat_id]]['user'] = true;
	} else {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم قفل المعرف فيها مسبقا"
		]);
	}	
	file_put_contents("bot.json", json_encode($bot));
}
if ($text == 'فتح المعرف' ) {
	if ($bot[$bot[$chat_id]]['user'] == true) {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم فتح المعرف فيها"
		]);
		$bot[$bot[$chat_id]]['user'] = false;
	} else {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم فتح المعرف فيها مسبقا"
		]);
	}	
	file_put_contents("bot.json", json_encode($bot));
}
if ($text == 'فتح الروابط' ) {
	if ($bot[$bot[$chat_id]]['links'] == true) {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم فتح الروابط فيها"
		]);
		$bot[$bot[$chat_id]]['links'] = false;
	} else {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم فتح الروابط فيها مسبقا"
		]);
	}	
	file_put_contents("bot.json", json_encode($bot));
}
if ($text == 'فتح التوجيه' ) {
	if ($bot[$bot[$chat_id]]['fwd'] == true) {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم فتح التوجيه فيها"
		]);
		$bot[$bot[$chat_id]]['fwd'] = false;
	} else {
		bot('sendMessage',[
			'chat_id'=>$chat_id,
			'text'=>"القناه :- ".$bot[$chat_id]."\n تم فتح التوجيه فيها مسبقا"
		]);
	}	
	file_put_contents("bot.json", json_encode($bot));
}
if ($update->channel_post) {
	if($bot['@'.$update->channel_post->chat->username]['links'] == true and preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me|(.*)telesco.me|telesco.me(.*)/i',$update->channel_post->text) ){
	       bot('deleteMessage',[
	         'chat_id'=>$chat_id,
	         'message_id'=>$message->message_id
	      ]);
	}
	if($bot['@'.$update->channel_post->chat->username]['user'] == true and  preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)#(.*)|#(.*)|(.*)#/',$text)){
       bot('deleteMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$message->message_id
       ]);
    }
    if($update->channel_post->forward_from_chat or $update->channel_post->forward_from && $bot['@'.$update->channel_post->chat->username]['fwd'] == true){
      bot('deleteMessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id
      ]);
    }
}
	