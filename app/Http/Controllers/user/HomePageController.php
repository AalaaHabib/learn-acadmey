<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Sitecontent;
use App\Trainer;
use App\Student;
use App\Testmonial;

class HomePageController extends Controller
{
    public function index()
    {
        $data['courses']= Course::orderBy('id','DESC')->take(3)->get();

        $data['trainers_count'] = Trainer::count();
        $data['students_count'] = Student::count();
        $data['courses_count'] = Course::count();

        $data['testmonials'] = Testmonial::orderBy('id','DESC')->take(3)->get();

        //site content
        $data['banner'] = Sitecontent::where('name' , 'banner')->first();
        $data['course'] = Sitecontent::where('name' , 'courses')->first();
        $data['testmonial'] = Sitecontent::where('name' , 'testmonials')->first();

        return view('user.index')->with($data);
    }
}
