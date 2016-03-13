@extends('layouts.app')

@section('content')

  <h1>New Form</h1>

  @include('common.error')

  <form action="{{ url('pin') }}" method="POST">

    {{ csrf_field() }}

    <div class="form-group">
      <label for="title">Title</label>
      <input name="title"
              id="title"
              type="text"
              class="form-control"
              value="{{ old('title') }}">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input name="description"
              id="description"
              type="text"
              class="form-control"
              value="{{ old('description') }}">
    </div>

    <button type="submit" class="btn btn-primary">Create Pin</button>

  </form>

  <a href="{{ url('/') }}">Back</a>

@endsection
