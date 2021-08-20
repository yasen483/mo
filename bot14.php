<?php
ob_start();
define('API_KEY', 'TO');
echo "This file By » <a href=\"https://t.me/ctteam\">Saad Mohammed :)</a> »<br>";

echo "setWebhook ~> <a href=\"https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."\">https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."</a>";


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
$message_id2 = $update->callback_query->message->message_id;

$from_id = $message->from->id;
$name = $update->message->from->first_name;
$from_id = $message->from->id;
$data = $update->callback_query->data;
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
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
$username = $update->message->from->username;
$reply = $message->reply_to_message->message_id;
$list = file_get_contents("blocklist.txt");
$band = explode("\n", $list);
$rep = $message->reply_to_message->forward_from; 
$id = $rep->id; 
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"▫️ يجب عليك الاشتراك في قناة البوت اولا ⚜️؛
◼️ اشترك في القناة ثم ارسل /start ،
 - قناة البوت $ch •",
]);
  bot("sendmessage",[
    "chat_id"=>$ids,
    "text"=>"- العضو قام بألاشتراك في قناة البوت ، 📌
- معلومات العضو الذي قام بألاشتراك ؛

• الاسم ؛ $name 
• الايدي ؛ $from_id
• المعرف ؛ @$username
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎	",
    ]);
    die('مشيولي');
}

$ebu = explode("\n",$list);
if(in_array($from_id,$ebu)){
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"▪️ انت محظور من قبل صاحب البوت ،
▫️ لا يمكنك استخدام البوت ، 🚫
 ﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[• اضغط هنا وتابع جديدنا 🌐؛](https://t.me/$chs)
 ",
 'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
      ]);
    
}

// الردود 
$as = array("آنتظر قليلا جار تصميم الأسم ❤️ ...","آنتظر قليلا جار تصميم الأسم 🧡 ...","آنتظر قليلا جار تصميم الأسم آنتظر قليلا جار تصميم الأسم 💛 ...","آنتظر قليلا جار تصميم الأسم 💚 ...","آنتظر قليلا جار تصميم الأسم 💙 ...","آنتظر قليلا جار تصميم الأسم 💜 ...","آنتظر قليلا جار تصميم الأسم 🖤 ...","آنتظر قليلا جار تصميم الأسم 💔 ...","آنتظر قليلا جار تصميم الأسم ❣ ...","آنتظر قليلا جار تصميم الأسم 💕 ...","آنتظر قليلا جار تصميم الأسم 💞 ...","آنتظر قليلا جار تصميم الأسم 💓 ...","آنتظر قليلا جار تصميم الأسم 💗 ...","آنتظر قليلا جار تصميم الأسم 💖 ...","آنتظر قليلا جار تصميم الأسم 💘 ...","آنتظر قليلا جار تصميم الأسم 💝 ...");
 
// انتهاء الردود 

