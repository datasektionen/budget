@extends('admin.master')


@section('title', 'Nya bokningar')


@section('admin-content')
{!! Form::open() !!}
	@if($bookings->count() == 0)
		<p>Du har inga bokningar att hantera! Bra jobbat!</p>
	@else
		<table>
			<tr>
				<th>Godkänn</th>
				<th>Neka</th>
				<th>Bokning</th>
				<th>Bokat objekt</th>
				<th>Start</th>
				<th>Slut</th>
				<th>Anmärkning</th>
			</tr>
			@foreach ($bookings as $booking)
			<tr>
				<td>
					<div class="radio">
						{!! Form::radio('booking[' . $booking->id . ']', 'approve', false, ['id' => 'accept' . $booking->id]) !!}
						<label for="accept{{ $booking->id }}"></label>
					</div>
				</td>
				<td>
					<div class="radio">
						{!! Form::radio('booking[' . $booking->id . ']', 'decline', false, ['id' => 'decline' . $booking->id]) !!}
						<label for="decline{{ $booking->id }}"></label>
					</div>
				</td>
				<td><a href="/admin/bookings/edit/{{ $booking->id }}" title="Ändra">{{ $booking->title }}</a></td>
				<td>{{ $booking->entity->name }}</td>
				<td>{{ date("Y-m-d H:i", strtotime($booking->start)) }}</td>
				<td>{{ date("Y-m-d H:i", strtotime($booking->end)) }}</td>
				<td>
					@if ($booking->collisions() == 0) 
					<b style="color: #3a0">Krockar inte med något!</b>
					@else
					<b style="color: #d50">Krockar med {{ $booking->collisions() }} bokning(ar)!</b>
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		{!! Form::submit('Genomför markerade beslut') !!}
	@endif
	{!! Form::close() !!}
	{{ $bookings->links() }}
@endsection