<?php
ob_start();
$API_KEY = "TO";
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{return json_decode($res);}}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
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

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$for = $message->from->id;
$user = file_get_contents('users.txt');
$member_id = explode("\n",$user);
$member_count = count($member_id) - 1;
$user = file_get_contents('users.txt');
$members = explode("\n",$user);
if (!in_array($for,$members)){
$add_user = file_get_contents('users.txt');
$add_user .= $for."\n";
file_put_contents('users.txt',$add_user); 
}
if(isset($update->callback_query)){
$callbackMessage = '';
var_dump(bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>$callbackMessage
]));
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;

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

if($text== "الاوامر" && $for == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبا بك في اوامر الادمن",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"عدد الاعضاء",'callback_data'=>"users"]
],
[
['text'=>"رسالة الى الكل",'callback_data'=>"bc"]
],
[
['text'=>"• قناة البوت ، 🇮🇶 •",'url'=>"t.me/$chs"]
],
]
])
]);
}
if($data=="6547"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"• 📌 اهـلا بـك فـي بـوت الابراج المتـطور »💈
 • 📌 يــمكنـك لان معـرفه ماهـوه بـرجـك »💈
 • 📌 ويمـكنـك ايضا عرض برجك بصوره »💈
• 📌 وهنـاك الكــثير مـن الاشياء الشـيقه »💈
• 📌 فقـط قـم بأختيا القسـم الذي تريده »💈",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"🌀« الابــراج »🌀",'callback_data'=>"1"]
],
[
['text'=>"🌀« معـرفه برجك »🌀",'callback_data'=>"#1"]
],
[
['text'=>"🌀» بـرجك بـ صوره «🌀",'callback_data'=>"#2"]
],
[
['text'=>"• قناة البوت ، 🇮🇶 •",'url'=>"t.me/$chs"]
],
]
])
]);
}

if($text== "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهـلا بـك فـي بـوت العاب التلغرام »😻
يمكنك لان العب جميع الالعاب »🔊
ولان اتركك لكي تستمتع بيباي »🕹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"لعـبه من سيربح المليون »💰",]],


[['text'=>"لعـبه حزوره بليره »💎",]],


[['text'=>"لعبـه لو خيروك »💡",]],
[['text'=>"- لشراء البوت ~ #",]],

]
])
]);
}





//////////////////////////////////

if($text== "لعـبه حزوره بليره »💎" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهـلا بـك في بـوت حزوره بليره »😻
فقـط اضغـط ع كلمه »(أبدا العب)«",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🕹«أبدا العب»🕹",'callback_data'=>"ppp1"]],
]
])
]);
}
if($text== "لعـبه من سيربح المليون »💰" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهـلا بـك فـي بـوت من سيربح المليون ↗️
اول بـوت مختلف وجديد كليا عن الباقي ✔️
اضغـط على ابدء البدء العب واستمتع 🔊",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"أبدء ألعب 🕹",'callback_data'=>"yyy1"]],


[['text'=>"• قناة البوت ، 🇮🇶 •",'url'=>"t.me/$chs"]],

]
])
]);
}
if($text== "لعبـه لو خيروك »💡" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"» اهـلا بـك صديقي في بـوت لو خيروك »🎐
» البــــوت الاول ع منــصه التليجــــرام »🎐
» يمكـنك ان تـلعب وتستمـع ومن خلال »🎐
» اللعـب يمكنـك ان تربـح بـوتـــات »🎐
» ابــدا وجــرب التشـويق وشـارك لبوت »🎐",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"🔅« أبــدا اللــــعـب »🔅",'callback_data'=>"ttt1"]
],
[
['text'=>"💰« كيفيه استلام جائزه »💰",'callback_data'=>"#1"]
],
[
['text'=>"• قناة البوت ، 🇮🇶 •",'url'=>"t.me/$chs"]
],
]
])
]);
}


if($text== "- لشراء البوت ~ #" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"• اهلا بك يا ؛ $name !
• لشراء البوت راسلني ؛ $buyy ، 🔱",
]);
}


if($data=="&🆘"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اهـلا بـك فـي بـوت من سيربح المليون ↗️
اول بـوت مختلف وجديد كليا عن الباقي ✔️
اضغـط على ابدء البدء العب واستمتع 🔊",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"أبدء ألعب 🕹",'callback_data'=>"yyy1"]],


[['text'=>"• قناة البوت ، 🇮🇶 •",'url'=>"t.me/$chs"]],

]
])
]);
}
if($data=="yyy1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ماهو جمـع كلمه قلب؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قوالب",'callback_data'=>"✖"]],
[['text'=>"قلويات",'callback_data'=>"💔"]],
[['text'=>"أقلبه",'callback_data'=>"❌"]],
[['text'=>"قلوب",'callback_data'=>"ii1"]],
]
])
]);
}
if($data=="ii1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |«~
ربـحت200    |
ربـحت400    |
ربـحت600    |
ربـحت800    |
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~"]],
]
])
]);
}
if($data=="~"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"أي من الاسماء الاتيه ليس مونثأ؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"خوله",'callback_data'=>"✖"]],
[['text'=>"حمزه",'callback_data'=>"ii2"]],
[['text'=>"فاطمه",'callback_data'=>"❌"]],
[['text'=>"زهراء",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="ii2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |«~
ربـحت400    |
ربـحت600    |
ربـحت800    |
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~1"]],
]
])
]);
}

