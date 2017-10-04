@extends('master')

@section('title', 'Budget: ' . $committee->name)

@section('content')
<div id="app">
	<committee :committee="{{ $committee }}" :suggestion="{{ empty($suggestion) ? 'null' : $suggestion }}" user="{{ Auth::user() === null ? 'null' : Auth::user() }}"></committee>
</div>
@endsection
