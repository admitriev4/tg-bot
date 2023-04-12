<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Servey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{
    public function index() {
        // доработать вывод ответов для опросов
        $model = new Answer();
        $answers = $model->getList();
        return view('bot.answers', [
            'title' => 'Просмотр ответов',
            'answers' => $answers
        ]);
    }

    public function AnswerAdd(Request $request) {
        $model = new Answer();
        $model->addAnswer($request);
        return Redirect::to('/servey/show/answer/'.$request->servey);
    }

    public function AnswerDelete(Request $request) {
        $model = new Answer();
        $model->deleteAnswer($request->id);
        return Redirect::to('/serveys/');
    }
}
