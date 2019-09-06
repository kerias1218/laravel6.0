<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    public function index() {
        $articles = \App\Article::latest()->paginate(3);


        return view('articles.index', compact('articles'));
    }
    public function create() {
        return view('articles.create');
    }

    public function store(ArticlesRequest $request) {
        $article = \App\User::find(1)->articles()->create($request->all());
        if(!$article) {
            return back()->with('flash_message','글이 저장되지 않았습니다.')
                ->withInput();
        }


        event(new \App\Events\ArticlesEvent($article));

        return redirect(route('articles.index'))->with('flash_message','저장 되었습니다.');
    }

    public function store_old(Request $request) {
        $rules = [
            'title' => ['required'],
            'content' => ['required','min:5'],
        ];
        $message = [
            'title.required' => '제목 필수 항목',
            'content.required' => '본문 필수 항목',
            'content.min' => '본문 최소 글자 :min 이상',
        ];

        $this->validate($request, $rules, $message);

        $article = \App\User::find(1)->articles()->create($request->all());

        if(!$article) {
            return back()->with('flash_message','글이 저장되지 않았습니다.')
                ->withInput();
        }

        return redirect(route('articles.index'))
            ->with('flash_message','저장 되었습니다.');
    }
}
