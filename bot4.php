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
$u = explode("\n", file_get_contents("mem.txt"));
$mode = file_get_contents('mode.txt');
 function re($d,$f,$g){
    return str_replace($d, $f, $g);
}
if ($from_id==$admin) {
  if($text == "/start" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"هلا مديري جبار",
    'resize_keyboard'=>true,
    'reply_markup'=>json_encode([
      'keyboard'=>[
        [['text'=>'ارسال رساله الى الكل 🚀']],
        [['text'=>'الاعضاء 👥']]
      ]
    ])
        ]);
}
if ($text == 'ارسال رساله الى الكل 🚀') {
  file_put_contents('mode.txt', "bc");
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"ارسال اي شي ليتم نشره"
  ]);
}
if( $mode=="bc" ){
if($message->forward_from){
    for($i=0;$i < count($u); $i++){
    bot('forwardMessage',[
        'chat_id'=>$u[$i],
        'from_chat_id'=>$chat_id,
        'message_id'=>$message->message_id
        ]);
}}
  if ($text != "ارسال رساله الى الكل 🚀") {
    # code...
  for ($i=0; $i < count($u); $i++) { 
    bot('sendMessage',[
      'chat_id'=>$u[$i],
      'text'=>"# $text"
    ]);
  }
unlink('mode.txt');
}
  if ($message->photo) {
    for ($i=0; $i < count($u); $i++) { 
    bot('sendPhoto',[
      'chat_id'=>$u[$i],
      'photo'=>$message->photo[0]->file_id,
      'caption'=>$message->caption
    ]);
}
unlink('mode.txt');

  }
  if ($message->voice) {
    for ($i=0; $i < count($u); $i++) { 
    bot('sendvoice',[
      'chat_id'=>$u[$i],
      'voice'=>$message->voice->file_id,
      'caption'=>$message->caption
      ]);
}
unlink('mode.txt');

}
}
$c = count($u);
if ($text == 'الاعضاء 👥') {
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"مستخدمين البوت 🤖 الخاص بك :- $c"
  ]);
}
}
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("mem.txt", $chat_id."\n",FILE_APPEND);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$id = $message->from->id;
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

if($text== "/start" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهـلا بـك في بوت قرائه الكف» 💗
ارسـلي صـوره يدك اليـسرى ",
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("mem.txt", $chat_id."\n",FILE_APPEND);
}
}

if($message->photo){
    bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>'اهلا بـك تم تحميل النتائج الرجاء اضغـط ع قرائه ',
        'reply_to_message_id'=>$message->message_id,
        'reply_markup'=>json_encode([
          'inline_keyboard'=>[  
[['text'=>"قرائه",'callback_data'=>"®"]],
[['text'=>"- لشراء البوت ~ #",'url'=>"t.me/$by"]],
              ]
        ])
    ]);
}

if($data=="®"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/596",
'caption'=>'هـل هاذه الخطـوط مشابه الخطوط يدك »🤔',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"p1"]],
[['text'=>"لا",'callback_data'=>"©1"]],
]
])
]);
}
if($data=="©1"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/597",
'caption'=>'هـل هاذه الخطـوط مشابه الخطوط يدك »🤔',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"p2"]],
[['text'=>"لا",'callback_data'=>"©2"]],
]
])
]);
}
if($data=="©2"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/598",
'caption'=>'هـل هاذه الخطـوط مشابه الخطوط يدك »🤔',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"p3"]],
[['text'=>"لا",'callback_data'=>"©3"]],
]
])
]);
}
if($data=="©3"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/599",
'caption'=>'هـل هاذه الخطـوط مشابه الخطوط يدك »🤔',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"p4"]],
[['text'=>"لا",'callback_data'=>"©4"]],
]
])
]);
}
if($data=="©4"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/600",
'caption'=>'هـل هاذه الخطـوط مشابه الخطوط يدك »🤔',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"p5"]],
[['text'=>"لا",'callback_data'=>"©5"]],
]
])
]);
}
if($data=="©5"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/601",
'caption'=>'هـل هاذه الخطـوط مشابه الخطوط يدك »🤔',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"نعم",'callback_data'=>"p6"]],
]
])
]);
}
if($data=="p1"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/602",
'caption'=>'انحناء خط القلب يخبرنا أن لديك مهارات كبيرة في جذب شخص من الجنس الآخر
ان كنت لطيف ومتسامح وديك مهارات قوية. إذا كنت ممارسة مهنة في حقل مثل وسائل الإعلام',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
}

if($data=="p2"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/602",
'caption'=>'أنت شخص متوازن من حيث الصحة، والوعي العقلي، والقدرة على التحمل والطاقة
يتوقع ان كنت لطيف ومتسامح وديك مهارات قوية. إذا كنت ممارسة مهنة في حقل مثل وسائل الإعلام، والعلاقات العامة',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
}

if($data=="p3"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/602",
'caption'=>'
هالة لديه الدفء الذي يجعل الناس يشعرون بالراحة والأمان عندما حولك. كنت تعطي ارتفاع الصدد إلى الحب.
لنا ان كنت واضحا في التفكير فرد، ومن المرجح أن تكون ناجحة في الحياة بسبب حكمتكم',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
}

if($data=="p4"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/602",
'caption'=>'انحناء خط القلب يخبرنا أنك لن تجد من السهل على التواصل والانفتاح على شريكك. هذا ومن المرجح أن يسبب مشاكل في حياتك العاطفية، وبالتالي يجب أن تحاول لتمويل الشريك الذي هو الفهم جدا.',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
}

if($data=="p5"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/602",
'caption'=>'مجموعة من خط الحياة يخبرك أنك عموما طيب القلب . وهو ما يعني أن قلبك هو في حالة صحية جيدة والدورة الدموية غير جيدة. وهذا يعني أيضا أنك حنون وتعاطفا مع الآخرين.',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
}

if($data=="p6"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'photo'=>"https://t.me/kvfyxnh/602",
'caption'=>'وضوح الخط القلب يقول أنك شخص رومانسي جدا 
وتشير خط رأسك أن لديك ذاكرة قوية والتركيز. لقد تم المباركة مع قوة التركيز ويمكنك أن تركز على العمل لساعات طويلة دون الحصول على مشتتا',
'parse_mode'=>'MARKDOWN',
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
]
])
]);
}
if($message->reply_to_message->forward_from->id and $id == $admin){
    bot('sendmessage',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'text'=>$text
    ]);
}
if($message->voice){
    bot('sendvoice',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'voice'=>$message->voice->file_id,
    ]);
}
if($message->photo){
    bot('sendphoto',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'photo'=>$message->photo->file_id,
    ]);
}
if($message->document){
    bot('senddocument',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'document'=>$message->document->file_id,
    ]);
}
if($message->Sticker){
    bot('sendSticker',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'Sticker'=>$message->Sticker->file_id,
    ]);
}
if($message->video){
    bot('sendvideo',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'video'=>$message->video->file_id,
    ]);
}
if($message->audio){
    bot('sendaudio',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'audio'=>$message->audio->file_id,
    ]);
}