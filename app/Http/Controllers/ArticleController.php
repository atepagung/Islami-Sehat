<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /*public function show()
    {
    	$articles1 = Article::where('category', 'Category 1')->get();
    	$articles2 = Article::where('category', 'Category 2')->get();
    	$articles3 = Article::where('category', 'Category 3')->get();

    	return view('articles', ['articles1' => $articles1, 'articles2' => $articles2, 'articles3' => $articles3]);
    }*/

    public function show_1()
    {
        $articles = Article::where('category', 'A')->get();

        return view('article', ['articles' => $articles, 'title' => 'Kesehatan dan Gizi']);
    }

    public function show_2()
    {
        $articles = Article::where('category', 'B')->get();

        return view('article', ['articles' => $articles, 'title' => 'Kesehatan Lingkungan']);
    }

    public function show_3()
    {
        $articles = Article::where('category', 'C')->get();

        return view('article', ['articles' => $articles, 'title' => 'Gaya Hidup']);
    }

    public function show_4()
    {
        $articles = Article::where('category', 'D')->get();

        return view('article', ['articles' => $articles, 'title' => 'Kesehatan Masyarakat']);
    }

    public function add()
    {
    	return view('add-article');
    }

    public function store(Request $request)
    {
    	try {
    		DB::beginTransaction();

    		$path = $request->image->storeAs('', time().'.'.$request->image->getClientOriginalExtension(), 'public');

    		$article = new Article;

    		$article->picture = $path;
    		$article->title = $request->title;
    		$article->content = $request->content;
    		$article->category = $request->category;

    		$article->save();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		Storage::disk('public')->delete($path);
    		session()->flash('error_message', 'Gagal menambahkan Artikel');
    		return redirect()->route('articles');
    	}

    	session()->flash('success_message', 'Berhasil menambahkan Artikel');
		return redirect()->route('articles');
    }

    public function detail($id)
    {
    	$article = Article::find($id);

    	return view('detail-article', ['article' => $article]);
    }

    public function edit($id)
    {
    	$article = Article::find($id);

    	return view('edit-article', ['article' => $article]);
    }

    public function update($id)
    {
    	try {
    		DB::beginTransaction();

    		$path = $request->image->storeAs('', time().'.'.$request->image->getClientOriginalExtension(), 'public');

    		$article = Artikel::find($id);

    		$article->picture = $path;
    		$article->title = $request->title;
    		$article->content = $request->content;
    		$article->category = $request->category;

    		$article->save();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		Storage::disk('public')->delete($path);
    		session()->flash('error_message', 'Gagal Mengubah Artikel');
    		return redirect()->route('articles');
    	}

    	session()->flash('success_message', 'Berhasil Mengubah Artikel');
		return redirect()->route('articles');
    }

    public function delete($id)
    {

    	$article = Article::find($id);

    	try {
    		DB::beginTransaction();

    		Article::find($id)->delete();

    		DB::commit();
    		Storage::disk('public')->delete($article->picture);
    	} catch (Exception $e) {
    		DB::rollBack();
    		session()->flash('error_message', 'Gagal Menghapus Artikel');
    		return redirect()->route('articles');
    	}

    	session()->flash('success_message', 'Berhasil Menghapus Artikel');
		return redirect()->route('articles');
    }
}
