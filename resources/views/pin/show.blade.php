@extends('layouts.app')

@section('content')

  <div id="pin_show" class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading pin_image">
          <img src="{{ URL::asset('assets/img/pins/' . $pin->image) }}" alt="{{ $pin->title }}">
        </div>
        <div class="panel-body">
          <h1>{{ $pin->title }}</h1>
          <p class="description">{{ $pin->description }}</p>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-sm-6">
              <p class="user">Submitted by {{ $pin->user->name }}</p>
            </div>
            <div class="col-sm-6">
              <div class="btn-group pull-right">
                <a href="{{ route('pin.like', ['pin' => $pin->id]) }}" class="btn btn-default">
                  <span class="glyphicon glyphicon-heart"></span>&nbsp;{{ $pin->likeCount }}
                </a>
                @can ('modify', $pin)
                  <a href="{{ route('pin.edit', ['pin' => $pin->id]) }}" class="btn btn-default">Edit</a>
                  <form action="{{ route('pin.destroy', ['pin' => $pin->id]) }}"
                        method="POST"
                        class="btn btn-danger link">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">Delete</button>
                  </form>
                @endcan
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
