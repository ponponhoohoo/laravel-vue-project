<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function show(Int $id)
    {
        $post = Category::find($id);
        return response()->json($post);
    }
}
