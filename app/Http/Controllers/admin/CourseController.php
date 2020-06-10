<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Category;
use App\Trainer;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id','desc')->get();
        return view('admin.course.index' , compact('courses'));
    }

    public function create()
    {
        $data['categories'] = Category::orderBy('id' , 'DESC')->get();
        $data['trainers'] = Trainer::orderBy('id' , 'DESC')->get();

        return view('admin.course.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'desc' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|string|max:191',
            'category_id' => 'required|exists:categories,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'required|image|mimes:png,jpg,jpeg',
        ]);
    
        if($data->fails()) {
             return redirect('/admin/course/create')
                ->withErrors($data)
                ->withInput();
        }
        
        $imageName="";
        if($request->hasFile('img')) {
            $image = $request->file('img'); 
            $name='course_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/uploads/courses');
            Image::make($image)
            ->resize(360,313)->save("$destinationPath/$name");
            $imageName = $name;
        }
        
        
        $course = new course();
        $course->name = $request->name;
        $course->desc = $request->desc;
        $course->content = $request->content;
        $course->price = $request->price;
        $course->category_id = $request->category_id;
        $course->trainer_id = $request->trainer_id;
        $course->img = $imageName;
        $course->save();

        return redirect('/admin/course');
    }


    public function edit($id)
    {
        $data['categories'] = Category::orderBy('id' , 'DESC')->get();
        $data['trainers'] = Trainer::orderBy('id' , 'DESC')->get();

        $data['course'] = Course::findOrFail($id);
        return view('admin.course.edit')->with($data);
    }

    public function update($id , Request $request)
    {

        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'desc' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|string|max:191',
            'category_id' => 'required|exists:categories,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

    
        if($data->fails()){
            return redirect('/admin/course/edit')
            ->withErrors($data)
            ->withInput();
        }

        $course = Course::findOrFail($id);
        $old_image = $course->img;

         
        if($request->hasFile('img'))
        {
            Storage::disk('uploads/courses')->delete($old_image);

            $image = $request->file('img'); 
            $new_image='course_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/uploads/courses');
            Image::make($image)
            ->resize(360,313)->save("$destinationPath/$new_image");
            $imageName = $new_image;

        }
        else 
        {
            $imageName = $old_image;    
        }


        $course->name = $request->name;
        $course->desc = $request->desc;
        $course->content = $request->content;
        $course->price = $request->price;
        $course->category_id = $request->category_id;
        $course->trainer_id = $request->trainer_id;
        $course->img = $imageName;
        $course->save();

        return redirect('/admin/course');
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);

        $old_image = $course->img;
        Storage::disk('uploads/courses')->delete($old_image);

        $course->delete();

        return redirect('/admin/course');

    }

}
