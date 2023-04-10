@include('template.header')
<div class="wrapper main-container">
<div class="serveys-container">
    <p class="title-big center">Опросы</p>
    <div class="servey-actions">
        <a href="/setwebhook" class="btn">Установить WebHook</a>
        <a href="/servey/show/add/" class="btn">Создать опрос</a>

    </div>
    <table class="serveys-list">
        <tr class="servey-item servey-item-top">
            <td>ID</td>
            <td>Активность</td>
            <td>Вопрос</td>
            <td>Картинка</td>
            <td>Начало активности</td>
            <td>Окончание активности</td>
            <td>Действия</td>
        </tr>
        @foreach ($serveys as $servey)
            <tr class="servey-item">
                <td>{{ $servey->id }}</td>
                <td>{{ $servey->active }}</td>
                <td>{{ $servey->question }}</td>
                <td>{{ $servey->picture }}</td>
                <td>{{ $servey->active_from }}</td>
                <td>{{ $servey->active_to }}</td>
                <td>
                    <a href="/servey/show/update/{{ $servey->id }}" class="btn">Изменить опрос</a>
                    <a href="/servey/show/delete/{{ $servey->id }}" class="btn">Удалить опрос</a>
                    <a href="/servey/show/answer/{{ $servey->id }}" class="btn">Посмотреть ответы</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>



</div>

@include('template.footer')
