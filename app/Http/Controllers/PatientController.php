<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\consultation;
use Illuminate\Support\Collection;

class PatientController extends Controller
{
    public function patients()
    {
        $patients=Patient::orderBy('id','desc')->get();
        $patients=collect($patients)->map(function($item,$key)
        {
            return [
                'id'=>$item['id'],
                'name'=>$item['name'],
                'gender'=>$item['gender'],
                'age'=>$item['age'],
                'weight'=>$item['weight'],
                'address'=>$item['address'],
                'phone'=>$item['phone'],
                'is_consulted'=>$item['is_consulted'],
                'is_cleared'=>$item['is_cleared']
                 ];
        });
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
    
    public function patient_view($id)
    {
        $patient=Patient::where('id',$id)->first();
        return view('pages.patient.patient_view',['patient'=>$patient]);

    }

    public function patient_update(Request $request,$id)
    {

        
       $data=[
        'name'=>$request->input('name'),
        'gender'=>$request->input('gender'),
        'age'=>$request->input('age'),
        'weight'=>$request->input('weight'),
        'address'=>$request->input('address'),
        'phone'=>$request->input('phone'),
        'guardian_name'=>$request->input('guardian_name'),
        'guardian_phone'=>$request->input('guardian_phone'),
        'relationship'=>$request->input('relationship')
       ];

        Patient::where('id',$id)->update($data);                    
        return redirect(route('patients'))->with('status','Patient Updated Successfully');
    }
    public function consultant($id)
    {
           $doctors=Doctor::all();
           $doctors=collect($doctors)->map(function($item,$key)
           {
            return [
                'doctor_id'=>$item['id'],
                'name'=>$item['name'],
                'subject'=>$item['subject'],
                'gender'=>$item['gender'],
                'phone'=>$item['phone']
                 ];
            });
            return view('pages.consultation.consultation_room',['doctors'=>$doctors,'patient_id'=>$id]);

    }

    public function consultant_to(Request $request,$patient_id)
    {
        $data=[
          'patient_id'=>$patient_id,
          'consulted_by'=>$request->input('doctor_id')
        ];
        $update_data=[
            'is_consulted'=>1
        ];
        Patient::where('id',$patient_id)->update($update_data);
        consultation::create($data);
        return redirect(route('patients'))->with('status','Patient sent to Consultation');


    }
}
