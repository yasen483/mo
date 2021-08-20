<?php
ob_start();
define('API_KEY','TO');
echo "api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];

function SssBs($method,$datas=[]){
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

$chs = file_get_contents("ch.txt");
$ad = file_get_contents("ids.txt");
$by = file_get_contents("buy.txt");
$Dev = array("$ad","409194232","3");
$getMe = SssBs('getMe')->result;
$usb = $getMe->username;
$usernamebot = "$usb";
$channel = "$chs";
$admin = "$ad";
$channelcode = ""; // ايدي القناة الي ترسل بيها لهدايا
$token = API_KEY;

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$firstname = $update->callback_query->from->first_name;
$usernames = $update->callback_query->from->username;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$name = $update->message->from->first_name;
$membercall = $update->callback_query->id;

$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$tc = $update->message->chat->type;
$gpname = $update->callback_query->message->chat->title;
$forward_from = $update->message->forward_from;
$forward_from_id = $forward_from->id;
$forward_from_username = $forward_from->username;
$forward_from_first_name = $forward_from->first_name;
$reply = $update->message->reply_to_message->forward_from->id;
$reply_username = $update->message->reply_to_message->forward_from->username;
$reply_first = $update->message->reply_to_message->forward_from->first_name;

$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$from_id));
$tch = $forchannel->result->status;
$forchannelq = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
$tchq = $forchannelq->result->status;

function SendMessage($chat_id, $text){
SssBs('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
 function Forward($berekoja,$azchejaei,$kodompayam)
{
SssBs('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function  getUserProfilePhotos($token,$from_id) {
  $url = 'https://api.telegram.org/bot'.$token.'/getUserProfilePhotos?user_id='.$from_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result;
  return $result;
}
function getChatMembersCount($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatMembersCount?chat_id=@'.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result;
  return $result;
}
function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id=@'.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}

@$user = json_decode(file_get_contents("data/user.json"),true);
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
@$cuser = json_decode(file_get_contents("data/$fromid.json"),true);

if(!in_array($from_id, $user["userlist"]) == true) {
$user["userlist"][]="$from_id";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
    }

if(in_array($from_id, $user["blocklist"])) {
SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"- انت محظور من البوت ياعزيزي ، ⚖ !
- بسبب عدم اتباعك قوانين البوت ؛ لا تقم بارسال الرسائل مرة اخرى ، 🔱
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true
])
    		]);
SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- محظور دز رسالة للبوت ،
	- [$first_name](tg://user?id=$from_id)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
if($textmassage=="/start" && $tc == "private"){	
if(in_array($from_id, $user["userlist"]) == true) {
SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• اهلا بك يا ؛ [$name](tg://user?id=$chat_id)

- في بوت زيادة الاعضاء ، 📻 '
- قم بتجميع النقاط وشراء الاعضاء لقناتك ، ⚖ '
- التجميع عن طريق مشاركه الرابط او الاشتراك بالقنوات ، 💸 '
- قم باختيار ما تريد من هذه الازرار ، 🔰 ؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[اضغط هنا وتابع جديدنا ، 📢](https://t.me/$chs/)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"- تجمبع النقاط ، 📻 '",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"- شراء الاعضاء ، 💸 '",'callback_data'=>'takemember'],['text'=>"- احصائيات نقاطك ، 📊 '",'callback_data'=>'accont']
   ],
   [
   ['text'=>"- مشاركةه الرابط ، 📧 '",'callback_data'=>'member'],['text'=>"- تحويل نقاط ، ♻️ '",'callback_data'=>'sendcoin']
   ],
      [
   ['text'=>"- ارسال اقتراح ، 🇮🇶 '",'callback_data'=>'sup'],
   ],
   [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$buyy"]],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- دز ستارت ،
	- [$first_name](tg://user?id=$from_id)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• اهلا بك يا ؛ [$name](tg://user?id=$chat_id)

- في بوت زيادة الاعضاء ، 📻 '
- قم بتجميع النقاط وشراء الاعضاء لقناتك ، ⚖ '
- التجميع عن طريق مشاركه الرابط او الاشتراك بالقنوات ، 💸 '
- قم باختيار ما تريد من هذه الازرار ، 🔰 ؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[اضغط هنا وتابع جديدنا ، 📢](https://t.me/$chs)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"- تجميع النقاط ، 📻 '",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"- شراء الاعضاء ، 💸 '",'callback_data'=>'takemember'],['text'=>"- احصائيات نقاطك ، 📊 '",'callback_data'=>'accont']
   ],
   [
   ['text'=>"- مشاركةه الرابط ، 📧 '",'callback_data'=>'member'],['text'=>"- تحويل نقاط ، ♻️ '",'callback_data'=>'sendcoin']
   ],
      [
   ['text'=>"- ارسال اقتراح ، 🇮🇶 '",'callback_data'=>'sup'],
   ],
   [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$buyy"]],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- دز ستارت للبوت ،
	- [$first_name](tg://user?id=$from_id)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$juser = json_decode(file_get_contents("data/$from_id.json"),true);	
$juser["userfild"]["$from_id"]["invite"]="0";
$juser["userfild"]["$from_id"]["coin"]="0";
$juser["userfild"]["$from_id"]["setchannel"]="لا يوجد !";
$juser["userfild"]["$from_id"]["setmember"]="لا يوجد !";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
}
elseif(strpos($textmassage , '/start ') !== false  ) {
$start = str_replace("/start ","",$textmassage);
if(in_array($from_id, $user["userlist"])) {
SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• انت مشترك بالفعل في البوت ، 📌 !
• لا يمكنك الاشتراك او الدخول الى الرابط مرة اخرى ، ⚜ '
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
	   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"- تجميع النقاط ، 📻 '",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"- شراء الاعضاء ، 💸 '",'callback_data'=>'takemember'],['text'=>"- احصائيات نقاطك ، 📊 '",'callback_data'=>'accont']
   ],
   [
   ['text'=>"- مشاركةه الرابط ، 📧 '",'callback_data'=>'member'],['text'=>"- تحويل نقاط ، ♻️ '",'callback_data'=>'sendcoin']
   ],
      [
   ['text'=>"- ارسال اقتراح ، 🇮🇶 '",'callback_data'=>'sup']
   ],
   [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$buyy"]],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);	
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- دخل للرابط مرا لاخ ،
	- [$first_name](tg://user?id=$from_id)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
else 
{
$juser = json_decode(file_get_contents("data/$from_id.json"),true);	
$inuser = json_decode(file_get_contents("data/$start.json"),true);
$member = $inuser["userfild"]["$start"]["invite"];
$coin = $inuser["userfild"]["$start"]["coin"];
$memberplus = $member + 1;
$coinplus = $coin  + 1;
	SssBs('sendmessage',[
	'chat_id'=>$start,
	'text'=>"- تم دخول عضو جديد من الرابط الخاص بك ، 🇮🇶 '
- عدد الاعضاء الذين قامو بالدخول الى الرابط الخاص بك ؛ $memberplus ،
- عدد النقاط الخاصة بك ؛ $coinplus ،",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
 SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• اهلا بك يا ؛ [$name](tg://user?id=$chat_id)

- في بوت زيادة الاعضاء ، 📻 '
- قم بتجميع النقاط وشراء الاعضاء لقناتك ، ⚖ '
- التجميع عن طريق مشاركه الرابط او الاشتراك بالقنوات ، 💸 '
- قم باختيار ما تريد من هذه الازرار ، 🔰 ؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[اضغط هنا وتابع جديدنا ، 📢](https://t.me/$chs)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"- تجميع النقاط ، 📻 '",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"- شراء الاعضاء ، 💸 '",'callback_data'=>'takemember'],['text'=>"- احصائيات نقاطك ، 📊 '",'callback_data'=>'accont']
   ],
   [
   ['text'=>"- مشاركةه الرابط ، 📧 '",'callback_data'=>'member'],['text'=>"- تحويل نقاط ، ♻️ '",'callback_data'=>'sendcoin']
   ],
      [
   ['text'=>"- ارسال اقتراح ، 🇮🇶 '",'callback_data'=>'sup'],
      ],
      [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$buyy"]],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);	
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- دز ستارت للبوت ،
	- [$first_name](tg://user?id=$from_id)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$inuser["userfild"]["$start"]["invite"]="$memberplus";
$inuser["userfild"]["$start"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$start.json",$inuser);
$juser["userfild"]["$from_id"]["invite"]="0";
$juser["userfild"]["$from_id"]["coin"]="0";
$juser["userfild"]["$from_id"]["setchannel"]="لا يوجد !";
$juser["userfild"]["$from_id"]["setmember"]="لا يوجد !";
$juser["userfild"]["$from_id"]["inviter"]="$start";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif($cuser["userfild"]["$fromid"]["channeljoin"] == true){
$allchannel = $cuser["userfild"]["$fromid"]["channeljoin"];
for($z = 0;$z <= count($allchannel) -1;$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if($allchannel[$z] == true){
     SssBs('answercallbackquery', [
              'callback_query_id' =>$membercall,
            'text' => "- بسبب مغادرة القناة ؛ @$allchannel[$z] ، تم خصم 2 من نقاطك ، ⚠️ .",
            'show_alert' =>false
         ]);
         SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا غادر للبوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);  
unset($cuser["userfild"]["$fromid"]["channeljoin"][$z]);
$cuser["userfild"]["$fromid"]["channeljoin"]=array_values($cuser["userfild"]["$fromid"]["channeljoin"]);  
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin - 2;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);      
}

if($allchannel[$z] == true){
     SssBs('SendMessage', [
              'chat_id'=>$chatid,
            'text' => "• لقد قمت بمغادرة بعض القنوات وقمت باخذ النقاط مقابل الانضمام ؛ وبسبب ذلك تم خصم 2 من النقاط لكل قناة من القنوات التي قمت بالمغادرة منها ، 🇮🇶
 
• تستطيع اعادة النقاط التي تم خصمها من نقاطك بأعادة الاشتراك في القنوات التي قمت بالمغادرة منها قم بالاشتراك ثم اضغط على تحديث ؛ @$allchannel[$z] ، 🐬 !",
            'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [['text'=>"- تحديث ،  '",'callback_data'=>'takecoin']]
                     ]
               ])
         ]);  
         SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا غادر ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);  
unset($cuser["userfild"]["$fromid"]["channeljoin"][$z]);
$cuser["userfild"]["$fromid"]["channeljoin"]=array_values($cuser["userfild"]["$fromid"]["channeljoin"]);  
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin - 2;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);      
}
}

if($data=="panel"){
SssBs('editmessagetext',[
        'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• اهلا بك يا ؛ [$firstname](tg://user?id=$chat_id)

- في بوت زيادة الاعضاء ، 📻 '
- قم بتجميع النقاط وشراء الاعضاء لقناتك ، ⚖ '
- التجميع عن طريق مشاركه الرابط او الاشتراك بالقنوات ، 💸 '
- قم باختيار ما تريد من هذه الازرار ، 🔰 ؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[اضغط هنا وتابع جديدنا ، 📢](https://t.me/$chs)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"- تجميع النقاط ، 📻 '",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"- شراء الاعضاء ، 💸 '",'callback_data'=>'takemember'],['text'=>"- احصائيات نقاطك ، 📊 '",'callback_data'=>'accont']
   ],
   [
   ['text'=>"- مشاركةه الرابط ، 📧 '",'callback_data'=>'member'],['text'=>"- تحويل نقاط ، ♻️ '",'callback_data'=>'sendcoin']
   ],
      [
   ['text'=>"- ارسال اقتراح ، 🇮🇶 '",'callback_data'=>'sup'],
   ],
   [['text'=>"• لشراء البوت ~ #",'url'=>"t.me/$by"]],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا دز داس بانيل للبوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);  	
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["file"]="none";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
elseif($data=="takecoin" ){
$rules = $cuser["userfild"]["$fromid"]["acceptrules"];
if($rules == false){
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• انتظر قليلا يجب عليك قراءة ما يلي ؛ 💚👇🏿 '
• اكمل قراءة النقاط ثم ابدأ بجمع العملات ، 

١. الحصول على عملة من خلال الاشتراك في كل قناة
٢. اذا قمت بالمغادرة من اي قناة بعد العضوية فسوف يتم خصم عملتين من عملاتك ،
٣. يمكنك الحصول على عضو واحد مقابل عملتين ،
٤. اذا قمت بتسجيل قناة غير اخلاقية سيتم حظرك من البوت ،

- ملاحظة 🏹 ؛ اذا كانت لديك اي مشاكل في الاشتراك بالقنوات واستلام العملات او رأيت قنوات انحرافية وغير اخلاقية فيرجى الابلاغ عن القناة .

- اذا قمت بقراءة جميع النقاط اضغط على زر تمت القراءة في الاسفل ؛ 🔰 !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- تمت القراءة ، 🎲 '",'callback_data'=>"takecoin"],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
[
				   ],
                     ]
               ])
	]);	
	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديقره القوانين للبوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);  
$cuser["userfild"]["$fromid"]["acceptrules"]="true";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
		   }
else
{
if($tchq != 'member' && $tchq != 'creator' && $tchq != 'administrator'){
$join = $cuser["userfild"]["$fromid"]["canceljoin"];
if($join == false){
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- القناة الرئيسيةه للبوت اذا كنت غير مشترك عند اشتراكك سوف تحصل على 2 من النقاط ، 💬 '

- واذا كنت مشترك مسبقا سوف تحصل على 2 من النقاط مجانا ، 📬 '

• هذه الفرصة لا تتكرر ، بعد الاشتراك اضغط على التالي ، ♥️👇🏿؛",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- اشتراك ، 📢 '",'url'=>"https://t.me/$channel"],['text'=>"- التالي ، 📻 '",'callback_data'=>'mainchannel']
				   ],
				   [
				   ['text'=>"• مشترك مسبقا ، 📮 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا اشترك بلقناة الرئيسية للبوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser["userfild"]["$fromid"]["canceljoin"]="true";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);		   
}
else
{
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- اسم القناة ؛ $name
- معرف القناة ؛ @$username ،
- ايدي القناة ؛ $id 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
- وصف القناة ؛ $description",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- اشتراك ، 📢 '",'url'=>"https://t.me/$username"],['text'=>"- التالي ، 📻 '",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"• تخطي ، 📌 '",'callback_data'=>'nextchannel'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"- الابلاغ عن هذه القناة ، 📕'",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديجمع ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- انتهت القنوات المضافةه ؛ يرجى المحاولة مرة اخرى في تجميع النقاط ، او قم بمشاركة الرابط بدل عن الاشتراك في القنوات ، 📻 ' !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- تحديث ، 📑 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا خلص قنوات البوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
}
else
{
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- اسم القناة ؛ $name
- معرف القناة ؛ @$username ،
- ايدي القناة ؛ $id 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
- وصف القناة ؛ $description",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- اشتراك ، 📢 '",'url'=>"https://t.me/$username"],['text'=>"- التالي ، 📻 '",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"• تخطي ، 📌 '",'callback_data'=>'nextchannel'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"- الابلاغ عن هذه القناة ، 📕'",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديجمع للبوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- انتهت القنوات المضافةه ؛ يرجى المحاولة مرة اخرى في تجميع النقاط ، او قم بمشاركة الرابط بدل عن الاشتراك في القنوات ، 📻 ' !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- تحديث ، 📑 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا خلص القنوات للبوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
}
}
elseif($data=="truechannel" ){
$getjoinchannel = $cuser["userfild"]["$fromid"]["getjoin"];
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$getjoinchannel."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
        SssBs('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "• قم بألاشتراك في القناة اولا ؛ ثم اضغط على التالي ، 🔱 !",
            'show_alert' =>true
        ]);
        SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا النغل مشترك ويدوس اشتركت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
else
{
 SssBs('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "• تهانينا تم الحصول على نقطة واحدة واضافة العدد الى رصيدك ، 🔰 !",
            'show_alert' =>false
				   ]);
				   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا اشترك وحصل نقطه ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$arraychannel = $cuser["userfild"]["$fromid"]["arraychannel"];
$coinchannel = $user["setmemberlist"];
$channelincoin = $coinchannel[$arraychannel];
$downchannel = $channelincoin - 1;
$pluscoin = $coin + 1;
$cuser["userfild"]["$fromid"]["channeljoin"][]="$getjoinchannel";
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
if($downchannel > 0){
@$user = json_decode(file_get_contents("data/user.json"),true);
$user["setmemberlist"]["$arraychannel"]="$downchannel";
$user["setmemberlist"]=array_values($user["setmemberlist"]); 
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- اسم القناة ؛ $name
- معرف القناة ؛ @$username ،
- ايدي القناة ؛ $id 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
- وصف القناة ؛ $description",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- اشتراك ، 📢 '",'url'=>"https://t.me/$username"],['text'=>"- التالي ، 📻 '",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"• تخطي ، 📌 '",'callback_data'=>'nextchannel'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"- الابلاغ عن هذه القناة ، 📕'",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديشترك بلقنوات ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- انتهت القنوات المضافةه ؛ يرجى المحاولة مرة اخرى في تجميع النقاط ، او قم بمشاركة الرابط بدل عن الاشتراك في القنوات ، 📻 ' !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- تحديث ، 📑 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا خلص لقنوات للبوت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
else
{
unset($user["setmemberlist"]["$arraychannel"]);
unset($user["channellist"]["$arraychannel"]);
$user["channellist"]=array_values($user["channellist"]); 
$user["setmemberlist"]=array_values($user["setmemberlist"]);  
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- اسم القناة ؛ $name
- معرف القناة ؛ @$username ،
- ايدي القناة ؛ $id 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
- وصف القناة ؛ $description",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- اشتراك ، 📢 '",'url'=>"https://t.me/$username"],['text'=>"- التالي ، 📻 '",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"",'callback_data'=>'nextchannel'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"- الابلاغ عن هذه القناة ، 📕'",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديجمع ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- انتهت القنوات المضافةه ؛ يرجى المحاولة مرة اخرى في تجميع النقاط ، او قم بمشاركة الرابط بدل عن الاشتراك في القنوات ، 📻 ' !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- تحديث ، 📑 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا خلص لقنوات ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
}
}
elseif($data=="nextchannel" ){
 SssBs('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "- انتظر قليلا ... 📌 !",
            'show_alert' =>false
        ]);
$arraychannel = $cuser["userfild"]["$fromid"]["arraychannel"];
$plusarraychannel = $arraychannel + 1 ;
$allchannel = $user["channellist"];
for($z = $plusarraychannel;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- اسم القناة ؛ $name
- معرف القناة ؛ @$username ،
- ايدي القناة ؛ $id 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
- وصف القناة ؛ $description",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- اشتراك ، 📢 '",'url'=>"https://t.me/$username"],['text'=>"- التالي ، 📻 '",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"• تخطي ، 📌 '",'callback_data'=>'nextchannel'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"- الابلاغ عن هذه القناة ، 📕'",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديجمع ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- انتهت القنوات المضافةه ؛ يرجى المحاولة مرى اخرة في تجميع النقاط ، او قم بمشاركة الرابط بدل عن الاشتراك في القنوات ، 📻 ' !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- تحديث ، 📑 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا خلص لقنوات ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
elseif($data=="mainchannel" ){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
        SssBs('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "• قم بألاشتراك في القناة اولا ؛ ثم اضغط على التالي ، 🔱 !",
            'show_alert' =>true
        ]);
        SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا لنغل مشترك وداس اشتركت ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
else
{
 SssBs('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "• تهانينا تم الحصول على 2 من النقاط واضافة النقاط الى رصيدك ، 🔰 !",
            'show_alert' =>false
        ]);
        SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا اخذ نقطه ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin + 2;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser["userfild"]["$fromid"]["channeljoin"][]="$channel";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
$omm = $allchannel[$z];
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- اسم القناة ؛ $name
- معرف القناة ؛ @$username ،
- ايدي القناة ؛ $id 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
- وصف القناة ؛ $description",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- اشتراك ، 📢 '",'url'=>"https://t.me/$username"],['text'=>"- التالي ، 📻 '",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"• تخطي ، 📌 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"- الابلاغ عن هذه القناة ، 📕'",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديجمع ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- انتهت القنوات المضافةه ؛ يرجى المحاولة مرة اخرى في تجميع النقاط ، او قم بمشاركة الرابط بدل عن الاشتراك في القنوات ، 📻 ' !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"- تحديث ، 📑 '",'callback_data'=>'takecoin'],['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا خلص لقنوات ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
}
elseif($data=="badchannel"){
$getjoinchannel = $cuser["userfild"]["$fromid"]["getjoin"];
	 SssBs('answercallbackquery', [
	            'callback_query_id' =>$membercall,
            'text' => "- تم ارسال الابلاغ الى مبرمج البوت ؛ وسوف يقوم بمراجعة القناة وحذفها من البوت نشكرك للتعاون معنا  ، ♥️ !",
            'show_alert' =>true
        ]);
	SssBs('sendmessage',[
	'chat_id'=>$Dev[0],
	'text'=>"- ابلاغ جديد عن قناة غير ملتزمة او انحرافية في البوت ، معرف القناة ؛ @$getjoinchannel !

	﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
• معلومات العضو الذي قام بالابلاغ عن القناة ؛ 👇🏿♥️ ؛

▫️ الايدي ؛ $fromid ،
◾️ المعرف ؛ @$usernames ،",
  	]);		
}
elseif($data=="accont"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$setmember = $cuser["userfild"]["$fromid"]["setmember"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• جميع احصائيات النقاط الخاصةه بك ؛ 💛👇🏿 ' 
      
◾️ عدد النقاط ؛ $coin
▫️ اخر قناة قمت بتمويلها ؛ $setchannel
◾️ عدد الاعضاء الذي قمت بطلبهم للقناة ؛ $setmember
▫️ عدد الذين قامو باستخدام رابطك ؛ $invite
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
• معلومات حسابك الشخصي ؛ 📌'

◾️ الاسم ؛ $firstname
▫️ المعرف ؛ @$usernames
◾️ الايدي ؛ $fromid",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [['text'=>"- القنوات التي تم الاشتراك فيها ، 📭 '",'callback_data'=>'mechannel']],
[['text'=>"- القنوات التي تم تمويلها من البوت ، ⚖ '",'callback_data'=>'order']
				   ],
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا داس احصائيات ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
elseif($data=="mechannel"){
$allchannel = $cuser["userfild"]["$fromid"]["channeljoin"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."📍 "."@".$allchannel[$z]."\n";
}
if($result == true){
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"- لستةه القنوات التي قمت بالاشتراك فيها ، 💛👇🏿؛
	
$result

• ملاحظة : عند مغادرتك قناة واحدة سوف يتم خصم 2 من نقاطك ' بسبب المغادرة ؛ لذلك وجب التنبيه ، 📂 '",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديشوف لقنوات لمشترك بيهن ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}	
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"- انت لم تقم بالاشتراك في أي قناة من قنوات البوت ياعزيزي ؛ يرجى الاشتراك وتجميع النقاط ومن بعدها الضغط على زر القنوات التي تم الاشتراك فيها ، 🚸 .
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel'],['text'=>"- تجميع ، 📻 '",'callback_data'=>'takecoin']
				   ],
				   ]
            ])           
  	]);		
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ممشترك ولا بقناة ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
elseif($data=="order"){
$allchannel = $cuser["userfild"]["$fromid"]["listorder"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."📍 ".$allchannel[$z]."  عضو"."\n";
}
if($result == true){
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"- لستةه القنوات التي قمت بتمويلها ؛ 🌼👇🏿 '

$result

﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديشوف قنواتة المولهن ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
else
{
$coin = $cuser["userfild"]["$fromid"]["coin"];
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"- عذرا ياعزيزي انت لم تقم بتمويل أي قناة من قنواتك ؛ لانك لا تمتلك النقاط او تمتلك ولكنك لم تقم بالتمويل .. اذا كانت لديك نقاط كافية لشراء الاعضاء اضغط على الزر الموجود بالاسفل ، 🇮🇶 ' 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel'],['text'=>"- شراء الاعضاء ، 💸 '",'callback_data'=>'takemember']
				   ],
				   ]
            ])           
  	]);		
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ممول ولا قناه ويدوس ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
}
elseif($data=="member"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
		SssBs('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>"- بوت زيادة الاعضاء للقنوات ، ⚖ !

- يمكنك جمع النقاط وزيادة اعضاء قناتك اعضاء حقيقيين من خلال البوت باليوم 500 عضو واكثر وكلشي مضمون ، 📻 !

- قم بالدخول الى البوت من خلال الرابط التالي لا تقم بتفويت هذه الفرصةه العظيمةه ، 👇🏿♥️ ؛
https://t.me/$usernamebot?start=$fromid",
    		]);
	SssBs('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"- قم بمشاركةه الرابط الذي في الاعلى واحصل على النقاط بكل سهولة ؛ دون الاشتراك في القنوات قم بارسال رابطك الى جميع المجموعات والقنوات واحصل على النقاط ، 🐬 !

• عدد النقاط الخاصةه بك ؛ $coin
• عدد الذين قامو بالدخول الى رابطك ؛ $invite",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);			
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا داس ع رابط ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
}
elseif($data=="sendcoin"){	

SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"- لارسال النقاط الى مستخدم اخر يجب ان يكون المستخدم مشترك في البوت وبعدها قم بارسال ايدي المستخدم لارسال النقاط اليه ، 📌 !
	
	- او قم بأرسال توجيه رسالة من رسائل المستخدم الذي تريد ارسال النقاط اليه الى البوت ، 💬 '
	﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديدز نقاط ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser["userfild"]["$fromid"]["file"]="sendcoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);		
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendcoin') {
$coin = $juser["userfild"]["$from_id"]["coin"];
if($forward_from == true){
if($forward_from_id != $from_id){
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• تم العثور على المستخدم معلومات المستخدم ، 💚👇🏿؛

▫️ الاسم ؛ $forward_from_first_name
◾️ المعرف ؛ @$forward_from_username
▫️ الايدي ؛  $forward_from_id

- الان قم بارسال العدد الذي تريد تحويله الى المستخدم ،
- عدد النقاط الخاصةه بك ؛ $coin ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setsendcoin";
$juser["userfild"]["$from_id"]["sendcoinid"]="$forward_from_id";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• لا يمكن ارسال نقاطك الى نفسك ياعزيزي ؛ ارسل ايدي المستخدم فقط ، 🌟 !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
if($textmassage != $from_id){
if(is_numeric($textmassage)){
$stat = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$textmassage&user_id=".$textmassage);
$statjson = json_decode($stat, true);
$status = $statjson['ok'];
if($status == 1){
$name = $statjson['result']['user']['first_name'];
$username = $statjson['result']['user']['username'];
$id = $statjson['result']['user']['id'];
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• تم العثور على المستخدم معلومات المستخدم ، 💚👇🏿؛

▫️ الاسم ؛ $name
◾️ المعرف ؛ @$usrrname
▫️ الايدي ؛  $id

- الان قم بارسال العدد الذي تريد تحويله الى المستخدم ،
- عدد النقاط الخاصةه بك ؛ $coin ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setsendcoin";
$juser["userfild"]["$from_id"]["sendcoinid"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"- الايدي الخاص بالمستخدم غير صحيح ، 🔱
- قم بالتاكد من الايدي وارسالة مرة اخرى الى البوت ، 🕊 !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• ايدي العضو غير صحيح او المستخدم غير مشترك في البوت يرجى التاكد من الايدي او قم بالاشتراك في البوت ، 🔰؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
	SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"- لا يمكن الارسال لنفسك ؛ ⚠️
- قم بالارسال لصديق او لحسابك الثاني ، ☑️
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);	
}
}
}	
elseif($juser["userfild"]["$from_id"]["file"] == "setsendcoin"){
$coin = $juser["userfild"]["$from_id"]["coin"];
$userid = $juser["userfild"]["$from_id"]["sendcoinid"];
$inuser = json_decode(file_get_contents("data/$userid.json"),true);
$coinuser = $inuser["userfild"]["$userid"]["coin"];
if($textmassage <= $coin && $coin > 0){
$coinplus = $coin - $textmassage;
$sendcoinplus = $coinuser + $textmassage;
	SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"- تم ارسال النقاط الى المستخدم بنجاح ، ⚖ !
- المعلومات العامةه للعضو والنقاط ، 📌 ؛

▫️ ايدي العضو ؛ $userid
◾️ عدد النقاط التي تم ارسالها ؛ $textmassage
▫️ عدد نقاطك الآن ؛ $coinplus",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
  	SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا دز نقاط ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
		SssBs('sendmessage',[
	'chat_id'=>$userid,
	'text'=>"- تم ارسال $textmassage من النقاط اليك ، 🌟 !
- معلومات العضو الذي قام بأرسال النقاط اليك ، 🔱 ؛

◾️ ايدي العضو ؛ $from_id
▫️ المعرف ؛ @$username",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
$juser["userfild"]["$from_id"]["file"]="none";
$juser["userfild"]["$from_id"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
$inuser["userfild"]["$userid"]["coin"]="$sendcoinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$userid.json",$inuser);	
}
else
{
	SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"- عدد النقاط الذي تود ارسالة اقل من عدد نقاطك ، 🐬 !
- اقصى عدد يمكنك ارساله ؛ $coin",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
}
}

elseif($data=="takemember"){
$coin = $cuser["userfild"]["$fromid"]["coin"];
if($coin >= 10){
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- الان قم بأرسال معرف القناة ؛ 🎲 !
- مثال ؛ @$channel 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ديخلي قناته ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser["userfild"]["$fromid"]["file"]="setchannel";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- يجب ان يكون العدد اقل او نفس العدد الذي هو عدد عملاتك او نقاطك ،  🇮🇶 '

- عدد النقاط ؛ $coin !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel'],['text'=>"- تجميع ، 📻 '",'callback_data'=>'takecoin']
				   ],
                     ]
               ])
			   ]);	
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setchannel') {
if(preg_match('/^(@)(.*)/s',$textmassage)){
$coin = $juser["userfild"]["$from_id"]["coin"];
$max = $coin / 2;
$maxmember = floor($max);
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• تم حفظ القناة الخاصةه بك ، ☑️ '
- القناة الخاصة بك ؛ $textmassage
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎

- عدد الاعضاء الذي يمكنك طلبهم للقاة ؛ $coin .

• الان قم بأرسال العدد المطلوب من الاعضاء لقناتك مثل 50 ؛ علماً ان العضو الواحد ب2 من العملات ، 🏹 '",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setmember";
$juser["userfild"]["$from_id"]["setchannel"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• معرف القناة غير صحيح ، 🏉 '
• ارسل المعرف الصحيح مثل ؛ @$channel .",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setmember') {
$coin = $juser["userfild"]["$from_id"]["coin"];
$setchannel = $juser["userfild"]["$from_id"]["setchannel"];
$max = $coin / 2;
$maxmember = floor($max);
if($maxmember >= $textmassage){
$howmember = getChatMembersCount($setchannel,$token);
$endmember = $howmember + $textmassage;
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• معلومات النقاط والتمويل وعدد الاعضاء ، ⚖ ؛

- معرف القناة ؛ *$setchannel* ،
 - العدد المطلوب ؛ *$textmassage* ،
- عدد اعضاء القناة ؛ *$howmember* ،
- عدد الاعضاء بعد التمويل ؛ *$endmember* ،

• الان عليك رفع البوت مشرف في القناة ليتم العمل بصورة صحيحة ؛ قم برفع البوت ثم اضغط على زر تأكيد الذي يوجد تحت ، 💌 '",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"- تأكيد ، 🇮🇶 '",'callback_data'=>'trueorder']
				   ],
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel'],
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser["userfild"]["$from_id"]["setmember"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
	SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• العدد الذي قمت بطلبه اكثر من نقاطك ، ⚜ '
• لذلك لم يتم استجابة طلبكك ، 🔘 '

- الحد الاقصى للعدد الذي يمكنك طلبه هوة ؛ $coin !
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif($data=="trueorder"){
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$admin = getChatstats(@$setchannel,$token);
if($admin != true){
	       SssBs('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "- قم برفع البوت ادمن في القناة ليتم التمويل بصورة صحيحة ، 📡 '",
            'show_alert' =>true
        ]);
}
else
{
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"• تم تنفيذ طلبك بنجاح ، ⚠️

- يمكنك طلب الهدايا ايضا ؛ ملاحظة اذا قمت بمخالفة قوانين وقواعد وتعليمات البوت سوف نقوم بحذف قناتك تأكد من الذهاب الى المساعدة والقواعد لتجنب الحظر ، 🐬 !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel'],
				   ],
                     ]
               ])
			   ]);	
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا ضاف قناتة ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$setmember = $cuser["userfild"]["$fromid"]["setmember"];
$pluscoin = $setmember * 2;
$coinplus = $coin - $pluscoin;
$cuser["userfild"]["$fromid"]["coin"]="$coinplus";
$cuser["userfild"]["$fromid"]["listorder"][]="$setchannel -> $setmember";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
$user["channellist"][]="$setchannel";
$user["setmemberlist"][]="$setmember";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
}

