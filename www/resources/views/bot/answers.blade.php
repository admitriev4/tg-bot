@include('template.header')
<div class="wrapper main-container">
<div class="serveys-container">
    <p class="title-big center">Ответы</p>
    <table class="serveys-list">
        <tr class="servey-item servey-item-top">
            <td>ID</td>
            <td>ID опроса</td>
            <td>Вопрос</td>
            <td>Имя пользователя</td>
            <td>ID чата Telegram</td>
            <td>Затраченное время</td>
            <td>Дата ответов</td>
            <td>Действия</td>
        </tr>
        @foreach ($answers as $answer)
        <tr class="servey-item">
           <td>{{ $answer->id }}</td>
           <td>{{ $answer->servey }}</td>
           <td>{{ $answer->answer }}</td>
           <td>{{ $answer->name_user_tg }}</td>
           <td>{{ $answer->chat_id }}</td>
           <td>{{ $answer->passage_time }}</td>
           <td>{{ $answer->date_answer }}</td>
           <td>
               <a href="/servey/show/{{ $answer->servey }}" class="btn">Просмотр опроса</a>
               <a href="/answer/show/delete/{{ $answer->id }}" class="btn">Удалить ответ</a>
           </td>
        </tr>
        @endforeach
    </table>
</div>



</div>

@include('template.footer')
