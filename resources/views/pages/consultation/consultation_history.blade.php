@extends('layout.lay')

@section('title','Patients')
@section('content')
@if(session()->has('status'))
      <div class="alert alert-success" role="alert">
            {{session('status')}}   
      </div>                
@endif

<ul class="list-group">
      <li class="list-group-item bg-info" aria-current="true">Patient Basic Information</li>
      <li class="list-group-item"><b>Name : </b>{{$consultation->patient->name}} </li>
      <li class="list-group-item"><b>Gender : </b>{{$consultation->patient->gender}} </li>
      <li class="list-group-item"><b>Age : </b>{{$consultation->patient->age}} </li>
      <li class="list-group-item"><b>Wight : </b>{{$consultation->patient->weight}} </li>
      <li class="list-group-item"><b>Phone : </b>{{$consultation->patient->phone}} </li>
      <li class="list-group-item"><b>Address : </b>{{$consultation->patient->address}} </li>
      <li class="list-group-item"><b>Guardian Phone : </b>{{$consultation->patient->guardian_phone}} </li>


      <li class="list-group-item bg-secondary text-white" aria-current="true">Doctor's Information</li>
      <li class="list-group-item"><b>Name : </b>{{$consultation->doctor->name}} </li>
      <li class="list-group-item"><b>Subject : </b>{{$consultation->doctor->subject}} </li>

      <li class="list-group-item bg-danger text-white" aria-current="true">Problem</li>
      <li class="list-group-item"><b>Details : </b>{{$consultation->problem_details}} </li>
      <li class="list-group-item"><b>Duration : </b>{{$consultation->problem_duration}} </li>

      <li class="list-group-item bg-warning text-white" aria-current="true">Doctor's Prescription</li>
      @foreach ($consultation->prescribe as $item)
      <li class="list-group-item"><b>{{$item['title']}} : </b> {{$item['comment']}}</li>
      @endforeach
      


      <li class="list-group-item active" aria-current="true">Given Test</li>
      <li class="list-group-item"><b>X-ray : </b> Normal </li>


      <li class="list-group-item bg-success text-white" aria-current="true">Final Result</li>
      <li class="list-group-item">Normal </li>
</ul>
@endsection