elseif($data=="sup"){
SssBs('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"- الدعم وحل المشاكل الموجودة بالبوت ؛

- الرجاء ارسال الشكاوي او المشاكل الموجودة بالبوت ليتم تصحيحها ارسل مشكلتك برسالة واحدة فضلا ؛ 🕊 !

- يمكنك ايضا ارسال الميديا ؛ الصور والملصقات والصوت وغيرها .. ",
                'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
			   SssBs('sendmessage',[
	'chat_id'=>$admin,
	'text'=>"- هذا داس ع ارسال اقتراح ،
	- [$firstname](tg://user?id=$fromid)  ",
	'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
	]);
$cuser["userfild"]["$fromid"]["file"]="sendsup";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendsup') {
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"• تم ارسال رسالتك الى مبرمج البوت ، 
• انتظر الاجابة من فضلك ، ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
SssBs('ForwardMessage',[
'chat_id'=>$Dev[0],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
	elseif($update->message && $update->message->reply_to_message && in_array($from_id,$Dev) && $tc == "private"){
	SssBs('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"- تم ارسال رسالتك الى العضو بنجاح ، 🎌 !
- بواسطه ؛ @$username !"
		]);
	SssBs('sendmessage',[
        "chat_id"=>$reply,
        "text"=>"$textmassage",
'parse_mode'=>'MarkDown'
		]);
}
if(file_get_contents("data/$fromid.txt") == "true"){
$pluscoin = file_get_contents("data/".$fromid."coin.txt");
$inviter = $cuser["userfild"]["$fromid"]["inviter"];
$invitercoin = $pluscoin / 100 * 20;
	       SssBs('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "📍 اضافة النقود التي تم شراءها ...",
            'show_alert' =>false
        ]);
		         SssBs('sendmessage',[
        	'chat_id'=>$inviter,
        	'text'=>"💰 العدد : $invitercoin !
			
📍 تمت العمليةه بنجاح !!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$coinplus = $coin + $pluscoin;
$cuser["userfild"]["$fromid"]["coin"]="$coinplus";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
$inuser = json_decode(file_get_contents("data/$inviter.json"),true);
$coininviter = $inuser["userfild"]["$inviter"]["coin"];
$coinplusinviter = $coininviter + $invitercoin ;
$inuser["userfild"]["$inviter"]["coin"]="$coinplusinviter";;
$inuser = json_encode($inuser,true);
file_put_contents("data/$inviter.json",$inuser);
unlink("data/".$fromid."coin.txt");
unlink("data/$fromid.txt");
}


//panel admin


elseif($textmassage=="/panel" or $textmassage=="/admin" or $textmassage=="ادمن"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
SssBs('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- اهلا بك عزيزي المطور ، 🧜‍♂ '
- قم باختيار ماتريد من القائمةه التي في الاسفل ، 👅 '
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"- عدد الاعضاء ، 👤 '"]                
		 ],
 	[
	  	['text'=>"- رسالة للكل ، 🎒 '"],['text'=>"- توجيه للكل ، 🧜‍♂ '"]
	  ],
	   	[
['text'=>"- عرض القنوات ، 🔱 '"],['text'=>"- حذف قناة ، 📛 '"]
	  ],
	  	   	[
['text'=>"- ارسال نقاط ، 🕊 '"]
	  ]
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
}
}
elseif($textmassage=="• العودة ، 🔙 '"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
SssBs('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- اهلا بك عزيزي المطور ، 🧜‍♂ '
- قم باختيار ماتريد من القائمةه التي في الاسفل ، 👅 '
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"- عدد الاعضاء ، 👤 '"]               
		 ],
 	[
	  	['text'=>"- رسالة للكل ، 🎒 '"],['text'=>"- توجيه للكل ، 🧜‍♂ '"]
	  ],
	   	[
['text'=>"- عرض القنوات ، 🔱 '"],['text'=>"- حذف قناة ، 📛 '"]
	  ],
	  	   	[
['text'=>"- ارسال نقاط ، 🕊 '"]
	  ]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
}
elseif($textmassage=="- عدد الاعضاء ، 👤 '"){
if (in_array($from_id,$Dev)){
$all = count($user["userlist"]);
$order = count($user["channellist"]);
				SssBs('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"• اهلا بك يا عزيزي المطور ؛ @username !

◾️ عدد الاعضاء ؛ $all ،
▫️ عدد القنوات بقائمةه التمويل ؛ $order .
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
                'hide_keyboard'=>true,
		]);
		}
}

elseif ($textmassage == "- رسالة للكل ، 🎒 '" ) {
if (in_array($from_id,$Dev)){
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"- اهلا بك يا ؛ @$username !
- الان قم بارسال الرسالة ليتم ارسالها للكل ، 🇮🇶 '",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"• العودة ، 🔙 '"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="sendtoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendtoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
if ($textmassage != "• العودة ، 🔙 '") {
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"- تم ارسال الرسالة الى جميع مشتركين البوت بنجاح بواسطة ؛ @$username ، 📢 !",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
     SssBs('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"$textmassage
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
        ]);
}
}
}
elseif ($textmassage == "- توجيه للكل ، 🧜‍♂ '" ) {
if (in_array($from_id,$Dev)){
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"- اهلا بك يا ؛ @$username !
- الان قم بارسال التوجيه ليتم ارسالة للكل ، 🇮🇶 '",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"• العودة ، 🔙 '"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="fortoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'fortoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
if ($textmassage != "• العودة ، 🔙 '") {
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"- تم ارسال التوجيه الى جميع مشتركين البوت بنجاح بواسطة ؛ @$username ، 📢 !",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
Forward($numbers[$z], $chat_id,$message_id);
}
}
}
elseif($textmassage=="- عرض القنوات ، 🔱 '"){
if (in_array($from_id,$Dev)){
$order = $user["channellist"];
$ordercount = count($user["channellist"]);
for($z = 0;$z <= count($order)-1;$z++){
$result = $result.$order[$z]."\n";
}
				SssBs('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"- اهلا بك ؛ @$username !! 

◾️ عدد القنوات التي تحت التمويل ؛ $ordercount
		▫️ لستةه معرفات القنوات التي تحت التمويل ؛ 📌
$result",
                'hide_keyboard'=>true,
		]);
		}
}
elseif($textmassage=="- حذف قناة ، 📛 '"){
if (in_array($from_id,$Dev)){
				SssBs('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"- حسنا ياعزيزي ؛ @$username !
- الان قم بارسال معرف القناة التي تود حذفها ، 🔘
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"• العودة ، 🔙 '"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="remorder";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'remorder') {
if ($textmassage != "• العودة ، 🔙 '") {
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"- تم حذف القناة من البوت بنجاح ، ⚠️
- بواسطة ؛ @$username ، !",
	  'reply_to_message_id'=>$message_id,
 ]);
$how = array_search($textmassage,$user["channellist"]);
unset($user["setmemberlist"][$how]);
unset($user["channellist"][$how]);
$user["channellist"]=array_values($user["channellist"]); 
$user["setmemberlist"]=array_values($user["setmemberlist"]);
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);  
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif($textmassage=="- ارسال نقاط ، 🕊 '"){
if (in_array($from_id,$Dev)){
				SssBs('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"ارسل ايدي العضو الذي تريد الاىسال اليه او ارسل توجيه من العضو",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"• العودة ، 🔙 '"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="adminsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'adminsendcoin') {
if ($textmassage != "• العودة ، 🔙 '") {
if ($forward_from == true) {
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"حسنا عزيزي المطور

الايدي : $forward_from_id
المعرف : @$forward_from_username

دز عدد النقاط الان",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"• العودة ، 🔙 '"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$forward_from_id";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"ارسل العدد الذي تريد ارسالة الى صاحب الايدي : $textmassage",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"• العودة ، 🔙 '"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$textmassage";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sethowsendcoin') {
if ($textmassage != "• العودة ، 🔙 '") {
$id = $juser["idforsend"];
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📍 العدد $textmassage تم الارسال الى : $id بنجاح ^_^",
	  'reply_to_message_id'=>$message_id,
 ]);
          SssBs('sendmessage',[
        	'chat_id'=>$id,
        	'text'=>"- تم ارسال واضافة ؛ $textmassage الى نقاطك من قبل مبرمج البوت ، 💚🐬 !",
			               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$inuser = json_decode(file_get_contents("data/$id.json"),true);
$coin = $inuser["userfild"]["$id"]["coin"];
$coinplus = $coin + $textmassage;
$inuser["userfild"]["$id"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$id.json",$inuser);
}
}

elseif ($textmassage == '📍 نقاط للكل' ) {
if (in_array($from_id,$Dev)){
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"ادخل العدد الذي تريده للنقود",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"• العودة ، 🔙 '"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="sendcointoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendcointoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
if ($textmassage != "• العودة ، 🔙 '") {
$numbers = $user["userlist"];
         SssBs('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"نم ارسال النقاط للجميع ✔️",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
   SssBs('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"- هدية من قبل الادارة ؛ عدد النقاط التي حصلت عليها $textmassage . 🇮🇶 '
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
          'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"• العودة ، 🔙 '",'callback_data'=>'panel']
				   ],
                     ]
               ])
        ]);
$juser = json_decode(file_get_contents("data/$numbers[$z].json"),true);
$coin = $juser["userfild"]["$numbers[$z]"]["coin"];
$coinplus = $coin + $textmassage;
$juser["userfild"]["$numbers[$z]"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$numbers[$z].json",$juser);	
}
}
}
elseif($update->message->text != true){ 
	SssBs('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"• يرجى استخدام ازرار البوت فقط ارسل /start لرؤيةه الازرار ، للاستفسار او لشراء النقاط عليك مراسلة المبرمج ؛ @$username ، 💌 !",
	  	]);
}
unlink("error_log");
?>