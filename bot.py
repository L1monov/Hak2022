import telebot
from telebot import types
import datetime
import db
import config
bot = telebot.TeleBot(config.TOKEN)

@bot.message_handler(commands=['start'])
def start(message):
    user_id = message.from_user.id
    markup = types.InlineKeyboardMarkup()
    login = types.InlineKeyboardButton(text='Вход', callback_data=f"{'login'}")
    markup.add(login)
    bot.send_message(message.chat.id, '👋Привет, я бот👋 \n🔍Давай пройдём аунтефикацию🔎\n❕❕', reply_markup=markup)




def login (message):
    try:
        if db.CheckLogin(message.text)=='Yes':
            id_tg = message.from_user.id
            if db.CheckEnterLogin(id_tg) == 'No':
                db.EnterLogin(id_tg,message.text)
            if db.CheckEnterLogin(id_tg) == 'Yes':
                db.EnterLogin2(id_tg, message.text)


            mesg = bot.send_message(message.chat.id, 'Введите пароль')
            bot.register_next_step_handler(mesg, password)
        if db.CheckLogin(message.text)=='No':
            mesg = bot.send_message(message.chat.id, 'Логинa не существует или ввели не правильно')
            bot.register_next_step_handler(mesg, login)
    except Exception as ex:
        print(1)
        print (ex)

def password(message):
    try:
        id_tg = message.from_user.id
        if db.check_password(id_tg, message.text) == 'Yes':
            id_tg = message.from_user.id
            if db.Check_Role(id_tg) == 'admin':
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                database = types.KeyboardButton('Все пользователи')
                news = types.KeyboardButton('Новости')
                offers = types.KeyboardButton('Обращение к Ректору')
                newnews = types.KeyboardButton('Добавить новость')
                markup.add(database, news, offers,newnews)
                bot.send_message(message.chat.id, 'Добро пожаловать в меню администратора', reply_markup=markup)
            if db.Check_Role(id_tg) == 'teacher':
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                new = types.KeyboardButton('Новости')
                markup.add(new)
                bot.send_message(message.chat.id, 'Добро пожаловать в меню преподователя', reply_markup=markup)
            if db.Check_Role(id_tg) == 'decanat':
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                new = types.KeyboardButton('Новости')
                markup.add(new)
                bot.send_message(message.chat.id, 'Добро пожаловать в меню деканата', reply_markup=markup)
            if db.Check_Role(id_tg) == 'student':
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                new = types.KeyboardButton('Новости')
                markup.add(new)
                bot.send_message(message.chat.id, 'Добро пожаловать в меню студента', reply_markup=markup)
            if db.Check_Role(id_tg) == 'rector':
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                new = types.KeyboardButton('Новости')
                markup.add(new)
                bot.send_message(message.chat.id, 'Добро пожаловать в меню ректора', reply_markup=markup)
            if db.Check_Role(id_tg) == 'profcom':
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                new = types.KeyboardButton('Новости')
                markup.add(new)
                bot.send_message(message.chat.id, 'Добро пожаловать в меню профкома', reply_markup=markup)
            if db.Check_Role(id_tg) == 'studsovet':
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                new = types.KeyboardButton('Новости')
                markup.add(new)
                bot.send_message(message.chat.id, 'Добро пожаловать в меню студсовета', reply_markup=markup)
        if db.check_password(id_tg,message.text) == 'No':
            mess = bot.send_message(message.chat.id,'Не верный пороль , введите ещё раз')
            bot.register_next_step_handler(mess,password)
    except Exception as ex:
        print(2)
        print(ex)

def newnew(message):
    try:
        for i in db.all_user_db():
            bot.send_message(i['id_tg'],f"!!!Новое событие!!!\n{message.text}")
        bot.send_message(message.chat.id, "Расслыка сделана")
        print(123)
    except Exception as ex:
        print(1)
        print (ex)


@bot.callback_query_handler(func=lambda callback: callback.data)
def check_callback(callback):
    if callback.data == "login":
        mesg = bot.send_message(callback.message.chat.id, 'Введите логин')
        bot.register_next_step_handler(mesg, login)

