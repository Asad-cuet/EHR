@extends('layout.lay')

@section('title','Patients')
@section('content')


<div class="" style="width:100%;max-width:700px;margin:auto">
<h3 class="text-center">Patient View</h3>
<form method="POST" action="{{url('/update-patient/'.$patient->id)}}">
      @csrf

      <div class="row">
            <div class="col">
              <input required type="text" name="name" value="{{$patient->name}}" class="form-control" placeholder="Name" aria-label="First name">
            </div>
            <div class="col">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" @if($patient->gender=='male') checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" @if($patient->gender=='female') checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Female
                    </label>
                  </div>
          </div>
      </div>
      <br>
      <div class="row">
            <div class="col">
              <input required type="number" name="age" value="{{$patient->age}}" class="form-control" placeholder="Age" aria-label="First name">
            </div>
            <div class="col">
              <input required type="number" name="weight" value="{{$patient->weight}}" class="form-control" placeholder="Weight" aria-label="Last name">
            </div>
      </div>
      <br>
      <div class="row">
            <div class="col">
              <input required type="text" name="address" value="{{$patient->address}}" class="form-control" placeholder="Address" aria-label="First name">
            </div>
            <div class="col">
              <input required type="number" name="phone" value="{{$patient->phone}}" class="form-control" placeholder="Phone" aria-label="First name">
            </div>
      </div>
      <br>
      <div class="row">
            <div class="col">
              <input type="text" name="guardian_name" value="{{$patient->guardian_name}}" class="form-control" placeholder="Guardian Name (optional)" aria-label="First name">
            </div>
            <div class="col">
              <input type="number" name="guardian_phone" value="{{$patient->guardian_phone}}" class="form-control" placeholder="Guardian Phone (optional)" aria-label="First name">
            </div>
            <div class="col">
              <input type="text" name="relationship" value="{{$patient->relationship}}" class="form-control" placeholder="Relationship (optional)" aria-label="First name">
            </div>
      </div>
      <br>
      <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
      </div>
      
</form>
      
<br>

<ul class="list-group">
      <li class="list-group-item"><b>Login ID:</b> {{$patient->login_id}}</li>
      <li class="list-group-item"><b>Password:</b> {{$patient->password}}</li>
</ul>
</div>




@endsection