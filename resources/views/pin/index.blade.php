@extends('layouts.app')

@section('content')

  <div id="pins" class="transition-enabled">
    @foreach ($pins as $pin)
      <div class="box panel panel-default">

        <a href="{{ url('pin/' . $pin->id) }}">
          <img src="{{ URL::asset('assets/img/pins/' . $pin->image) }}" alt="{{ $pin->title }}">
        </a>

        <div class="panel-body">
          <h2>
            <a href="{{ url('pin/' . $pin->id) }}">{{ $pin->title }}</a>
          </h2>
          <p class="user">By {{ $pin->user->name }}</p>
        </div>

      </div>
    @endforeach
  </div>

@endsection
