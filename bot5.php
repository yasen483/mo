
<?php

define('API_KEY', 'TO');

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
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
} 
 function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
}
function sendsticker($chat_id,$sticker_id,$caption){
    bot('sendsticker',[
        'chat_id'=>$ChatId,
        'sticker'=>$sticker_id,
        'caption'=>$caption
    ]);
 } 
//-//////
$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;

$chat_id2 = $update->callback_query->message->chat->id;
$user_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username;

$user_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username;
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
    file_put_contents("jj.txt", $chat_id."\n",FILE_APPEND);
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
//گتابات ماثيو┇(مٰٰྀ̲حمد قيـٰཻـس)𖤍
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
file_put_contents('m.txt', '');
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
    file_put_contents("m.txt","yas");
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
#------گتاباتي #ماثيو ------#
if($text and $modxe == "yas" and $chat_id == $admin ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("m.txt","no");

} 
}

if($text == "/start"){
bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"☠• مرحبا بك في بوت لعبة الحوت الازرق",
                'parse_mode'=>$mode,
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"• دخول📮،",'callback_data'=>"a"],['text'=>"• قرائة الشروط📑،",'callback_data'=>"b"]
              ]
              [['text'=>"- لشراء البوت ~ #",'url'=>"t.me/$by"]],
              ]
        ])
            ]);
        }
if($data == "b"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
• عزيري $name
- هذا البوت لايمثل اي تهديد🧐
- هذه اللعبه للمزحه فقط لااكثر😁
- العبها الان وبكل امان💯
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
DEV:- $s",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'• رجوع↪️،،','callback_data'=>'r']]    
]    
])
]);
}
//By MaTThew
if($data == "r"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
 'text' =>"☠• مرحبا بك في بوت لعبة الحوت الازرق",
                'parse_mode'=>$mode,
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"• دخول📮،",'callback_data'=>"a"],['text'=>"• قرائة الشروط📑،",'callback_data'=>"b"]
              ]
              ]
        ])
            ]);
        }
