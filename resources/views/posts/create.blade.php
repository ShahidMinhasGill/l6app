
@extends('layouts.posts')
@section('content')
<!-- @if($errors->any())
<div class="alert alert-danger">
	<strong>Whoosp!</strong>There were some problems with your input.

	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif -->

<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="text" name="title" value="{{old('title')}}"><br>
	@error('title')
	{{$message}}
	@enderror
			<input type="text" name="email" value="{{old('email')}}"><br>
		<input type="text" name="email_confirmation" value="{{old('email_confirmation')}}"><br>
	@error('email')
	{{$message}}
	@enderror
	

	<textarea name="content" id="" cols="30" rows="10">{{old('content')}}</textarea><br>
	@error('content')
	{{$message}}
	@enderror
	
	<br>
	<label>Computer <input type="checkbox" name="check[]"></label>
	<label>General<input type="checkbox" name="check[]"></label>
	<label>Scince<input type="checkbox" name="check[]"></label>
	<label>Arts<input type="checkbox" name="check[]"></label>
	<label for="">Select an image<input type="file" name="photo"></label>
	<br>	

	<label>Start_Date<input type="date" name="start_date"></label><br>
	@error('start_date')
	{{$message}}
	@enderror
	
          <br>
	<label>End_Date<input type="date" name="end_date"></label><br>
	@error('end_date')
	{{$message}}
	@enderror
	
		<br>
	<label>website_url<input type="url" name="website"></label><br>
	@error('website')
	{{$message}}
	@enderror
     <br>
	<label>Accept TOS: <input type="checkbox" name="tos"></label><br>
	@error('tos')
	{{$message}}
	@enderror
		<br>
		<input type="submit" value="Add New Post"><br>
</form>
@endsection