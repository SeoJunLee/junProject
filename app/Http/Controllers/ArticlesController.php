<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return __METHOD__ . '은(는) Article 컬렉션을 조회합니다.';
        $articles = Article::get();
        return view('articles.index', compact('articles'));
    }


    public function create()
    {
        return __METHOD__ . '은(는) Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';
    }

    public function store(Request $request)
    {
        return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 새로운 Article 컬렉션을 만듭니다.';
    }

    public function show($id)
    {
//        return __METHOD__ . '은(는) 다음 기본키를 가진 Article 모델을 조회합니다.:' . $id;
        return Article::find($id);
    }

    public function edit($id)
    {
        return __METHOD__ . '은(는) 다음 기본키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다.:' . $id;
    }

    public function update(Request $request, $id)
    {
        return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 다음 기본키를 가진 Article 모델을 수정합니다.:' . $id;
    }

    public function destroy($id)
    {
        return __METHOD__ . '은(는) 다음 기본키를 가진 Article 모델을 삭제합니다.:' . $id;
    }
}
