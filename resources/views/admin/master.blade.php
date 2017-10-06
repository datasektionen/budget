@extends('master')

@section('content')
<div class="row">
	<div class="col-sm-4 col-md-3">
		<div id="secondary-nav">
			<h3>Administration</h3>
			<ul>
				<li><a href="/admin">Start</a></li>
				<li><a href="/admin/suggestions">Förslag</a></li>
				<li><a href="/admin/events">Händelser</a></li>
				<li><a href="/admin/committees">Nämnder och projekt</a></li>
				<li><a href="/admin/accounts">Kontoplan</a></li>
			</ul>
		</div>
	</div>
	<div class="col-sm-8 col-md-9">
		@yield('admin-content')
	</div>
</div>
@endsection