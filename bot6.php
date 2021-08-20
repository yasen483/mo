<?php

ob_start();
$API_KEY = 'TO'; # 
//////////////////////
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
lvar_dump(curl_error($ch));
}else{return json_decode($res);}}
$msgs = json_decode(file_get_contents('msgs.json'),true);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$fn = $message->from->first_name;
$user = $message->from->username;
$st = str_replace("@","", $chj);
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
$sudo = "$ad";
$chj = "@$chs";
$st = "$chs";
$buyy = "@$by";
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
 'text'=>"    $name !
             /start  
    @$chs  ",
]);return false;}
if($message){
$u = file_get_contents('users.txt');
$ex = explode("\n",$user);
if(!in_array($from_id,$ex)){
file_put_contents("users.txt",$from_id."\n",FILE_APPEND);}}
if($text == "/start"){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"-    $fn
-       ",
'reply_to_message_id'=>$msid,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => " TV ", 'url' => "t.me/$st"]],
[['text'=>"-   ~ #",'url'=>"t.me/$by"]],]])
]);
}
$bio = array("


             S R A 17 Y.O    
     $text ","





                  I R A Q 19 Y.O     
         $text . 


",

"   


 
 - GE : 17 Y.O
$text .   
   

",

"







$text .   
- Unfollow Block   




",

"







$text 
 GE19 
 



",

"



$text   
     ollow Òe , ollow ëac

 ",

"







- $text . 
- || 19 Y.O 
 



",

"





             S R A 17 Y.O     
. $text


",

"






 IRQ     
 $text . 




",

"






      $text . 
   BASRA - iQ 




",

"







   $text 
 GE19 
 



",

"



    
ÿÿÿÿÿÿÿÿÿÿÿÿÿÿ 

ÿÿÿÿÿÿÿÿÿÿ    BAGHDAD 
$text! 



",

"





                        
BGHDD   
$text .




",

"





IRQ19 Y.O     

    $text .



",

"





                  Baghdad 15 Y.O     
   $text .


",

"

 



    
 $text  ¯
      - Bagdad 19Y.O 


 
 ",

"



           IRQ       

$text .
    


",

"




 
 AGE9  )

 $text .




",

"



 |  
   $text  
 | OFFICIAL ACCOANT



",

" 
ÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿ  

ÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿÿ     
ÿÿÿÿÿÿÿ $text   
ÿÿÿÿÿÿÿwelcome to my profile 
 

",

"


 $text 
     ollow Òe , ollow ëac



",

"



 |  
 $text 
 | OFFICIAL ACCOANT



",

"
 
  


          
$text
 †Ò åÒçÞf†



  
",

"


  
S3RAY || 21 Y.O 
$text
  

  
",

"




                        
  $text    
 m TO  Þ




",

"

     
 $text  ..
    


",

"


   
     |  |
      $text  
   From : IRQ 
",

"



 .
O 
$text  
  õcÒ å Òû ëÞ 



",

"



    


   $text 
 m TO  Þ




",

"



$text 
     ollow Òe , ollow ëac



  

           ",

"  
  

 
     
($text  !)
              
  
  
  
  ",

"




 Y.O:19   
$text 



",
"



           IRQ       

 $text 
    


",

"



 17
 IQ    
 $text 



",

"




 Y.O:19   
     
$text 



",
"



  IRQ     

 $text  
   õcÒ å Òû ëÞ 
       



",

"






$text .
  



",

"   


 
         - GE : 17 Y.O

$text


   
",

"



        Y.O:18    

 $text 


",);
$bior = array_rand($bio, 1);
if($text && $text !=="/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$bio[$bior]",
'reply_to_message_id'=>$msid,]);}

if($text == "users" && in_array($from_id, $sudo)){
$u = file_get_contents('users.txt');
$ex = explode("\n",$u);
$co = count($ex) -1;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"-    $co",
'reply_to_message_id'=>$msid,]);}
$st2 = str_replace("/send ","$st2", $text);
if($text == "/send $st2" && in_array($from_id,$sudo)){
$u = file_get_contents("users.txt");
$ex = explode("\n", $idchi);
for($c=0;$c<count($ex); $c++){
$bot_url = "https://api.telegram.org/bot$API_KEY/";
$url = $bot_url."sendMessage?chat_id=".$idchl[$c]."&parse_mode=markdown&disable_web_page_preview=true&text=".urlencode($st2);
$sa = file_get_contents($url); }
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"-   ",
'reply_to_message_id'=>$msid,]);}