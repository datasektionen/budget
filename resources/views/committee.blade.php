@extends('master')

@section('title', 'Budget: ' . $committee->name)

@section('content')
<div id="app">
	<committee committee-id="{{ $committee->id }}" :suggestion="{{ $suggestion }}" user-id="{{ Auth::user() === null ? -1 : Auth::user()->id }}"></committee>
</div>
@endsection
