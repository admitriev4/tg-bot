@include('template.header')

<div class="wrapper">
    <div class="reg-form">
    <p class="title-big center">Изменение данных пользователя</p>
    <form action="/user/update" method="post">
        {{ csrf_field() }}
        <span>Имя: <input type="text" name="name">  <span class="red">{{$errors->first('name')}}</span></span>
        <span>Е-mail: <input type="text" name="email">  <span class="red">{{$errors->first('email')}}</span></span>
        <input type="submit" value="Изменить" class="btn">
    </form>

        @if (!empty($request))
            <div class="title-small red">{{$request}}</div>
        @endif
    </div>
    <a href="/user/show/update-pass/" class="btn">Изменить пароль пользователя</a>
</div>

@include('template.footer')
