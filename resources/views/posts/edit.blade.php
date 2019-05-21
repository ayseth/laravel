@extends('layouts.app')


@section('content')

<h1>Edit</h1>

{{csrf_field()}}

<!-- <form method="post" action="/posts/{{$post->id}}"> -->
{!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}       <!--using package--> 

		{{csrf_field()}}

	{!! Form::label('title', 'Title:' ) !!}
	{!! Form::text('title', null, ['class'=>'form-control'])!!}


	
	{!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}


</form>





<form method="post" action="/posts/{{$post->id}}">
	
<input type="hidden" name="_method" value="DELETE">
{{csrf_field()}}

<input type="submit" value="DELETE">

</form>
@endsection

@section('footer')