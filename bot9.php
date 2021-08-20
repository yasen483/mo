<?php

ob_start();
$API_KEY = 'TO'; 
$MustafaX = "
- بوت الكتابات ✏️
- يمكنك ارسال الان النص 📖
- ليتم وضعه في المكان المناسب ✨";
//////////////////////
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
lvar_dump(curl_error($ch));
}else{return json_decode($res);}}
$msgs = json_decode(file_get_contents('msgs.json'),true);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$name = $message->from->first_name;
$user = $message->from->username;
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
if($text == "/start"){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"- اهلا بك ؛ [$name](https://telegram.me/$chs) 🔻؛
$MustafaX",
'reply_to_message_id'=>$msid,
  'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>true,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "- تابعنا 🚸", 'url' => "t.me/$chs"]],
[['text'=>"- لشراء البوت ~ #",'url'=>"t.me/$by"]],]])
]);
}
$Mustafa = array(
"- $text ' 💛",
"• ‏$text ؛❕💭'",
"• ‏$text ،،💗🔱",
"• $text ؛🔓💜 ،",
"• ‏$text ،🕸🐚",
"• $text  ، 📃💗❕'",
"• ‏$text ،🕸💙",
"• ‏$text ؛☝️🏻💕'",
"•  $text ،🌪💜",
"•  $text 🌸🌿،",
"• $text ؛ ❕👌🏽.", 
"• $text ؛✨💕. ",
"• ‏$text ؛💛🌸'",
"• $text 📻💕'",
"• ‏$text ؛💭.'",
"• $text ؛💙.'",
"• $text ,🌸🎹!",
"‏• $text 🌸✨'",
"• ‏$text 💗⏳.",
"• $text ،🔐💙' . ",
"• $text '🐱🌸",
"• ‏$text 🐚🕊",
);
$Mustafar = array_rand($Mustafa, 1);
if($text && $text !=="/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$Mustafa[$Mustafar]",
'reply_to_message_id'=>$msid,]);}

if ($text == "/admin" and $chat_id == $admin ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"
☑️￤اهلا عزيزي :- المطور .
▫️￤اليك الاوامر الان حدد ماتريده 📩
-
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالة للكل ','callback_data'=>'ce']],
[['text'=>'عدد الاعضاء ','callback_data'=>'co']],
            ]
            ])
        ]);
}
if($data == 'off'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
      'text'=>"
☑️￤اهلا عزيزي :- المطور .
▫️￤اليك الاوامر الان حدد ماتريده 📩
-
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالة للكل ','callback_data'=>'ce']],
[['text'=>'عدد الاعضاء ','callback_data'=>'co']],
            ]
            ])
]);
file_put_contents('usr.txt', '');
}
#                   المشتركين                   #
if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        عدد مشتركين البوت📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}
#                   رسالة للكل                   #
if($data == "ce" and $update->callback_query->message->chat->id == $admin){ 
    file_put_contents("usr.txt","yas");
    bot('EditMessageText',[
    'chat_id'=>$update->callback_query->message->chat->id,
    'message_id'=>$update->callback_query->message->message_id,
    'text'=>"▪️ ارسل رسالتك الان 📩 وسيتم نشرها لـ [ $c ] مشترك . 
   ",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>' الغاء 🚫 •','callback_data'=>'off']]    
        ]
    ])
    ]);
}
if($text and $modxe == "yas" and $chat_id == $admin ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("usr.txt","no");

} 
}