@extends('dashboard.layout');
@section('content')
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="align-items-center">
  	<div class="col-md-8">
    <label for="inputPostsTitle" class="sr-only">Title</label>
    <input type="text" name="title" class="form-control mb-2" id="inputPostsTitle" placeholder="post Title">
  </div>  
  	<div class="col-md-8">
    <label for="inutContent" class="sr-only">Content</label>
    <textarea name="content" class="form-control mb-2" id="inutContent"></textarea>
  </div>
    	<div class="col-md-8">
    <label for="inputFileName" class="sr-only">Thumbnail</label>
    <input type="file" name="thumbnail" class="form-control form-file-control mb-2" id="inputFileName"/>
    </div>
      	<div class="col-md-12 mb-2">
    <label for="inputFileName" class="sr-only">Categories</label>
     <select name="categories[]" id="" name="inputPost">
     	<option value="0">Select A Categories</option>
     	@if(!$categories->isEmpty())
     	
     	@foreach($categories as $category)
     	<option value="{{$category->id}}">{{$category->title}}</option>
     	@endforeach
      @endif
     </select>
  </div>
   <button type="submit" class="btn btn-primary mb-2">Add New post</button>  
  </div>
 
</form>
@endsection