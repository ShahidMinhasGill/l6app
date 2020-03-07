@extends('dashboard.layout');
@section('content')
 @if($category)
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
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td><img src="{{asset($category->thumbnail)}}"/></td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td> @if(!$category->children->isEmpty())
                  @foreach($category->children as $children)
                  {{$children->title}}
                  @endforeach
                  @else
                  {{"Parent Category"}}
                  @endif</td>
                <td> 
                 <div class="btn-group role-group" aria-label="Basic example">
                  <a role="button" href="{{route('categories.edit', $category->id)}}" class="btn btn-link">Edit</a>
                  <form method="post" action="{{route('categories.destroy',$category->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Delete</button>
                  </form>
                  </div>
              </tr>
            </tbody>
          </thead>
        </table>
      </div>
      @else
      <p class="alert alert-info">No Category Found</p>
      @endif
      @endsection
