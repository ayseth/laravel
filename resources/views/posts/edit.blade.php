@extends('layouts.app')


@section('content')

<h1>Edit</h1>

{{csrf_field()}}

<form method="post" action="/posts/{{$post->id}}">

	<input type="hidden" name="_method" value="PUT">

	<input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
	{{csrf_field()}}

	<input type="submit" name="update">

</form>

<form method="post" action="/posts/{{$post->id}}">
	
<input type="hidden" name="_method" value="DELETE">
{{csrf_field()}}

<input type="submit" value="DELETE">

</form>
@endsection

@section('footer')