<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;

use App\Article;

/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth', ['only' => 'create']);
//    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
		$articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));
	}

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id) {
		$article = Article::findOrFail($id);
		return view('articles.show', compact('article'));
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
		return view('articles.create');
	}

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request) {
		Article::create($request->all());
		return redirect('articles');
	}

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }

    public function cats() {
        return 'hello';
    }

}
