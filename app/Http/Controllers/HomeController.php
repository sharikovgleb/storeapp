<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Item::with('category')->get();
        $categories = Category::all();
        return view('home.index', [
            'items' => $items,
            'categories' => $categories,
            'category' => null
        ]);
    }

    public function showInCategory(Category $category)
    {

        $items = Item::with('category')->where('category_id', $category->id)->get();
        $categories = Category::all();
        return view('home.index', [
            'items' => $items,
            'categories' => $categories,
            'current_category' => $category,
        ]);
    }

}
