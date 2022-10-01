@extends('layout.lay')

@section('title','Patients')
@section('content')
@if(session()->has('status'))
      <div class="alert alert-success" role="alert">
            {{session('status')}}   
      </div>                
@endif


<table class="table">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Name</th>
       <th scope="col">Gender</th>
       <th scope="col">Age</th>
       <th scope="col">Weight</th>
       <th scope="col">Phone</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
      @foreach ($patients as $item)
      <tr>
         <td>{{$item['id']}}</td>
         <td>{{$item['name']}}</td>
         <td>{{$item['gender']}}</td>
         <td>{{$item['age']}}</td>
         <td>{{$item['weight']}}</td>
         <td>{{$item['phone']}}</td>
         <td>
            <a href="{{url('/patient-view/'.$item['id'])}}" class="btn btn-secondary">View</a>
            <button class="btn btn-primary">Consultation</button>
         </td>
         
       </tr>       
      @endforeach

   </tbody>
 </table>
@endsection