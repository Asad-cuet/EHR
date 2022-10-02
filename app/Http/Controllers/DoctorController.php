<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Collection;

class DoctorController extends Controller
{
    
    public function doctors()
    {
        $doctors=Doctor::orderBy('id','desc')->get();
        $doctors=collect($doctors)->map(function($item,$key)
        {
            return [
                'id'=>$item['id'],
                'name'=>$item['name'],
                'gender'=>$item['gender'],
                'phone'=>$item['phone'],
                'subject'=>$item['subject']
                 ];
        });
        return view('pages.doctor.doctor_list',['doctors'=>$doctors]);

    }

    
    public function doctor_form()
    {
        return view('pages.doctor.doctor_form');
    }

    public function add_doctor(Request $request)
    {
        $login_id=time();

        if(Doctor::where('login_id',$login_id)->exists())
        {
            $login_id.=0;
        }
        if(Doctor::where('login_id',$login_id)->exists())
        {
            $login_id=time().'00';
        }
        
       $data=[
        'name'=>$request->input('name'),
        'subject'=>$request->input('subject'),
        'gender'=>$request->input('gender'),
        'phone'=>$request->input('phone'),
        'login_id'=>$login_id,
        'password'=>12345678
       ];

       Doctor::create($data);                    
        return redirect(route('doctors'))->with('status','Doctor Added Successfully');
    }

    public function doctor_view($id)
    {
        $doctor=Doctor::where('id',$id)->first();
        return view('pages.doctor.doctor_view',['doctor'=>$doctor]);

    }


    public function doctor_update(Request $request,$id)
    {

        
       $data=[
        'name'=>$request->input('name'),
        'gender'=>$request->input('gender'),
        'phone'=>$request->input('phone'),
        'subject'=>$request->input('subject'),
       ];

       Doctor::where('id',$id)->update($data);                    
        return redirect(route('doctors'))->with('status','Doctor Updated Successfully');
    }
}
