import  pymysql
from config import host , user , password , db_name
import datetime
import datetime



def CheckUser(user_id):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password=password,
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `id_tg` FROM `user`"
                cursor.execute(query)
                rows = cursor.fetchall()
            all_user = []
            for i in rows:
                all_user.append(i['user_id'])
            if str(user_id) in all_user:
                return 'Yes'
            else:
                return 'No'
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def CheckLogin(login):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password=password,
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `login` FROM `safety`"
                cursor.execute(query)
                rows = cursor.fetchall()
            all_login = []
            for i in rows:
                all_login.append(i['login'])
            if str(login) in all_login:
                return 'Yes'
            else:
                return 'No'
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def CheckEnterLogin(id_tg):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `login` FROM `telegramm` WHERE `id_tg` = '{id_tg}'"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                if len(rows) == 0:
                    return 'No'
                else:
                    return 'Yes'
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def EnterLogin(id_tg,login):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"INSERT INTO `telegramm` (`id_tg` , `login`, `password`) VALUES ('{id_tg}', '{login}', 'Wait')"
                cursor.execute(query)
                connection.commit()
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def EnterLogin2(id_tg,login):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"UPDATE `telegramm` SET `login` = '{login}' WHERE `id_tg` = '{id_tg}'"
                cursor.execute(query)
                connection.commit()
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def New_Login(login,password, role):
    now = datetime.datetime.now()
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"INSERT INTO `safety` (`login` , `password`, `role`) VALUES ('{login}', '{password}', '{role}')"
                cursor.execute(query)
                connection.commit()
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")
New_Login('magistr','2281337', 'admin')
New_Login('yoda','882300', 'admin')
New_Login('dark','007009', 'admin')
New_Login('minifit','990882', 'admin')
New_Login('unga','557113', 'admin')
def Check_Role(id_tg):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password=password,
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `login` FROM `telegramm` WHERE `id_tg` = '{id_tg}'"
                cursor.execute(query)
                rows = cursor.fetchall()
                login = rows[0]['login']

                query = f"SELECT  `role` FROM `safety` WHERE `login` = '{login}'"
                cursor.execute(query)
                rows = cursor.fetchall()
                return rows[0]['role']

        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def check_password(id_tg,password_user):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `login` FROM `telegramm` WHERE `id_tg` = '{id_tg}'"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                login = rows[0]['login']
                query = f"SELECT  `password` FROM `safety` WHERE `login` = '{login}'"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                password = rows[0]['password']
                if password_user == password:
                    return 'Yes'
                else :
                    return 'No'
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def all_user_db():
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `id_tg` FROM `telegramm`"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                return rows
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")
print(all_user_db())


def all_user(role):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `login` FROM `safety` WHERE `role` = '{role}'"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                all_list =[]
                for i in range(len(rows)):
                    all_list.append(rows[i]['login'])
                return all_list
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def NewNews(org, about):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password=password,
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"INSERT INTO `news` (`org` , `about`, `data`) VALUES ('{org}', '{about}', 'None')"
                cursor.execute(query)
                connection.commit()
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def news(org):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password='root',
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  * FROM `news` WHERE `org` = '{org}'"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                print(rows)
                return rows
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def NewOffer(id_tg, offer):
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password=password,
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT  `login` FROM `telegramm` WHERE `id_tg` = '{id_tg}'"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                login = rows[0]['login']
                query = f"INSERT INTO `offers` (`login` , `data`, `offer`) VALUES ('{login}', '{datetime.datetime.now()}', '{offer}')"
                cursor.execute(query)
                connection.commit()
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")

def all_offers():
    try:
        connection = pymysql.connect(
            host=host,
            port=3306,
            user=user,
            password=password,
            database=db_name,
            cursorclass=pymysql.cursors.DictCursor)
        try:
            with connection.cursor() as cursor:
                query = f"SELECT * FROM `offers`"
                cursor.execute(query)
                connection.commit()
                rows = cursor.fetchall()
                return rows
        finally:
            connection.close()
    except Exception as ex:
        print(f"Ошибка {ex}")
