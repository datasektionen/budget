@if (isset($errors) && $errors->any())
    <div class="message message-danger">
    	<h2>Hoppsan, något gick snett:</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
