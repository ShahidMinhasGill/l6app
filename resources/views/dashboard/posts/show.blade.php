


@extends('dashboard.layout');
@section('content')
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
              <th>Categories</th>
              <th>Action</th>
            </tr>
            <tbody>
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td><img src="{{asset($post->thumbnail)}}"/></td>
                <td>{{$post->slug}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td> @if(!$post->categories->isEmpty())
                  @foreach($post->categories as $categories)
                  {{$categories->title}}
                  @endforeach
                  @else
                  {{"Parent post"}}
                  @endif</td>

                <td> 
                 <div class="btn-group role-group" aria-label="Basic example">
                  <a role="button" href="{{route('posts.edit', $post->id)}}" class="btn btn-link">Edit</a>
                  <form method="post" action="{{route('posts.destroy',$post->id)}}">
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
      @endsection
