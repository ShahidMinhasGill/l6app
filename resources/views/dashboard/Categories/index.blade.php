@extends('dashboard.layout');
@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">categories Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
          </div>
        </div>
      </div>
      @if(!$categories->isEmpty())
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Thumbnail</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Children</th>
              <th>Action</th>
            </tr>
            <tbody>
            	@foreach($categories as $category)
            	<tr>
            		<td>{{$category->id}}</td>
            		<td>{{$category->title}}</td>
                <td><img src="{{asset($category->thumbnail)}}"/></td>
            		<td>{{$category->created_at}}</td>
            		<td>{{$category->updated_at}}</td>
            		<td>
                  @if(!$category->children->isEmpty())
                  @foreach($category->children as $children)
                  {{$children->title}}
                  @endforeach
                  @else
                  {{"Parent Category"}}
                  @endif
                </td>
            		<td> 
            			<div class="btn-group role-group" aria-label="Basic example">
            			<a role="button" href="{{route('categories.edit', $category->id)}}" class="btn btn-link">Edit</a>
            			<form method="post" action="{{route('categories.destroy',$category->id)}}">
            				@csrf
            				@method('DELETE')
            				<button type="submit" class="btn btn-link">Delete</button>
            			</form>
            			<a category="button" href="{{route('categories.show', $category->id)}}" class="btn btn-link">Show</a>
            			</div>

            	</tr>
            	@endforeach
            </tbody>
          </thead>
        </table>
      </div>
      @else
      <p class="alert alert-info">No Category Found</p>
      @endif
      @endsection
