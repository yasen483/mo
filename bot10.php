<?php

$API_KEY = "TO";
define('API_KEY','TO');
echo "api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];

define('NO', '❌');
define('YES', '✅');
$e = "@KHYUBOT";
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
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
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
    
if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اهــلا بك عزيزي💛  [$name](tg://user?id=$id)
فــي بوت لعبــة لو خيــروك🔖
البــوت الاول فــي التلجــرام⚡
يمكنــك من خلال هــذه اللعبــه🌀
واتمــام المراحــل ال(3) وربــح خادم vps مقــدم من مطــور البــوت⭐ ",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>"ابــدأ اللعب✔",'callback_data'=>'hmd1']],
[['text'=>"🔊 -  تابــعنا - 🔊",'url'=>"t.me/$chs"]],
[['text'=>"- لشراء البوت ~ #",'url'=>"t.me/$by"]],
]
])
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
if($data == 'hmd1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'اهــلا بك عزيــزي $name ✨

اخــتر جنســك/ج لبدأ اللعــب',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'بــنت🙆','callback_data'=>'l1']],
        [['text'=>'ولــد','callback_data'=>'l2']],
      ]
    ])
  ]);
}
if($data == 'l2'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'عزيــزي🌝⚡

لو خيــروك【تعــض روحك/تضرب دغلــه بالكاع😂】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'تعــض روحك😂','callback_data'=>'s1']],
        [['text'=>'تضــرب دغله😝😂','callback_data'=>'s2']],
      ]
    ])
  ]);
}
if($data == 's1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'#ههههه😂 روح عــض روحــك يبا😂',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي📌','callback_data'=>'g1']],
      ]
    ])
  ]);
}
if($data == 's2'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'يارب كــون تطيح وتتكسر😂😕',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🎐','callback_data'=>'g1']],
      ]
    ])
  ]);
}
if($data == 'g1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لــو خيــروك👿

【تطلــع بالشارع مــصلخ/تاكل بصل بالريــوك😂】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'تطــلع مصلخ😂😒','callback_data'=>'r1']],
        [['text'=>'تاكــل بصل😝😂','callback_data'=>'r2']],
      ]
    ])
  ]);
}
if($data == 'r1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'هيــج وكون بنات بالشــارع😂🌚

وتصيــر مضحكــه يالخايس يالمعفــن☺😂',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💡','callback_data'=>'g22']],
      ]
    ])
  ]);
}
if($data == 'r2'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ع اســاس انته ريحتك حلوه😂
وتاكــل بصل من الصبح😂روح حمبي روح👿',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي📤','callback_data'=>'g22']],
      ]
    ])
  ]);
}
if($data == 'g22'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لو خيــروك💭

【تاكــل مركــة كرفس🌴/تاكــل شوربة عكاريك🐸】
',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'مركــة كرفس😋😹','callback_data'=>'sel']],
        [['text'=>'شوربــة عكاريك😹','callback_data'=>'sel1']],
      ]
    ])
  ]);
}
if($data == 'sel'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ترهــ ماكــو مركة كرنفــس😴😹

عقــل المزنبــر🌝😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💠','callback_data'=>'sec']],
        
      ]
    ])
  ]);
}
if($data == 'sel1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'مو ؏ اســاس انته باليابــان😹🌚

اكعــد عمي لتزوع عليــنه🌝📛',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي📮','callback_data'=>'sec']],   
      ]
    ])
  ]);
}
if($data == 'sec'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ياحبيــصي💥

لو خيــروك【تكســر شمعه براسك😮😹/تاكل ذيــل جريدي🌝😢】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اكســر شمعه👿','callback_data'=>'shma']],
        [['text'=>'اكــل ذيل جريدي😝😹','callback_data'=>'grede']],
      ]
    ])
  ]);
}
if($data == 'shma'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'اي وابــوك يبتلي بخياطاتــك😴😹

اكعــد عمي اكــعد منو جابــرك🌝',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🚶','callback_data'=>'t']],   
      ]
    ])
  ]);
}
if($data == 'grede'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ربــي😊
دعــوة مطلــكه حامــل😴😹

كــون يطكك طاعون وساحون ودولمه ماعــون🌚😹
كول (اي) كلــت اي ربــي كون يطكــه زهايمر وبطنه سهــال وينســه مكان الحمام😒😂
ياكــل جريدي🌚😹غير عمك ياباني واني ما ادري 😕😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💠','callback_data'=>'t']],
      ]
    ])
  ]);
}
if($data == 't'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لو خيــروك😳😹

【تطلع بالشارع تصيح انــي حامل🎅/لو تنكع شعرك ماي وطحين😮😂】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اطــلع بالشارع واصــيح😏','callback_data'=>'shard']],
        [['text'=>'انكع شــعري مي وطحيــن😨','callback_data'=>'then']],
      ]
    ])
  ]);
}
if($data == 'shard'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'مبــروك😹
يتربــى بعزك🌚😹شكــد عليك بيا شهــر😨😂',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🚶','callback_data'=>'sec45']],
      ]
    ])
  ]);
}
if($data == 'then'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'اي وحــط شوي ملح🌚⚡

وانطــي لامك تخبــزه🌝😹

كون صخونــه مال حصــونه🌚😂',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🌟','callback_data'=>'sec45']],     
      ]
    ])
  ]);
}
if($data == 'sec45'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لــو خيــروك🙊🙀

【تزوج عبــده😹ونادره/لو حاتــه وعايــزه😹🌚】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'عبــده ونادره🌝','callback_data'=>'abda']],
        [['text'=>'حلــوه وعيــزه🌚','callback_data'=>'hloa']],
      ]
    ])
  ]);
}
if($data == 'abda'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'و الله عرفــتك😸👐

حتخــتار العبــده الصنــف مالتك+مطية كراب🙀😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي▶','callback_data'=>'srag']],
      ]
    ])
  ]);
}
if($data == 'hloa'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ليــش عينــي وشبيهه العبده ماختاريتهه😏

ع اســاس ابوك روسي وامك باكســتانيه🌚
لو ليــن وصخه مثلــك😔😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي✅','callback_data'=>'srag']],
      ]
    ])
  ]);
}
if($data == 'srag'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لــو خيــروك🌚

【تشيــل جسمك شيره🌚💥/تزيــن اكــرع😮】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اشيل جســمي شيره🙊','callback_data'=>'gsme']],
        [['text'=>'ازيــن كــرعه😸','callback_data'=>'kraa']],
      ]
    ])
  ]);
}
if($data == 'gsme'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ءوووف😍😹

وتعــالي وره 12 نســولف🙀😗',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي😹','callback_data'=>'gg12']],
      ]
    ])
  ]);
}
if($data == 'kraa'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'#ههههههههههههه

وتطــلع جنــك خص... شارده🌚😹
💥💃💃💃💃💥',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'كمــل يبه😂','callback_data'=>'gg12']],
      ]
    ])
  ]);
}
if($data == 'gg12'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'حمبقلبــي😎💥

لو خيــروك【تروح لبيت جيرانكم تكلهم احب بتكم💃😹/
لــو تروح للصيــدليه تكله وين اخلي التحميــله🙊😹】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اروح لجيــرانه🙀','callback_data'=>'gerana']],
        [['text'=>'اروح لأبــو الصيدليــه😹','callback_data'=>'sedlea']],
      ]
    ])
  ]);
}
if($data == 'gerana'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'وحضــرك 50 مليــون فصل😹

واتحمــل فد 100 ع بابــكم 🌚😹
واستعــد للزواج منــهه💃😹هيج وتطلــع جكمه😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🙈','callback_data'=>'ggg1']],
      ]
    ])
  ]);
}
if($data == 'sedlea'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'نهنهنه😹🌚

وخــلك كفــو وتحمل الجلاليــغ😹🌝💃

💃💃',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💫','callback_data'=>'ggg1']],
      ]
    ])
  ]);
}
if($data == 'ggg1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ممم لو خيــروك😾

【تاكــل حنطه🌾/تطك جلب بالشارع جلاغ💃😹】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'تاكــل حنطــه🌾','callback_data'=>'hnta']],
        [['text'=>'تضرب الجلــب🐶','callback_data'=>'glp']],
      ]
    ])
  ]);
}
if($data == 'hnta'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ايباااخ😏

روح الزاجــل 🐦البداخلــك مسيطره عليك😸
بيــك خير اضرب الجلــب💃💥😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🔓','callback_data'=>'g88']],
      ]
    ])
  ]);
}
if($data == 'glp'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'اي وتضــل ثابت لو اركض اخوي عامــر😹💃

لتحمــه بــس😹ها اركض اركض دوس🏃🏃🏃',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💛','callback_data'=>'g88']],
      ]
    ])
  ]);
}
if($data == 'g88'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'يامحفــوض الســلامه😂والبكــه

لو خيــروك📌【تضــرط ببطل وتشم ريحته/تبــوس صخله بحلــكها😴😂】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اضرط واشمــهه😂','callback_data'=>'lo0']],
        [['text'=>'ابوس صخــله😢','callback_data'=>'loo0']],
      ]
    ])
  ]);
}
if($data == 'lo0'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'يالخــايس يالمعفــن😸😹

شنــي هالعقليــه الذبانيــه العندك😮😹

تخلــيك تشم ريحــة ضراطك الحمبقازيــه👽😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💥','callback_data'=>'gefara']],
        
      ]
    ])
  ]);
}
if($data == 'loo0'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ماوصيــك اخــذلك حلك مرتــب😹

#هههههههههههههه',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💎','callback_data'=>'gefara']],
        
      ]
    ])
  ]);
}