if($data=="~1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مـتا تم شنق المتهم صدام حسين؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عام 2003",'callback_data'=>"ii3"]],
[['text'=>"عام 1977",'callback_data'=>"✖"]],
[['text'=>"عام 1991",'callback_data'=>"❌"]],
[['text'=>"عام 1980",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="ii3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |«~
ربـحت600    |
ربـحت800    |
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~2"]],
]
])
]);
}

if($data=="~2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"كـم سـن للسلحفاة؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"14سن",'callback_data'=>"✖"]],
[['text'=>"سن5",'callback_data'=>"❌"]],
[['text'=>"ليس لها اسنان",'callback_data'=>"ii4"]],
[['text'=>"20 سن",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="ii4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |
ربـحت600    |«~
ربـحت800    |
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~3"]],
]
])
]);
}

if($data=="~3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"في أي سنه توفي رسول الله-صلى الله عليه وسلم-؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"12 هجريه",'callback_data'=>"✖"]],
[['text'=>"11 هجريه",'callback_data'=>"ii5"]],
[['text'=>"4 هجريه",'callback_data'=>"❌"]],
[['text'=>"14 هجريع",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="ii5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |
ربـحت600    |
ربـحت800    |«~
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~4"]],
]
])
]);
}

if($data=="~4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ماعدد ركعات صلاة الفجر؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ثلاث ركعات",'callback_data'=>"✖"]],
[['text'=>"ركعه واحده",'callback_data'=>"💔"]],
[['text'=>"اربع ركعات",'callback_data'=>"❌"]],
[['text'=>"ركعتين",'callback_data'=>"ii6"]],
]
])
]);
}
if($data=="ii6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |
ربـحت600    |
ربـحت800    |
ربـحت1000  |«~
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~5"]],
]
])
]);
}

if($data=="~5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عمليه البيع والشراء في السرق تسمى...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التجاره",'callback_data'=>"ii7"]],
[['text'=>"السفاره",'callback_data'=>"✖"]],
[['text'=>"النجاره",'callback_data'=>"❌"]],
[['text'=>"الحجاره",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="ii7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |
ربـحت600    |
ربـحت800    |
ربـحت1000  |
ربـحت1400  |«~
ربـحت1500  |
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~6"]],
]
])
]);
}

if($data=="~6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"أكمل الحكمه الاتيه:العلم نور والجهل..",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نهار",'callback_data'=>"✖"]],
[['text'=>"ظلام",'callback_data'=>"ii8"]],
[['text'=>"عدو",'callback_data'=>"❌"]],
[['text'=>"نور",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="ii8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |
ربـحت600    |
ربـحت800    |
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |«~
ربـحت1800  |
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~7"]],
]
])
]);
}

if($data=="~7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ماذا يطلق على الارض المستويه؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"صعيد",'callback_data'=>"ii9"]],
[['text'=>"جبال",'callback_data'=>"✖"]],
[['text'=>"انهار",'callback_data'=>"❌"]],
[['text'=>"وديان",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="ii9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |
ربـحت600    |
ربـحت800    |
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |«~
ربـحت10000|
احـسنـت لقد اصبـت اضغـط التالي ◀️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"~8"]],
]
])
]);
}

