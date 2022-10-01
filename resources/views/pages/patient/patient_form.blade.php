@extends('layout.lay')

@section('title','Patients')
@section('content')


<div class="" style="width:100%;max-width:700px;margin:auto">
<h3 class="text-center">Add Patient</h3>
<form method="POST" action="{{url('/add-patient')}}">
      @csrf

      <div class="row">
            <div class="col">
              <input required type="text" name="name" class="form-control" placeholder="Name" aria-label="First name">
            </div>
            <div class="col">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" value="male">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Male
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" value="female">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Female
                      </label>
                    </div>
            </div>
      </div>
      <br>
      <div class="row">
            <div class="col">
              <input required type="number" name="age" class="form-control" placeholder="Age" aria-label="First name">
            </div>
            <div class="col">
              <input required type="number" name="weight" class="form-control" placeholder="Weight" aria-label="Last name">
            </div>
      </div>
      <br>
      <div class="row">
            <div class="col">
              <input required type="text" name="address" class="form-control" placeholder="Address" aria-label="First name">
            </div>
            <div class="col">
              <input required type="number" name="phone" class="form-control" placeholder="Phone" aria-label="First name">
            </div>
      </div>
      <br>
      <div class="row">
            <div class="col">
              <input type="text" name="guardian_name" class="form-control" placeholder="Guardian Name (optional)" aria-label="First name">
            </div>
            <div class="col">
              <input type="number" name="guardian_phone" class="form-control" placeholder="Guardian Phone (optional)" aria-label="First name">
            </div>
            <div class="col">
              <input type="text" name="relationship" class="form-control" placeholder="Relationship (optional)" aria-label="First name">
            </div>
      </div>
      <br>
      <div class="text-center">
            <button type="submit" class="btn btn-primary">Register</button>
      </div>
      
</form>
      
</div>




@endsection