if($data == 'gefara'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'اهــلا بك🙊💫

وشكــرا على استخدامك بــوتنا😻
انتضــر تحديــث البوت القادم لاكمــال المراحــل💥

سيــتم التحــديث بعد يوميــن😻 تحديات جديده😻
تابــعنا من فضــلك @$chs
بأشتراككم بقنــاتنا تحفيز لنا بالاستمرار
يمكنك مراسلتنـا لأضافة تحديات الى البوت 
راسلنا لأضافة تحدياتك من هنا @$chs',
    ]);
}
if($data == 'l1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'💥💥💥💥💥💥

يا امــﮧ الكمــﮧل😹/لو خيــروج🌚💃

【تغسلين شعــرج بنفط🙊🙀/تكمشــين صرصر بأيدج😹】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اغســل شعري بنفط😢','callback_data'=>'nft']],
        [['text'=>'اكمــش صرصر😏😹','callback_data'=>'srsr']],
      ]
    ])
  ]);
}
    if($data == 'nft'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'يــلا عيــني💃💃

غنــي وياي🔇🔇
ام الكمل والصيــبان😹💃💃ها ها ام الكمــل والصيــبان😹💃💃',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💛','callback_data'=>'tlale']],
      ]
    ])
  ]);
}
if($data == 'srsr'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'احــم🌚😹

هايــمنو التكمــش صرصر🌚😹
متأكده🌚😹 هاذ ويهج😹💃',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💖','callback_data'=>'tlale']],
      ]
    ])
  ]);
}
if($data == 'tlale'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'يابعــد روح البــوت والمطور😹

لــو خيروك🙀

【تطلعين بــدون مكياج وكلنا العراق😹/

ترحــين لأمج تكليلــهه اني مزوجه بالسر🙊😹】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'تطلعــين بدون مكياج😝💛','callback_data'=>'mkeag']],
        [['text'=>'تكــلين لامج🙀','callback_data'=>'amg1']],
      ]
    ])
  ]);
}
if($data == 'mkeag'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'والله جــذابه😹

وعــلي جذابه😹 والحسين جذابه😹
المصنهــره 😹المزنعــره😴😹
انــتي ويهج ليكول مطــور البوت😏😹
وطلعين بدون مكياج😹💃💃
نكطــع واهس الشباب بالــزواج😹💃💃🌚',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💫🙊','callback_data'=>'telale1']],
      ]
    ])
  ]);
}
if($data == 'amg1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'كــفو🌚💪

وخــلج قويــه حبحياتي😼
ولتبجــين من اول راجــدي😹😹😹😹
💃💃💃💃💃💃',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💥','callback_data'=>'telale1']],
      ]
    ])
  ]);
}
if($data == 'telale1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لــو خيــروج🌚😹

【تطــلعيــن بــدون 👙/🌚😹/تنطــين حلك لعبــد🌚😹】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اطلع بــدون 👙','callback_data'=>'stean']],
        [['text'=>'انطــي حلك لعبــد🌚','callback_data'=>'abdd']],
      ]
    ])
  ]);
}
if($data == 'stean'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'وف🙊😹

وتعــاي يم المطــور😹💃
يريــد يسولف وياج🌚😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي😒','callback_data'=>'telale2']],
      ]
    ])
  ]);
}
if($data == 'abdd'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'جذاااااااااااااااااااابه🌚😹

هايــه $name 😹😹

جذابه هو انتن تدورن حاتيــن🌚😹النوب تنطين حلــك لعبد🌚',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي😸','callback_data'=>'telale2']],
      ]
    ])
  ]);
}
if($data == 'telale2'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'كمشــتج سميــره😹

تعــاي تعاي 😹 لو خيــروج🌚👇

【تصــومين سنه😢/تاكــلين شوربــة عكاريك😍😹】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'اصــوم سنه😢','callback_data'=>'asom']],
        [['text'=>'اكــل شوربة عكاريــك😢😹','callback_data'=>'akarek']],
      ]
    ])
  ]);
}
if($data == 'asom'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'جنــي سمعت وحده تكــول اصوم🌚😨

سميــره لجذبيــن😒😹
وماعــون الباميــه منو ياكــله👿😹يوميه
اهووو هم كالت اني برنسيس ما اكــل🌚😹
هم بجت 😒😹يلا يلا صومي بس لتبجين😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🙊','callback_data'=>'telale3']],
      ]
    ])
  ]);
}
if($data == 'akarek'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'والكيــاته🌚😹

والمامــا ما اكول هاي الءكله😹

هج هاذ ماعون شوربــة عكاريــك|🐸|',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🐸','callback_data'=>'telale3']],
      ]
    ])
  ]);
}
if($data == 'telale3'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'سميــره😹

لو خيــروج🌚😹

【عريــس🙊💑/باريــس🗼】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'عريــس🙊💥','callback_data'=>'ares3']],
        [['text'=>'باريــس🗼','callback_data'=>'pares']],
      ]
    ])
  ]);
}
if($data == 'ares3'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'عفــيه الحبــابه🌚💃😹

بــس العريس علمــود الستــر😏💛
لــو بس تــردن تعرسن جمبك لالا😹💃🚶',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🙊','callback_data'=>'telale7']],
      ]
    ])
  ]);
}
if($data == 'pares'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'مشيطلعيبرا🌚😹

بنــت الدبــل كفه😒😹

اكــو احلى من الستــر😒💥لو انتن تحبــن الدياحــه💃😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🎄','callback_data'=>'telale7']],
      ]
    ])
  ]);
}
if($data == 'telale7'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لــو خيــروج🌚💥

【تزوجــين مطــور البــوت😻💛

لــو اي شخــص من التــلي🙊💛】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'مطــور البــوت💜💍','callback_data'=>'almtor']],
        [['text'=>'اي شخــص🙉✨','callback_data'=>'aeshs']],
      ]
    ])
  ]);
}
if($data == 'almtor'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'هلكــد تحبين مطوري🙊💛😹

لــو لواكه علمــود يســويلج بوتات🌚😹💥',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي🔏','callback_data'=>'telale8']],
      ]
    ])
  ]);
}
if($data == 'aeshs'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'اي يلــا ولــي😒💥😹

روحــي دوريــلج زاحف اخــذي😏😹

شبي المطــور يجكجك🌚😹خــوش ولد وميســاني😻',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💎','callback_data'=>'telale8']],
      ]
    ])
  ]);
}
if($data == 'telale8'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لــو خيــروج👽

【نت ماكــو ٣ ايام🐸✨】

【اكــل ماكو ٣ ايــام🐸💛】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'نــت ماكــو📡','callback_data'=>'nt1']],
        [['text'=>'اكــل ماكــو🍕','callback_data'=>'akl1']],
      ]
    ])
  ]);
}
if($data == 'nt1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'والله شكــلج🌚💛😹

احــاول اصــدكج🌚🎐😹
مدا اكــدر اتوقعج ٣ ايام بــدون حبيبج 😝😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💥','callback_data'=>'telale9']],
      ]
    ])
  ]);
}
if($data == 'akl1'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'عفــيه السبــاعيه😻💛💥

هيــج اريــدج😻🙊💥

نعلــبو النــت😝😹بس من تبجين ع حبيــبج😹
ابجي بغرفتــج لاشبعيــن كتل🌚😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💄','callback_data'=>'telale9']],
      ]
    ])
  ]);
}
if($data == 'telale9'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'لــووووو خيــروووج🙉

【تلبســين حفايــة ولد وترحين للمنتــزه💥😹】

【تمشــين حافيــه لمــدة سنه😹💥】',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'البس حفــاية ولد😸💛💥','callback_data'=>'hfaya']],
        [['text'=>'امشــي حافيــه🐸💎','callback_data'=>'hafya']],
      ]
    ])
  ]);
}
if($data == 'hfaya'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'نهنهنه😹💃💃💃💃

💎وتصــيرين مضحكه بالمنتــزه💎😹

😹💥يالخايــسه يالمعفــنه💥😹',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💠','callback_data'=>'snde']],
      ]
    ])
  ]);
}
if($data == 'hafya'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'ربــي🌚👐

كــون الكــاع كلهه كزاز😼

وماتشــرفي بس تــدوسين علي😍😹

ربــي كون يطــب برجلــك بسمار 
طوله عشرطعش متــر💥😹💛

[  اضغط لمتابعتنــا من هنا @$chs',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'التــالي💥💛','callback_data'=>'snde']],
      ]
    ])
  ]);
} 
if($data == 'snde'){
  bot('EditMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'اهــلا بكــي🙊💫

وشكــرا لكــي على استخدامك بــوتنا😻
انتضــري تحديــث البوت القادم لاكمــال المراحــل💥

سيــتم التحــديث بعد يوميــن😻واضافــة
 تحديات جديده😻
تابــعنا من فضــلك @$chs

بأشتراككم بقنــاتنا تحفيز لنا بالاستمرار

يمكنك مراسلتنـا لأضافة تحديات الى البوت 
راسلنا لأضافة تحدياتك من هنا @$ch

اذا اعجبــك البــت لاتنســى دعمنا بأشتــراك🙊💛


[اضغــط هنــا لمتابــعتنا🌝💥💛] $ch',
    ]);
}