if($text == '/start'){
    
bot('sendVoice',[
'chat_id'=>$chat_id,
'voice'=>'https://t.me/rrirrrr/7',
'caption'=>'شغل الموسيقى والعب'
]);
}   
        if($data == "a"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'المس انفگ بأستخدام الابهام الايمن',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'c']]    
]    
])
]);
}
if($data == "c"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- صفق بيدگ مرتين وقول انا قوي',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'d']]    
]    
])
]);
}
if($data == "d"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- ارفع ساقك اليسرى عن طريق يدك اليسرى واقفز 3 مرات بساقك اليمنى',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'e']]    
]    
])
]);
}
if($data == "e"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- تذگر لاتؤذي نفسگ ولاتضر بأشخاص اخرين',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'f']]    
]    
])
]);
}
if($data == "f"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- ارفع يدگ مع بعد الى الاعلى  وشغل الموسيقى المفضله لديگ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'g']]    
]    
])
]);
}
if($data == "g"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- اسئل صديقك ماهوه طعامگ المفضل',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'i']]    
]    
])
]);
}
if($data == "i"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- تذكر لاتكون وقحا للاشخاص الذين يعانون من لون البشرة المختلفه انها العنصرية وبطريقة سيئه للغاية',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'j']]    
]    
])
]);
}
if($data == "j"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اسئل احد من عائلتگ هل يحتاج الي مساعدة',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'k']]    
]    
])
]);
}
if($data == "k"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'انهض على الساعة 6:00',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'l']]    
]    
])
]);
}
if($data == "l"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اذهب تمشي 1 ميل',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'n']]    
]    
])
]);
}
if($data == "n"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'شاهد فلم كوميدي',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'o']]    
]    
])
]);
}
if($data == "o"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'عندما تستيقظ لاتتحرك من السرسر لمدة 5 دقائق',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'p']]    
]    
])
]);
}
if($data == "p"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'ضع يدك علي رأسك وانزل 30 مراة',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'q']]    
]    
])
]);
}
if($data == "q"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'#تذكير
تشويه الذات سيئة عند الحاق الضرر لنفسك قد تلحق الضرر للاخرين',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'s']]    
]    
])
]);
}
if($data == "s"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'افتح حبة بصل بدون ان تبگي',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'u']]    
]    
])
]);
}
if($data == "u"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'تناول جوز',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'v']]    
]    
])
]);
}
if($data == "v"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اذهب على دراجه واذا لم تملك دراجه اذهب على شيء ٱڅڑ ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'w']]    
]    
])
]);
}
//#-----كتاباتي ماثيو-----# 
if($data == "w"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'#تذگير
العنف ليس ابدا هوه الاجابه',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'y']]    
]    
])
]);
}
if($data == "y"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اكتب منشور في الفيسبوك تقول فِيَھ ه̷̷َـَْـُذآ يوم جديد',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'z']]    
]    
])
]);
}
if($data == "z"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'رسم بالطباشير الملون على قطعه گبيرة من الورق',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'1']]    
]    
])
]);
}
if($data == "1"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- ارسم مياه🌊،وشمس☀️وجزيرة🏝',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'2']]    
]    
])
]);
}
if($data == "2"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- قم باعطاء الرسم لشخص قريب من عائلتك وقول ڵـهٍ تقومون بتطبيق الحوت الازرق🐬',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'3']]    
]    
])
]);
}
if($data == "3"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- الًيَوُمًِ لايعني شيء اسوء',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'4']]    
]    
])
]);
}
if($data == "4"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- جرب مص الليمون دون ان تسحب وجهك',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'5']]    
]    
])
]);
}
if($data == "5"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- قل لـ 15 شخص ان الًيَوُمًِ جميل قبل الـ14:00 مساء',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'6']]    
]    
])
]);
}
if($data == "6"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- الًيَوُمًِ استراحه لايوجد تحدي',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'7']]    
]    
])
]);
}
if($data == "7"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- افعل شيء جيد!',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'8']]    
]    
])
]);
}
if($data == "8"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'#تذكير
مساعدة ٱڅڑ دون فائدة ه̷̷َـَْـُذآ امر جيد',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'9']]    
]    
])
]);
}
if($data == "9"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'ارسل لـ3 اشخاص للعب تحدي الحوت الازرق ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'10']] ,
[['text'=>'• ارسال🐬','switch_inline_query'=>'']]
]    
])
]);
}
if($data == "10"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=> '- اسئل والديگ اذا كان هناك قمامة لكي ترميها',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'11']]    
]    
])
]);
}
if($data == "11"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- توازن وقف على قدم واحده لمدة 20 ثانيه',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'12']]    
]    
])
]);
}
if($data == "12"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- خذ طعام من الثلاجه وقل لعائلتك انا قوي',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'13']]    
]    
])
]);
}
if($data == "13"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- اشرب عصير البرتقال',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'14']]    
]    
])
]);
}
if($data == "14"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- حذاري لاتخبر اي احد كيف تبدو',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'15']]    
]    
])
]);
}
if($data == "15"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- ضع قطعتين من الخبز في فمك وقل انا ارنب',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'16']]    
]    
])
]);
}
if($data == "16"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- اغسل اسنانك لمدة 5 دقائق',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'17']]    
]    
])
]);
}
if($data == "17"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- استحم مرتين!!',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'18']]    
]    
])
]);
}
if($data == "18"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- ارتداء التقاشير في المنزل كل يوم ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'19']]    
]    
])
]);
}
if($data == "19"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- تناول ملعقة كبيرة من السلطه التي تحبها',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'20']]    
]    
])
]);
}
if($data == "20"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- شاهد رسوم الكارتون',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'21']]    
]    
])
]);
}
if($data == "21"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'استيقظ الساعه الــ8:00 صباحا',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'22']]    
]    
])
]);
}
if($data == "22"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- اكل الحبوب مع الحليب في الافطار',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'23']]    
]    
])
]);
}
if($data == "23"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- استمع الى الموسيقه المفضله لديك لمدة سَـآعــهْْ ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'24']]    
]    
])
]);
}
if($data == "24"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- جعل عمامه من المنشفه وارتداء حجاب لمدة 30 دقيقه',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'25']]    
]    
])
]);
}
if($data == "25"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'لاتخبر شيئا لوالديك',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'26']]    
]    
])
]);
}
if($data == "26"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'- هل انته مستعد لگي تصبح حوت ازرق🐬',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'نعم','callback_data'=>'27']]    
]    
])
]);
}
if($data == "27"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'• قم برسم حوت ازرق على يدگ
• استخدم اله حادة في الرسم
• بعدها قم بقتل نفسگ بأستخدام احد الطرق
- عن طريق اله حادة🔪
- عن طريق القفز من مبنى عالي🏯
- عن طريق خنق نفسگ🌚
#للمزحه_فقط',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع','callback_data'=>'r']]    
]    
])
]);
}
$sudo = $admin; ///ID FOR SUDO
$t =$message->chat->title; 
$user = $message->from->username; 
if($text == "/start") {
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
 ",
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$sudo,
'text'=>"
  ✪- اهلا عزيــزي المطــور دخــل شخص جديد الى البــوت الخاص بــك💡 

ℓ🔱- بيانات الشخــص هي ⬇️;

ℓ🔘- أسم الشخــص :- $name 

ℓ🔘- معــرف الشخــص :- @$username
ֆ ──────── ֆ",
]);
}
#كتاباتي ماثيوو#