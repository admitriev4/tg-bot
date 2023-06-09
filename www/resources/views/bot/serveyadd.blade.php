@include('template.header')
<div class="wrapper main-container">
    <div class="send-message">
        <p class="title-big">Создать опрос</p>
        <form action="/public/servey/add" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <span><input name="active" type="checkbox" id="active" placeholder="Активность" ><label for="active">Активность</label></span>
            <span>Вопрос </span><input name="question" type="text"  maxlength="50">
            <span>Картинка </span><input name="picture" type="file" placeholder="Файл">
            <span>Начало активности </span><input name="active_from" type="date">
            <span>Окончание активности </span><input name="active_to" type="date">
            <input type="submit" value="Отправить" class="btn">
        </form>
    </div>
</div>

@include('template.footer')
