@extends('dashboard.layout');
@section('content')
<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-row align-items-center">
  	<div class="col-md-8">
    <label for="inputUsername" class="sr-only">Name</label>
    <input type="text" name="username" class="form-control mb-2" id="inputUsername" placeholder="Username">
  </div>   
   <div class="col-md-8">
    <label for="inputName" class="sr-only">Full Name</label>
    <input type="text" name="name" class="form-control mb-2" id="inputName" placeholder="Full Name">
  </div>    
  <div class="col-md-8">
    <label for="inputUserEmail" class="sr-only">Email</label>
    <input type="email" name="email" class="form-control mb-2" id="inputUserEmail" placeholder="Enter a Valid Email">
  </div>   
   <div class="col-md-8">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" class="form-control mb-2" id="inputPassword" placeholder="********">
  </div>  
    <div class="col-md-8">
    <label for="inputPhone" class="sr-only">Phone</label>
    <input type="text" name="phone" class="form-control mb-2" id="inputPhone" placeholder="+83458789">
  </div>  
  
      	<div class="col-md-8 mb-2">
    <label for="selectCountr" class="sr-only">Select Country</label>
     <select name="country" id="" class="form-control">
     	@if(!$countries->isEmpty())
     	
     	@foreach($countries as $country)
     	<option value="{{$country->id}}">{{$country->name}}</option>
     	@endforeach
      @endif
     </select>
  </div>
      <div class="col-md-8">
    <label for="inputCity" class="sr-only">City</label>
    <input type="text" name="city" class="form-control mb-2" id="inputCity" placeholder="Enter you City Name">
  </div>      
  <div class="col-md-6">
    <label for="selectRoles">Select Roles</label>
    <select name="roles[]" id="" class="form-control mb-2" id="selectRoles" multiple>
      @if(!$roles->isEmpty())
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
        @endif
    </select>
  </div>

  </div>
            <div class="col-md-4">
    <label for="inputFileName">Profile Image</label>
    <input type="file" name="photo" class="form-custem-control  mb-2" id="inputFileName"/>
    </div>
  <button type="submit" class="btn btn-primary mb-2">Add New User</button>
</form>
@endsection