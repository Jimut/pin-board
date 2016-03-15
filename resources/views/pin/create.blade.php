@extends('layouts.app')

@section('content')

  <div class="col-md-6 col-md-offset-3">
    <h1>New Form</h1>

    @include('common.error')

    <form action="{{ url('pin') }}"
          method="POST"
          enctype="multipart/form-data">

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

      <div class="form-group">
        <label for="image">Image</label>
        <input type="file"
                name="image"
                id="image"
                accept="image/*">
      </div>

      <button type="submit" class="btn btn-primary">Create Pin</button>

    </form>

    <a href="{{ url('/') }}">Back</a>
  </div>

@endsection
