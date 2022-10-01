@extends('layout.lay')

@section('title','Patient Registration')
@section('content')


<div class="" style="width:100%;max-width:700px;margin:auto">
<h3 class="text-center">Add Doctor</h3>
<form method="POST" action="{{url('/add-doctor')}}">
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
              <input required type="text" name="subject" class="form-control" placeholder="Subject" aria-label="First name">
            </div>
            <div class="col">
              <input required type="text" name="phone" class="form-control" placeholder="Phone" aria-label="First name">
            </div>
      </div>
      <br>
      <div class="text-center">
            <button type="submit" class="btn btn-primary">Register</button>
      </div>
      
</form>
      
</div>




@endsection