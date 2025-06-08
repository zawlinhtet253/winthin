<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBlogs = Article::count();
        $latestBlog = Article::latest()->first();
        $latestBlogTitle = $latestBlog ? $latestBlog->title : 'No Blogs Yet';
        $recentUsers = User::latest()->take(5)->get();
        $recentBlogs = Article::latest()->take(5)->get();

        return view('admin.index', compact(
            'totalUsers', 'totalBlogs', 'latestBlogTitle', 'recentUsers', 'recentBlogs'
        ));
    }

    public function users() {
        $users = User::paginate(6);
        return view('admin.users', [
            'users' => $users,
        ]);
    }
    public function editUser($id) {
        $user = User::findOrFail($id);
        return view('admin.edit_user', [
            'user' => $user,
        ]);
    }
    public function updateUser(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }
    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
    public function blogs() {
        $articles = Article::latest()->paginate(5);
        return view('admin.blogs', [
            'articles' => $articles,
        ]);
    }
    public function careers() {
        
        $jobPosts = JobPost::paginate(5);
        return view('admin.careers', [
            'jobPosts' => $jobPosts,
        ]);
    }

    public function addCareer() {
        return view('admin.career_add');
    }

    public function storeCareer(Request $request) {
        $request->validate([
            'body' => 'required',
        ]);

        $jobPost = new JobPost();
        $jobPost->body = $request->input('body');
        $jobPost->save();

        return redirect()->route('admin.careers')->with('success', 'Career added successfully.');
    }
    public function editCareer($id) {
        $jobPost = JobPost::findOrFail($id);
        return view('admin.career_edit', [
            'jobPost' => $jobPost,
        ]);
    }
    public function updateCareer(Request $request, $id) {
        $request->validate([
            'body' => 'required',
        ]);

        $jobPost = JobPost::findOrFail($id);
        $jobPost->body = $request->input('body');
        $jobPost->save();

        return redirect()->route('admin.careers')->with('success', 'Career updated successfully.');
    }
    public function deleteCareer($id) {
        $jobPost = JobPost::findOrFail($id);
        $jobPost->delete();

        return redirect()->route('admin.careers')->with('success', 'Career deleted successfully.');
    }

    public function categories() {
        $categories = Category::all();
        return view('admin.categories', [
            'categories' => $categories,
        ]);
    }
    public function addCategory() {
        return view('admin.category_add');
    }
    public function storeCategory(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category added successfully.');
    }
    public function editCategory($id) {
        $category = Category::findOrFail($id);
        return view('admin.category_edit', [
            'category' => $category,
        ]);
    }
    public function updateCategory(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }
    public function deleteCategory($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}
