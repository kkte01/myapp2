<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use App\Events\ArticlesEvent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ArticlesRequest as ArticlesRequest;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
//        DB::listen(function (\Illuminate\Database\Events\QueryExecuted $query){
//            dump($query->sql);
//        });
        //$articles = Article::get();
        //N+1 쿼리 해결 방법
        //$articles = Article::with('user')->get();
        //지연 로드
//        $articles = Article::get();
//        //user() 관계가 필요 없는 다른 로직 수행
//        $articles->load('user');
        //페이지네이터 확인
        $articles = Article::latest()->paginate(3);
        //dd(view('articles.index', compact('articles'))->render());
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        //return __METHOD__ . '은(는) Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticlesRequest $request
     * @return string
     */
    public function store(ArticlesRequest $request)
    {
        $article = User::find(1)->articles()->create($request->all());

        if(!$article){
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }
        //var_dump('이벤트를 던집니다.');
        //event(new ArticleCreated($article));
        //var_dump('이벤트를 던졌습니다.');
        event(new ArticlesEvent($article));
        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return string
     */
    public function show($id)
    {
        //return __METHOD__ . '은(는) 다음 기본키를 가진 Article 모델을 조회합니다.:' . $id;
        $article = Article::findOrFail($id);
        //dd($article);
        debug($article->toArray());
        //return  $article->toArray();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return string
     */
    public function edit($id)
    {
        return __METHOD__ . '은(는) 다음 기본키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다.:' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 다음 기본키를 가진 Article 모델을 수정합니다.:' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        return __METHOD__ . '은(는) 다음 기본키를 가진 Article 모델을 삭제합니다.:' . $id;
    }
}
