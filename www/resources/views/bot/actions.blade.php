@include('template.header')
<div class="wrapper main-container actions-container">
<div class="send-message">
    <p class="title-big">Написать сообщение</p>
    <form action="/sendMessageBot" method="post">
        {{ csrf_field() }}
        <input name="chat_id" type="text" placeholder="ID чата" class="input">
        <textarea name="message" class="input"></textarea>
        <input type="submit" value="Отправить" class="btn">
    </form>
</div>
<div class="serveys-container">
    <div class="servey-actions">
        <p class="title-big">Опросы</p>
        <a href="/servey/show/add/" class="btn">Создать опрос</a>

    </div>
    <div class="serveys-list">
        <div class="servey-item-top">
            <span>ID</span>
            <span>Вопрос</span>
            <span>Картинка</span>
            <span>Кнопки</span>
            <span>Активность</span>
            <span>Действия</span>
        </div>
        @foreach ($serveys as $servey)
            <div class="servey-item">
                <span>{{ $servey->id }}</span>
                <span>{{ $servey->question }}</span>
                <span>{{ $servey->picture }}</span>
                <span>{{ $servey->buttons }}</span>
                <span>{{ $servey->active }}</span>
                <span>
                    <a href="/servey/show/update/{{ $servey->id }}" class="btn">Изменить опрос</a>
                    <a href="/servey/show/delete/{{ $servey->id }}" class="btn">Удалить опрос</a>
                    <a href="/servey/show/answer/{{ $servey->id }}" class="btn">Посмотреть ответы</a>
                </span>
            </div>
        @endforeach
    </div>
</div>



</div>

@include('template.footer')
