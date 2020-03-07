@extends('dashboard.layout');
@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Post</a>
          </div>
        </div>
      </div>
      @if(!$posts->isEmpty())
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Thumbnail</th>
              <th>slug</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>posts</th>
              <th>Action</th>
            </tr>
            <tbody>
            	@foreach($posts as $post)
            	<tr>
            		<td>{{$post->id}}</td>
            		<td>{{$post->title}}</td>
                <td><img src="{{asset($post->thumbnail)}}"/></td>
            		<td>{{$post->slug}}</td>
                <td>{{$post->created_at}}</td>
            		<td>{{$post->updated_at}}</td>
            		<td>
                  @if(!$post->categories->isEmpty())
                  @foreach($post->categories as $cats)
                  {{$cats->title}}
                  @endforeach
                  @else
                  {{"Parent post"}}
                  @endif
                </td>
            		<td> 
            			<div class="btn-group role-group" aria-label="Basic example">
            			<a role="button" href="{{route('posts.edit', $post->id)}}" class="btn btn-link">Edit</a>
            			<form method="post" action="{{route('posts.destroy',$post->id)}}">
            				@csrf
            				@method('DELETE')
            				<button type="submit" class="btn btn-link">Delete</button>
            			</form>
            			<a post="button" href="{{route('posts.show', $post->id)}}" class="btn btn-link">Show</a>
            			</div>

            	</tr>
            	@endforeach
            </tbody>
          </thead>
        </table>
      </div>
      @else
      <p class="alert alert-info">No Posts Found</p>
      @endif
      @endsection
