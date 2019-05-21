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


{!! Form::close() !!}




{!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!} 


{{csrf_field()}}

{!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}

{!! Form::close() !!}
@endsection

@section('footer')