function wr($type,$text,$id){
  $str = str_split(strtolower($text));
  switch ($type) {
  	case 'khrz':
      $url = 'https://ddyd.000webhostapp.com/khzv6/';
      break;
      case 'ca':
      $url = 'https://ddyd.000webhostapp.com/phoz1v6/';
      break;
      case 'ha':
      $url = 'https://ddyd.000webhostapp.com/klx7v6/';
      break;
      case 'ci':
      $url = 'https://ddyd.000webhostapp.com/hlh8v6/';
      break;
      case 'br':
      $url = 'https://ddyd.000webhostapp.com/brqe4v6/';
      break;
      case 'stone':
      $url = 'https://ddyd.000webhostapp.com/photosha6v6/';
      break; 
      case 'fire':
      $url = 'https://ddyd.000webhostapp.com/pszv6/';
      break;
      case 'cand':
      $url = 'https://ddyd.000webhostapp.com/photz7v6/';
      break;
      case 'cand2':
      $url = 'https://ddyd.000webhostapp.com/jkk2v6/';
      break;
      case 'cand3':
      $url = 'http://denel-point.ga/cand/photos3zv6/';
      break;
      case 'lma':
      $url = 'https://ddyd.000webhostapp.com/lmko7v6/';
      break;
      case 'kle':
      $url = 'https://ddyd.000webhostapp.com/phzhv6/';
      break;
      case 'wrd':
      $url = 'https://ddyd.000webhostapp.com/photo5tv6/';
      break;
      case 'rml':
      $url = 'https://ddyd.000webhostapp.com/rml7ev6/';
      break;
      case 'alw':
      $url = 'https://ddyd.000webhostapp.com/alwu3v6/';
      break;
      case 's':
      $url = 'https://bl-saadmohammed.000webhostapp.com/sz/';
      break;
      case 'n':
      $url = 'https://bl-saadmohammed.000webhostapp.com/nj3/';
      break;
      case 'w':
      $url = 'https://sd-saadmohammed.000webhostapp.com/wae/';
      break;
      case 'k':
      $url = 'https://bl-saadmohammed.000webhostapp.com/ke3/';
      break;
      case 'hl1':
      $url = 'https://bl-saadmohammed.000webhostapp.com/hl1o/';
      break;
      case 'hl2':
      $url = 'https://bl-saadmohammed.000webhostapp.com/hl2o/';
      break;
      case 'w1':
      $url = 'https://bl-saadmohammed.000webhostapp.com/w1ae/';
      break;
      case 'w2':
      $url = 'https://bl-saadmohammed.000webhostapp.com/w2ae/';
      break;
      case 'w3':
      $url = 'https://bl-saadmohammed.000webhostapp.com/w3ae/';
      break;
      case 'sm':
      $url = 'https://bl-saadmohammed.000webhostapp.com/smv/';
      break;
      case 'ba':
      $url = 'https://bl-saadmohammed.000webhostapp.com/banz/';
      break;
      case 'kt':
      $url = 'https://bl-saadmohammed.000webhostapp.com/kto0/';
      break;
      case 'd3':
      $url = 'https://bl-saadmohammed.000webhostapp.com/d3zh/';
      break;
      case 'to':
      $url = 'https://bl-saadmohammed.000webhostapp.com/to/';
      break;
      case 'nj':
      $url = 'https://bl-saadmohammed.000webhostapp.com/nj0/';
      break;
      case 'hd':
      $url = 'https://bl-saadmohammed.000webhostapp.com/hdk1/';
      break;
      case 'zj':
      $url = 'https://bl-saadmohammed.000webhostapp.com/zjp/';
      break;
      case 'nf':
      $url = 'https://bl-saadmohammed.000webhostapp.com/nfk1/';
      break;
      case 'w4':
      $url = 'https://bl-saadmohammed.000webhostapp.com/w4ae/';
      break;
      case 'jd':
      $url = 'https://denel.000webhostapp.com/jde0v6/';
      break;
      case 'w5':
      $url = 'https://bl-saadmohammed.000webhostapp.com/w5ae/';
      break;
      case 'w6':
      $url = 'https://denel.000webhostapp.com/w6aev6/';
      break;
      case 'k2':
      $url = 'https://denel.000webhostapp.com/k2bv6/';
      break;
      case 'love':
      $url = 'https://denel.000webhostapp.com/love0v6/';
      break;
      case 'neo':
      $url = 'https://denel.000webhostapp.com/neojv6/';
      break;
      case 'mhar':
      $url = 'https://denel.000webhostapp.com/mharmv6/';
      break;
      case 'love2':
      $url = 'https://denel.000webhostapp.com/love20v6/';
      break;
      case 'hd2':
      $url = 'https://rdb1.000webhostapp.com/c/';
      break;
      case 'hd3':
      $url = 'https://rdb1.000webhostapp.com/s/';
      break;      
      case 'cc':
      $url = 'https://rdb1.000webhostapp.com/cc/';
      break;
      case 'rr':
      $url = 'https://rdb1.000webhostapp.com/rr/';
      break;
      case 'kz':
      $url = 'https://denel.000webhostapp.com/kzhav6/';
      break;  
      case 'thb':
      $url = 'https://denel.000webhostapp.com/thbv6/';
      break;    
      case 'zhrf':
      $url = 'https://denel.000webhostapp.com/zhrfv6/';
      break;
      case 'kl3':
      $url = 'https://denel.000webhostapp.com/kl3ksv6/';
      break;
      case 'gu':
      $url = 'https://denel.000webhostapp.com/guv6/';
      break;
      case 'ds':
      $url = 'https://denel.000webhostapp.com/dsv6/';
      break;
      case 'gum1':
      $url = 'https://gogo-user.000webhostapp.com/gmana1/';
      break;   
      case 'alo':
      $url = 'https://ailweesam18.000webhostapp.com/aloo/';
      break;   
      case 'sda':
      $url = 'https://ailweesam119.000webhostapp.com/ملف1/1111/';
      break;   
      case '4d':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/popo/';
      break;   
      case 'tr':
      $url = 'https://denel.000webhostapp.com/trv6/';
      break;
      case 'sw':
      $url = 'https://denel.000webhostapp.com/swv6/';
      break;
      case 'gum2':
      $url = 'https://gogo-user.000webhostapp.com/gmana2/';
      break; 
      case 'gum3':
      $url = 'https://gogo-user.000webhostapp.com/gmana3/';
      break;
      case 'gum4':
      $url = 'https://gogo-user.000webhostapp.com/gmana4/';
      break;
      case 'krsms':
      $url = 'https://tzhamed-tzhamed.c9users.io/krsms/';
      break;
      case 'clod':
      $url = 'https://tzhamed-tzhamed.c9users.io/clod/';
      break;
      case 'momke':
      $url = 'https://omarslam-bot.000webhostapp.com/momke/';
      break;
      case 'rm':
      $url = 'https://tzhamed-tzhamed.c9users.io/finos/';
      break;
      case 'kon':
      $url = 'https://tzhamed-tzhamed.c9users.io/koon/';
      break;
      case 'rm2':
      $url = 'https://tzhamed-tzhamed.c9users.io/nramdin/';
      break;
      case 'snap':
      $url = 'https://tzhamed-tzhamed.c9users.io/snap1/';
      break;
      case 'ali1':
      $url = 'https://ailweesam119.000webhostapp.com/ملف1/poopo/';
      
       break;
      case 'moor1':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin1/';
      break;
      case 'moor2':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin2/';
      break;
      case 'moor3':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin3/';
      break;
      case 'moor4':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin4/';
      break;
      case 'moor5':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin5/';
      break;
      case 'moor6':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin6/';
      break;
      case 'moor7':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin7/';
      break;
      case 'moor8':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin9/';
      break;
      case 'moor9':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin12/';
      break;
      case 'moor10':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin13/';
      break;
      case 'moor11':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin14/';
      break;
      case 'moor12':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin15/';
      break;
      case 'moor13':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin16/';
      break;
      case 'moor14':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin17/';
      break;
      case 'moor15':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin18/';
      break;
      case 'moor16':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin19/';
      break;
      case 'moor17':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin20/';
      break;
      case 'moor18':
      $url = 'https://ailweesam119.000webhostapp.com/ملف2/nin21/';
      break;
      case 'moor19':
      $url = 'https://ailweesam17.000webhostapp.com/hnoo/';
      break;
      case 'moor20':
      $url = 'https://ailweesam17.000webhostapp.com/knoo/';
      break;
      case 'moor21':
      $url = 'https://ailweesam18.000webhostapp.com/aloo/';
      break;
      case 'moor22':
      $url = 'https://ailweesam18.000webhostapp.com/boon/';
      break;
      case 'moor23':
      $url = 'https://ailweesam18.000webhostapp.com/gool/';
      break;
      case 'moor24':
      $url = 'https://ailweesam18.000webhostapp.com/kool/';
      break;
      case 'moor25':
      $url = 'https://ailweesam18.000webhostapp.com/skoo/';
      break;
      case 'moor26':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s1/';
      break;
      case 'moor27':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s2/';
      break;
      case 'moor28':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s3/';
      break;
      case 'moor29':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s4/';
      break;
      case 'moor30':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s5/';
      break;
      case 'moor31':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s6/';
      break;
      case 'moor32':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s7/';
      break;
      case 'moor33':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s8/';
      break;
      case 'moor34':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s9/';
      break;
      case 'moor35':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s10/';
      break;
      case 'moor36':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s11/';
      break;
      case 'moor37':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s12/';
      break;
      case 'moor38':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s13/';
      break;
      case 'moor39':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s14/';
      break;
      case 'moor40':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s15/';
      break;
      case 'moor41':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s16/';
      break;
      case 'moor42':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s17/';
      break;
      case 'moor43':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s18/';
      break;
      case 'moor44':
      $url = 'https://ailweesam13.000webhostapp.com/الصوور/s19/';
      
      break;
      }
    $i = 0;
    foreach($str as $char){$im[] = $url."".$char.'.jpg';}
    $q = getimagesize($im[0]);
    $num = $q[0]; 
    
    $img = imagecreatetruecolor($num * count($im), $q[1]);
   while ($i < count($im)) {
      $num1 = $num * $i;
      $cur = imagecreatefromjpeg($im[$i]);
      imagecopy($img, $cur, $num1, 0, 0, 0, getimagesize($im[0])[0], getimagesize($im[0])[1]);
      $i++;
    }
  imagejpeg($img,$id.'.jpg');
}

