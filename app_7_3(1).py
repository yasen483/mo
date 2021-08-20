import requests
import telebot
from user_agent import generate_user_agent
from time import sleep

token = input('[~] Enter Token :')
bot = telebot.TeleBot(token)
@bot.message_handler(commands=['start'])
def start(message):
    first = message.from_user.first_name
    bot.send_message(message.chat.id, text=f"*Hi {first},ارسل كلمه او حرف عربي فقط  .\nBy @ttrakos ~ @trprogram*",parse_mode="markdown")
@bot.message_handler(func=lambda m:True)
def Get(message):
    try:
        msg = message.text
        bot.send_message(message.chat.id, text="Wait")
        url = f'https://tzzzzava.ga/dotless/dot.php?ar={msg}'
        sd = requests.get(url)
        res = sd.json()
        userid = res['ok']['ar1']
        bot.send_message(message.chat.id,text=f'True ☑️:\n{userid}\n\nBy @trprogram | @ttrakos')
    except:
        pass
bot.polling(True)
