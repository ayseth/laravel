@extends('layouts.app')


@section('content')

<h1>CREATE</h1>

<!-- <form method="post" action="/posts"> -->
{!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}       <!--using package--> 



<div class="form-group">

	{!! Form::label('title', 'Title:' ) !!}
	{!! Form::text('title', null, ['class'=>'form-control'])!!}


</div>
<div class="form-group">
	{!! Form::file('file', ['class'=>'form-control'])!!}

</div>

<div class="form-group">

	{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}


</div>

{!! Form::close() !!}



	@if(count($errors) > 0)

	<div class="alert alert-danger">
		
		<ul>
			
			@foreach($errors->all() as $error)

				<li>{{$error}}</li>

			@endforeach

		</ul>

	</div>

	@endif

@endsection

@section('footer')