@extends('layouts.app')


@section('content')

<ul>
	
	@foreach($posts as $post)



<li>
	<a href="{{route('posts.show', $post->id)}}">{{$post->title}}</li></a></li>
	

	@endforeach

</ul>

@endsection
@section('footer')