@bot.message_handler(content_types=['text'])
def func(message):
    ######## MENU #########
    if (message.text == "Меню"):
        id_tg = message.from_user.id
        id_tg = message.from_user.id
        if db.Check_Role(id_tg) == 'admin':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            database = types.KeyboardButton('Все пользователи')
            news = types.KeyboardButton('Новости')
            offers = types.KeyboardButton('Обращение к Ректору')
            newnews = types.KeyboardButton('Добавить новость')
            markup.add(database, news, offers, newnews)
            bot.send_message(message.chat.id, 'Добро пожаловать в меню администратора', reply_markup=markup)
        if db.Check_Role(id_tg) == 'teacher':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            new = types.KeyboardButton('Новости')
            markup.add(new)
            bot.send_message(message.chat.id, 'Добро пожаловать в меню преподователя', reply_markup=markup)
        if db.Check_Role(id_tg) == 'decanat':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            new = types.KeyboardButton('Новости')
            markup.add(new)
            bot.send_message(message.chat.id, 'Добро пожаловать в меню деканата', reply_markup=markup)
        if db.Check_Role(id_tg) == 'student':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            new = types.KeyboardButton('Новости')
            markup.add(new)
            bot.send_message(message.chat.id, 'Добро пожаловать в меню студента', reply_markup=markup)
        if db.Check_Role(id_tg) == 'rector':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            new = types.KeyboardButton('Новости')
            markup.add(new)
            bot.send_message(message.chat.id, 'Добро пожаловать в меню ректора', reply_markup=markup)
        if db.Check_Role(id_tg) == 'profcom':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            new = types.KeyboardButton('Новости')
            markup.add(new)
            bot.send_message(message.chat.id, 'Добро пожаловать в меню профкома', reply_markup=markup)
        if db.Check_Role(id_tg) == 'studsovet':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            new = types.KeyboardButton('Новости')
            markup.add(new)
            bot.send_message(message.chat.id, 'Добро пожаловать в меню студсовета', reply_markup=markup)
    ######## MENU #########
    ######## ОБЩЕЕ #########
    if (message.text == "Новости"):
        id_tg = message.from_user.id
        markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
        database = types.KeyboardButton('Новости профкома')
        news = types.KeyboardButton('Новости деканата')
        offers = types.KeyboardButton('Новости студ.совета')
        menu = types.KeyboardButton('Меню')
        markup.add(database, news, offers)
        markup.add(menu)
        bot.send_message(message.chat.id, 'Выберите организацию', reply_markup=markup)
    if (message.text == 'Новости профкома'):
        all_new = db.news('profcom')
        msg = ''
        a = 1
        for i in all_new:
            msg = msg + f"{a} : {i['about']}\nДата : {i['data']}\n"
        bot.send_message(message.chat.id, msg)
    if (message.text == 'Новости деканата'):
        all_new = db.news('decanat')
        msg = ''
        a = 1
        for i in all_new:
            msg = msg + f"{a} : {i['about']}\nДата : {i['data']}\n"
        bot.send_message(message.chat.id, msg)
    if (message.text == 'Новости студ.совета'):
        all_new = db.news('studsovet')
        msg = ''
        a = 1
        for i in all_new:
            msg = msg + f"{a} : {i['about']}\nДата : {i['data']}\n"
        bot.send_message(message.chat.id, msg)
    ######## ОБЩЕЕ #########

    ####### ADMIN BLOCK ######
    if (message.text == "Все пользователи"):
        id_tg = message.from_user.id
        if db.Check_Role(id_tg) == 'admin':
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            admins = types.KeyboardButton('Все Администраторы')
            teachers = types.KeyboardButton('Все преподователи')
            users = types.KeyboardButton('Все студенты')
            menu = types.KeyboardButton('Меню')
            markup.add(admins, teachers, users, menu)
            bot.send_message(message.chat.id, 'Выберите категорию', reply_markup=markup)
        else :
            bot.send_message(message.chat.id, 'У вас недостаточно прав (')
    if (message.text == "Все студенты"):
        id_tg = message.from_user.id
        if db.Check_Role(id_tg) == 'admin':
            all_user = db.all_user('student')
            a = 1
            msg = ''
            for i in all_user:
                msg =msg + f"{a}:{i}\n"
                a = a + 1
            bot.send_message(message.chat.id, msg)
        else :
            bot.send_message(message.chat.id, 'У вас недостаточно прав (')
    if (message.text == "Все преподователи"):
        id_tg = message.from_user.id
        if db.Check_Role(id_tg) == 'admin':
            all_user = db.all_user('teacher')
            a = 1
            msg = ''
            for i in all_user:
                msg =msg + f"{a}:{i}\n"
                a = a + 1
            bot.send_message(message.chat.id, msg)
        else :
            bot.send_message(message.chat.id, 'У вас недостаточно прав (')
    if (message.text == "Все Администраторы"):
        id_tg = message.from_user.id
        if db.Check_Role(id_tg) == 'admin':
            all_user = db.all_user('admin')
            a = 1
            msg = ''
            for i in all_user:
                msg =msg + f"{a}:{i}\n"
                a = a + 1
            bot.send_message(message.chat.id, msg)
        else :
            bot.send_message(message.chat.id, 'У вас недостаточно прав (')
    if (message.text == 'Добавить новость'):
        id_tg = message.from_user.id
        if db.Check_Role(id_tg) == 'admin':
            mesg = bot.send_message(message.chat.id, 'Введите описание мероприятия , дату и время')
            bot.register_next_step_handler(mesg, newnew)
            print(321)

        else:
            bot.send_message(message.chat.id, 'У вас недостаточно прав (')


    ####### ADMIN BLOCK ######

    if (message.text == "Обращение к Ректору"):
        id_tg = message.from_user.id
        if db.Check_Role(id_tg) == 'admin' or 'rector':
            msg = ''
            a = 1
            for i in db.all_offers():
                msg = msg + f"{a}: {i['login']}\nОбращение: {i['offer']}\n"
                a = a + 1
            bot.send_message(message.chat.id, msg)
        else :
            bot.send_message(message.chat.id, 'У вас недостаточно прав (')

    ####### ADMIN BLOCK ######

if __name__ == '__main__':
    print('bot rolling')
    bot.polling(none_stop=True)