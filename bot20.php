<?php

define('API_KEY','TO');
echo "api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];
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

#                 MOHAMMED                    #
$update  = json_decode(file_get_contents('php://input'));
$message    = $update->message;
$text       = $message->text;
$chat_id    = $message->chat->id;
$id         = $message->from->id;
$user       = '@'.$message->from->username;
$name     = $message->from->first_name;
$data       = $update->callback_query->data;
$chat_id2   = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$as = array("6678394943007658","7395624194753899","84659362492531749","7302649743279351","1246778934450235");
$json = json_decode(file_get_contents("data.json"),true);
$bot = bot('getme',['bot'])->result->username;

if (!file_exists("data.json")) {
  file_put_contents("data.json", json_encode(['f' => null]));
}
$s = str_replace("/bc ",'',$text);
$us = explode("\n",file_get_contents("s.txt"));
if($text == "/bc $s" and in_array($id,$admins)){
    foreach($json as $key => $val){
    	bot('sendMessage',[
    		'chat_id'=>$key,
    		'text'=>$s
    		]);
    }
}
$us = explode("\n", file_get_contents("s.txt"));

if($message and !in_array($chat_id, explode("\n", file_get_contents("s.txt"))) ){file_put_contents("s.txt",$chat_id."\n",FILE_APPEND);}
if($data and !in_array($chat_id2, explode("\n", file_get_contents("s.txt"))) ){file_put_contents("s.txt",$chat_id2."\n",FILE_APPEND);}
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
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("data/memb.txt", $chat_id."\n",FILE_APPEND);
  }
if ($text == '/start') {  file_put_contents("s.txt",$chat_id."\n",FILE_APPEND);
    if(!isset($json[$chat_id])){
      $json[$chat_id]['num'] = 0;
      $json[$chat_id]['collect'] = 0;
      file_put_contents("data.json", json_encode($json));
    }
    $json[$ex_text[1]]['collect'] = $json[$ex_text[1]]['collect'] + 5;
    file_put_contents('data.json', json_encode($json));
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>" اهلا بك • $name
        
        انا بوت ربح الشيك 💳
        يجود في كل شيك 5$ رصيد حيث تستطيع ...
        الربح والحصول على المال 💰
        عمل البوت هو ان تضيف 20 عضو للحصول على النقاط 💙🍃
        من خلال النقاط تشتري الشيك الذي يحتوي على الرصيد 💳
        ---------------------------------------
        ان البوت امين + حقيقي ومضمون ® 
        للتكد من ذالك اضغط على #شرح مفصل  ",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"الحصول على نقاط▪️",'callback_data'=>"link"],['text'=>"الحصول على شيك💳",'callback_data'=>"collect"]],
 [['text'=>'شرح مفصل📄','callback_data'=>"shrh"],['text'=>'عدد النقاط التي املكها📈','callback_data'=>"sale" ]],
 [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$by"]]
      ]
      ])
    ]);
}
switch ($data) {
  case 'sale':
    bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>' عدد نقاطك حاليا <'.$json[$chat_id2]['collect'].'> ®',
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
         [['text'=>"الحصول على نقاط▪️",'callback_data'=>"link"],['text'=>"الحصول على شيك💳",'callback_data'=>"collect"]],
        [['text'=>"العودة 🔙",'callback_data'=>"back"]],
      ]])
      ]);
    break;
  case 'collect':
    bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>' عدد نقاطك حاليا <'. $json[$chat_id2]['collect'] .'> ®
سعر الشيك الواحد 20 نقطة ®
اضغط على شراء شيك للحصول على واحد 👤
اضغط على الحصول على نقاط لكسب نقاط ⛏ ',
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"شراء شيك💳",'callback_data'=>'shekk']],
        [['text'=>"الحصول على نقاط▪️",'callback_data'=>'link']],
       [['text'=>"العودة 🔙",'callback_data'=>"back"]],
  ]])
       ]);
    break;
    case 'link':
      bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>' عدد نقاطك الحالية : <'.$json[$chat_id2]['collect'].'> 💡
للحصول على النقاط 🎈
يجب عليك مشاركه الرابط الخاص بك ⚙️
قم بارسال الرابط الى اصدقائك وفي القناه ™
كل شخص يدخل سوف تحصل على نقطه 💫
الرابط الخاص بك هو :
https://t.me/'.$bot.'?start='.$chat_id2.'
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
يوجد منشور مرتب دعائي تستطيع نسخه 
المنشور يحتوي على الرابط الخاص بك 💥
اضغط على عرض المنشور 🌥 ',
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"عرض المنشور📃️",'callback_data'=>"liop"]],
       [['text'=>"العودة 🔙",'callback_data'=>"back"]],
       [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$buyy"]]
  ]])
        ]);
        break;
        case 'shekk':
      bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>' اهلا بك : '.$name.'
