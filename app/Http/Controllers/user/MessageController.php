<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Newsletter;
use App\Message;
use App\Student;

class MessageController extends Controller
{
    public function newsletter(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        Newsletter::create($data);
        return back();
    }

    public function contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|min:20'
        ]);
            
        Message::create($data);     
        return back();

    }

    public function enroll(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'spec' => 'nullable|string',
            'course_id' => 'required|exists:courses,id'
        ]);


        $old_student = Student::where('email' , $request->email)->first();

        if($old_student == Null)
        {
            $student = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'spec' => $data['spec'],
            ]);

            $student_id = $student->id;
        }
        else 
        {
            $student_id = $old_student->id;

            if($data['name'] !== Null )
            {
                $old_student->update([
                    'name' => $data['name'],
                ]);
            }

            if($data['spec'] !== Null )
            {
                $old_student->update([
                    'spec' => $data['spec'],
                ]);
            }
        }
            


        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at' =>now(),
            'updated_at' =>now(),
        ]);

        return back();

    }

}
