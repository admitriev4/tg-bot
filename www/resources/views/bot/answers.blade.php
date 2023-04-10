@include('template.header')
<div class="wrapper main-container">
<div class="serveys-container">
    <p class="title-big center">Ответы</p>
    <div class="servey-actions">
        <p>Фильтр</p>
    </div>
    <table class="serveys-list">
        <tr class="servey-item servey-item-top">
            <td>ID</td>
            <td>ID опроса</td>
            <td>Имя пользователя</td>
            <td>Telegram ID</td>
            <td>Затраченное время</td>
            <td>Дата ответов</td>
            <td>Действия</td>
        </tr>
        {{--@foreach ($serveys as $servey)--}}
        <tr class="servey-item">
           <td>1111111111111{{--{{ $servey->id }}--}}</td>
           <td>1111111111111{{--{{ $servey->active }}--}}</td>
           <td>111111111111ё{{--{{ $servey->question }}--}}</td>
           <td>1111111111111111{{--{{ $servey->picture }}--}}</td>
           <td>1111111111111{{--{{ $servey->active_from }}--}}</td>
           <td>1111111111111111{{--{{ $servey->active_to }}--}}</td>
           <td>
               <a href="/servey/show/{{--{{ $answer->id }}--}}" class="btn">Просмотр опрос</a>
               <a href="/servey/show/delete/{{--{{ $answer->id }}--}}" class="btn">Удалить опрос</a>
           </td>
        </tr>
        {{--@endforeach--}}
    </table>
    <p>Пагинация</p>
</div>



</div>

@include('template.footer')
