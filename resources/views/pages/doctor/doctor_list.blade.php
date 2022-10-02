@extends('layout.lay')

@section('title','Doctors')
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
       <th scope="col">Phone</th>
       <th scope="col">Subject</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
      @foreach ($doctors as $item)
      <tr>
         <td>{{$item['id']}}</td>
         <td>{{$item['name']}}</td>
         <td>{{$item['gender']}}</td>
         <td>{{$item['phone']}}</td>
         <td>{{$item['subject']}}</td>
         <td>
            <a href="{{url('/doctor-view/'.$item['id'])}}" class="btn btn-secondary">View</a>
         </td>
         
       </tr>       
      @endforeach

   </tbody>
 </table>
@endsection