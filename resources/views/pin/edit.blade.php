@extends('layouts.app')

@section('content')

  <div id="edit_page">
    
    <div class="col-md-6 col-md-offset-3">
      <h1>Edit Pin</h1>

      @include('common.error')

      <img src="{{ URL::asset('assets/img/pins/' . $pin->image) }}"
            alt="{{ $pin->title }}"
            class="current_image">

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
          <textarea name="description"
                  id="description"
                  type="text"
                  class="form-control">
                  {{ $pin->description }}
          </textarea>
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <input type="file"
                  name="image"
                  id="image"
                  accept="image/*"
                  class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Pin</button>

      </form>

      <a href="{{ url('pin/' . $pin->id) }}">Cancel</a>
    </div>

  </div>

@endsection
