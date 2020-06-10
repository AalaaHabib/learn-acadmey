<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.index' , compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
        ]);
    
         
        if($data->fails()) {
             return redirect('/admin/category/create')
                ->withErrors($data)
                ->withInput();
        }
        
        
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('/admin/category');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit' , compact('category'));
    }

    public function update($id , Request $request)
    {

        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
        ]);
    
         
        if($data->fails()) {
             return redirect('/admin/category/edit/'.$id)
                ->withErrors($data)
                ->withInput();
        }


        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->save();

        return redirect('/admin/category');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/admin/category');

    }

}