<'.$json[$chat_id2]['collect'].'> : عدد نقاطك 
اليك اوامر شراء الشياكات💳
20 نقطه = 5💲
30 نقطه = 10💲
40 نقطه = 15💲',
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
      [['text'=>"▪️20 نقطه",'callback_data'=>"20"],['text'=>"▪️30 نقطه",'callback_data'=>"30"]],
        [['text'=>"▪️40 نقطه",'callback_data'=>"40"]],
        [['text'=>"العودة 🔙",'callback_data'=>"back"]],
      ]])
      ]);
        break;
case 'shrh':
      bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>" #ما هو صحة هذا البوت 🤷🏻‍♂️
ان فكره البوت هوة الاستفادة بين الناس حيث شخص يقوم بلحصول على اعضاء مقابل رصيد ..... وشخص اخر يحصل على رصيد مقابل دعوة الاعضاء 😴
#من اين الرصيد .... ™
نحن نحصل على الرصد من قبل شخاص يريدون تمويل اعضاء لقنواتهم مقابل هذا الرصيد .... 💳

يقوم شخص بعطائنا رصيد مقابل ان نضيف له عدد محمد من الاعضاء 👥
تقوم انت بدعوة اصدقائك عن طريق رابط الدعوة الخاصة بك وتحصل على نقاط وتشتري بهذه النقاط شيك 🔖
تبقى انت وحضك مع هذا الشيك يمكن ان يحتوي على 10$ او يحتوي على 5$ 💰

#من المستفيد الاكبر ؟
المستفيد الاكبر هو الشخص الذي يجمع عدد نقاط اكثر بلاضافة الى الشخص الذي يدفع الرصيد مقابل االاعضاء 💡 ",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"العودة 🔙",'callback_data'=>"back"]],
      ]])
        ]);
        break;
        case 'liop':
      bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>" تريد تحصل رصيد ....؟ 💳
