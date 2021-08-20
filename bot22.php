<?php
ob_start();
define('API_KEY', 'TO');
echo "https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME'];

function bot($method, $datas = [])
  {
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
  $res = curl_exec($ch);
  if (curl_error($ch))
    {
    var_dump(curl_error($ch));
    }
    else
    {
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
$from_id = $message->from->id;
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
$ex = explode(' ', $text);

if (preg_match('/\/start .*/', $text))
  {
  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "- مرحبا بك ، [$name](tg://user?id=$chat_id)
- في بوت البحث وتحميل تطبيقات  - ✅ 
• يقوم البوت بأعطائك مجموعه نتائج للتطبيقات التي تبحث . . .
-قم بارسال اسم التطبيق واختاره وسيرسل البوت لك ملف التطبيق ؛⚜️", 'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• اضغط هنا وتابع جديدنا 🇮🇶؛", 'url' => "https://t.me/$chs"]], ]]) ]);
  }

if ($text != '/start')
  {
  if (preg_match('/.*\/.*/', $text))
    {
    $dl = explode('<a id="download_link"', file_get_contents('https://apkpure.com/ar/' . $text . '/download?from=details'));
    $dl = explode('"', $get[1]);
    $dl = $dl[9];
    file_put_contents('@ssa_15.apk', file_get_contents($dl));
    bot('sendDocument', ['chat_id' => $chat_id, 'document' => new CURLFile($dl) ]);
    }
    else
    {
    $get = explode('<dl class="search-dl">', file_get_contents('https://apkpure.com/ar/search?q=' . urlencode($text)));
    for ($i = 0; $i < count($get); $i++)
      {
      $a = explode('"', $get[$i]);
      $name = $a[1];
      $url = $a[5];
      $res['inline_keyboard'][] = [['text' => $name, 'switch_inline_query' => $url]];
      }

    bot('sendMessage', ['chat_id' => $chat_id, 'text' => '🔎| من فضلك اختر احد التطبيقات لاقوم بتحميلها : ', 'reply_markup' => json_encode($res) ]);
    }
  }
  bot('answerInlineQuery',[
            'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>base64_encode(rand(5,555)),
                'title'=>$update->inline_query->query,
                'description'=>"👁‍🗨 By : @$chs",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>$update->inline_query->query],
          ]])
        ]);