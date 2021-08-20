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
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$date = "https://api.rangatiratan.ga/tiq.php";
$g = file_get_contents($date);
$js = json_decode($g);
$da = $js->Date;
$time = $js->Time;
$bot = bot('getme',['bot'])->result->username;
echo "<br><a  href='https://t.me/$bot'>@$bot</a>";


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
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"- اهلا بك يا $name في بوت المحيبس ~ #",
        'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [
['text'=>"ابـدء 🎮",'callback_data'=>"1"]
],
[
['text'=>"حـول الـبـوت ℹ",'callback_data'=>"0"]
],
[
['text'=>"Channel 📡",'url'=>"t.me/$chs"]
],
[['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$by"]]
]
])
    ]);
}

if($data=="🔙"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"😃┊`مـرحـبـا بـك مـن جـديـد`",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ابـدء 🎮",'callback_data'=>"1"]
],
[
['text'=>"حـول الـبـوت ℹ",'callback_data'=>"0"]
],
[
['text'=>"Channel 📡",'url'=>"t.me/$chs"]
],
]
])
]);
}


if($data=="❌" or $data == "no" or $data == "no1" or $data == "no11"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"يرجع 😹😹✨",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"🔙"]
],
[
['text'=>"Channel 📡",'url'=>"t.me/$chs"]
],
]
])
]);
}
if($data=="✖"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"يرجع 😹😹✨",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"🔙"]
],
[
['text'=>"Channel 📡",'url'=>"t.me/$chs"]
],
]
])
]);
}

if($data=="0"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"اهلا بك في بوت لعبه المحيبس اختر العضمه الصحيحه ☘ ثم اضغط علئ تلعب لمواصله العبه",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"🔙"]
],
[
['text'=>"Channel 📡",'url'=>"t.me/$chs"]
],
]
])
]);
}

if($data=="1"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"2"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
]
])
]);
}
if($data=="2"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"3"]
],
]
])
]);
}
if($data=="3"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"4"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
]
])
]);
}
if($data=="4"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"5"]
],
]
])
]);
}
if($data=="5"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"6"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
]
])
]);
}
if($data=="6"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"7"]
],
]
])
]);
}
if($data=="7"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"8"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
]
])
]);
}
if($data=="8"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"9"]
],
]
])
]);
}
if($data=="9"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text' =>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"10"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
]
])
]);
}
if($data=="10"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"11"]
],
]
])
]);
}

if($data=="11"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text' =>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"13"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
]
])
]);
}
if($data=="13"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"14"]
],
]
])
]);
}
if($data=="14"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text' =>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"009"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
]
])
]);
} 
if($data=="009"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"99"]
],
]
])
]);
} 
if($data=="99"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text' =>"اختر العضمه الصحيحه ☘",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👊",'callback_data'=>"ksmk"]
],
[
['text'=>"👊",'callback_data'=>"no"]
],
[
['text'=>"👊",'callback_data'=>"❌"]
],
[
['text'=>"👊",'callback_data'=>"no1"]
],
[
['text'=>"👊",'callback_data'=>"✖"]
],
[
['text'=>"👊",'callback_data'=>"no11"]
],
]
])
]);
} 

if($data=="ksmk"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تلعب خوش تلعب 💍",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تلعب",'callback_data'=>"1"]
],
]
])
]);
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
#                   المشتركين                   #
if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        عدد مشتركين البوت📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}
#                   رسالة للكل                   #
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