if($text && $from_id !== $ids){
bot('forwardMessage',[
'chat_id'=>$ids,
'from_chat_id'=>$chat_id,
'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}

if ($text and $message->reply_to_message && $text!="/info" && $text!="/ban" && $text!="/unban" && $text!="/forward") {
  bot('sendMessage',[
'chat_id'=>$message->reply_to_message->forward_from->id,
    'text'=>$text,
    ]);
}

if ($text == '/start' && !in_array($chat_id, $band)){
  bot('sendMessage', [
  'chat_id' => $chat_id, 
  'text' => "- اهلا بك ؛ [$name](tg://user?id=$chat_id)
- ارسل اسمك وانتظر قليلا ، 🕊 '
- يمنع استخدام الاحرف العربية او الرموز ، 📄'
- يحتوي البوت على اكثر من *60* نوع ، 🌀'
- ارسل اسمك وقم بتجربته بنفسك ، 🌼'
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[• اضغط هنا وتابع جديدنا ، 📢 '](https://t.me/$chs)",
'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• اضغط هنا وتابع قناة البوت ، 🔰'", 'url' => "https://t.me/$chs"]], ]]) ]);
  if ($update && !in_array($chat_id, $u)) {
    file_put_contents("memb.txt", $chat_id."\n",FILE_APPEND);
  }
  }

if ($text == "/admin" and $chat_id == $ids ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"- اهلا بك مطوري 🔱؛ [$name](tg://user?id=$chat_id) ،

• قم باختيار ماتريد من الاسفل للعودة الى قائمةه التصاميم ارسل /start ! ، ⚙",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'- رسالةه للكل 📮؛','callback_data'=>'ce'],['text'=>'- المشتركين ⚜؛','callback_data'=>'co']],
[['text'=>'• $ch ، ‏☬ •','url'=>"https://t.me/$chs"]],
            ]
            ])
        ]);
}

if ($message->reply_to_message && $text== "/ban") {
			$myfile2 = fopen("blocklist.txt", "a") or die("Unable to open file!");	
			fwrite($myfile2, "$id\n");
			fclose($myfile2);
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📌┇تم حظر العضو من البوت ،
📃┇ايدي العضو ؛ $id .",
]);
			bot('sendmessage',[
'chat_id'=>$id,
'text'=>"- عذرا عزيزي تم حظرك من هذا البوت ،
- تابع قناة البوت ؛ $ch .",
]);
		}
		
		if($message->reply_to_message && $text=="/unban"){
			$newlist = str_replace($id,"",$list);
			file_put_contents("blocklist.txt",$newlist);
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم الغاء حظر العضو ،
- ايدي العضو ؛ $id .",
]);
			bot('sendmessage',[
'chat_id'=>$id,
'text'=>"- عزيزي تم الغاء حظرك من هذا البوت ،
- تابع قناة البوت ؛ $ch .",
]);
}

