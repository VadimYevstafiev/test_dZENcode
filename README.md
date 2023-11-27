Тестовое задание dZENcode/
Выполнена back-end часть:
1. Есть главная страница ('Notes'), на которую выводятся сообщения.
    Сообщения разбиваются на страницы по 25 сообщений.
    На каждую запись можно записать сколько угодно записей (кнопка 'Add comment' на записях).
    Можно записать новую запись (кнопка 'Send comment' на записях).
2. Заглавные Комментарии (те, которые не являются ответом) выводятся в виде таблицы, с возможностью сортировки по следующим полям: 
    User Name, Email, и Created_at (дата добавления), как в порядке убывания, так и в обратном.
3.  Есть проверка сообщений на наличие HTML-тегов (кроме разрешенных <a href=”” title=””> </a> <code> </code> <i> </i> <strong> </strong>)
    и на наличие незакрытых тегов.
4. Сообщения записываются через форму с полями, оговоренными в задании.

Для того, чтобы развернуть проект, необходимо:
1. Открыть терминал, в корневой папке проекта.
2. Скопировать файл .env.example и переименовать в .env 
    Проследить чтобы в имени .env не было начальных или конечных пробелов.
3. Установить composer (если он не установлен) по руководству https://getcomposer.org/download/.
4. Установить в корневую папку laravel sail (https://laravel.com/docs/10.x/sail#main-content). В терминале ввести команды:
    composer require laravel/sail --dev
    php artisan sail:install

    При запросе "Which services would you like to install?" выбрать mysql

5. В терминале ввести команды:

    ./vendor/bin/sail artisan key:generate
    ./vendor/bin/sail artisan storage:link
    ./vendor/bin/sail up -d --build
    ./vendor/bin/sail artisan migrate --seed
    ./vendor/bin/sail npm run dev (рекомендуется в другой вкладке)
6. В браузере открыть http://localhost/.
7. Зарегистрироваться ('Register') или залогиниться (email 'test@test.com', пароль 'test1234').
