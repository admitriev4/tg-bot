<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    protected $model;
    protected $LoginController;

    function __construct()
    {
        $this->model = new User();
        $this->LoginController = new LoginController();
    }

    public function index(Request $request) {
        $user = Auth::user();
        if (empty($user)) {
            $auth = $this->model->authorizationUser($request);
            if(!is_string($auth)) {
                $users = $this->model->getList();
                return view('user.users', [
                    'title' => "Список пользователей",
                    'users' => $users
                ]);
            } else {
                return view('main', [
                    'title' => "Войдите или зарегистрируйтесь",
                    'request' => $auth,
                ]);
            }
        }else {
            $users = $this->model->getList();
            return view('user.users', [
                'title' => "Список пользователей",
                'users' => $users
            ]);
        }
    }

    public function userAdd(Request $request) {
        $res = $this->model->add($request);
        if(is_bool($res)) {
            return Redirect::to('/users/');
        } else {
            return view('registration', [
                'title' => "Регистрация",
                'request' => $res
            ]);
        }
    }

    public function userUpdate(Request $request) {
        $res = $this->model->updateInfo($request);
        if(is_int($res)) {
            return Redirect::to('/users/');
        } else {
            return view('user.update', [
                'title' => "Изменить данные пользователя",
                'request' => $res
            ]);
        }
    }

    public function userUpdatePass(Request $request) {
        $res = $this->model->updatePass($request);

        if(is_int($res)) {
            return Redirect::to('/users/');
        } else {
            return view('user.update_pass', [
                'title' => "Изменить данные пользователя",
                'request' => $res
            ]);
        }
    }

    public function userDelete() {
        $this->model->deleteUser();
        return view('main', [
            'title' => "Главная",
        ]);
    }



}