بدون جذب ولا هلسوالف تعال واخذ رصيد ⌛️
عن طريق هلبوت تكدر تربح رصيد 💰
بكل انواعة اسيا - زين - كورك 🎈
كل ما عليك هو الدخول الى الرابط واسحب شيك الرصيد 😌💵
الرابط هو :
https://t.me/$bot?start=$chat_id2 ",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"العودة 🔙",'callback_data'=>"back"]],
      ]])
        ]);
        break;
}
file_put_contents("data.json", json_encode($json));
$ex_text = explode(' ', $text);
if($ex_text[0] == '/start' and isset($ex_text[1]) and $ex_text[1] != $id){
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>" اهلا بك • $name
        
        انا بوت ربح الشيك 💳
        يجود في كل شيك 5$ رصيد حيث تستطيع ...
        الربح والحصول على المال 💰
        عمل البوت هو ان تضيف 20 عضو للحصول على النقاط 💙🍃
        من خلال النقاط تشتري الشيك الذي يحتوي على الرصيد 💳
        -----------------------------------------------------
        ان البوت امين + حقيقي ومضمون ® 
        للتكد من ذالك اضغط على #شرح مفصل  ",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
          [['text'=>"الحصول على نقاط▪️",'callback_data'=>"link"],['text'=>"الحصول على شيك💳",'callback_data'=>"collect"]],
 [['text'=>'شرح مفصل📄','callback_data'=>"shrh"],['text'=>'عدد النقاط التي املكها📈','callback_data'=>"sale" ]],
 [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$by"]]
      ]
      ])
    ]);
    if (!in_array($chat_id, explode(',', $json[$ex_text[1]]['ids']))) {
      if(!isset($json[$chat_id])){
          $json[$chat_id]['num'] = 0;
          $json[$chat_id]['collect'] = 0;
          file_put_contents("data.json", json_encode($json));
        }
        $json[$ex_text[1]]['collect'] = $json[$ex_text[1]]['collect'] + 1;
        if(isset( $json[$ex_text[1]]['ids'])){
        $json[$ex_text[1]]['ids'] = $json[$ex_text[1]]['ids'] ."$id,";
        } else {
            $json[$ex_text[1]]['ids'] = $json[$ex_text[1]]['ids'] ."$id";
        }
        file_put_contents('data.json', json_encode($json));
        bot('sendMessage',[
          'chat_id'=>$ex_text[1],
          'text'=>' هنالك عضو دخل عبر رابطك ➿
معرف العضو ~> '.$user.'
حصلت على نقاط 1 اصبحت نقاطك : <'.$json[$ex_text[1]]['collect'].'>  '          ]);
    }
    
  }
if($data == 'back'){
    $json[$chat_id2]['sale'] = null ;
    file_put_contents("data.json", json_encode($json));
     bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
    'text'=>" اهلا بك • $name
        
        انا بوت ربح الشيك 💳
        يجود في كل شيك 5$ رصيد حيث تستطيع ...
        الربح والحصول على المال 💰
        عمل البوت هو ان تضيف 20 عضو للحصول على النقاط 💙🍃
        من خلال النقاط تشتري الشيك الذي يحتوي على الرصيد 💳
        -----------------------------------------------------
        ان البوت امين + حقيقي ومضمون ® 
        للتكد من ذالك اضغط على #شرح مفصل  ",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
          [['text'=>"الحصول على نقاط▪️",'callback_data'=>"link"],['text'=>"الحصول على شيك💳",'callback_data'=>"collect"]],
 [['text'=>'شرح مفصل📄','callback_data'=>"shrh"],['text'=>'عدد النقاط التي املكها📈','callback_data'=>"sale" ]],
 [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$by"]]
      ]
      ])
    ]);
}
if ($data == '20' and $json[$chat_id2]['collect'] >= 20) {
    $json[$chat_id2]['sale'] = $data ;
    file_put_contents("data.json", json_encode($json));
    bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>" 5$ مبروك لقد ربحت مبلغ  :- $as
            ولقد تم خصم  :- ".$json[$chat_id]['sale']."   ",
        'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"العودة 🔙",'callback_data'=>"back"]],
      ]])
        ]);
}
if ($data == '30' and $json[$chat_id2]['collect'] >= 30) {
    $json[$chat_id2]['sale'] = $data ;
    file_put_contents("data.json", json_encode($json));
    bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>" 5$ مبروك لقد ربحت مبلغ  :- $as
            ولقد تم خصم  :- ".$json[$chat_id]['sale']."  ",
        'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"العودة 🔙",'callback_data'=>"back"]],
      ]])
        ]);
}
if ($data == '40' and $json[$chat_id2]['collect'] >= 40) {
    $json[$chat_id2]['sale'] = $data ;
    file_put_contents("data.json", json_encode($json));
    bot('editMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$message_id,
        'text'=>" 5$ مبروك لقد ربحت مبلغ  :- $as
            ولقد تم خصم  :- ".$json[$chat_id]['sale']."  ",
        'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"العودة 🔙",'callback_data'=>"back"]],
      ]])
        ]);
}

$cht = explode("\n",file_get_contents("ch.txt"));
if (preg_match('/^@(.*)/', $text) and $json[$chat_id]['sale'] >= 20) {
    
    $ok =  json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$text."&user_id=$chat_id"))->ok;
    if(!in_array($text,$cht)){
    if ($ok == true) {
     
        switch ($json[$chat_id]['sale']) {
            case '20':
            $json[$chat_id]['collect'] = $json[$chat_id2]['collect'] - 20;
            file_put_contents("data.json", json_encode($json));
                break;
            case '30':
                $json[$chat_id]['collect'] = $json[$chat_id2]['collect'] - 30;
                file_put_contents("data.json", json_encode($json));
                break;
                case '40':
                    $json[$chat_id]['collect'] = $json[$chat_id2]['collect'] - 40;
                    file_put_contents("data.json", json_encode($json));
                    break;
                    
        }
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>" 5$ مبروك لقد ربحت مبلغ  :- $as
            ولقد تم خصم  :- ".$json[$chat_id]['sale']."  "
            ]); 
            switch($json[$chat_id]['sale']){
                case 20:$s=15;break;
                case 30:$s=25;break;
                case 40:$s=50;break;
            }

if ($text and $message->reply_to_message and in_array($id, $admins)) {
    bot('sendMessage',[
        'chat_id'=>$message->reply_to_message->forward_from->id,
        'text'=>$text
        ]);
}
if($text == '/us' and $chat_id == $admins){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>count($us)
        ]);
}
}}}

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