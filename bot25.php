<?php
/*
    This file by : @s_S_a_15
    My Channel : @b7_78
*/
ob_start();
$API_KEY = "TO"; // Add token
echo "api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];
define('API_KEY',$API_KEY);
//jj
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
$update   = json_decode(file_get_contents('php://input'));
$message  = $update->message;
$from_id  = $message->from->id;
$chat_id  = $message->chat->id;
$text     = $message->text;
$data     = $update->callback_query->data;
$inline   = $update->inline_query->query;
$id       = $update->inline_query->from->id;
$msg_id   = $update->inline_query->inline_message_id;
$username = $update->inline_query->from->username;
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
$cuser    = $update->callback_query->from->username;
$cid      = $update->callback_query->from->id;
if ($inline) {
    $ex = explode(" ", $inline);
    $user = trim($ex[0],"@");
    $wh = str_replace($ex[0], $wh, $inline);
    bot('answerInlineQuery',[
            'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>base64_encode(rand(5,555)),
                'title'=>"هذه همسه سريه ل $user هو فقط من يستطيع روئيتها",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"اهذه همسه سريه ل $user هو فقط من يستطيع روئيتها"],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>'اضغط للرؤيه','callback_data'=>$user."or".$username."or".$wh]
                ],
             ]]
          ]])
        ]);
}
if ($data) {
    $ex = explode("or", $data);

    if (preg_match('/^('.$ex[0].')/i', $cuser) or preg_match('/^('.$ex[01].')/i', $cuser) or $cid == $ex[0]) {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>$ex[2],
            'show_alert'=>true
            ]);
    }else {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"الرساله ليست لك",
            'show_alert'=>true
            ]);
    }
}
if ($text == "/start") {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"مرحبا
🌐 انا بوت اهمسلي.

💬 يمكنك استخدامي لارسال رسائل سرية (همسات) في اي مجموعة تشاء.
  
🔮 انا اعمل عن بعد, هذا يعني انك تستيط استخدامي دون الحاجة لوجودي في المجموعة.

💌 طريقة استخدامي سهلة جداً, قم بتحويل اي رسالة من الشخص الذي تريد ان تهمس له هنا

هناك طرق اخرى للاستخدام يمكنك رؤيتها عبر الضغط على طرق اخرى لاستخدام البوت",
        'reply_markup'=>json_encode([
            [['text'=>"المطور","url"=>"t.me/$chs"]]
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