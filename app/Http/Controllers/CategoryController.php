<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('categories.index');
    }

    public function detail($id) {
        return view('categories.detail', [
            'id' => $id,
        ]);
    }

    public function add() {
        return view('categories.add');
    }

    public function store(Request $request) {
        // Store the category
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
    public function edit($id) {
        return view('categories.edit', [
            'id' => $id,
        ]);
    }
}
