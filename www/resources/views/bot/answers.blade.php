@include('template.header')
<div class="wrapper main-container">
<div class="serveys-container">
    <div class="servey-actions">
        <p class="title-big">Ответы</p>
        <p>Фильтр</p>
    </div>
    <div class="serveys-list">
        <div class="servey-item servey-item-top">
            <span>ID</span>
            <span>ID опроса</span>
            <span>Имя пользователя</span>
            <span>Telegram ID</span>
            <span>Затраченное время</span>
            <span>Дата ответов</span>
            <span>Действия</span>
        </div>
        {{--@foreach ($serveys as $servey)--}}
            <div class="servey-item">
                <span>{{--{{ $servey->id }}--}}</span>
                <span>{{--{{ $servey->active }}--}}</span>
                <span>{{--{{ $servey->question }}--}}</span>
                <span>{{--{{ $servey->picture }}--}}</span>
                <span>{{--{{ $servey->active_from }}--}}</span>
                <span>{{--{{ $servey->active_to }}--}}</span>
                <span>
                    <a href="/servey/show/{{--{{ $answer->id }}--}}" class="btn">Просмотр опрос</a>
                    <a href="/servey/show/delete/{{--{{ $answer->id }}--}}" class="btn">Удалить опрос</a>
                </span>
            </div>
        {{--@endforeach--}}
    </div>
    <p>Пагинация</p>
</div>



</div>

@include('template.footer')
