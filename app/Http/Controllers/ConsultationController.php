<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consultation;
class ConsultationController extends Controller
{
    public function consultations()
    {
        $consultations=consultation::where('is_on_exam',0)->orderBy('id','desc')->get();
        $consultations=collect($consultations)->map(function($item,$key)
        {
            return [
                'id'=>$item['id'],
                'patient_id'=>$item['id'],
                'consulted_by'=>$item['id'],
                'patient_name'=>$item->patient->name,
                'patient_phone'=>$item->patient->phone,
                'doctor_name'=>$item->doctor->name,
                 ];
        });
        
        return view('pages.consultation.consultation_list',['consultations'=>$consultations]);

    }

    public function consultation_history($id)
    {
        $consultation=consultation::where('id',$id)->first();
        
        
        return view('pages.consultation.consultation_history',['consultation'=>$consultation]);

    }

    public function problem($consultation_id)
    {
        $consultation=consultation::where('id',$consultation_id)->first();
        return view('pages.consultation.action.problem',['consultation_id'=>$consultation_id,'consultation'=>$consultation]);
    }
    public function submit_problem(Request $request,$consultation_id)
    {
        $data=[
            'problem_details'=>$request->input('problem_details'),
            'problem_duration'=>$request->input('problem_duration')
        ];
        consultation::where('id',$consultation_id)->update($data);
        return redirect(route('consultations'))->with('status','Problem Details Submited Successfully');
    }

    public function prescribe($consultation_id)
    {
        $consultation=consultation::where('id',$consultation_id)->first();
        return view('pages.consultation.action.prescribe',['consultation_id'=>$consultation_id,'consultation'=>$consultation]);
    }


    public function submit_prescribe(Request $request,$consultation_id)
    {
        $medicine_name=$request->input('medicine_name');
        $comment=$request->input('comment');
        $m_num=count($medicine_name);
        $c_num=count($comment);
        dd($medicine_name,$comment,$m_num,$c_num);
        $consultation=consultation::where('id',$consultation_id)->first();
        return view('pages.consultation.action.prescribe',['consultation_id'=>$consultation_id,'consultation'=>$consultation]);
    }


}