if($data=="~8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ماذا يطلق على زوجه لدب؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"طيره",'callback_data'=>"✖"]],
[['text'=>"اسد",'callback_data'=>"💔"]],
[['text'=>"حنظب",'callback_data'=>"❌"]],
[['text'=>"دبه",'callback_data'=>"ii10"]],
]
])
]);
}
if($data=="ii10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت100    |
ربـحت200    |
ربـحت400    |
ربـحت600    |
ربـحت800    |
ربـحت1000  |
ربـحت1400  |
ربـحت1500  |
ربـحت1800  |
ربـحت10000|«~
احـسنـت لقد اصبـت الاكمال اضغـط التالي ◀
ان كنـت تريد التراجع فاظغط ع تراجع 🔌️️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"2"]],
[['text'=>"رجـوع",'callback_data'=>"&🆘"]],
]
])
]);
}
//////القسم2////
if($data=="2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمـل قوله وجعلنا من الماء كل شيء",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ميت",'callback_data'=>"❌"]],
[['text'=>"طائر",'callback_data'=>"✖"]],
[['text'=>"حي",'callback_data'=>"o1"]],
[['text'=>"علوم",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="o1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |«~
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x1"]],
]
])
]);
}
if($data=="x1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"وجعلنا من النهار ماعشآ ومن ليل ...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"سباتا",'callback_data'=>"o2"]],
[['text'=>"نوما",'callback_data'=>"💔"]],
[['text'=>"عيشا",'callback_data'=>"✖"]],
[['text'=>"ركضا",'callback_data'=>"❌"]],
]
])
]);
}
if($data=="o2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |«~
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x2"]],
]
])
]);
}
if($data=="x2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عـكس كلمه واسع؟...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قليل",'callback_data'=>"💔"]],
[['text'=>"ضئيل",'callback_data'=>"✖"]],
[['text'=>"كبير",'callback_data'=>"❌"]],
[['text'=>"ضيق",'callback_data'=>"o3"]],
]
])
]);
}
if($data=="o3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |«~
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x3"]],
]
])
]);
}
if($data=="x3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمل المقوله الاتيه:لكل بدايه؟..",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"غرق",'callback_data'=>"✖"]],
[['text'=>"انهر",'callback_data'=>"❌"]],
[['text'=>"طوفان",'callback_data'=>"💔"]],
[['text'=>"نهايه",'callback_data'=>"o3"]],
]
])
]);
}
if($data=="o3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |«~
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x4"]],
]
])
]);
}
if($data=="x4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مرادف كلمه طوفان هي..",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"غرق",'callback_data'=>"💔"]],
[['text'=>"سباحه",'callback_data'=>"❌"]],
[['text'=>"فيضان",'callback_data'=>"o4"]],
[['text'=>"صقيع",'callback_data'=>"✖"]],
]
])
]);
}
if($data=="o4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |«~
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x5"]],
]
])
]);
}
if($data=="x5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"حيوان يستعين به الرعاه الرعي غنمهم هـو ?..",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نمر",'callback_data'=>"✖"]],
[['text'=>"كلب",'callback_data'=>"o5"]],
[['text'=>"اسد",'callback_data'=>"❌"]],
[['text'=>"فيل",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="o5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |«~
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x6"]],
]
])
]);
}
if($data=="x6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمل المثال:الكيور ع اشكالها...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تعود الى بلادها",'callback_data'=>"❌"]],
[['text'=>"تطير",'callback_data'=>"o6"]],
[['text'=>"نقع",'callback_data'=>"✖"]],
[['text'=>"تأكل",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="o6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |«~
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x7"]],
]
])
]);
}
if($data=="x7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"توجد مدينه القيروان في؟..",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تونس",'callback_data'=>"o7"]],
[['text'=>"الصومال",'callback_data'=>"💔"]],
[['text'=>"الجزائر",'callback_data'=>"✖"]],
[['text'=>"السودان",'callback_data'=>"❌"]],
]
])
]);
}
if($data=="o7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |«~
ربـحت108000    |
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x8"]],
]
])
]);
}
if($data=="x8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ماذا يسمى صوت النسر؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"زئير",'callback_data'=>"💔"]],
[['text'=>"نحير",'callback_data'=>"❌"]],
[['text'=>"عويل",'callback_data'=>"o8"]],
[['text'=>"صفير",'callback_data'=>"✖"]],
]
])
]);
}
if($data=="o8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |«~
ربـحت109000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"x9"]],
]
])
]);
}
if($data=="x9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ابو البشر هـو...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"سيدنا ابراهيم(ع)",'callback_data'=>"✖"]],
[['text'=>"سيدنا موسى(ع)",'callback_data'=>"❌"]],
[['text'=>"سيدنا محمد (ص)",'callback_data'=>"💔"]],
[['text'=>"سيدنا ادمن(ع)",'callback_data'=>"o9"]],
]
])
]);
}
if($data=="o9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت10200      |
ربـحت10500      |
ربـحت10800      |
ربـحت10900      |
ربـحت100000    |
ربـحت102000    |
ربـحت104000    |
ربـحت106000    |
ربـحت108000    |
ربـحت109000    |«~👏
احـسنـت لقد اصبـت اضغـط التالي ◀
هل تريد الانتقال للمستوى الاخير ام الرجوع",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"z1"]],
[['text'=>"رجـوع",'callback_data'=>"&🆘"]],
]
])
]);
}
////القسم الثالث/////

if($data=="z1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"تقع جمهوريه مالي في قاره؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اوربا",'callback_data'=>"💔"]],
[['text'=>"افريقيا",'callback_data'=>"f1"]],
[['text'=>"اسيا",'callback_data'=>"✖"]],
[['text'=>"امريكا الشماليه",'callback_data'=>"❌"]],
]
])
]);
}
if($data=="f1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت1000000      |«~
ربـحت1002000      |
ربـحت1004000      |
ربـحت1008000      |
ربـحت10000000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"z2"]],
]
])
]);
}
if($data=="z2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مااسم صغير البقره؟",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"دغل",'callback_data'=>"💔"]],
[['text'=>"حمل",'callback_data'=>"❌"]],
[['text'=>"طلي",'callback_data'=>"✖"]],
[['text'=>"عجل",'callback_data'=>"f2"]],
]
])
]);
}
if($data=="f2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت1000000      |
ربـحت1002000      |«~
ربـحت1004000      |
ربـحت1008000      |
ربـحت10000000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"z3"]],
]
])
]);
}
if($data=="z3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمب مايلي :الدراهم؟...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مراهم",'callback_data'=>"f3"]],
[['text'=>"عقاقير",'callback_data'=>"✖"]],
[['text'=>"ملاهي",'callback_data'=>"💔"]],
[['text'=>"لاشيء",'callback_data'=>"❌"]],
]
])
]);
}
if($data=="f3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت1000000      |
ربـحت1002000      |
ربـحت1004000      |«~
ربـحت1008000      |
ربـحت10000000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"z4"]],
]
])
]);
}
if($data=="z4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اول مسجد بني في الاسلام هو...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مسجد النبوي",'callback_data'=>"💔"]],
[['text'=>"مسجد القبلتين",'callback_data'=>"❌"]],
[['text'=>"مسجد الغباء",'callback_data'=>"f4"]],
[['text'=>"المسجد الحرام",'callback_data'=>"✖"]],
]
])
]);
}
if($data=="f4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت1000000      |
ربـحت1002000      |
ربـحت1004000      |
ربـحت1008000      |«~
ربـحت10000000    |
احـسنـت لقد اصبـت اضغـط التالي ◀",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"التالي",'callback_data'=>"z5"]],
]
])
]);
}
if($data=="z5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ينتمي المغرب الى",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اتحاد المغرب العربي",'callback_data'=>"f5"]],
[['text'=>"الاتحاد الاوربي",'callback_data'=>"❌"]],
[['text'=>"مجلس التعاون الخليجي",'callback_data'=>"✖"]],
[['text'=>"الاتحاد الفريقي",'callback_data'=>"💔"]],
]
])
]);
}
if($data=="f5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربـحت1000000      |
ربـحت1002000      |
ربـحت1004000      |
ربـحت1008000      |
ربـحت10000000    |«~
احسـنت القـد ربحت »10000000«😻
اضغـط الحصول ع تكريم الاعطائك هديه🙈",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الحصول على تكريم",'callback_data'=>"iii"]],
]
])
]);
}
if($data=="iii"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"احسـنت كنت اول من فاز في الـ العبه »
بس الكلك شغله وحده انته من فزت اعلنت بأنك كامل ومينقصك شي من المعلومات واحب اشجعك ع مجهودك وتمنه عجبك البوت واني هم تعبان بل بوت العيونكم المطـور » @sssbs وشكرا ❤️🌸",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع 🔙",'callback_data'=>"&🆘"]],
]
])
]);
}



