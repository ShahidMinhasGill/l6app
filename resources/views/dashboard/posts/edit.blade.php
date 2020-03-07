@extends('dashboard.layout');
@section('content')
<form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
	@csrf
  @method("PUT")
  <div class="form-row align-items-center">
  	<div class="col-md-8">
    <label for="inputPostsTitle" class="sr-only">Title</label>
    <input type="text" name="title"  value="{{$post->title}}" class="form-control" id="inputPostsTitle">

  </div>  
  	<div class="col-md-8">
    <label for="inputContent" class="sr-only">Content</label>
    <textarea name="content" class="form-control" id="inputContent">
    	{{$post->content}}
    </textarea>
  </div>
    	<div class="col-md-8">
    		<img src="{{asset($post->thumbnail)}}" width="50px" height="50" alt="" class="img-fluid img-thumbnail" width="100" height="100" / >
    <label for="inputFileName" class="sr-only">Thumbnail</label>
    <input type="file" name="img-thumbnail" class="form-control form-file-control" id="inputFileName">
  </div>
      	<div class="col-md-8">
    <label for="inputFileName" class="sr-only">Categories</label>
     <select name="categories[]" multiple="" id="">
     	<option value="0">Select A Parent post</option>
     	@if(!$categories->isEmpty())
     	
     	@foreach($categories as $cats)
     	<option @if(in_array($cats->id,$post->categories->pluck('id')->toArray()))
      {{'selected'}}
      @endif
      value="{{$cats->id}}">{{$cats->title}}</option>
     	@endforeach
      @endif
     </select>
  </div>  
  </div>
  <button type="submit" class="btn btn-primary mb-2">Update Post</button>
</form>
@endsection