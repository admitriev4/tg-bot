@include('template.header')
<div class="wrapper main-container">
    <div class="send-message">
        <p class="title-big">Удалить опрос {{$id}}</p>
        <form action="/servey/delete/{{$id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="id" type="hidden" placeholder="id" maxlength="50" value="{{$id}}">
            <input type="submit" value="Удалить" class="btn">
        </form>
    </div>
</div>

@include('template.footer')
