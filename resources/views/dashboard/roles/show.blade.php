@extends('dashboard.layout');
@section('content')
@if($role)
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Users</th>
            </tr>
            <tbody>
            	<tr>
            		<td>{{$role->id}}</td>
            		<td>{{$role->name}}</td>
            		<td>{{$role->created_at}}</td>
            		<td>{{$role->updated_at}}</td>
            		<td></td>
            	</tr>
            </tbody>
        </thead>
    </table>
</div>
   @else
      <p class="alert alert-info">No Record Found</p>
@endif

 @endsection