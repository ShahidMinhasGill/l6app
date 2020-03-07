@extends('layouts.posts')
@section('content')
@component('components.message',['title'=>'<span>component title </span>'])
fddsfa
@endcomponent
	<li><?php echo $data['name'];?></li>
	<li><?php echo $data['company'];?></li>
@endsection