if ($text != '/start' && $text != '/admin' && $text != '_' && $text != '.' && $text != '/' && $text != '-' && $text != '@' && !in_array($chat_id, $band)) {
	if(preg_match('/([a-z])|([A-Z])/i',$text)){
		bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"- الان قم باختيار التصميم الذي تريده من الاسفل ، 👇🏻💚'
- الأسم ؛ $text ،",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
      'reply_markup' => json_encode([
 'inline_keyboard' => [
[['text'=>'• بالشمع والورد ، 🌪 •','callback_data'=>'cand3-'.$text],['text' => '• بالشمع والجكليت ، ⛱', 'callback_data' => 'cand2-' . $text]],
[['text'=>'• بالكيبورد ، ⌨','callback_data'=>'k2-'.$text],['text' => '• بالشمع ، 🕯', 'callback_data' => 'cand-' . $text],['text' => '• بالنار ، 🔥', 'callback_data' => 'fire-' . $text]],
[['text'=>'• بالشمع والنجوم ، 🏮','callback_data'=>'w-'.$text],['text'=>'• بالورد والورق ، 🎐','callback_data'=>'w1-'.$text]],
[['text' => '• بالحجر ، 🏔', 'callback_data' => 'stone-' . $text],['text'=>'• بالبرق ، 🔰','callback_data'=>'br-'.$text],['text'=>'• بالحلقة ، 💍','callback_data'=>'ci-'.$text]],
[['text'=>'• بالالعاب الناريةه ، 🚀','callback_data'=>'gum1-'.$text],['text'=>'- بالضوء الاحمر ، 🕊','callback_data'=>'alo-'.$text]],
[['text'=>'• بالورق ، 📝','callback_data'=>'w5-'.$text],['text'=>'•بالورق 2 ، 📃','callback_data'=>'w6-'.$text],['text'=>'• بالنيون ، ⚜','callback_data'=>'neo-'.$text]],
[['text'=>'• بالقلوب المشعةه ، 💗','callback_data'=>'love-'.$text],['text'=>'• على الجدار ، ⛺️','callback_data'=>'jd-'.$text]],
[['text'=>'• بالحلقة 3 ، 🏵','callback_data'=>'hl2-'.$text],['text'=>'• بالخرز 2 ، 🛸','callback_data'=>'sm-'.$text],['text'=>'• بالباندا ، 🐼','callback_data'=>'ba-'.$text]],
[['text'=>'• بالورق والمفاتيح ، 🗝','callback_data'=>'w3-'.$text],['text'=>'• بالورد والورق 2 ، 🌸','callback_data'=>'w4-'.$text]],
[['text'=>'• بالكتاب ، 📓','callback_data'=>'kt-'.$text],['text'=>'• بالـ 3D ، 🌍','callback_data'=>'d3-'.$text],['text'=>'• بالضوء ، 🔦','callback_data'=>'to-'.$text]],
[['text'=>'• بألاحرف الصداميةه ، 🚡','callback_data'=>'sda-'.$text],['text'=>'• ثلاثي الابعاد ، 🏟','callback_data'=>'4d-'.$text]],
[['text'=>'• بالنجوم ، 🌙','callback_data'=>'nj-'.$text],['text'=>'• بالحديد ، 🛢','callback_data'=>'hd-'.$text],['text'=>'• بالزجاج ، 🚂','callback_data'=>'zj-'.$text]],
[['text'=>'• بالضوء الازرق ، 🦋','callback_data'=>'cc-'.$text],['text'=>'• بالورق واللماع ، 🔮','callback_data'=>'w2-'.$text]],
[['text'=>'• بالگليتر ، 🌟','callback_data'=>'kle-'.$text],['text'=>'• بالورد ، 🌼','callback_data'=>'wrd-'.$text],['text'=>'• بالرمل ، 🏖','callback_data'=>'rml-'.$text]],
[['text'=>'• بلأساور ، ⛵️','callback_data'=>'gu-'.$text],['text'=>'• بلگارتون ، 💊','callback_data'=>'ds-'.$text]],
[['text'=>'• بالقلوب ، 💚','callback_data'=>'ha-'.$text],['text'=>'• بالجكليت ، 🍬','callback_data'=>'ca-'.$text],['text'=>'• بالألوان ، 🎨','callback_data'=>'alw-'.$text]],
[['text'=>'• بالنفاخ ، 🎈','callback_data'=>'nf-'.$text],['text'=>'• بالمحار ، 🏝','callback_data'=>'mhar-'.$text]],
[['text'=>'• بالذهب ، 🌈','callback_data'=>'thb-'.$text],['text'=>'• بالزخرفةه ، ⛽️','callback_data'=>'zhrf-'.$text],['text'=>'• بالخرز ، 🌒','callback_data'=>'khrz-'.$text]],
[['text'=>'• بالتراب ، 📻','callback_data'=>'tr-'.$text],['text'=>'• بالشمع والورق ، 🚜','callback_data'=>'sw-'.$text]],
[['text'=>'• باللماع ، 🍭','callback_data'=>'gum2-'.$text],['text'=>'• بالقمر ، 🌕','callback_data'=>'gum3-'.$text],['text'=>'• بالبنفسج ، 🎋','callback_data'=>'gum4-'.$text]],
[['text'=>'• بالحلقة 2 ، 📯','callback_data'=>'hl1-'.$text],['text'=>'• بالورد واللماع ، ✨','callback_data'=>'lma-'.$text]],
[['text'=>'• بالشمع 2 ، 🏜','callback_data'=>'s-'.$text],['text'=>'• بالنار 2 ، 💥','callback_data'=>'n-'.$text],['text'=>'• بالكيبورد 2 ، 🌀','callback_data'=>'k-'.$text]],
[['text'=>'• بالقلوب 2 ، ⛵️','callback_data'=>'love2-'.$text],['text'=>'• بالحديد 2 ، 〽️','callback_data'=>'hd2-'.$text]],
[['text'=>'• بالنار 3 ، ⚡️','callback_data'=>'rr-'.$text],['text'=>'• بالحديد 3 ، 🔱','callback_data'=>'hd3-'.$text],['text'=>'• بالخرز 3 ، 🎯','callback_data'=>'kz-'.$text]],
[['text'=>'• بالقلوب 3 ، 💛','callback_data'=>'kl3-'.$text],['text'=>'• بالكرسمس ، 🎅🏼','callback_data'=>'krsms-'.$text]],
[['text'=>'• باللماع 2 ، 💫','callback_data'=>'clod-'.$text],['text'=>'• بالقرد ، 🙈','callback_data'=>'momke-'.$text],['text'=>'• بالكون ، 💈','callback_data'=>'kon-'.$text]],
[['text'=>'• اشكال رمضانيةه ، ⏳','callback_data'=>'rm-'.$text],['text'=>'• اشكال رمضانيةه 2 ، 🎁','callback_data'=>'rm2-'.$text]],
[['text'=>'• بلأعياد ، 🎶','callback_data'=>'moor8-'.$text],['text'=>'• بلأعياد 2 ، 👾','callback_data'=>'moor9-'.$text],['text'=>'• بلسناب 3 ، 👅','callback_data'=>'moor11-'.$text]],

[['text'=>'• بالفراش ، 🦋','callback_data'=>'moor26-'.$text],['text'=>'• بالبالون ، 🐳','callback_data'=>'moor27-'.$text]],

[['text'=>'• قلوب نوع جديد ، 🎄','callback_data'=>'moor29-'.$text],['text'=>'• بالبنات ، 🍄','callback_data'=>'moor30-'.$text],['text'=>'• بلألوان ، 🍭','callback_data'=>'moor31-'.$text]],

[['text'=>'• بالطيور ، 🕊','callback_data'=>'moor32-'.$text],['text'=>'• بالكهرباء ، ⚡️','callback_data'=>'moor33-'.$text]],

[['text'=>'• بالصدفة ، ⭐️','callback_data'=>'moor34-'.$text],['text'=>'• بالقمر ، 🌙','callback_data'=>'moor35-'.$text],['text'=>'• بالسماء ، ⛅️','callback_data'=>'moor36-'.$text]],

[['text'=>'• بالزجاج ، ☄','callback_data'=>'moor37-'.$text],['text'=>'• بالكائن ، 🌬','callback_data'=>'moor38-'.$text],['text'=>'• بالرسم ، ☂','callback_data'=>'moor39-'.$text]],

[['text'=>'• برمضان ، ❄️','callback_data'=>'moor41-'.$text],['text'=>'• بالحبيب ، 🌻','callback_data'=>'moor42-'.$text]],

[['text'=>'• بالسناب ، 🎉','callback_data'=>'snap-'.$text]],
[['text'=>'• لشراء البوت ، ❇️ •','url'=>"https://t.me/$by"]],


]]) ]);

} else 
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"• ممنوع ارسال الاحرف العربيةه ، ⚠️'
• ارسل اسمك باللغة الانكليزيةه وانتظر قليلا ، 📃'",
'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• اضغط هنا وتابع قناة البوت ، 🔰'", 'url' => "https://t.me/$chs"]], ]]) ]);
  }
  