//////قستم الاخطـاء/////
if($data=="❌"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مـع الاسف لقـد خسـرت»😅❓
حـظ اوفر في المحاولى الاتيه »😻🎄",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حاول مره اخرى ⏱",'callback_data'=>"z1"]],
]
])
]);
}
if($data=="✖"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مـع الاسف لقـد خسـرت»😅❓
حـظ اوفر في المحاولى الاتيه »😻🎄",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حاول مره اخرى ⏱",'callback_data'=>"2"]],
]
])
]);
}
if($data=="💔"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مـع الاسف لقـد خسـرت»😅❓
حـظ اوفر في المحاولى الاتيه »😻🎄",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حاول مره اخرى ⏱",'callback_data'=>"1"]],
]
])
]);
}
////////////////
if($data=="🔌"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"» اهـلا بـك صديقي في بـوت لو خيروك »🎐
» البــــوت الاول ع منــصه التليجــــرام »🎐
» يمكـنك ان تـلعب وتستمـع ومن خلال »🎐
» اللعـب يمكنـك ان تربـح بـوتـــات »🎐
» ابــدا وجــرب التشـويق وشـارك لبوت »🎐",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"🔅« أبــدا اللــــعـب »🔅",'callback_data'=>"1"]
],
[
['text'=>"💰« كيفيه استلام جائزه »💰",'callback_data'=>"#1"]
],
[
['text'=>"• قناة البوت ، 🇮🇶 •",'url'=>"t.me/$chs"]
],
]
])
]);
}
if($data=="#1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اهـلا بك صديقي الاستلام جهائزتك
يرجه مراسله المـطور @sssbs
بشـرط ان تحـقق احد لو خيروك السابقه مع الدليلاو الصوره ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـمقدمه",'callback_data'=>"🔌"]
],
]
])
]);
}



//////الابراج/////
if($data=="ttt1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"🔅» اهــلا بـك صـديقي فــي قــسـم اختيار الجنس «🔅",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ولــــد »»🎐",'callback_data'=>"jj1"],

['text'=>"بنـــــت »»🎐",'callback_data'=>"p1"]],

[['text'=>"لو خيـروك جريئه »😉",'callback_data'=>"«»"]],



]
])
]);
}
//////قسم الجرئيه////
if($data=="«»"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك اطك راسك بالحايط 5 مرات لو تاكل شطة حارة🌶",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اطـك راسي »☹️️",'callback_data'=>"&1"]
],
[
['text'=>"اكل فلفل »☹️😹",'callback_data'=>"&2"]
],
]
])
]);
}
if($data=="&1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"شـوف حبيبي انته بل حالتين محتوك محترك 😹😹😹😹🙈وستمر ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@1"]
],
]
])
]);
}
if($data=="&2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"شـوف حبيبي انته بل حالتين محتوك محترك 😹😹😹😹🙈وستمر ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@1"]
],
]
])
]);
}
///2////
if($data=="@1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تروح لصيدلة تكلة اريد جبس براستول 
لو تكل لامك اكرهج ما احبج يلة اطلعي من البيت",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"صيدليه » 😹💔",'callback_data'=>"&3"]
],
[
['text'=>"اكول ل امي »☹️🤷‍♂😹",'callback_data'=>"&4"]
],
]
])
]);
}
if($data=="&3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"حبيبي انته اول وتالي راح يجيك جلاق من لبيت ومن لصيدليه 😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@2"]
],
]
])
]);
}
if($data=="&4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"حبيبي انته اول وتالي راح يجيك جلاق من لبيت ومن لصيدليه 😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@2"]
],
]
])
]);
}
/////3////
if($data=="@2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تاكل سفنجة لو تخابر ابوك تكلة متزوج بالسر ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تاكل سفنجة»😂️",'callback_data'=>"&5"]
],
[
['text'=>"لو تكل لبوك متزوج بالسر»☹️💔",'callback_data'=>"&6"]
],
]
])
]);
}
if($data=="&5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"انت بالحالتين مبسوط ههههه😂😂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@3"]
],
]
])
]);
}
if($data=="&6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"انت بالحالتين مبسوط ههههه😂😂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@3"]
],
]
])
]);
}
////4/////
if($data=="@3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تبسط ابوك 
لو تاكل 5 ملعقات ملح",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تبسط ابوك>>👨🤦🏻‍♀ ️",'callback_data'=>"&7"]
],
[
['text'=>"تاكل 5 ملعقات ملح>>🙂",'callback_data'=>"&7"]
],
]
])
]);
}
if($data=="&7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"حتة يجيك ال46 من حيث لاتعلم 😂😂😹
وابو الملح الله يساعدك 😯😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@4"]
],
]
])
]);
}

