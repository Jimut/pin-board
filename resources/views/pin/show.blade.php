@extends('layouts.app')

@section('content')

  <h1>{{ $pin->title }}</h1>
  <p>{{ $pin->description }}</p>

  <a href="{{ url('/') }}">Back</a>
  <a href="{{ route('pin.edit', ['pin' => $pin->id]) }}">Edit</a>
  <form action="{{ route('pin.destroy', ['pin' => $pin->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit">Delete</button>
  </form>

@endsection
