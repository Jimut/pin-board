@extends('layouts.app')

@section('content')

  <div class="col-md-6 col-md-offset-3">
    <h1>Edit Pin</h1>

    @include('common.error')

    <img src="{{ URL::asset('assets/img/pins/' . $pin->image) }}" alt="{{ $pin->title }}">

    <form action="{{ route('pin.update', ['pin' => $pin->id]) }}"
          method="POST"
          enctype="multipart/form-data">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div class="form-group">
        <label for="title">Title</label>
        <input name="title"
                id="title"
                type="text"
                class="form-control"
                value="{{ $pin->title }}">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <input name="description"
                id="description"
                type="text"
                class="form-control"
                value="{{ $pin->description }}">
      </div>

      <div class="form-group">
        <label for="image">Image</label>
        <input type="file"
                name="image"
                id="image"
                accept="image/*">
      </div>

      <button type="submit" class="btn btn-primary">Save Pin</button>

    </form>

    <a href="{{ url('pin/' . $pin->id) }}">Cancel</a>
  </div>
@endsection