if ($update->inline_query->query == "SssBs") {
   bot('answerInlineQuery', [
        'inline_query_id' => $update->inline_query->id,
        'results' => json_encode([[
            'type' => 'article',
            'id' => base64_encode(rand(5, 555)),
            'title' => '• اضغط هنا لمشاركةه البوت ، 🇮🇶',
            'input_message_content' =>[
            'parse_mode' => 'MarkDown',
            'message_text' => "- تم اعادة تشغيل بوت الكتابةه على الصور ، 📢'

• بمميزات جديدة ومنها ؛ 👇🏻💚'
• تكدر تصمم اسمك اكثر من 58 نوع ،
• البوت صار اسرع من قبل ،
• صححنا جميع الاخطاء الي جانت بالبوت ،
• والبوت في تحديثات مستمرة ، 
• ادخل للبوت وجربة بنفسك . 

~ معرف البوت ؛ @YLBBOT ، 📄'
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎"],
            'reply_markup' => [
                'inline_keyboard' => [
                    [['text' => "• قناة البوت ، 🌀'", 'url' => 'https://t.me/joinchat/AAAAAEipL5499nrXdgFByg'],['text' => "• لشراء البوت راسلني ، 🕊'", 'url' => 'https://t.me/sssbs']],
                    [['text' => "• مشاركة البوت ، 📬'", 'switch_inline_query' => 'SssBs']]
                ]
            ]
        ]])
    ]);
}

if($data == "co" and $update->callback_query->message->chat->id == $ids ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        عدد مشتركين البوت📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}
if($data == "ce" and $update->callback_query->message->chat->id == $ids){ 
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
if($data == "off" and $update->callback_query->message->chat->id == $ids){ 
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
      'text'=>"
☑️￤اهلا عزيزي :- `المطور` .
▫️￤اليك الاوامر الان حدد ماتريده 📩
-
",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'- رسالةه للكل 📮؛','callback_data'=>'ce'],['text'=>'- المشتركين ⚜؛','callback_data'=>'co']],
            ]
            ])
]);
file_put_contents('usr.txt', '');
}

