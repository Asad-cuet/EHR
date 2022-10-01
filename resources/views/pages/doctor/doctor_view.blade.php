@extends('layout.lay')

@section('title','Patient View')
@section('content')


<div class="" style="width:100%;max-width:700px;margin:auto">
<h3 class="text-center">Patient View</h3>
<form method="POST" action="{{url('/update-doctor/'.$doctor->id)}}">
      @csrf

      <div class="row">
            <div class="col">
              <input required type="text" name="name" value="{{$doctor->name}}" class="form-control" placeholder="Name" aria-label="First name">
            </div>
            <div class="col">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" @if($doctor->gender=='male') checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" @if($doctor->gender=='female') checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Female
                    </label>
                  </div>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col">
            <input required type="text" name="subject" value="{{$doctor->subject}}" class="form-control" placeholder="Subject" aria-label="First name">
          </div>
          <div class="col">
            <input required type="text" name="phone" value="{{$doctor->phone}}" class="form-control" placeholder="Phone" aria-label="First name">
          </div>
      </div>    
      <br>
      <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
      </div>
      
</form>
      
<br>

<ul class="list-group">
      <li class="list-group-item"><b>Login ID:</b> {{$doctor->login_id}}</li>
      <li class="list-group-item"><b>Password:</b> {{$doctor->password}}</li>
</ul>
</div>




@endsection