@include('template.header')
<div class="wrapper main-container">
    <div class="send-message">
        <p class="title-big">Создать опрос</p>
        <form action="/public/servey/add" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="question" type="text" placeholder="Вопрос" maxlength="50">
            <input name="picture" type="file" placeholder="Файл">
            <input name="time_active" type="text" placeholder="Дата активности" maxlength="50">
            <span><input name="active" type="checkbox" id="active" placeholder="Активность" ><label for="active">Активность</label></span>
            <input type="submit" value="Отправить" class="btn">
        </form>
    </div>
</div>

@include('template.footer')
