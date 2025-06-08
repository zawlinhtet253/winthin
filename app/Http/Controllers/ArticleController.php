<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::latest()->take(3)->get();
        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    public function detail($id) {
        $article = Article::find($id);
        return view('articles.detail', [
            'article' => $article,
        ]);
    }
    public function insights(Request $request)
    {
        $categoryId = $request->input('category_id');

        $articles = Article::with('category')
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->get();

        $categories = Category::all();

        return view('articles.insights', [
            'categories' => $categories,
            'articles' => $articles,
            'selectedCategoryId' => $categoryId, // Useful for highlighting the selected one
        ]);
    }
    public function insightDetail($id) {
        $article = Article::find($id);
        return view('articles.insight_detail', [
            'article' => $article,
        ]);
    }
   public function add()
    {
        $categories = \App\Models\Category::all();
        return view('articles.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Article::create([
            'title' => $request->title,
            'body' => $request->body,   // HTML with images
            'author' => $request->author,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.blogs')->with('success', 'Article created successfully!');
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }


    public function update($id) {
        $article = Article::findOrFail($id);
        $article->title = request('title');
        $article->body = request('body');
        $article->author = request('author');
        $article->category_id = request('category_id');
        
        $article->save();

        return redirect()->route('admin.blogs')->with('success', 'Article updated successfully!');
    }
    public function delete($id) {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return redirect()->route('admin.blogs')->with('success', 'Article deleted successfully!');
        } else {
            return redirect()->route('admin.blogs')->with('error', 'Article not found!');
        }
    }
    public function contact_us() {
        return view('articles.contact_us');
    }
    public function about() {
        return view('articles.about');
    }
    public function service() {
        return view('articles.services');
    }
    public function ourteams() {
        return view('articles.our-teams');
    }
}
