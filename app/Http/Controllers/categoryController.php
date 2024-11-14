<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categoryController extends Controller
{
    public function createCategory(){
        return view('createCategory',[
            'title' => 'Add New Category'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:20']
        ]);

        $name = htmlspecialchars($request->input('name'));

        Category::create([
            'name' => $name
        ]);

        return redirect('/dashboard');
    }

    public function index(){
        $categories = Category::all();
        return view('categoriesIndex',[
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }

    public function delete(Request $request){
        $user = Auth::user()->is_admin;
        $request->validate(['id' => 'required|integer']);
        if($user){
            $category = Category::findOrFail($request->id);
            $category->delete();
        }
        return redirect('/categories');
    }


}
