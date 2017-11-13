@extends('master')

@section('title', 'Budget: ' . $committee->name)

@section('head-js')
@endsection

@section('content')
<div id="app">
	<committee :committee="{{ $committee->toJson() }}" :suggestion="{{ empty($suggestion) ? 'null' : $suggestion }}" user="{{ Auth::user() === null ? 'null' : Auth::user() }}"></committee>
</div>
@endsection
