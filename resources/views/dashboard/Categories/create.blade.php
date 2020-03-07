@extends('dashboard.layout');
@section('content')
<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="align-items-center">
  	<div class="col-md-8">
    <label for="inputCategoriesTitle" class="sr-only">Name</label>
    <input type="text" name="title" class="form-control mb-2" id="inputCategoriesTitle" placeholder="Category Title">
  </div>  
  	<div class="col-md-8">
    <label for="inutContent" class="sr-only">Name</label>
    <textarea name="content" class="form-control mb-2" id="inutContent"></textarea>
  </div>
    	<div class="col-md-8">
    <label for="inputFileName" class="sr-only">Name</label>
    <input type="file" name="thumbnail" class="form-control form-file-control mb-2" id="inputFileName"/>
    </div>
      	<div class="col-md-8 mb-2">
    <label for="inputFileName" class="sr-only">Name</label>
     <select name="parent_id" id="">
     	<option value="0">Select A Parent Category</option>
     	@if(!$categories->isEmpty())
     	
     	@foreach($categories as $category)
     	<option value="{{$category->id}}">{{$category->title}}</option>
     	@endforeach
      @endif
     </select>
  </div>
   <button type="submit" class="btn btn-primary mb-2">Add New Category</button>  
  </div>
 
</form>
@endsection