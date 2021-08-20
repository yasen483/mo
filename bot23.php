<?php

$API_KEY = 'TO'; // توكن
echo "https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']; 

define('API_KEY',$API_KEY);
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
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
$chat_id2 = $update->callback_query->message->chat->id;
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
$us = explode("\n", file_get_contents("us.txt"));

if ($message and !in_array($chat_id, $us)) {
    file_put_contents("us.txt", "\n".$chat_id,FILE_APPEND);
}
if ($text == '/us') {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>count($us)
    ]);
}
if ($text == '/start') {
    mkdir('photos');
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'- مرحبا بك في بوت الفوتوشوب 📷؛
• فقط قم بأرسال الصوره له وسيقوم بأعطائك الادوات اللازمه للتحرير ✨،

- ملاحظه * 📩 : لا يتم حفظ اي صوره في السيرفر وسيتم حذفها بعد الانتهاء من التعديل 📌 

• البوت قيد التطوير وستتم اضافه الكثير من االفلاتر والادوات ⚡️',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"• قناتنا 💭 -','url'=>'t.me/$chs"]],
        [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$buyy"]]
      ]
    ])
  ]);
}
if($message->sticker){
    $path = bot('getfile',['file_id'=>$message->sticker->file_id])->result->file_path;
    file_put_contents("photos/$chat_id.jpg", file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$path));
    bot('sendphoto',[
        'chat_id'=>$chat_id,
        'text'=>new CURLFile("photos/$chat_id.jpg")
        ]);
}
if($message->photo){
    $path = bot('getfile',['file_id'=>$message->photo[2]->file_id])->result->file_path;
    mkdir('photos');
    file_put_contents("photos/$chat_id.jpg", file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$path));
    bot('sendphoto',[
        'chat_id'=>$chat_id,
        'photo'=>new CURLFile("photos/$chat_id.jpg"),
        'caption'=>'By : Sajad Salam ',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
}
if ($data == 'twV') {
    $data = getimagesize("photos/$chat_id2.jpg");
    $dest = imagecreatefromjpeg("photos/$chat_id2.jpg");
  $src = imagecreatetruecolor($data[0] ,$data[1] + 250);
    imagefill($src, 0, 0, imagecolorallocate($src,255,255,255));
    imagecopy($src, $dest, 0, 125, 0, 0 ,$data[0] , $data[1]);
    imagejpeg($src,"photos/$chat_id2.jpg");
    imagedestroy($src);
    imagedestroy($dest);
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"By : $ch ",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'twH') {
    $data = getimagesize("photos/$chat_id2.jpg");
    $dest = imagecreatefromjpeg("photos/$chat_id2.jpg");
  $src = imagecreatetruecolor($data[0] + 250,$data[1]);
  imagefill($src, 0, 0, imagecolorallocate($src,255,255,255));
  imagecopy($src, $dest, 125, 0, 0, 0 ,$data[0] , $data[1]);
  imagejpeg($src,"photos/$chat_id2.jpg");
  imagedestroy($src);
  imagedestroy($dest);
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>'By : Sajad Salam ',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if($data == 'gray'){
     $im = imagecreatefromjpeg("photos/$chat_id2.jpg");
    imagefilter($im, IMG_FILTER_GRAYSCALE);
    imagejpeg($im,"photos/$chat_id2.jpg");
    
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'roR') {
    $source = imagecreatefromjpeg("photos/$chat_id2.jpg");
$rotate = imagerotate($source, -90, 0);
imagejpeg($rotate,"photos/$chat_id2.jpg");
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'roL') {
$source = imagecreatefromjpeg("photos/$chat_id2.jpg");
$rotate = imagerotate($source, 90, 0);
imagejpeg($rotate,"photos/$chat_id2.jpg");
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'fiO') {
    $myImage = imagecreatefromjpeg("photos/$chat_id2.jpg");
  imagefilter($myImage,IMG_FILTER_GRAYSCALE);
  imagefilter($myImage,IMG_FILTER_BRIGHTNESS,-30);
  imagefilter($myImage,IMG_FILTER_COLORIZE, 90, 55, 30);  
  header("Content-type: image/jpeg");
  imagejpeg($myImage,"photos/$chat_id2.jpg");
  imagedestroy( $myImage );
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'fiB') {
    file_put_contents("photos/$chat_id2.jpg", file_get_contents("http://powerful.elithost.ga/photoeffect/?filter=frozen&url=https://".$_SERVER['SERVER_NAME']."/p/photos/$chat_id2.jpg"));
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by : $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'fiL') {
    file_put_contents("photos/$chat_id2.jpg", file_get_contents("http://powerful.elithost.ga/photoeffect/?filter=antique&url=https://".$_SERVER['SERVER_NAME']."/p/photos/$chat_id2.jpg"));
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'fiD') {
    file_put_contents("photos/$chat_id2.jpg", file_get_contents("http://powerful.elithost.ga/photoeffect/?filter=blur&url=https://".$_SERVER['SERVER_NAME']."/p/photos/$chat_id2.jpg"));
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'fiR') {
    file_put_contents("photos/$chat_id2.jpg", file_get_contents("http://powerful.elithost.ga/photoeffect/?filter=hermajesty&url=https://".$_SERVER['SERVER_NAME']."/p/photos/$chat_id2.jpg"));
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'hermajestycaption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'fiG') {
    file_put_contents("photos/$chat_id2.jpg", file_get_contents("http://powerful.elithost.ga/photoeffect/?filter=everglow&url=https://".$_SERVER['SERVER_NAME']."/p/photos/$chat_id2.jpg"));
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'hermajestycaption'=>'By : Sajad Salam ',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- توسيط عامودي ⤴️','callback_data'=>'twV'],['text'=>'- توسيط افقي ↩️','callback_data'=>'twH']],
                [['text'=>'• الفلاتر 💎؛','callback_data'=>'filters']],
                [['text'=>'تدوير يمين ➡️ ','callback_data'=>'roR'],['text'=>'تدوير يسار ⬅️ ','callback_data'=>'roL']],
            ]
        ])
        ]);
        bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}
if ($data == 'filters') {
    bot('sendphoto',[
        'chat_id'=>$chat_id2,
        'photo'=>new CURLFile("photos/$chat_id2.jpg"),
        'caption'=>"by $ch",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'- صوره قديمه 🌪 ','callback_data'=>'fiO'],['text'=>'- ابيض واسود 📸؛','callback_data'=>'gray']],
                [['text'=>'• ارجواني 💎؛','callback_data'=>'fiB'],['text'=>'•  اضاءة 🔦 -','callback_data'=>'fiL']],
                [['text'=>'- ضبابيه ✨ ،','callback_data'=>'fiD']],
                [['text'=>'- احمر باهت 🎈 ؛','callback_data'=>'fiR'],['text'=>'- اخضر باهت ❇️ -','callback_data'=>'fiG']],
                [['text'=>'- ازرق 💠 ،','callback_data'=>'fiD']],
            ]
        ])
        ]);
    bot('deleteMessage',['chat_id'=>$chat_id2,'message_id'=>$message_id]);
}