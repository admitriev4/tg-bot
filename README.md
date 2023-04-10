<h1>Телеграм бот</h1>
<h2>Запуск приложения</h2>
<p>Для запуска приложения нужно запустить следующие команды: </p>
<p>для того что бы запустить сборку docker-compose</p>
<code>docker-compose up -d --build</code><br>
<p>Накатываем миграции</p>
<code>php artisan migrate</code>
<p>Для работы приложения нужен localtunnel. Команда для глобальной установки localtunnel </p>
<code>npm install -g localtunnel</code><br>
<p>Для того что бы использовать localtunnel выполните команду. Команда вернет ссылку на приложение</p>
<code>lt --port 8000</code>

<p> после этого нужно авторизоваться и в разделе "Опросы" нажать на кнопку "Установить WebHook". Если ответ true, то все ок можем использовать бота.</p>
<p>Ссылка на бота</p>
<code> https://t.me/thecoders_bot</code>
<p>Ну и для начала работы в нем пишем</p>
<code>/start</code>


