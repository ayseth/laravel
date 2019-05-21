@extends('layouts.app')


@section('content')

<h1>CREATE</h1>

<!-- <form method="post" action="/posts"> -->
{!! Form::open() !!}       <!--using package--> 

	<input type="text" name="title" placeholder="Enter title">
	{{csrf_field()}}

	<input type="submit" name="submit">

</form>
@endsection

@section('footer')