if($text and $modxe == "yas" and $chat_id == $ids ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"
          $text
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("usr.txt","no");

} 
}
$data = explode('-',$data);
if($data[0] and $data[1]){
  wr($data[0],$data[1],$chat_id2);
  
bot('answercallbackquery', [
			'callback_query_id' => $update->callback_query->id,
			'text'=>$as[array_rand($as,1)],
		]); 
    $dats = getimagesize("$chat_id2.jpg");
    $dest = imagecreatefromjpeg("$chat_id2.jpg");
  $src = imagecreatetruecolor($dats[0] ,$dats[1] + 1920);
  imagefill($src, 0, 0, imagecolorallocate($src,255,255,255));
  imagecopy($src, $dest, 0, 1000, 0, 0 ,$dats[0], $dats[1] );
  imagejpeg($src,"$chat_id2"."1.jpg");
  imagedestroy($src);
  imagedestroy($dest);  
    bot('sendPhoto',[
      'chat_id'=>$chat_id2,
      'photo'=>new CURLFile($chat_id2.'.jpg'),
       'caption'=>"- تم تصميم الصورة الاولى بنجاح تابع قناة البوت من فضلك ؛ $ch ، 🏮'
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
    'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• $ch ، ☬'", 'url' => "https://t.me/$chs"]], ]]) ]);
  bot('sendPhoto',[
      'chat_id'=>$chat_id2,
      'photo'=>new CURLFile($chat_id2.'1.jpg'),
       'caption'=>"- تم تصميم الصورة الثانيةه بالتوسيط تابع قناة البوت من فضلك ؛ $ch ، ⚠️'
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
    'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• $ch ، ☬'", 'url' => "https://t.me/$chs"]], ]]) ]);
  unlink($chat_id2.'1.jpg');
unlink($chat_id2.'.jpg');  
}