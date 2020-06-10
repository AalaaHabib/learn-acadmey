<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Trainer;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::orderBy('id','desc')->get();
        return view('admin.trainer.index' , compact('trainers'));
    }

    public function create()
    {
        return view('admin.trainer.create');
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'phone' => 'required|string',
            'spec' => 'nullable|string|max:191',
            'img' => 'required|image|mimes:png,jpg,jpeg',
        ]);
    
        if($data->fails()) {
             return redirect('/admin/trainer/create')
                ->withErrors($data)
                ->withInput();
        }
        
        $imageName="";
        if($request->hasFile('img')) {
            $image = $request->file('img'); 
            $name='trainer_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/uploads/trainers');
            Image::make($image)
            ->resize(50,50)->save("$destinationPath/$name");
            $imageName = $name;
        }
        
        
        $trainer = new Trainer();
        $trainer->name = $request->name;
        $trainer->phone = $request->phone;
        $trainer->spec = $request->spec;
        $trainer->img = $imageName;
        $trainer->save();

        return redirect('/admin/trainer');
    }


    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('admin.trainer.edit' , compact('trainer'));
    }

    public function update($id , Request $request)
    {

        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'phone' => 'required|string',
            'spec' => 'nullable|string|max:191',
            'img' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

    
        if($data->fails()){
            return redirect('/admin/trainer/edit')
            ->withErrors($data)
            ->withInput();
        }

        $trainer = Trainer::findOrFail($id);
        $old_image = $trainer->img;

         
        if($request->hasFile('img'))
        {
            Storage::disk('uploads/trainers')->delete($old_image);

            $image = $request->file('img'); 
            $new_image='trainer_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('assets/uploads/trainers');
            Image::make($image)
            ->resize(50,50)->save("$destinationPath/$new_image");
            $imageName = $new_image;

        }
        else 
        {
            $imageName = $old_image;    
        }


        $trainer->name = $request->name;
        $trainer->phone = $request->phone;
        $trainer->spec = $request->spec;
        $trainer->img = $imageName;
        $trainer->save();

        return redirect('/admin/trainer');
    }

    public function delete($id)
    {
        $trainer = Trainer::findOrFail($id);

        $old_image = $trainer->img;
        Storage::disk('uploads/trainers')->delete($old_image);

        $trainer->delete();

        return redirect('/admin/trainer');

    }

}
