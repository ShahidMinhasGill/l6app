@extends('dashboard.layout');
@section('content')
<form action="{{route('roles.update',$role->id)}}" method="post" class="form-inline">
	@csrf
	@method('PUT')
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputRoleName" class="sr-only">Name</label>
    <input type="text" name="name" class="form-control" id="inputRoleName" placeholder="Role Name" value="{{$role->name}}">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Update Role</button>
</form>
@endsection