@extends('layouts.app')

@section('content')

  <a href="{{ route('pin.create') }}">New Pin</a>

  @foreach ($pins as $pin)
    <h2>
      <a href="{{ url('pin/' . $pin->id) }}">{{ $pin->title }}</a>
    </h2>
  @endforeach

@endsection
