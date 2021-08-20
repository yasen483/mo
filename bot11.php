<?php
ob_start();
$API_KEY = 'TO'; 
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
$text = $message->text;
$chat_id = $message->chat->id;
$name = $message->from->first_name;
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
$admins = "$ad";
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
if($text == '/start'){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>" ⚜-اهلابك عزيزي: $name

في بوت عبـارات جداريـه ^_^➿😻

•خطوات التشغيل: ⚠✅
← اخــتر النوع المفضل لك|√
← اكـتب رقم العبارات |√
← ثـم دز رقـم العباره الئ البوت |√
← وسـيتم تحميلها بسرعا عاليه |√

← قناة تخصصة بمجال بوتات فقط: @$chs →",
   'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'العبارات']],
	  [['text'=>"مساعدة"],['text'=>"تابعنا"]],
	  [['text'=>'- لشراء البوت ~ #']],      ],'resize_keyboard'=>true])
	]);
}
if ($text == "/admin" and $chat_id == $admin ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"
☑️￤اهلا عزيزي :- `المطور` .
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
☑️￤اهلا عزيزي :- `المطور` .
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
elseif($text== "- لشراء البوت ~ #" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"• اهلا بك يا ؛ $name !
• لشراء البوت راسلني ؛ $buyy ، 🔱",
]);
}

elseif ($text == "العبارات"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"1- كلناي حزين ونحيل ومبتلئ بل ثقوب
2- افترقنا وانقطع حته السلام
3- لو اننا لم نفترق
4- لا تنسئ هاذه ليوم 
5- وانا هل انسئ
6- لا اريد احد فقط اتركوني وحدي
7- ابتسم اربك سعاده العالم
8- ليش احبك وبرشلونه موجوده
9- التدخين يقتل لكن ولدنا لنموت
10- لتخافين واني وياج ....
11 -لو بس تحبو هل بلد ....
12- بعدد الرصاصات التي ....
13- حرام تعيش وتموت ....
14- سنرجع يوما
15-سواد لبن ثالثنا يحلوه
16- انته حته بعين امك قرد
17- عيونك مجره 
18- ارقص وام لم تزل ....
19- يم العيون السود
20- هاذه الطريق اخرتو لحن حزين
21- من سيؤذيني والله معي
22- اختلفنا من يحب الثاني اكثر
23- كذبك حلو 
24- صارحها ولا تخاف/
25- اهم شي ماما تحبني
26- اما بعد طال البعد
27- انا وحدي دوله
28- هل تعيش حلمك
29- وما الحب اله ان ...
30- وقفو الحروب حبو بعض
31- نحن التاريخ نحن المستقبل
32- يامواطن يامسكين ضحكو عليك باسم الدين
33- لاتحاول بان لاتحاول
34-تعبانين وعدنا هموم
35-احب نفسك اولا
36- الوطن الاغنياء
37- المجد لمن قال لا لا
38- من يملا فراغ المطايه 😂
39- ان لم تستطع اسعاد نفسك
40- لم يكذب ع احد مثلما
41- ثم قال الخبره لا تبكي وبكئ
42- الشعب لن يسكت
43- قتل الزهور لن ياخر الربيع
44- لم يعتنو بي كما فعلت
45- كل ماعليك فعله هوه ان تبتسمي
46- انا لا اشعر بشيء
47- تشبهين اليله التي
اكـتب رقم العباره اله البوت وسيـتم تحميل صورتها|√",
	'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>'جديدنا 🔱،',"url'=>'t.me/$chs"]]
   ]
   ])
	]);
}
if ($text !== "/start"){
    bot('sendmessage',[
        'chat_id'=>$admins,
        'text'=>$text
        ]);
}
if ($text =="مساعدة"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"قـم بضغط ع زر العـبارات واخـتر رقم العباره المميزه وقم بكتابه رقمهـا في البوت لكي يقوم بتحميلها ",
'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>'تابعنا 🔱،','url'=>"t.me/$chs"]],
   ]
   ])
   ]);
   }
if ($text == "تابعنا"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" اهـلا صقيقي يرجا متـابعه قناه البـوت ودعمها لكي نقوم بعمـل الافضل ❤️🥀🚶‍♂ ",
'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>'تابعنا 🔱،','url'=>"t.me/$chs"]],
   
   ]
   ])
   ]);
   }

if($text == '1' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/5",
]);
}
if($text == '2' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/6",
]);
}
if($text == '3' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/7",
]);
}
if($text == '4' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/8",
]);
}
if($text == '5' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/9",
]);
}
if($text == '6' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/10",
]);
}
if($text == '7' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/11",
]);
}
if($text == '8' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/12",
]);
}
if($text == '9' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/13",
]);
}
if($text == '10' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/14",
]);
}
if($text == '11' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/15",
]);
}
if($text == '12' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/16",
]);
}
if($text == '13' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/17",
]);
}
if($text == '14' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/18",
]);
}
if($text == '15' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/19",
]);
}
if($text == '16' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/20",
]);
}
if($text == '17' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/21",
]);
}
if($text == '18' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/22",
]);
}
if($text == '19' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/23",
]);
}
if($text == '20' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/24",
]);
}
if($text == '21' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/25",
]);
}
if($text == '22' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/26",
]);
}
if($text == '23' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/27",
]);
}
if($text == '24' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/28",
]);
}
if($text == '25' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/29",
]);
}
if($text == '26' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/30",
]);
}
if($text == '27' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/31",
]);
}
if($text == '28' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/32",
]);
}
if($text == '29' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/33",
]);
}
if($text == '30' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/34",
]);
}

if($text == '31' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/35",
]);
}
if($text == '32' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/36",
]);
}
if($text == '33' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/37",
]);
}
if($text == '34' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/38",
]);
}
if($text == '35' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/39",
]);
}
if($text == '36' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/40",
]);
}
if($text == '37' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/41",
]);
}
if($text == '38' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/42",
]);
}
if($text == '39' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/43",
]);
}
if($text == '4)' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/44",
]);
}

if($text == '41' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/45",
]);
}
if($text == '42' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/46",
]);
}
if($text == '43' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/47",
]);
}
if($text == '44' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/48",
]);
}
if($text == '45' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/49",
]);
}
if($text == '46' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/50",
]);
}
if($text == '47' or $text == 'a'){
bot('sendphoto ',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/kvfyxnh/51",
]);
}