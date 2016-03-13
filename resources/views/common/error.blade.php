@if(count($errors) > 0)

  <div id="errors">
    <h2>{{ count($errors) }} {{ str_plural('error', count($errors)) }} prevented this Pin from saving</h2>

    <ul>
      @foreach($errors as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>

@endif