////5////
if($data=="@4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تنطي حضر لحبيبتك 
لو تكل لواحد اني ماحب العراقيين",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تنطي حضر لحبيبتك>>😼😻",'callback_data'=>"&8"]
],
[
['text'=>"تكول ماحب العراقيين>>☹️💔",'callback_data'=>"&8"]
],
]
])
]);
}
if($data=="&8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لاتصير براسي ملاك الكويتية وما تنطي حضر لحبيبتك لو مادري شيصير😂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@5"]
],
]
])
]);
}

////6////
if($data=="@5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تكسر شاحنة تليفونك 
لو تقابل شخص انت تكرهة وزعلان منة تكلة اني احبك وماكدر اعيش بدونك😂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تكسر شاحنة تليفونك>>🌚🌸️",'callback_data'=>"&9"]
],
[
['text'=>"اروح لواحد اكرةه>>🌚🌸",'callback_data'=>"&9"]
],
]
])
]);
}
if($data=="&9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"انت ابد متروح لوتحد تكرهة لو تموت تكسر شاحنة تليفونك وتشتري غيرهة عبالك ماعرفك😏😒🤞🏻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@6"]
],
]
])
]);
}

///7//////
if($data=="@6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك توكع من السطح من فوك لجوة لو تكسر موبايل ابوك",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"توكع من السطح  >>😅️",'callback_data'=>"&10"]
],
[
['text'=>"لو تكسر بومبايل ابوك >>😁",'callback_data'=>"&10"]
],
]
])
]);
}
if($data=="&10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"يبوو من الوالد انت بالحالتين راح .....",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@7"]
],
]
])
]);
}

////8////
if($data=="@7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تنيشن علة واحد وتركعة بطابوكة لو تاكل 5 موطات كرط  
",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تنيشن علة واحد >>😆🤪️",'callback_data'=>"&11"]
],
[
['text'=>"لو تاكل 5موطات كرط>>😧",'callback_data'=>"&11"]
],
]
])
]);
}
if($data=="&11"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"شنو سنون لو شنو ياخرا
ابو الطابوكه الله يعينه 😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@8"]
],
]
])
]);
}

/////9////
if($data=="@8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تركع راسك بنعال🤪
لو تخلي البزون يهجم عليك🐱❤️😘 
",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تركع راسك بنعال>>🤪",'callback_data'=>"*1"]
],
[
['text'=>"لو تخلي البزون يهجم>>🐱❤️",'callback_data'=>"*1"]
],
]
])
]);
}
if($data=="*1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مستحل تخلي البزون يهجم عليك اركع راسك بالنعال خيي 😂😂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"@9"]
],
]
])
]);
}

///10////
if($data=="@9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيروك تكـتل كيكه صديقتـي ☹️😹
لـو تشتريلها سيـاره لكزز ع حسابك 😹🤷‍♂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اكـتلها »😢",'callback_data'=>"*2"]
],
[
['text'=>"اشتريلها تستاهل »😍",'callback_data'=>"*2"]
],
]
])
]);
}
if($data=="*2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"والله يا حبيبي اذا كتلتها راح تموت ☹️
وذا ستريتلها سياره تنصدم وتموت💔😹
انته مجرم خطير صديقي",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"المـقدمه »💔",'callback_data'=>"🔌"]
],
]
])
]);
}




