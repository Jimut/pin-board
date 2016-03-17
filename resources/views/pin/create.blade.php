@extends('layouts.app')

@section('content')

  <div class="col-md-6 col-md-offset-3">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>New Pin</h1>
      </div>
      <div class="panel-body">
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
            <textarea name="description"
                    id="description"
                    type="text"
                    class="form-control">
                    {{ old('description') }}
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

          <button type="submit" class="btn btn-primary">Create Pin</button>

        </form>
      </div>
    </div>

    <a href="{{ url('/') }}">Back</a>
  </div>

@endsection
