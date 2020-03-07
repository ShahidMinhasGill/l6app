@extends('dashboard.layout');
@section('content')
<form action="{{route('roles.store')}}" method="post" class="form-inline">
	@csrf
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputRoleName" class="sr-only">Name</label>
    <input type="text" name="name" class="form-control" id="inputRoleName" placeholder="Role Name">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Add New Role</button>
</form>
@endsection