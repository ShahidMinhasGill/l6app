@extends('layouts.posts')
@section('content')
<ul>
	<h1>Show record via show method</h1>
	<li> {{$data['title']}}</li>
        {{$data['content']}}

</ul>
@endsection