/////ولولددددددد///
if($data=="jj1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروك تركـص بل شـارع
لـو تبـوس بنت من حلكها 😹🤷‍♂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اركـص بلشـارع »🕺",'callback_data'=>"jj2"]
],
[
['text'=>"ابـوس بنت »💏",'callback_data'=>"jj3"]
],
]
])
]);
}
if($data=="jj2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"#وه هسه يصيـر الضحك عليك ببلاش😹
#استمر حبي😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj4"]
],
]
])
]);
}
if($data=="jj3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"#يعنـي الكتله الزينه اذا طلعلك اخوها 😹
#استمر حمبي😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj4"]
],
]
])
]);
}
/////
if($data=="jj4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تروح لبوك دكله امي تخابر غيرك
لو تاخذ 25الف منه ودكله امي اخذتهن",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اكـله امي تخابر »😹",'callback_data'=>"s1"]
],
[
['text'=>"اكله 25 الف »🤷‍♂😹",'callback_data'=>"s2"]
],
]
])
]);
}
if($data=="s1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"#حمبي انته بل اثنين مكتول 😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj5"]
],
]
])
]);
}
if($data=="s2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"#حمبي انته بل اثنين مكتول 😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj5"]
],
]
])
]);
}
////
if($data=="jj5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروك تبـوك من محل وتكله ماعندي
لـو تروح تجـدي ع التقـــاطع 🤷‍♂😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ابـوك »☹️",'callback_data'=>"s3"]
],
[
['text'=>"اجـدي »😐",'callback_data'=>"s4"]
],
]
])
]);
}
if($data=="s3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"روح حمـبي كتله ثانيه 😔😹
#كسرت كلبي استمر😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj6"]
],
]
])
]);
}
if($data=="s4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"يعنــي بعد ما تطـلع وجهك ياخرا😹
منـور استمر😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj6"]
],
]
])
]);
}
//////
if($data=="jj6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تطلع مصلخ بشارع 
لو تروح لبو المحل دكله انته نكري 😹🤷‍♂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ااطـلع مصلخ »☹️",'callback_data'=>"s5"]
],
[
['text'=>"اكله نكري »😹",'callback_data'=>"s6"]
],
]
])
]);
}
if($data=="s5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"طاح حظـك يا متستحي شلون حدبرها 😹
#ستمر جبار",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj7"]
],
]
])
]);
}
if($data=="s6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"يعنـي احلا جلاق واحـلا طرده من المحل 😹
#ستمر جبار",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj7"]
],
]
])
]);
}
/////
if($data=="jj7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيروك تمول عله روحك 
لوتروح تبول بغرفتك😹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ع روحي »☹️😹",'callback_data'=>"s7"]
],
[
['text'=>"بلغرفه »💔😹",'callback_data'=>"s8"]
],
]
])
]);
}
if($data=="s7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"والله حمـبي شكلـك انته بل حالتين نكس😹
#ستمـر 😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj8"]
],
]
])
]);
}
if($data=="s8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"والله حمـبي شكلـك انته بل حالتين نكس😹
#ستمـر 😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj8"]
],
]
])
]);
}
/////
if($data=="jj8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروك تخلي طحين ع راسك
لـو تاكل بيضه نيه 🤷‍♂😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اخلي طحين »🧖‍♂",'callback_data'=>"s9"]
],
[
['text'=>"اكل بيضه »🤦‍♂",'callback_data'=>"s10"]
],
]
])
]);
}
if($data=="s9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اذا سويتها اخذ صوره وتعا خاص اطيك بوت 😹» @sssbs",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj9"]
],
]
])
]);
}
if($data=="s10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"متـاكد😹🤷‍♂اذا اي منور وستمر😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj9"]
],
]
])
]);
}
///////
if($data=="jj9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لــو خيروك تكتـل اخوك الجبـير
لــو تشغل معــزوفه بل فاتحه ☹️😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اكـتل اخوي »😳😂",'callback_data'=>"h1"]
],
[
['text'=>"اشغل معزوفه »💔☹️",'callback_data'=>"h2"]
],
]
])
]);
}
if($data=="h1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"وردا الكتله حبيبي لتبقه بل بيت اقرب دوله 😹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj10"]
],
]
])
]);
}
if($data=="h2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مــبروك حبيبي الفاتحه صارت الك😔😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj10"]
],
]
])
]);
}
/////
if($data=="jj10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروك تسافر لـ امريكـا 
لـو الاردن 😔💖😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"لـ امريكا »😻",'callback_data'=>"h3"]
],
[
['text'=>"لـ اردن »😒",'callback_data'=>"h4"]
],
]
])
]);
}
if($data=="h3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي يابو امريكا راح تشـبع هناك ..🌝😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj11"]
],
]
])
]);
}
if($data=="h4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي يابو الاردن نيتك صافيه ..🌝😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj11"]
],
]
])
]);
}
//////
if($data=="jj11"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروك تضرب ابـوك
لــو تضرب امـك! ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ابوي»🤷‍♂😹",'callback_data'=>"h5"]
],
[
['text'=>"امي »💔",'callback_data'=>"h6"]
],
]
])
]);
}
if($data=="h5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"يا حبيقي انته بل حالاتين بلوك من الحياه😹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj12"]
],
]
])
]);
}
if($data=="h6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"يا حبيقي انته بل حالاتين بلوك من الحياه😹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"jj12"]
],
]
])
]);
}
////
if($data=="jj12"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"يا حبيقي انته بل حالاتين بلوك من الحياه😹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـمقدمه",'callback_data'=>"🔌"]
],
]
])
]);
}
/////////البنااااااتي////////
if($data=="p1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروج تزينين شعرج صفر 
لــو تخسريــن جهـازج😔😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ازيــن شعري »☹️😹",'callback_data'=>"n1"]
],
[
['text'=>"اكسـر جهازي »😭",'callback_data'=>"n2"]
],
]
])
]);
}
if($data=="n1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"مــنوره يل جكمه 😕😹🙈
#وستمري😻",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p2"]
],
]
])
]);
}
if($data=="n2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ســابع المســتحيلات😹😹😹
#استمري لو بل صدك😒😂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p2"]
],
]
])
]);
}
////
if($data=="p2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروج بـين امــج 💖
لـو حبيبـج فشتختارين☹️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"امــي »💖",'callback_data'=>"n3"]
],
[
['text'=>"حبيبي »💔",'callback_data'=>"n4"]
],
]
])
]);
}
if($data=="n3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عاشـــت ايـدج حبيبج ما يـدوم ☹️💔
استمري",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p3"]
],
]
])
]);
}
if($data=="n4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"طـاح ..نيتج عابره لخذاك لصوب 😒😹
ستمري يل عاشكه ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p3"]
],
]
])
]);
}
////
if($data=="p3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيـروج تخمطيـن جهاز من ولد
لـو تركصين بنـص الشارع🤷‍♂☹️😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اخمـط »😹🤷‍♀",'callback_data'=>"n5"]
],
[
['text'=>"اركـص »🙆‍♀",'callback_data'=>"n6"]
],
]
])
]);
}
if($data=="n5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"طاح حظج كلها تركض وراج 😹😹وف شهل موقف استمري",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p4"]
],
]
])
]);
}
if($data=="n6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"شديها يبنيه 😹😹😹💃
وستمري",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p4"]
],
]
])
]);
}
////
if($data=="p4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو جان عدج قناه طاكه وخيـروج بين تحذفيها لو تكتلين اخوج 😹💃️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"احذفها »🖐😐",'callback_data'=>"n7"]
],
[
['text'=>"اكتل اخوي »💃😹",'callback_data'=>"n8"]
],
]
])
]);
}
if($data=="n7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اذا حـذفتيها انـي معــتب »😹
#منوره",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p5"]
],
]
])
]);
}
if($data=="n8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي عمـي كتــلي وشبــعي كــتل 😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p5"]
],
]
])
]);
}
////
if($data=="p5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيروج يصير عدج كمل
لـو تسوين حساب ولد وتضحكين ع بنات😹💔️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"كمـل »😢",'callback_data'=>"n9"]
],
[
['text'=>"حساب »😂",'callback_data'=>"n10"]
],
]
])
]);
}
if($data=="n9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"وه يل كمـل الله يساعدج حبيبتي 😹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p6"]
],
]
])
]);
}
if($data=="n10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"فلاته تشــعر بل رجــوله 😔😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p6"]
],
]
])
]);
}
////
if($data=="p6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خـيروج تخابرين ابوج وتكليله تزوجت
لـو تاخبرين حبيبج وتكليله ماريدك ☹️💟😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ابـوي »☹️💔",'callback_data'=>"n11"]
],
[
['text'=>"حبيبي »🤷‍♂☹️",'callback_data'=>"n12"]
],
]
])
]);
}
if($data=="n11"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عـزيزتي انـتي بل حالتين وحيده يعني
#حتبقين عزبه☹️😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p7"]
],
]
])
]);
}
if($data=="n12"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عـزيزتي انـتي بل حالتين وحيده يعني
#حتبقين عزبه☹️😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p7"]
],
]
])
]);
}
////
if($data=="p7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لو خيـروج تبقين عشر سنين بس تطبخين
لـو تزوجين ونتي عمرج 13💔🤷‍♂😹️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اطبـخ»💃",'callback_data'=>"n13"]
],
[
['text'=>"اتزوج »😹🙈",'callback_data'=>"n14"]
],
]
])
]);
}
if($data=="n13"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"منــوره طباختنـه فد صحنين تمن 😔😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p8"]
],
]
])
]);
}
if($data=="n14"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي يعمـري حامل شهـر 2😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p8"]
],
]
])
]);
}
////
if($data=="p8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيروج تطلعين بل شارع بس ستيان ولباس
لـو ترحين لمطعم تصـيحيـن احبه 😻😹️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ستيان »👙",'callback_data'=>"n15"]
],
[
['text'=>"مطـعم »🏨",'callback_data'=>"n16"]
],
]
])
]);
}
if($data=="n15"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"طاح حظج حامـل شهر 9😹😹😹
ستمري",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p9"]
],
]
])
]);
}
if($data=="n16"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ياعمري اني هـم احبج 🤤😻😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p9"]
],
]
])
]);
}
////
if($data=="p9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيروج تبوسين شخص من حلكه
لـو تبوكين عطـتر من محل وتشردين 🙊🤷‍♂️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"ابوس »😻",'callback_data'=>"n17"]
],
[
['text'=>"ابـوك »🤷‍♂😹",'callback_data'=>"n18"]
],
]
])
]);
}
if($data=="n17"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"وفف تخببل مو بوسه😻🤷‍♂😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p10"]
],
]
])
]);
}
if($data=="n18"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا يا حراميه 😹😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـتالي",'callback_data'=>"p10"]
],
]
])
]);
}
////
if($data=="p10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لـو خيروج تكـسرين البلازمه مالتكم
لـو ترقمـين شاب بلشارع 🙊🤷‍♂️",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اكسر »🤷‍♂😹",'callback_data'=>"n19"]
],
[
['text'=>"ارقم  »😻",'callback_data'=>"n20"]
],
]
])
]);
}
if($data=="n19"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"يصير كتلج ماله والي 😹😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"المقدمه",'callback_data'=>"🔌"]
],
]
])
]);
}
if($data=="n20"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي ردي رقمج عيوني😻🤷‍♂😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الـمقدمه",'callback_data'=>"🔌"]
],
]
])
]);
}
////////////////
if($data=="ppp1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ابن امك وابن ابيك ، وليس بأختك ولا بأخيك فمن يكون ؟لتحير😐😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اخيك",'callback_data'=>"k1"]],
[['text'=>"انت",'callback_data'=>"k2"]],
]
])
]);
}
if($data=="k2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m1"]],
]
])
]);
}
if($data=="k1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m1"]],
]
])
]);
}
if($data=="k1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m1"]],
]
])
]);
}
if($data=="k1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m1"]],
]
])
]);
}
if($data=="m1"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمـل الحديث(أن الله جميل يحب…)",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الانسان",'callback_data'=>"k3"]],
[['text'=>"الجمال",'callback_data'=>"k4"]],
]
])
]);
}
if($data=="k4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m2"]],
]
])
]);
}
if($data=="k3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m2"]],
]
])
]);
}
if($data=="m2"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ماهوه اطول شهر 😯😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ديسمبر",'callback_data'=>"k5"]],
[['text'=>"أبريل",'callback_data'=>"k6"]],
]
])
]);
}
if($data=="k5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m3"]],
]
])
]);
}
if($data=="k6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m3"]],
]
])
]);
}
if($data=="m3"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمل،،الأدب خير من …",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الذهب",'callback_data'=>"k7"]],
[['text'=>"الدنيا",'callback_data'=>"k8"]],
]
])
]);
}
if($data=="k7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m4"]],
]
])
]);
}
if($data=="k8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m4"]],
]
])
]);
}
if($data=="m4"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اذا ديجنا طفر عليكم وبيض بيضه البيضه المن راح تكون 😑😹💔 ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ألنا",'callback_data'=>"k9"]],
[['text'=>"الكـم",'callback_data'=>"k10"]],
]
])
]);
}
if($data=="k9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"طاح حظك بل الاثنين وين اكو ديج يبيض 😂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m5"]],
]
])
]);
}
if($data=="k10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹
خلي البيضه بـ 😐💔😹😹😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m5"]],
]
])
]);
}
if($data=="m5"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"هاذه للبنات ولد تعرفه جاوب😹
هايه شنو »(🔧)«محح😹🚶‍♂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عكس",'callback_data'=>"k11"]],
[['text'=>"صبانه",'callback_data'=>"k12"]],
]
])
]);
}
if($data=="k12"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m6"]],
]
])
]);
}
if($data=="k11"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k11"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k11"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m6"]],
]
])
]);
}
if($data=="m6"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"هاذه للشباب وبنات تعرفي جاوبي😹
هايه شنو »(👙)«اف يكلبي😹🚶‍♂",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ستيان",'callback_data'=>"k13"]],
[['text'=>"ستريج",'callback_data'=>"k14"]],
]
])
]);
}
if($data=="k13"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗
لا يا نغل يعرفه 😯😹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m7"]],
]
])
]);
}
if($data=="k14"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k14"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k14"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m7"]],
]
])
]);
}
if($data=="m7"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"زين اوك اسف ع هذنيج الاسئله »☹️😹
تحبني »❤️
لو 😯
لا »💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"❤",'callback_data'=>"k17"]],
[['text'=>"💔",'callback_data'=>"k18"]],
]
])
]);
}
if($data=="k17"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اوفيش هاك اليره 😍👏",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m8"]],
]
])
]);
}
if($data=="k18"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k18"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k18"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹
ولي ماحبك😒☹💔",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m8"]],
]
])
]);
}
if($data=="m8"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اذا اجه يـوم وكلولك نطيك 500 مليون
لو تاخذ حبيبتك فشنو راح تختار 😻💗😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"500 م",'callback_data'=>"k19"]],
[['text'=>"لا اخذ حبيبتي",'callback_data'=>"k20"]],
]
])
]);
}
if($data=="k20"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"خيولن حبيبي روح اخذ 500 م 😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m9"]],
]
])
]);
}
if($data=="k19"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k19"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k19"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك صح ونبي ☹😹😹😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m9"]],
]
])
]);
}
if($data=="m9"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمـل،،المصافحه تزيد في…",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الكلام",'callback_data'=>"k21"]],
[['text'=>"الود",'callback_data'=>"k22"]],
]
])
]);
}
if($data=="k22"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m10"]],
]
])
]);
}
if($data=="k21"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k21"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k21"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m10"]],
]
])
]);
}
if($data=="m10"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمـل،،ما احوش المدن بلا...",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الاصدقاء",'callback_data'=>"k23"]],
[['text'=>"العشاق",'callback_data'=>"k24"]],
]
])
]);
}
if($data=="k23"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m11"]],
]
])
]);
}
if($data=="k24"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k24"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k24"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m11"]],
]
])
]);
}
if($data=="m11"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اختـر الاتي ماهي اكبر المدن",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"البرازيل",'callback_data'=>"k25"]],
[['text'=>"الصين",'callback_data'=>"k26"]],
]
])
]);
}
if($data=="k26"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m12"]],
]
])
]);
}
if($data=="k25"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k25"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k25"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>"m12"]],
]
])
]);
}
if($data=="m12"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اكمل(في قمه الياس ينبت)",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الامل",'callback_data'=>"k27"]],
[['text'=>"الاشجار",'callback_data'=>"k28"]],
]
])
]);
}
if($data=="k27"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه والله انطوه نص ليره 😹😹💗",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"محاولى مرى اخرى",'callback_data'=>"1"]],
]
])
]);
}
if($data=="k28"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لا لا خطأ 😞😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k28"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عفيه صح 😆",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اكمـال",'callback_data'=>""]],
]
])
]);
}
if($data=="k28"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اي اي مبروك خطأ 🙈😹",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"محاولى مرى اخرى",'callback_data'=>"1"]],
]
])
]);
}