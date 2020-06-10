<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Category;

class CourseController extends Controller
{
    public function CoursesCat($id)
    {
        $data['category'] = Category::where('id' , $id)->first();

        $data['courses'] = Course::where('category_id' , $id)
        ->orderBy('id','DESC')
        ->paginate(6);

        return view('user.courses')->with($data);
    }

    public function CoursesDet($id , $c_id)
    {
        $data['courseDet'] = Course::where('category_id' , $id)
        ->where('id' , $c_id)->first();

        return view('user.courseDet')->with($data);
    }
}
