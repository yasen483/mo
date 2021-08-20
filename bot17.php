<?php

ob_start();
$API_KEY = "TO";
define('API_KEY',$API_KEY);
echo "<a href='https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>";
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}
else
{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$chs = file_get_contents("ch.txt");
$ad = file_get_contents("ids.txt");
$by = file_get_contents("buy.txt");
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
$admin = "$ad";
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$date = "https://api.rangatiratan.ga/tiq.php";
$g = file_get_contents($date);
$js = json_decode($g);
$da = $js->Date;
$time = $js->Time;
$bot = bot('getme',['bot'])->result->username;
echo "<br><a  href='https://t.me/$bot'>@$bot</a>";

$ch = "@$chs";
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"▫️ يجب عليك الاشتراك في قناة البوت اولا ⚜️؛
◼️ اشترك في القناة ثم ارسل /start ،
 - قناة البوت $ch •",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"- العضو قام بألاشتراك في قناة البوت معلوماته ؛ 💗👇🏻'
• الاسم ؛ $name ،
• المعرف ؛ @$username ،
• الايدي ؛ $from_id ،
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
• الوقت ؛ $time ، 
• التاريخ ؛ $da ،",
]);return false;}

$as = array("استغفر الله 🙏❤️","استغفر الله 🙏🧡","استغفر الله 🙏💛","استغفر الله 🙏💚","استغفر الله 🙏💙","استغفر الله 🙏💜","استغفر الله 🙏🖤","استغفر الله 🙏💔","استغفر الله 🙏❣","استغفر الله 🙏💕","استغفر الله 🙏💞","استغفر الله 🙏💓","استغفر الله 🙏💗","استغفر الله 🙏💖","استغفر الله 🙏💘","استغفر الله 🙏💝");

if($text == "/start"){
bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"• اهلا بك ؛ [$name](tg://user?id=$chat_id) 

- يمكنك من خلال هذا البوت القيام بما يلي ؛ 👇🏻💚'

١. تنزيل الفيديوهات من الميوزكلي ،
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[• اضغط هنا وتابع جديدنا ، 📢](https://t.me/$chs)",
      'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• $ch ، ☬'",'url'=>"https://t.me/$chs"]],
[['text'=>"- لشراء البوت ~ #",'url'=>"https://t.me/$by"]],  
        ]
    ])
    ]);
      bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"- تم دخول شخص الى البوت الخاص بك 🔰؛
• معلومات العضو ، 👋🏻

• الاسم ؛ $name ،
• المعرف ؛ @$username ،
• الايدي ؛ $from_id ،
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
• الوقت ؛ $time ، 
• التاريخ ؛ $da ،",
]); 
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("memb.txt", $chat_id."\n",FILE_APPEND);
  }
}

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

if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        عدد مشتركين البوت📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}

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

if(preg_match('/.*musical\.ly.*/i',$text)){
 bot('sendmessage',[
  'chat_id'=>$chat_id,
    'text'=>"- يرجى الانتظار قليلا من فضلك ، 🔱
- جار التحميل ، قناة البوت ؛ @$chs ،",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• $ch ، ☬'",'url'=>"https://t.me/$chs"]]    
        ]
    ])
    ]);
bot('sendphoto',[
 'chat_id'=>$chat_id,
  'photo'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• $ch ، ☬'",'url'=>"https://t.me/$chs"]]    
        ]
    ])
    ]);
 bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• $ch ، ☬'",'url'=>"https://t.me/$chs"]]    
        ]
    ])
    ]);
    }
   