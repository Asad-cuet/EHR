<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function patients()
    {
        $patients=Patient::orderBy('id','desc')->get();
        return view('pages.patient.patient_list',['patients'=>$patients]);

    }
    public function patient_form()
    {
        return view('pages.patient.patient_form');
    }
    public function add_patient(Request $request)
    {
        $login_id=time();

        if(Patient::where('login_id',$login_id)->exists())
        {
            $login_id.=$request->input('age');
        }
        if(Patient::where('login_id',$login_id)->exists())
        {
            $login_id=time().$request->input('age');
        }
        
       $data=[
        'name'=>$request->input('name'),
        'gender'=>$request->input('gender'),
        'age'=>$request->input('age'),
        'weight'=>$request->input('weight'),
        'address'=>$request->input('address'),
        'phone'=>$request->input('phone'),
        'guardian_name'=>$request->input('guardian_name'),
        'guardian_phone'=>$request->input('guardian_phone'),
        'relationship'=>$request->input('relationship'),
        'login_id'=>$login_id,
        'password'=>$request->input('age').$request->input('phone')
       ];

        Patient::create($data);                    
        return redirect(route('patients'))->with('status','Patient Added Successfully');
    }
}
