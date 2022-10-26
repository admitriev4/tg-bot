@include('template.header')
<div class="wrapper main-container">
<div class="serveys-container">
    <div class="servey-actions">
        <p class="title-big">Опросы</p>
        <a href="/servey/show/add/" class="btn">Создать опрос</a>

    </div>
    <div class="serveys-list">
        <div class="servey-item servey-item-top">
            <span>ID</span>
            <span>Активность</span>
            <span>Вопрос</span>
            <span>Картинка</span>
            <span>Начало активности</span>
            <span>Окончание активности</span>
            <span>Действия</span>
        </div>
        @foreach ($serveys as $servey)
            <div class="servey-item">
                <span>{{ $servey->id }}</span>
                <span>{{ $servey->active }}</span>
                <span>{{ $servey->question }}</span>
                <span>{{ $servey->picture }}</span>
                <span>{{ $servey->active_from }}</span>
                <span>{{ $servey->active_to }}</span>
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
