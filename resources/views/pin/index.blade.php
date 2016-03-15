@extends('layouts.app')

@section('content')

  @foreach ($pins as $pin)
    <a href="{{ url('pin/' . $pin->id) }}">
      <img src="{{ URL::asset('assets/img/pins/' . $pin->image) }}" alt="{{ $pin->title }}">
    </a>
    <h2>
      <a href="{{ url('pin/' . $pin->id) }}">{{ $pin->title }}</a>
    </h2>
    <p>By {{ $pin->user->name }}</p>
  @endforeach

@endsection
