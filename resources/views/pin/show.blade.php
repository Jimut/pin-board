@extends('layouts.app')

@section('content')

  <img src="{{ URL::asset('assets/img/pins/' . $pin->image) }}" alt="{{ $pin->title }}">
  <h1>{{ $pin->title }}</h1>
  <p>{{ $pin->description }}</p>
  <p>Submitted by {{ $pin->user->name }}</p>

  <a href="{{ url('/') }}">Back</a>
  @can ('modify', $pin)
    <a href="{{ route('pin.edit', ['pin' => $pin->id]) }}">Edit</a>
    <form action="{{ route('pin.destroy', ['pin' => $pin->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit">Delete</button>
    </form>
  @endcan

@endsection
