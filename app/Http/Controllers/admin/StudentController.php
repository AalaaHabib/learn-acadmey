<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Course;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id','desc')->get();
        return view('admin.student.index' , compact('students'));
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:students,email',
            'spec' => 'nullable|string|max:191',
        ]);
    
         
        if($data->fails()) {
             return redirect('/admin/student/create')
                ->withErrors($data)
                ->withInput();
        }
        
        
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->spec = $request->spec;
        $student->save();

        return redirect('/admin/student');
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.edit' , compact('student'));
    }

    public function update($id , Request $request)
    {

        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'spec' => 'nullable|string|max:191',
        ]);
    
         
        if($data->fails()) {
             return redirect('/admin/student/edit/'.$id)
                ->withErrors($data)
                ->withInput();
        }


        $student = Student::findOrFail($id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->spec = $request->spec;
        $student->save();

        return redirect('/admin/student');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/admin/student');

    }

    //showCourses
    public function showCourses($id)
    {
        $data['courses'] = Student::findOrFail($id)->courses; 
        $data['student_id'] = $id; 

        return view('admin.student.showCourses')->with($data);
    }

    public function approve($id , $c_id)
    {
        DB::table('course_student')->where('student_id' , $id)->where('course_id' , $c_id)->update([
            'stats' => 'approve'
        ]);

        return back();
    }

    public function reject($id , $c_id)
    {
        DB::table('course_student')->where('student_id' , $id)->where('course_id' , $c_id)->update([
            'stats' => 'reject'
        ]);

        return back();
    }

    public function addCourse($id)
    {
        $data['student_id'] = $id;

        $data['courses'] = Course::get();

        return view('admin.student.addCourse')->with($data);
    }

    public function storeCourse($id , Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);

        DB::table('course_student')->insert([
            'student_id' => $id,
            'course_id' => $data['course_id']
        ]);

        return redirect('admin/student/showCourses/'.$id);
    }
}
