<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;

use App\Article;
use App\Tag;

use Auth;

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
        // dd(Auth::user()->articles());
		$articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));
	}

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article) {
		return view('articles.show', compact('article'));
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {

        $tags = Tag::lists('name', 'id');

		return view('articles.create', compact('tags'));
	}

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request) {

        $this->createArticle($request);

		return redirect('articles')->with([
            'flash_message' => TRUE,
            'flash_message_success' => "Article \"{$request->all()['title']}\" has been created"
        ]);
	}

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article) {
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request) {
        //\Session::flash('flash_message', "{$article->title} has been updated");
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect("articles/{$article->id}")->with([
            'flash_message' => TRUE,
            'flash_message_success' => "Article \"{$article->title}\" has been updated"
        ]);
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Article $article) {
        $article->delete();
        return redirect('articles')->with([
            'flash_message' => TRUE,
            'flash_message_danger' => "Article \"{$article->title}\" has been deleted"
        ]);
    }

    private function syncTags(Article $article, array $tags) {
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request) {
        $article = Article::create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}
