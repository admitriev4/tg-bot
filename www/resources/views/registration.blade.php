@include('template.header')

<div class="wrapper">
    <div class="reg-form">
        <p class="title-big">Регистрация</p>
        <form action="/user/add" method="POST">
            {{ csrf_field() }}
            <span>Имя: <input type="text" name="name">  <span class="red">{{$errors->first('name')}}</span></span>

            <span>Е-mail: <input type="text" name="email">  <span class="red">{{$errors->first('email')}}</span></span>
            <span>Пароль: <input type="password" name="password"> <span class="red">{{$errors->first('password')}}</span></span>
            <span>Повторить пароль: <input type="password" name="repeat_password">  <span class="red">{{$errors->first('repeat_password')}}</span></span>
            <input type="submit" value="Регистрация" class="btn">
        </form>
        @if (!empty($request))
            <div class="title-small red">{{$request}}</div>
        @endif




    </div>
</div>

@include('template.footer')
