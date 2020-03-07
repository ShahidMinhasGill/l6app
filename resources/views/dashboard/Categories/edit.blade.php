@extends('dashboard.layout');
@section('content')
<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
	@csrf
  @method("PUT")
  <div class="form-row align-items-center">
  	<div class="col-md-12">
    <label for="inputCategoriesTitle" class="sr-only">Name</label>
    <input type="text" name="title"  value="{{$category->title}}" class="form-control" id="inputCategoriesTitle">

  </div>  
  	<div class="col-md-12">
    <label for="inputContent" class="sr-only">Name</label>
    <textarea name="content" class="form-control" id="inputContent">
    	{{$category->content}}
    </textarea>
  </div>
    	<div class="col-md-12">
    		<img src="{{asset($category->thumbnail)}}" width="50px" height="50" alt="" class="img-fluid img-thumbnail" width="100" height="100" / >
    <label for="inputFileName" class="sr-only">Name</label>
    <input type="file" name="img-thumbnail" class="form-control form-file-control" id="inputFileName">
  </div>
      	<div class="col-md-12">
    <label for="inputFileName" class="sr-only">Name</label>
     <select name="parent_id" id="">
     	<option value="0">Select A Parent Category</option>
     	@if(!$categories->isEmpty())
     	
     	@foreach($categories as $category)
     	<option   value="{{$category->id}}">{{$category->title}}</option>
     	@endforeach
      @endif
     </select>
  </div>  
  </div>
  <button type="submit" class="btn btn-primary mb-2">Add New Category</button>
</form>
@endsection