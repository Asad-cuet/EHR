@extends('layout.lay')

@section('title','Patients')
@section('content')
@if(session()->has('status'))
                   <div>
                      {{session('status')}}   
                   </div>
@endif
@endsection