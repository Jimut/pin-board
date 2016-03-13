@extends('layouts.app')

@section('content')

  @foreach ($pins as $pin)
    <h2>
      <a href="{{ url('pin/' . $pin->id) }}">{{ $pin->title }}</a>
    </h2>
    <p>By {{ $pin->user->name }}</p>
  @endforeach

@endsection
